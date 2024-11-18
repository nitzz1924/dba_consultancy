<?php
#{{-----------------------------------------------------🙏अंतः अस्ति प्रारंभः🙏-----------------------------}}
namespace App\Http\Controllers;

use App\Models\Campaign;
use App\Models\Contact;
use App\Models\FormAttribute;
use App\Models\GroupType;
use App\Models\Message;
use App\Models\PurchaseService;
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

    public function signup_user_otp(Request $request)
    {
        $credentials = $request->only('mobilenumber');
        $data = RegisterUser::where('mobilenumber', '=', $credentials)->first();
        if ($data) {
            $otp = rand(100000, 999999);
            $data->update([
                'otp' => $otp,
            ]);
            return response()->json(['msg' => 'success', 'data' => ['id' => $data->id, 'otp' => $otp, 'mobilenumber' => $credentials]]);
        } else {
            return redirect()->route('userloginpage')->with('error', 'Invalid credentials');
        }
    }

    public function LoginOtpVerify(Request $request)
    {
        try {
            $user = RegisterUser::find($request->registerid);
            if ($user && $user->otp == implode('', array_slice($request->all(), 1, 6))) {
                // Log in the user with Auth guard for customer
                Auth::guard('customer')->login($user);
                // if (Auth::guard('customer')->check()) {
                //     dd("I am logged in");
                // }
                return redirect()->route('home');
            } else {
                // OTP does not match
                return redirect()->route('userloginpage')->with('error', 'OTP Not Verified');
            }
        } catch (Exception $e) {
            return redirect()->route('userloginpage')->with('error', $e->getMessage());
        }
    }

    public function insertServiceForm(Request $request)
    {
        $loggedinuser = Auth::guard('customer')->user();
        $data = $request->all();

        if (isset($data['data'])) {
            parse_str($data['data'], $decodedData);
            unset($data['data']);
        }

        // Merge the decoded data with the rest of the form fields
        $data = array_merge($data, $decodedData);

        $formtype = $data['formtype'] ?? null;
        $servicename = $data['servicename'] ?? null;
        $servicecharge = $data['amount'] ?? null;
        $serviceid = $data['serviceid'] ?? null;
        $discount = $data['discount'] ?? null;
        unset($data['formtype']);
        unset($data['servicename']);
        unset($data['amount']);
        unset($data['serviceid']);
        unset($data['discount']);


        $formData = [];
        foreach ($data as $key => $value) {

            //Getting Input Types of Form Fields
            $inputType = FormAttribute::where('masterserviceid', $serviceid)
                ->where('value', $key)
                ->first();


            //Inserting Data of Form with Input Types
            $formData[] = [
                'label' => $key,
                'value' => $value,
                'type' => $inputType ? $inputType->inputtype : 'text'
            ];
        }
        // DD(  $formData);


        //Now save it do the database
        $finaldata = new PurchaseService();
        $finaldata->formdata = json_encode($formData);
        $finaldata->userid = $loggedinuser->id;
        $finaldata->formtype = $formtype;
        $finaldata->serviceid = $serviceid;
        $finaldata->discount = $discount;
        $finaldata->servicename = $servicename;
        $finaldata->servicecharge = $servicecharge;
        $finaldata->save();
        return back()->with('success', 'Service Purchased..!!!');
    }

}

