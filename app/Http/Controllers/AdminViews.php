<?php
#{{--#---------------------------------------------------🙏🔱देवा श्री गणेशा 🔱🙏---------------------------”--}}
namespace App\Http\Controllers;

use App\Models\FormAttribute;
use App\Models\Master;
use App\Models\PricingDetail;
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
        $masterdata = Master::where('type','=','Master')->get();
        $attributesdata = Master::where('type','=','Services')->get();
        return view('AdminPanel.createform',compact('masterdata','attributesdata'));
    }

    public function pricingdetails(){
        $masterdata = Master::where('type','=','Documents')->get();
        $pricingdata = PricingDetail::orderBy('created_at','DESC')->get();
        return view('AdminPanel.addpricing',compact('masterdata','pricingdata'));
    }
}
