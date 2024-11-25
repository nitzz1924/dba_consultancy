<?php
#{{-----------------------------------------------------🙏अंतः अस्ति प्रारंभः🙏-----------------------------}}
namespace App\Http\Controllers;

use App\Models\Campaign;
use App\Models\Contact;
use App\Models\FormAttribute;
use App\Models\GroupType;
use App\Models\Message;
use App\Models\Wallet;
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

            $user = RegisterUser::create([
                'username' => $rq->username,
                'mobilenumber' => $rq->mobilenumber,
                'email' => $rq->email,
                'parentreferid' => $rq->parentreferid,
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
                'parentreferid' => $rq->parentreferid,
            ]);

            //This is current user's referid
            $data->update([
                'refercode' =>  Carbon::now()->year.'dba'.$data->id,
            ]);
            return response()->json(['msg' => 'success', 'data' => ['id' => $data->id,'otp' => $otp]]);

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

        $formtype = $data['formtype'] ?? null;
        $servicename = $data['servicename'] ?? null;
        $servicecharge = $data['amount'] ?? null;
        $serviceid = $data['serviceid'] ?? null;
        $discount = $data['discount'] ?? null;

        //Removing these from my array
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

            if ($request->hasFile($key)) {
                $file = $request->file($key);
                $request->validate([
                    $key => 'required|file|mimes:jpeg,png,jpg,pdf,docx|max:2048',
                ]);

                $filename = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('assets/images/users'), $filename);
                $formData[] = [
                    'label' => $key,
                    'value' => $filename,
                    'type' => 'file'
                ];
            } else {
                $formData[] = [
                    'label' => $key,
                    'value' => $value,
                    'type' => $inputType ? $inputType->inputtype : 'text'
                ];
            }
        }
        // dd($formData);
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

    public function updateserviceform(Request $request)
    {
        try {
            // Fetch the existing service record
            $finaldata = PurchaseService::find($request->serviceid);
            if (!$finaldata) {
                return back()->with('error', 'Service not found.');
            }

            $data = $request->all();
            unset($data['formtype'], $data['previousimage'], $data['servicename'], $data['amount'], $data['serviceid'], $data['discount']);

            // Initialize an array to store form data
            $formData = [];
            foreach ($data as $key => $value) {
                // Get input types for form fields from the database
                $inputType = FormAttribute::where('masterserviceid', $finaldata->serviceid)
                    ->where('value', str_replace('file_', '', $key)) // Remove 'file_' prefix from key
                    ->first();

                // Check if the input field contains a file
                if ($request->hasFile($key)) {
                    // Handle the uploaded file
                    $file = $request->file($key);

                    // Validate and store the file
                    $request->validate([
                        $key => 'required|file|mimes:jpeg,png,jpg,pdf,docx|max:2048',
                    ]);

                    $filename = time() . '_' . $file->getClientOriginalName();
                    $file->move(public_path('assets/images/users'), $filename);

                    // Prevent duplicates and add the uploaded file details to form data
                    $foundKey = false;
                    foreach ($formData as &$dataEntry) {
                        if ($dataEntry['label'] == str_replace('file_', '', $key)) {
                            $dataEntry['value'] = $filename;  // Update the value for the existing key
                            $foundKey = true;
                            break;
                        }
                    }

                    if (!$foundKey) {
                        $formData[] = [
                            'label' => str_replace('file_', '', $key), // Cleaned field key
                            'value' => $filename,
                            'type' => 'file',
                        ];
                    }

                } else {
                    // If no file is uploaded, retain the previous image or fallback to the current value
                    $foundKey = false;
                    foreach ($formData as &$dataEntry) {
                        if ($dataEntry['label'] == str_replace('file_', '', $key)) {
                            // If the field is a 'file' input, use the previous image or current value
                            $dataEntry['value'] = $value;
                            $foundKey = true;
                            break;
                        }
                    }

                    // If the key doesn't exist yet, add it to form data
                    if (!$foundKey) {
                        $formData[] = [
                            'label' => str_replace('file_', '', $key), // Cleaned field key
                            'value' => $value, // Use the form's value (could be the previous image name)
                            'type' => $inputType ? $inputType->inputtype : 'text',
                        ];
                    }
                }
            }

            // Debug output for form data (optional)
            // dd($formData);

            // Update the formdata field with the new data and save it to the database
            $finaldata->formdata = json_encode($formData);
            $finaldata->save();

            return back()->with('success', 'Form data updated successfully!');
        } catch (Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function insertwallet(Request $request)
    {
        try {
            $loggedinuser = Auth::guard('customer')->user();
            $walletdata = new Wallet();
            $walletdata->userid = $loggedinuser->id;
            $walletdata->transactiontype = $request->input('transactiontype');
            $walletdata->paymenttype = $request->input('paymenttype');
            $walletdata->amount = $request->input('walletamount');
            $walletdata->status = 0;
            $walletdata->save();
            return back()->with('success', 'Wallet Recharged.');
        } catch (Exception $e) {
            return redirect()->route('wallet')->with('error', $e->getMessage());
        }
    }

    public function paynow(Request $request){
        $loggedinuser = Auth::guard('customer')->user();
        //dd($request->all());
        try {
            $walletdata = new Wallet();
            $walletdata->userid = $loggedinuser->id;
            $walletdata->serviceid = $request->input('serviceid');
            $walletdata->transactiontype = $request->input('transactiontype');
            $walletdata->paymenttype = $request->input('paymenttype');
            $walletdata->amount = $request->input('amount');
            $walletdata->transactionid = $request->input('orderid');
            $walletdata->status = 0;
            $walletdata->save();

            $orderstatus = PurchaseService::where('id',$request->input('orderid'))->update([
                'status' => 'Processing',
            ]);
            return redirect()->route('orderpage')->with('success', 'Order Placed.');
        } catch (Exception $e) {
            return redirect()->route('proceedtopay')->with('error', $e->getMessage());
        }
    }

}

