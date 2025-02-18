<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Models\Wallet;
use Auth;
use Log;
use Cache;
class PhonePeController extends Controller
{
    public function phonepe(Request $request)
    {
        $loggedinuser = Auth::guard('customer')->user();
        $amount = $request->input('walletamount');

        if ($amount) {

            $merchantId = env('PHONEPE_MERCHANT_ID');
            $apiKey = env('PHONEPE_SALT_KEY');
            $redirectUrl = route('response');
            $order_id = uniqid();
            $aftersuccessURL = route('paymentStatus');

            $transaction_data = array(
                'merchantId' => "$merchantId",
                'merchantTransactionId' => "$order_id",
                "merchantUserId" => $order_id,
                'amount' => $amount * 100,
                'redirectUrl' => "$aftersuccessURL",
                'redirectMode' => "GET",
                'callbackUrl' => "$redirectUrl",
                "paymentInstrument" => array(
                    "type" => "PAY_PAGE",
                )
            );

            $encode = json_encode($transaction_data);
            $payloadMain = base64_encode($encode);
            $salt_index = 1; //key index 1
            $payload = $payloadMain . "/pg/v1/pay" . $apiKey;
            $sha256 = hash("sha256", $payload);
            $final_x_header = $sha256 . '###' . $salt_index;
            $request = json_encode(array('request' => $payloadMain));

            $curl = curl_init();

            curl_setopt_array($curl, [
                CURLOPT_URL => env('API_URL'),
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "POST",
                CURLOPT_POSTFIELDS => $request,
                CURLOPT_HTTPHEADER => [
                    "Content-Type: application/json",
                    "X-VERIFY: " . $final_x_header,
                    "accept: application/json"
                ],
            ]);

            $response = curl_exec($curl);
            $err = curl_error($curl);

            curl_close($curl);

            if ($err) {
                echo "cURL Error #:" . $err;
            } else {
                $res = json_decode($response);

                //dd('Data Inserted' . $walletdata);
                // end database insert

                if (isset($res->code) && ($res->code == 'PAYMENT_INITIATED')) {
                    // Store information into database
                    $data = [
                        'amount' => $amount,
                        'transaction_id' => $order_id,
                        'status' => $res->code,
                    ];

                    $walletdata = Wallet::create([
                        'userid' => $loggedinuser->id,
                        'transactiontype' => 'online',
                        'transactionid' => $order_id,
                        'paymenttype' => 'credit',
                        'amount' => $amount,
                        'transactiondata' => json_encode($data),
                        'status' => 0,
                    ]);
                    $payUrl = $res->data->instrumentResponse->redirectInfo->url;
                    return redirect()->away($payUrl);
                } else {
                    //HANDLE YOUR ERROR MESSAGE HERE
                    dd('ERROR : ');
                }
            }
        }
    }

    public function response(Request $request)
    {
        try {
            // Decode JSON request body
            $responseArray = json_decode($request->getContent(), true);

            if (!isset($responseArray['response'])) {
                Log::error("Missing 'response' field.");
                return response()->json(['error' => 'Missing response field'], 400);
            }

            // Decode base64 response
            $decodedJson = base64_decode($responseArray['response']);

            if (!$decodedJson) {
                Log::error("Base64 decoding failed.");
                return response()->json(['error' => 'Failed to decode base64 response'], 400);
            }

            // Convert JSON string to array
            $decodedResponse = json_decode($decodedJson, true);

            if (!$decodedResponse) {
                Log::error("JSON decoding failed.", ['decodedJson' => $decodedJson]);
                return response()->json(['error' => 'Invalid JSON format'], 400);
            }


            // Extract necessary values
            $status = $decodedResponse['code'] ?? 'UNKNOWN_STATUS';
            $transactionId = $decodedResponse['data']['transactionId'] ?? null;
            $merchantOrderId = $decodedResponse['data']['merchantTransactionId'] ?? null;
            $amount = $decodedResponse['data']['amount'] ?? 0;
            $providerReferenceId = $decodedResponse['data']['merchantId'] ?? null;
            $checksum = null;


            // If values are null, log an error
            if (!$transactionId || !$merchantOrderId || !$status) {
                Log::error("Missing transaction data", compact('transactionId', 'merchantOrderId', 'status'));
            }

            // Prepare data for database
            $data = [
                'providerReferenceId' => $providerReferenceId,
                'checksum' => $checksum,
                'amount' => $amount,
                'transaction_id' => $transactionId,
                'status' => $status,
                'merchantOrderId' => $merchantOrderId,
            ];

            // Map PhonePe status to wallet status
            $statusMapping = [
                'PAYMENT_SUCCESS' => 'PAYMENT_SUCCESS',
                'PAYMENT_CANCELLED' => 'PAYMENT_CANCELLED',
                'PAYMENT_FAILED' => 'PAYMENT_FAILED',
                'PAYMENT_ERROR' => 'PAYMENT_ERROR',
            ];
            $walletStatus = $statusMapping[$status] ?? 'failed';

            // Update wallet transaction
            Wallet::where('transactionid', $merchantOrderId)->update([
                'transactiondata' => json_encode($data),
                'status' => $walletStatus,
            ]);

            Cache::forget('payment_status');
            Cache::put('payment_status', [
                'status' => $status,
                'transaction_id' => $transactionId,
                'merchantOrderId' => $merchantOrderId
            ], 15); // Cache for 60 minutes


            return redirect()->route('paymentStatus');


        } catch (\Exception $e) {
            Log::error("Exception in response method", ['error' => $e->getMessage()]);
            return response()->json(['error' => 'Internal Server Error'], 500);
        }
    }

}