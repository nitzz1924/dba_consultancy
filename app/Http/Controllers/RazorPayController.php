<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Razorpay\Api\Api;
use App\Models\Wallet;
use Exception;
class RazorPayController extends Controller
{
    function payment(Request $req)
    {
        $amount = $req->input('walletamount');
        if (!$amount) {
            return response()->json(['error' => 'Amount is missing!'], 400);
        }

        try {
            $api = new Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));
            $orderdata = [
                'receipt' => 'order_' . rand(1000, 9999),
                'amount' => $amount * 100,
                'currency' => 'INR',
                'payment_capture' => 1
            ];
            $order = $api->order->create($orderdata);
            //dd($order);
            return response()->json($order->toArray());
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    // function inserttransactiondata(Request $req)
    // {
    //     $data = $req->input('transactiondata');
    //     // dd( $data['transactiondata']);
    //     $wallet = new Wallet();
    //     $wallet->transactiondata = $data['transactiondata'];
    //     $wallet->save();
    //     return response()->json(['success' => 'Transaction data inserted successfully!']);
    // }
}