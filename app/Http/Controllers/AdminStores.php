<?php
#{{-----------------------------------------------------🙏अंतः अस्ति प्रारंभः🙏-----------------------------}}
namespace App\Http\Controllers;

use App\Models\GroupType;
use App\Models\PricingDetail;
use App\Models\PurchaseService;
use App\Models\ReferIncome;
use App\Models\RegisterUser;
use App\Models\FormAttribute;
use Exception;
use App\Models\SubMaster;
use App\Models\Master;
use App\Models\Wallet;
use Illuminate\Http\Request;
use Auth;
use Log;

class AdminStores extends Controller
{
    public function storemaster(Request $req)
    {
        try {
            $masterdata = $req->validate([
                'label' => 'required',
                'value' => 'required',
            ]);
            Master::create($masterdata);
            return back()->with('success', 'Master Added..!!!!');
        } catch (Exception $e) {
            return redirect()->route('master')->with('error', $e->getMessage());
            //return redirect()->route('master')->with('error', 'Not Added Try Again...!!!!');
        }
    }

    public function storesubmaster(Request $req)
    {
        try {
            $submasterdata = $req->validate([
                'label' => 'required',
                'value' => 'required',
                'type' => 'required',
            ]);
            if ($req->hasFile('iconimage')) {
                $req->validate([
                    'iconimage' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                ]);
                $file = $req->file('iconimage');
                $filename = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('assets/images/Services'), $filename);
                $submasterdata['iconimage'] = $filename;
            }
            // dd($submasterdata);
            Master::create($submasterdata);
            return back()->with('success', 'Sub-Master Added..!!!!');
        } catch (Exception $e) {
            return redirect()->route('submaster')->with('error', $e->getMessage());
            //return redirect()->route('submaster')->with('error', 'Not Added Try Again...!!!!');
        }
    }

    public function getsubmasterajax($selectedCat)
    {
        $data = Master::where('type', '=', $selectedCat)->get();
        return response()->json($data);
    }

    public function updatesubmaster(Request $request)
    {

        try {
            $carlist = Master::find($request->submasterid);

            // Initialize $filename with the current image or set to null
            $filename = $carlist->iconimage;
            if ($request->hasFile('iconimage')) {
                // dd($request->all());
                $request->validate([
                    'iconimage' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                ]);
                $file = $request->file('iconimage');
                $filename = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('assets/images/Services'), $filename);
            }
            $carlist->update([
                'label' => $request->label,
                'type' => $request->type,
                'value' => $request->value,
                'iconimage' => $filename,
            ]);
            return back()->with('success', "Updated..!!!");
        } catch (Exception $e) {
            return back()->with('error', $e->getMessage());
            //return back()->with('error', 'Not Updated..Try Again.....');
        }
    }

    public function deletemaster($id)
    {
        // dd($id);
        $data = Master::find($id);
        if (!$data) {
            return redirect()->back()->with('error', "Data not found.");
        }
        $data->delete();
        return redirect()->back()->with('success', "Deleted.!!!");
    }

    public function updatemaster(Request $request)
    {
        try {
            $carlist = Master::where('id', $request->masterid)->update([
                'label' => $request->label,
                'value' => $request->value,
            ]);
            return back()->with('success', "Updated..!!!");
        } catch (Exception $e) {
            return back()->with('error', $e->getMessage());
            //return back()->with('error', 'Not Updated..Try Again.....');
        }
    }

    public function filterservice($selectedtype)
    {
        $master = Master::where('type', $selectedtype)->get();
        return response()->json(['master' => $master]);
    }

    public function insertform(Request $rq)
    {
        try {
            $data = $rq->validate([
                'servicetype' => 'required',
                'servicename' => 'required',
                'value' => 'required',
                'inputtype' => 'required',
            ]);

            FormAttribute::create([
                'type' => $rq->servicetype,
                'servicename' => $rq->servicename,
                'masterserviceid' => $rq->masterserviceid,
                'value' => $rq->value,
                'inputtype' => $rq->inputtype,
            ]);
            return back()->with('success', 'Form Attributes Created..!!!!');
        } catch (Exception $e) {
            return redirect()->route('createform')->with('error', $e->getMessage());
            //return redirect()->route('createform')->with('error', 'Not Added Try Again...!!!!');
        }
    }

    public function getattributes($servicetype, $servicename)
    {
        $data = FormAttribute::whereRaw('type = ? AND servicename = ?', [$servicetype, $servicename])->get();
        return response()->json(['data' => $data]);
    }

    public function deleteattribute($id)
    {
        $data = FormAttribute::find($id);
        $data->delete();
        return back()->with('success', "Deleted....!!!");
    }

    public function updateattributes(Request $request)
    {
        // dd($request->all());
        try {
            $attributes = FormAttribute::where('id', $request->attributeid)->update([
                'value' => $request->value,
                'servicename' => $request->servicename,
                'inputtype' => $request->inputtype,
            ]);
            return back()->with('success', "Updated..!!!");
        } catch (Exception $e) {
            return back()->with('error', $e->getMessage());
            //return back()->with('error', 'Not Updated..Try Again.....');
        }
    }

    public function insertpricingform(Request $rq)
    {
        // dd($rq->all());
        try {
            $data = $rq->validate([
                'serviceid' => 'required',
                'price' => 'required',
                'disprice' => 'required',
                'duration' => 'required',
                'documents' => 'required',
            ]);
            if ($rq->hasFile('coverimage')) {
                $rq->validate([
                    'coverimage' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                ]);
                $file = $rq->file('coverimage');
                $filename = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('assets/images/Services'), $filename);
            }
            $data = PricingDetail::create([
                'servicetype' => $rq->servicetype,
                'serviceid' => $rq->serviceid,
                'price' => $rq->price,
                'disprice' => $rq->disprice,
                'duration' => $rq->duration,
                'documents' => json_encode($rq->documents),
                'coverimage' => $filename,
                'notereq' => $rq->notereq,
                'details' => $rq->details,
            ]);
            //dd($data);
            return back()->with('success', 'Pricing Added..!!!!');
        } catch (Exception $e) {
            return redirect()->route('pricingdetails')->with('error', $e->getMessage());
            //return redirect()->route('pricingdetails')->with('error', 'Not Added Try Again...!!!!');
        }
    }

    public function deletepricing($id)
    {
        // dd($id);
        $data = PricingDetail::find($id);
        if (!$data) {
            return redirect()->back()->with('error', "Data not found.");
        }
        $data->delete();
        return redirect()->back()->with('success', "Deleted.!!!");
    }

    public function updatepricingdetails(Request $rq)
    {
        // dd($request->all());
        try {
            $pricingdata = PricingDetail::find($rq->pricingid);
            $filename = $pricingdata->coverimage;
            if ($rq->hasFile('coverimage')) {
                $rq->validate([
                    'coverimage' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                ]);
                $file = $rq->file('coverimage');
                $filename = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('assets/images/Services'), $filename);
            }
            $attributes = PricingDetail::where('id', $rq->pricingid)->update([
                'servicetype' => $rq->servicetype,
                'serviceid' => $rq->serviceid,
                'price' => $rq->price,
                'disprice' => $rq->disprice,
                'duration' => $rq->duration,
                'documents' => json_encode($rq->documents),
                'coverimage' => $filename,
                'notereq' => $rq->notereq,
                'details' => $rq->details,
            ]);
            return back()->with('success', "Updated..!!!");
        } catch (Exception $e) {
            return back()->with('error', $e->getMessage());
            //return back()->with('error', 'Not Updated..Try Again.....');
        }
    }

    public function filtertype($selectedtype)
    {
        $masterdata = Master::where('type', $selectedtype)->get();
        // dd($statedata);
        return response()->json($masterdata);
    }

    public function deleteuser($id)
    {
        $data = RegisterUser::find($id);
        $data->delete();
        return back()->with('success', "Deleted....!!!");
    }

    public function deleteorder($id)
    {
        $data = PurchaseService::find($id);
        $data->delete();
        return back()->with('success', "Deleted....!!!");
    }

    public function updateorderstatus(Request $req)
    {

        try {
            //Mutiple Image Upload
            $image = array();
            if ($files = $req->file('documents')) {
                foreach ($files as $file) {
                    $image_name = $file->getClientOriginalName();
                    // $extension = strtolower($file->getClientOriginalExtension());
                    // $image_fullname = $image_name . '.' . $extension;
                    $uploaded_path = "public/assets/images/documents/";
                    $image_url = $uploaded_path . $image_name;
                    $file->move($uploaded_path, $image_name);
                    $image[] = $image_url;
                }
            }
            $purchasedata = PurchaseService::where('id', $req->purchaseid)->first();

            if ($purchasedata) {
                // Update purchase status
                $purchasedata->status = $req->status ?? $purchasedata->status;

                if ($purchasedata->status == 'Completed') {
                    // Release wallet hold
                    Wallet::where('transactionid', $purchasedata->id)
                        ->where('status', '=', 'Hold')
                        ->update(['status' => 0]);

                    //Commission Calculation
                    $usrid = $purchasedata->userid;
                    if (!$usrid) {
                        Log::warning('User ID not found for Purchase ID: ' . $req->purchaseid);
                        return back()->with('error', 'User ID missing. Cannot process commission.');
                    }

                    if ($usrid) {
                        $parentreferid = RegisterUser::where('id', $usrid)->value('parentreferid');
                        if (!$parentreferid) {
                            Log::warning('Parent referral ID not found for User ID: ' . $usrid);
                            return back()->with('error', 'Parent referral ID missing.');
                        }
                        
                        $childrenids = RegisterUser::where('parentreferid', $parentreferid)->get()->pluck('id');

                        $sums = [];
                        foreach ($childrenids as $childId) {
                            $sum = Wallet::where('userid', $childId)->sum('amount');
                            $sums[$childId] = $sum;
                            $totalSum = array_sum($sums);
                        }

                        if ($totalSum > 50000) {
                            $data = Wallet::where('transactionid', $req->purchaseid)->update([
                                'parentreferid' => $parentreferid,
                                'commissionamt' => $req->servicetotal / 100 * 15,

                            ]);
                            $mainwalletid = Wallet::where('transactionid', $req->purchaseid)->value('id');
                            $parentid = RegisterUser::where('refercode', $parentreferid)->value('id');
                            $insertcommamt = $req->servicetotal / 100 * 15;
                            $data = Wallet::create([
                                'amount' => $insertcommamt,
                                'userid' => $parentid,
                                'paymenttype' => 'credit',
                                'commissionby' => $mainwalletid,
                                'transactiontype' => 'commission',
                                'status' => 0,
                            ]);
                        } else {
                            $data = Wallet::where('transactionid', $req->purchaseid)->update([
                                'parentreferid' => $parentreferid,
                                'commissionamt' => $req->servicetotal / 100 * 10,
                            ]);
                            $parentid = RegisterUser::where('refercode', $parentreferid)->get()->value('id');
                            $mainwalletid = Wallet::where('transactionid', $req->purchaseid)->value('id');
                            $insertcommamt = $req->servicetotal / 100 * 10;
                            $data = Wallet::create([
                                'amount' => $insertcommamt,
                                'userid' => $parentid,
                                'commissionby' => $mainwalletid,
                                'paymenttype' => 'credit',
                                'transactiontype' => 'commission',
                                'status' => 0,
                            ]);
                            if ($data) {
                                Log::info('Commission Data:', $data->toArray());
                            } else {
                                Log::error('Commission Data not found.');
                            }
                        }
                    }
                }
                $purchasedata->documents = count($image) > 0 ? implode(',', $image) : $purchasedata->documents;
                $purchasedata->note = $req->note == null ? $purchasedata->note : $req->note;
                $purchasedata->update();
                return back()->with('success', 'Status Updated..!!!!');
            } else {
                return back()->with('error', 'Status Not Updated..!!!!');
            }
        } catch (Exception $e) {
            return back()->with('error')->with('error', $e->getMessage());
        }
    }

    public function insertincomelevel(Request $rq)
    {
        try {

            $data = ReferIncome::create([
                'incomename' => $rq->incomename,
                'criteria' => $rq->criteria,
                'amount' => $rq->amount,
                'lessthangreater' => $rq->lessthangreater,
            ]);
            return back()->with('success', 'Income Added..!!!!');
        } catch (Exception $e) {
            return redirect()->route('referincomelevel')->with('error', $e->getMessage());
            //return redirect()->route('referincomelevel')->with('error', 'Not Added Try Again...!!!!');
        }
    }

    public function deleteincome($id)
    {
        $data = ReferIncome::find($id);
        $data->delete();
        return back()->with('success', "Deleted....!!!");
    }


    public function udpatereferincome(Request $rq)
    {
        try {
            $data = ReferIncome::where('id', $rq->referid)->update([
                'incomename' => $rq->incomename,
                'criteria' => $rq->criteria,
                'amount' => $rq->amount,
                'lessthangreater' => $rq->lessthangreater,
            ]);
            return back()->with('success', "Updated..!!!");
        } catch (Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }
    public function approvedwithdraw($id, Request $request)
    {
        try {
            $transactionNumber = $request->input('transactionNumber');
            if (!$transactionNumber) {
                return response()->json(['success' => false, 'error' => "Transaction number is required."]);
            }

            $requestdata = Wallet::find($id);
            if (!$requestdata) {
                return response()->json(['success' => false, 'error' => "Request not found."]);
            }

            $requestdata->update([
                'status' => 'withdrawn',
                'transactionid' => $transactionNumber,
            ]);

            return response()->json(['success' => true, 'message' => "Request Approved!"]);
        } catch (Exception $e) {
            return response()->json(['success' => false, 'error' => $e->getMessage()]);
        }
    }
}
