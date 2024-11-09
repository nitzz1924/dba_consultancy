<?php
#{{-----------------------------------------------------🙏अंतः अस्ति प्रारंभः🙏-----------------------------}}
namespace App\Http\Controllers;

use App\Models\Campaign;
use App\Models\Contact;
use App\Models\GroupType;
use App\Models\Message;
use App\Models\Master;
use App\Models\PricingDetail;
use App\Models\RegisterUser;
use App\Models\Template;
use Illuminate\Http\Request;
use Illuminate\Http\Client\PendingRequest;
use Illuminate\Support\Facades\Http;
use Session;
use Auth;
use Carbon\Carbon;
class UserViews extends Controller
{
    public function userloginpage()
    {
        return view('auth.UserPanel.login');
    }
    public function registration()
    {
        return view('auth.UserPanel.registration');
    }
    public function userdashboard()
    {
        return view('UserPanel.userdashboard');
    }
    public function logoutuserpanel()
    {
        Session::flush();
        Auth::guard('customer')->logout();
        return redirect()->route('userloginpage');
    }
    public function home()
    {
        if (Auth::guard('customer')->check()) {
            $services = Master::where('type', '=', 'Services')->get();
            return view('UserPanel.home', compact('services'));
        } else {
            return view('auth.UserPanel.login');
        }
    }
    public function wallet()
    {
        if (Auth::guard('customer')->check()) {
            return view('UserPanel.wallet');
        } else {
            return view('auth.UserPanel.login');
        }
    }
    public function servicedetail($id)
    {
        if (Auth::guard('customer')->check()) {
            $data = PricingDetail::join('masters','pricing_details.serviceid','=','masters.id')
            ->select('masters.label as servicename','pricing_details.*')
            ->where('serviceid',$id)->first();
            // dd($data);
            return view('UserPanel.servicedetail',compact('data'));
        } else {
            return view('auth.UserPanel.login');
        }
    }
    public function userprofile()
    {
        if (Auth::guard('customer')->check()) {
            return view('UserPanel.userprofile');
        } else {
            return view('auth.UserPanel.login');
        }
    }
    public function editprofile()
    {
        if (Auth::guard('customer')->check()) {
            return view('UserPanel.editprofile');
        } else {
            return view('auth.UserPanel.login');
        }
    }
    public function allservices()
    {
        if (Auth::guard('customer')->check()) {
            $services = Master::where('type', '=', 'Services')->get();
            return view('UserPanel.allservices', compact('services'));
        } else {
            return view('auth.UserPanel.login');
        }
    }
    public function refer()
    {
        if (Auth::guard('customer')->check()) {
            return view('UserPanel.refer');
        } else {
            return view('auth.UserPanel.login');
        }
    }
}
