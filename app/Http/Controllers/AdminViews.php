<?php
#{{-----------------------------------------------------🙏अंतः अस्ति प्रारंभः🙏-----------------------------}}
namespace App\Http\Controllers;

use App\Models\FormAttribute;
use App\Models\Master;
use App\Models\PricingDetail;
use App\Models\PurchaseService;
use App\Models\RegisterUser;
use Illuminate\Http\Request;

class AdminViews extends Controller
{
    public function master()
    {
        $masterdata = Master::orderBy('created_at', 'desc')->where('type', '=', 'Master')->get();
        return view('AdminPanel.master', compact('masterdata'));
    }

    public function submaster()
    {
        $submasterdata = Master::where('type', '=', 'Master')->get();
        return view('AdminPanel.submaster', compact('submasterdata'));
    }

    public function createform(){
        $masterdata = Master::where('type', '=', 'Master')
        ->whereIn('value', ['Services', 'Consulting'])
        ->get();
        $attributesdata = Master::where('type','=','Services')->get();
        return view('AdminPanel.createform',compact('masterdata','attributesdata'));
    }

    public function pricingdetails(){
        $masterdata = Master::where('type','=','Documents')->get();
        $services = Master::where('type','=','Services')->get();
        $pricingdata = PricingDetail::join('masters','pricing_details.serviceid','=','masters.id')
        ->select('masters.label as servicename','pricing_details.*')->get();
        // dd( $pricingdata);
        return view('AdminPanel.addpricing',compact('masterdata','pricingdata','services'));
    }

    public function allcustomers(){
        $customers =  RegisterUser::orderBy('created_at','Desc')->get();
        return view('AdminPanel.allcustomers',compact('customers'));
    }
    public function customersorders(){
        $orders =  PurchaseService::join('register_users','purchase_services.userid','=','register_users.id')
        ->select('register_users.username as customername','purchase_services.*')
        ->orderBy('created_at','Desc')->get();
        return view('AdminPanel.allorders',compact('orders'));
    }

    public function orderdetailsadmin($id){
        $orderdetails =  PurchaseService::join('register_users','purchase_services.userid','=','register_users.id')
        ->join('masters','masters.id','=','purchase_services.serviceid')
        ->select('register_users.*','purchase_services.*','masters.iconimage as serviceimage')->first();
        //dd($orderdetails);
        return view('AdminPanel.orderdetails',compact('orderdetails'));
    }
}
