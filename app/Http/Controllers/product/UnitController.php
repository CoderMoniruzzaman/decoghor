<?php

namespace App\Http\Controllers\product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\productmodel\Unit;
use Alert;
use Image;
use Redirect,Response;


class UnitController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $units = Unit::orderBy('created_at', 'DESC')->get();
        return view('product/unit/index',compact('units'))->with('u',(request()->input('page',1)-1)*8);
    }

    
    public function store(Request $request)
    {
        $validator = $request->validate([ 
            'unit_code' => 'required|unique:units,unit_code',
            'unit' => 'required ',
        ]);
        if($validator){
            Unit::insert($request->except('_token') + [
                'created_at' => Carbon::now()
            ]);
            toast('Unit have been created succesfully ','success');
        }
        return redirect('unit');
    }

    // Status change unit
    public function changestatus($id)
    {
        if (Unit::find($id)->unit_status) {
            Unit::findOrFail($id)->update([
                'unit_status' => 0,
          ]);
          toast('Unit Status Deactivated ','warning');
        }
        else {
            Unit::findOrFail($id)->update([
                'unit_status' => 1,
          ]);
          toast('Unit Status Activated ','success');
        }
        return redirect('unit');
    }

    public function update(Request $request)
    {
        Unit::find($request->unit_id)->update([
            'unit_code' => $request->unit_code,
            'unit' => $request->unit,
          ]);
          toast('Unit have been updated','info');
          return redirect('unit');
    }

   
    public function destroy(Request $request)
    {
        Unit::findOrFail($request->unit_id)->Delete();
        toast('Unit has been deleted ','warning');
        return redirect('unit');
    }
}
