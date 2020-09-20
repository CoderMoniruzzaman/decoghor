<?php

namespace App\Http\Controllers\product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\productmodel\Category;
use Illuminate\Support\Facades\Validator;
use Alert;
use Image;
use Redirect,Response;


class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {   
        $categoreies = Category::orderBy('created_at', 'DESC')->get();
        return view('product/category/index',compact('categoreies'))->with('i',(request()->input('page',1)-1)*8);
    }

   
    public function store(Request $request)
    {
        $validator = $request->validate([ 
            'category_name' => 'required|unique:categories,category_name',
        ]);
        if($validator){
            $last_inserted_id = Category::insertGetId([
                'category_name' => $request->category_name,
                'created_at' => Carbon::now()
            ]);
            if($request->hasFile('category_image',)){
                $photo_to_upload = $request->category_image;
                $filename = $last_inserted_id.".".$photo_to_upload->getClientOriginalExtension();
                Image::make($photo_to_upload)->resize(500, 500)->save(base_path('public/uploads/ProductImages/CategoryImages/'.$filename));
                Category::find($last_inserted_id)->update([
                'category_image' => $filename,
                ]);
            }
            toast('Category have been created succesfully ','success');
        }
        return redirect('category');
    }

    public function update(Request $request)
    {
        if($request->hasFile('category_image')){
            if (Category::find($request->cat_id)->category_image == 'categorydefault.jpg') {
              $photo_to_upload = $request->category_image;
              $filename = $request->cat_id.".".$photo_to_upload->getClientOriginalExtension();
              Image::make($photo_to_upload)->resize(500, 500)->save(base_path('public/uploads/ProductImages/CategoryImages/'.$filename));
              Category::find($request->cat_id)->update([
                'category_image' => $filename,
              ]);
            }
            else {
              $delete_this_file = Category::find($request->cat_id)->category_image;
              unlink(base_path('public/uploads/ProductImages/CategoryImages/'.$delete_this_file));
              $photo_to_upload = $request->category_image;
              $filename = $request->cat_id.".".$photo_to_upload->getClientOriginalExtension();
              Image::make($photo_to_upload)->resize(500, 500)->save(base_path('public/uploads/ProductImages/CategoryImages/'.$filename));
              Category::find($request->cat_id)->update([
                'category_image' => $filename,
              ]);
            }
          }
          Category::find($request->cat_id)->update([
            'category_name' => $request->category_name,
          ]);
          toast('Category have been updated','info');
          return redirect('category');
    }

    // Status change Brand
    public function changestatus($id)
    {
        if ($category = Category::find($id)->category_status) {
            Category::findOrFail($id)->update([
                'category_status' => 0,
          ]);
          toast('Category Status Deactivated ','warning');
        }
        else {
            Category::findOrFail($id)->update([
                'category_status' => 1,
          ]);
          toast('Category Status Activated ','success');
        }
        return redirect('category');
    }
    
    public function destroy(Request $request)
    {
        if ($delete_this = Category::findOrFail($request->cat_id)->category_image == 'categorydefault.jpg') {
            Category::findOrFail($request->cat_id)->Delete();
        }
        else {
        $delete_this = Category::findOrFail($request->cat_id)->category_image;
        unlink(base_path('public/uploads/ProductImages/CategoryImages/'.$delete_this));
        Category::findOrFail($request->cat_id)->Delete();
        }        
        toast('Category has been deleted ','warning');
        return redirect('category');
    }
}
