<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\ResetPasswordMail;
use Illuminate\Support\Facades\Mail;
use App\Models\RegisterUser;
use Log;
class EmailController extends Controller
{
    public function sendMail(Request $request)
    {
        // Validate the request
        $request->validate([
            'email' => 'required|email',
        ]);
        // dd($request->all());
        try{
            $registeredUser = RegisterUser::where('email', $request->email)->first();
            if(!$registeredUser){
                return back()->with('error', 'Email not found!');
            }else{
                $toEmail = $request->email;
                $subject = "Reset Password";
                $message = "This is the mail for Resetting the password";
                // dd('$registeredUser');
        
                // Send email via Laravel Mail
                $encryptedEmail = encrypt($toEmail);
                // dd( $encryptedEmail);
                Mail::to($toEmail)->send(new ResetPasswordMail($message, $subject, $encryptedEmail));
                return response()->json([
                    'success' => true,
                    'toEmail' => $toEmail,
                    'message' => 'Reset Link has been sent to'
                ]);
            }
            
        }catch(\Exception $e){
            Log::error($e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'This Email is not regisetered'
            ]);
        }

    }
}
