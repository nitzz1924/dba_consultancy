<?php
#{{-----------------------------------------------------🙏अंतः अस्ति प्रारंभः🙏-----------------------------}}
namespace App\Http\Controllers;

use App\Models\Campaign;
use App\Models\Contact;
use App\Models\GroupType;
use App\Models\Message;
use App\Models\RegisterUser;
use App\Models\Template;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Auth;
use Exception;
use Carbon\Carbon;
use Log;
class UserStores extends Controller
{
    public function signup_user_otp(Request $request)
    {
        $credentials = $request->only('mobilenumber', 'password');
        $data = RegisterUser::where('mobilenumber', '=', $credentials)->first();
        if ($data && Auth::guard('customer')->attempt($credentials)) {
            // dd($data);
            return redirect()->route('home');
        }
        return redirect()->route('userloginpage')->with('error', 'Invalid credentials');
    }

    public function registeruser(Request $rq)
    {
        try {
            $data = $rq->validate([
                'username' => 'required',
                'mobilenumber' => 'required',
                'email' => 'required',
            ]);

            RegisterUser::create([
                'username' => $rq->username,
                'mobilenumber' => $rq->mobilenumber,
                'email' => $rq->email,
            ]);
            return back()->with('success', 'Registration Successfull..!!!!');

        } catch (Exception $e) {
            return redirect()->route('createform')->with('error', $e->getMessage());
            //return redirect()->route('createform')->with('error', 'Not Added Try Again...!!!!');
        }
    }

    public function proceedtootp(Request $rq)
    {
        $otp = rand(100000, 999999);
        try {
            $data = $rq->validate([
                'username' => 'required',
                'mobilenumber' => 'required',
                'email' => 'required',
            ]);

            $data = RegisterUser::create([
                'username' => $rq->username,
                'mobilenumber' => $rq->mobilenumber,
                'email' => $rq->email,
                'otp' => $otp,
            ]);
            return response()->json(['msg' => 'success', 'data' => ['id' => $data->id]]);

        } catch (Exception $e) {
            return response()->json(['msg' => 'failure']);
        }
    }

    public function verifyotp(Request $request)
    {
        try {
            $user = RegisterUser::find($request->registerid);
            if ($user && $user->otp == implode('', array_slice($request->all(), 1, 6))) {
                $user->verifystatus = '1';
                $user->save();
                return back()->with('success', 'Registration Successfull..!!!!');
            }
        } catch (Exception $e) {
            return redirect()->route('createform')->with('error', $e->getMessage());
        }
    }

}
