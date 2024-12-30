<?php
#{{-----------------------------------------------------🙏अंतः अस्ति प्रारंभः🙏-----------------------------}}
namespace App\Http\Controllers;

use App\Models\FormAttribute;
use App\Models\Master;
use App\Models\PricingDetail;
use App\Models\PurchaseService;
use App\Models\ReferIncome;
use App\Models\RegisterUser;
use Illuminate\Http\Request;
use Auth;
use App\Models\Wallet;
class AdminViews extends Controller
{
    public function dashboard()
    {
        if (Auth::check()) {
            $allorderscnt = PurchaseService::count();
            $registerusercnt = RegisterUser::count();
            $ordershold = PurchaseService::where('status', 'Hold')->count();
            $orderscompleted = PurchaseService::where('status', 'Completed')->count();
            $orderspending = PurchaseService::where('status', 'Processing')->count();
            $orderscancelled = PurchaseService::where('status', 'Cancel')->count();
            $orders = PurchaseService::join('register_users', 'purchase_services.userid', '=', 'register_users.id')
            ->select('register_users.username as customername', 'purchase_services.*')
            ->orderBy('created_at', 'Desc')
            ->get();
            
            $credithistory = Wallet::join('register_users', 'wallets.userid', 'register_users.id')
            ->select('register_users.username as customername', 'wallets.*')
            ->orderby('wallets.created_at', 'DESC')
            ->where('wallets.paymenttype', 'credit')
            ->where(function ($query) {
                $query->where('wallets.transactiontype', 'commission')
                    ->orWhere('wallets.transactiontype', 'online');
            })
            ->get();
            return view('AdminPanel.dashboard', compact('allorderscnt', 'registerusercnt', 'ordershold', 'orderscompleted', 'orderspending','orders','orderscancelled','credithistory'));
        } else {
            return view('auth.login');
        }

    }
    public function master()
    {
        if (Auth::check()) {
        $masterdata = Master::orderBy('created_at', 'desc')->where('type', '=', 'Master')->get();
        return view('AdminPanel.master', compact('masterdata'));
        } else {
            return view('auth.login');
        }
    }

    public function submaster()
    {
        $submasterdata = Master::where('type', '=', 'Master')->get();
        return view('AdminPanel.submaster', compact('submasterdata'));
    }

    public function createform()
    {
        $masterdata = Master::where('type', '=', 'Master')
            ->whereIn('value', ['Services', 'Consulting'])
            ->get();
        $attributesdata = Master::where('type', '=', 'Services')->get();
        return view('AdminPanel.createform', compact('masterdata', 'attributesdata'));
    }

    public function pricingdetails()
    {
        $masterdata = Master::where('type', '=', 'Documents')->get();
        $services = Master::where('type', '=', 'Services')->get();
        $pricingdata = PricingDetail::join('masters', 'pricing_details.serviceid', '=', 'masters.id')
            ->select('masters.label as servicename', 'pricing_details.*')->get();
        // dd( $pricingdata);
        return view('AdminPanel.addpricing', compact('masterdata', 'pricingdata', 'services'));
    }

    public function allcustomers()
    {
        $customers = RegisterUser::orderBy('created_at', 'Desc')->get();
        return view('AdminPanel.allcustomers', compact('customers'));
    }
    public function customersorders($status)
    {
        $orders = PurchaseService::join('register_users', 'purchase_services.userid', '=', 'register_users.id')
            ->select('register_users.username as customername', 'purchase_services.*')
            ->orderBy('created_at', 'Desc')
            ->where('purchase_services.status', $status)
            ->get();
        return view('AdminPanel.allorders', compact('orders'));
    }
    public function customersallorders()
    {
        $orders = PurchaseService::join('register_users', 'purchase_services.userid', '=', 'register_users.id')
            ->select('register_users.username as customername', 'purchase_services.*')
            ->orderBy('created_at', 'Desc')
            ->get();
        return view('AdminPanel.allorders', compact('orders'));
    }

    public function orderdetailsadmin($id)
    {
        $orderdetails = PurchaseService::join('register_users', 'purchase_services.userid', '=', 'register_users.id')
            ->join('masters', 'masters.id', '=', 'purchase_services.serviceid')
            ->select('register_users.*', 'purchase_services.*', 'masters.iconimage as serviceimage')
            ->where('purchase_services.id', $id)->first();
        //dd($orderdetails);
        return view('AdminPanel.orderdetails', compact('orderdetails'));
    }

    public function referincomelevel()
    {
        $incomedata = ReferIncome::orderBy('created_at', 'DESC')->get();
        return view('AdminPanel.referincomelevel', compact('incomedata'));
    }
    public function referedusers()
    {
        $loggedinuser = Auth::user();
        $myrefercode = $loggedinuser->refercode;
        $list = RegisterUser::orderby('created_at', 'DESC')
            ->where('parentreferid', '=', $myrefercode)->get();
        // $array = [];
        // foreach ($list as $row) {
        //     $finaldata = RegisterUser::where('parentreferid', '=', $row->refercode)->get();
        //     $array[] =[
        //         'user' => $row,
        //         'referedusers'=>$finaldata,
        //     ];
        // }
        //dd($array);
        return view('AdminPanel.referedusers', compact('list'));
    }
    public function getchildren($refercode)
    {
        $children = RegisterUser::orderby('created_at', 'DESC')
            ->where('parentreferid', $refercode)->get();
        // dd($children);
        return response()->json($children);
    }

    public function datefilterorders(Request $request)
    {
        $datefrom = $request->input('datefrom');
        $dateto = $request->input('dateto');
        $data = PurchaseService::join('register_users', 'purchase_services.userid', '=', 'register_users.id')
            ->select('register_users.username as customername', 'purchase_services.*')->whereDate('purchase_services.created_at', '>=', $datefrom)->whereDate('purchase_services.created_at', '<=', $dateto)->orderby('purchase_services.created_at', 'desc')->get();
        return response()->json($data);
        // dd($data);
    }

    public function wallethistory(Request $request)
    {
        $credithistory = Wallet::join('register_users', 'wallets.userid', 'register_users.id')
            ->select('register_users.username as customername', 'wallets.*')
            ->orderby('wallets.created_at', 'DESC')
            ->where('wallets.paymenttype', 'credit')
            ->where(function ($query) {
                $query->where('wallets.transactiontype', 'commission')
                    ->orWhere('wallets.transactiontype', 'online');
            })
            ->get();
        return view('AdminPanel.wallethistory', compact('credithistory'));
    }

    public function datefilterwallethistory(Request $request)
    {
        $datefrom = $request->input('datefrom');
        $dateto = $request->input('dateto');

        // Query to fetch wallet history
        $credithistory = Wallet::join('register_users', 'wallets.userid', '=', 'register_users.id')
            ->select('register_users.username as customername', 'wallets.*')
            ->where('wallets.paymenttype', 'credit')
            ->where(function ($query) use ($datefrom, $dateto) {
                $query->where('wallets.transactiontype', 'commission')
                    ->orWhere('wallets.transactiontype', 'online');
            })
            ->whereDate('wallets.created_at', '>=', $datefrom)
            ->whereDate('wallets.created_at', '<=', $dateto)
            ->orderBy('wallets.created_at', 'DESC')
            ->get();

        // Return the filtered data
        return response()->json($credithistory);
    }

    public function allcommissionslist()
    {
        $commissions = Wallet::join('register_users', 'register_users.id', 'wallets.userid')
            ->join('purchase_services', 'purchase_services.id', 'wallets.transactionid')
            ->select('register_users.username as customername', 'wallets.*', 'purchase_services.servicename as servicename')
            ->where('wallets.parentreferid', '!=', null)->where('wallets.transactiontype', 'serviceorder')->get();
        return view('AdminPanel.allcommissions', compact('commissions'));

    }

    public function datefiltercommissions(Request $request)
    {
        $datefrom = $request->input('datefrom');
        $dateto = $request->input('dateto');
        $commissions = Wallet::join('register_users', 'register_users.id', 'wallets.userid')
            ->join('purchase_services', 'purchase_services.id', 'wallets.transactionid')
            ->select('register_users.username as customername', 'wallets.*', 'purchase_services.servicename as servicename')
            ->where('wallets.parentreferid', '!=', null)
            ->where('wallets.transactiontype', 'serviceorder')
            ->whereDate('wallets.created_at', '>=', $datefrom)
            ->whereDate('wallets.created_at', '<=', $dateto)
            ->get();
        return response()->json($commissions);
    }
}