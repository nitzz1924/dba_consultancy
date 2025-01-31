<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Models\Wallet;
use Auth;
use Log;
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
            $aftersuccessURL = route('payment.success');

            $transaction_data = array(
                'merchantId' => "$merchantId",
                'merchantTransactionId' => "$order_id",
                "merchantUserId" => $order_id,
                'amount' => $amount * 100,
                'redirectUrl' => "$aftersuccessURL",
                'redirectMode' => "POST",
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
        // dd($request->all());
        if ($request->code == 'PAYMENT_SUCCESS') {
            $transactionId = $request->transactionId;
            $merchantId = $request->merchantId;
            $providerReferenceId = $request->providerReferenceId;
            $merchantOrderId = $request->merchantOrderId;
            $checksum = $request->checksum;
            $amount = $request->amount;
            $status = $request->code;

            // Store information into database
            $data = [
                'providerReferenceId' => $providerReferenceId,
                'checksum' => $checksum,
                'amount' => $amount,
                'transaction_id' => $transactionId,
                'status' => $status,
                'merchantOrderId' => $merchantOrderId,
            ];

            if ($merchantOrderId != '') {
                $data['merchantOrderId'] = $merchantOrderId;
            }

            Wallet::where('transactionid', $transactionId)->update([
                'transactiondata' => json_encode($data),
            ]);

            return response()->json(['status' => 'success', 'message' => 'Payment recorded'], 200);

        } else {
            return response()->json(['status' => 'error', 'message' => 'Payment failed'], 400);
        }

    }
}