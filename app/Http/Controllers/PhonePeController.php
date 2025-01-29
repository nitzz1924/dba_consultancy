<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Ixudra\Curl\Facades\Curl;
use Log;
use Auth;
class PhonePeController extends Controller
{
    public function phonepe(Request $request)
    {
        $loggedinUser = Auth::guard('customer')->user();
        $transactionId = "MT" . time() . rand(1000, 9999);
        $data = [
            "merchantId" => env('PHONEPE_MERCHANT_ID'),
            "merchantTransactionId" => $transactionId,
            "merchantUserId" => "MUID{$loggedinUser->id}",
            "amount" => $request->walletamount * 100,
            "redirectUrl" => route('response'),
            "redirectMode" => "REDIRECT",
            "callbackUrl" => route('response'),
            "mobileNumber" => $loggedinUser->mobilenumber,
            "paymentInstrument" => [
                "type" => "PAY_PAGE"
            ],
        ];
        Log::info('PhonePe Request: ', $data);
        $encode = base64_encode(json_encode($data));
        $saltkey = env('PHONEPE_SALT_KEY');
        $saltIndex = env('PHONEPE_SALT_INDEX');

        $string = $encode . '/pg/v1/pay' . $saltkey;
        $sha256 = hash('sha256', $string);

        $finalXHeader = $sha256 . '###' . $saltIndex;


        $response = Curl::to(env('API_URL'))
            ->withHeader('Content-Type: application/json')
            ->withHeader('X-VERIFY: ' . $finalXHeader)
            ->withData(json_encode(['request' => $encode]))
            ->post();

        $rawData = json_decode($response);
        //    dd(  $rawData);
        return redirect()->to($rawData->data->instrumentResponse->redirectInfo->url);
    }

    public function response(Request $request)
    {
        $input = $request->all();
        dd($input);
    }
}
