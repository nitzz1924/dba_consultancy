<?php
#{{--#---------------------------------------------------🙏🔱देवा श्री गणेशा 🔱🙏---------------------------”--}}
namespace App\Http\Controllers;

use App\Models\GroupType;
use App\Models\RegisterUser;
use Exception;
use App\Models\SubMaster;
use App\Models\Master;
use Illuminate\Http\Request;

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
            $carlist = Master::where('id', $request->submasterid)->update([
                'label' => $request->label,
                'type' => $request->type,
                'value' => $request->value,
            ]);
            return back()->with('success', "Updated..!!!");
        } catch (Exception $e) {
            return back()->with('error', $e->getMessage());
            //return back()->with('error', 'Not Updated..Try Again.....');
        }
    }

    public function deletemaster($id) {
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

}
