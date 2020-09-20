<?php

namespace App\Http\Controllers\product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\productmodel\Tax;
use Alert;
use Image;
use Redirect,Response;

class TaxController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $taxes = Tax::orderBy('created_at', 'DESC')->get();
        return view('product/tax/index',compact('taxes'));
    }

   
    public function store(Request $request)
    {
        $validator = $request->validate([ 
            'tax_name' => 'required',
            'tax' => 'required ',
        ]);
        if($validator){
            Tax::insert($request->except('_token') + [
                'created_at' => Carbon::now()
            ]);
            toast('Tax have been created succesfully ','success');
        }
        return redirect('tax');
    }


     // Status change unit
     public function changestatus($id)
     {
         if (Tax::find($id)->tax_status) {
            Tax::findOrFail($id)->update([
                 'tax_status' => 0,
           ]);
           toast('Tax Status Deactivated ','warning');
         }
         else {
            Tax::findOrFail($id)->update([
                 'tax_status' => 1,
           ]);
           toast('Tax Status Activated ','success');
         }
         return redirect('tax');
     }

    public function update(Request $request)
    {
        Tax::find($request->tax_id)->update([
            'tax_name' => $request->tax_name,
            'tax' => $request->tax,
          ]);
          toast('Tax have been updated','info');
          return redirect('tax');
    }

    public function destroy(Request $request)
    {
        Tax::findOrFail($request->tax_id)->Delete();
        toast('Tax has been deleted ','warning');
        return redirect('tax');
    }
}
