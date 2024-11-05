<?php
#{{-----------------------------------------------------🙏अंतः अस्ति प्रारंभः🙏-----------------------------}}
namespace App\Http\Controllers;
use App\Models\GroupType;
use App\Models\RegisterUser;
use App\Models\FormAttribute;
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

}
