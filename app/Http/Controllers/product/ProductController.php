<?php

namespace App\Http\Controllers\product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use Alert;
use Image;
use Redirect,Response;
use App\productmodel\Product;
use App\productmodel\Category;
use App\productmodel\SubCategory;
use App\productmodel\Brand;
use App\productmodel\Tax;
use App\productmodel\Unit;


class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $subcategoreies = SubCategory::all();
        $categoreies = Category::all();
        $products = Product::orderBy('created_at', 'DESC')->get();
        return view('product/products',compact('products','subcategoreies','categoreies'))->with('i',(request()->input('page',1)-1)*8);
    }

    public function createview()
    {
        $categoreies = Category::orderBy('created_at', 'DESC')->where('category_status', 1)->get();
        $subcategoreies = SubCategory::orderBy('created_at', 'DESC')->where('sub_category_status', 1)->get();
        $brands = Brand::orderBy('created_at', 'DESC')->where('brand_status', 1)->get();
        $taxes = Tax::orderBy('created_at', 'DESC')->where('tax_status', 1)->get();
        $units = Unit::orderBy('created_at', 'DESC')->where('unit_status', 1)->get();
        return view('product/create',compact('categoreies','subcategoreies','brands','taxes','units'));
    }

    public function store(Request $request)
    {
        request()->validate([
            'product_name' => 'required',
            'product_price' => 'required',
            'product_sales' => 'required',
            'product_alert' => 'required',
            'product_image' => 'required',
            'category_id' => 'required',
            'subcategory_id' => 'required',
            'brand_id' => 'required',
            'tax_id' => 'required',
            'product_unit' => 'required',
            'unit_id' => 'required',
        ]);
        $product_insert_id = Product::insertGetId($request->except('_token','product_image','product_mulimg') + [
            'created_at' => Carbon::now()
        ]);

        if($request->hasfile('product_image')){
            $photo_to_upload = $request->product_image;
            $filename = $product_insert_id.".".$photo_to_upload->getClientOriginalExtension();
            Image::make($photo_to_upload)->resize(620,720)->save(base_path('public/uploads/ProductImages/Productphoto/'.$filename));
            Product::find($product_insert_id)->update([
              'product_image' => $filename,
            ]);
        }

        if ($request->hasFile('product_mulimg')) {
            if ($files = $request->file('product_mulimg')) {
                $flag=0;
                 foreach($files as $img) {
                   $new_photo_name = $product_insert_id."-".$flag.".".$img->getClientOriginalExtension();
                   $destinationPath ='public/uploads/ProductImages/ProductSlider/'.$new_photo_name;
                  Image::make($img)->resize(620,720)->save(base_path($destinationPath));
                  $flag++;
                  $data[] = $new_photo_name;
                  }
                 $imagemodel= new Product();
                 $imagemodel->where('id', $product_insert_id)->update([
                 'product_mulimg' => json_encode($data)
                ]);
             }
        }

        toast('Product have been created succesfully ','success');
        return back();
    }

    
    public function show($id)
    {   
        $product_info = Product::findOrFail($id);
        $multiple_photos = json_decode($product_info->product_mulimg, true);
        return view('product/view',compact('product_info','multiple_photos'));
    }
    // Status change Brand
    public function changestatus($id)
    {
        if (Product::find($id)->product_status) {
            Product::findOrFail($id)->update([
                'product_status' => 0,
          ]);
          toast('Product has been unpublished ','warning');
        }
        else {
            Product::findOrFail($id)->update([
                'product_status' => 1,
          ]);
          toast('Product has been published ','success');
        }
        return back();
    }
 
    public function edit($id)
    {
        $categoreies = Category::orderBy('created_at', 'DESC')->where('category_status', 1)->get();
        $subcategoreies = SubCategory::orderBy('created_at', 'DESC')->where('sub_category_status', 1)->get();
        $brands = Brand::orderBy('created_at', 'DESC')->where('brand_status', 1)->get();
        $taxes = Tax::orderBy('created_at', 'DESC')->where('tax_status', 1)->get();
        $units = Unit::orderBy('created_at', 'DESC')->where('unit_status', 1)->get();
        $old_infos = Product::findOrFail($id);
        $multiple_photos = json_decode($old_infos->product_mulimg, true);
        return view('product/edit',compact('old_infos','multiple_photos','categoreies','subcategoreies','brands','taxes','units'));
    }
   

    public function editproductsingle(Request $request,$single_photo,$single_id)
    {
        if(empty($request->product_mulimg )){
                toast('Please select Image','warning');
                return back();
            }
            if($single_photo){
            $imag = $single_photo;

            if( $imag == "defaultmulphoto.jpg"){
                $extension = "";
                foreach($request->product_mulimg as $photos) {
                    $extension= $photos->getClientOriginalExtension();
                    $file_name_new=$single_id."-"."0".".".$extension ;
                    $photo_to_upload=$photos;
                Image::make($photo_to_upload)->resize(620,720)->save(base_path('public/uploads/ProductImages/ProductSlider/'.$file_name_new));
                }

                $single_product_info = Product::findOrFail($single_id);
                $multiple_photos = json_decode($single_product_info->product_mulimg, true);
                $photos_new_db[]="";
                $i=0;
                foreach($multiple_photos as $photos) {
                if($photos===$single_photo){
                    $photos_new_db[$i]=$file_name_new;
                    $i++;
                }
                else{
                    $photos_new_db[$i]=$photos;
                    $i++;
                }
                }
                $imagemodel= new Product();
                $imagemodel->where('id', $single_id)->update([
                'product_mulimg' => json_encode($photos_new_db)
                ]);
            }
            else{
                unlink(base_path('public/uploads/ProductImages/ProductSlider/'.$single_photo));
                $file_name = pathinfo($single_photo, PATHINFO_FILENAME);
                $extension = "";
                foreach($request->product_mulimg as $photos) {
                    $extension= $photos->getClientOriginalExtension();
                    $file_name_new=$file_name.".".$extension ;
                    $photo_to_upload=$photos;
                Image::make($photo_to_upload)->resize(620,720)->save(base_path('public/uploads/ProductImages/ProductSlider/'.$file_name_new));
                }

                $single_product_info = Product::findOrFail($single_id);
                $multiple_photos = json_decode($single_product_info->product_mulimg, true);
                $photos_new_db[]="";
                $i=0;
                foreach($multiple_photos as $photos) {
                if($photos===$single_photo){
                    $photos_new_db[$i]=$file_name_new;
                    $i++;
                }
                else{
                    $photos_new_db[$i]=$photos;
                    $i++;
                }
                }
                $imagemodel= new Product();
                $imagemodel->where('id', $single_id)->update([
                'product_mulimg' => json_encode($photos_new_db)
                ]);
            }
        }
        toast('Product preview image has been updated','success');
        return back();
    }

     
    public function update(Request $request)
    {
        if($request->hasFile('product_image')){
            if (Product::find($request->id)->product_image == 'defaultproductphoto.jpg') {
              $photo_to_upload = $request->product_image;
              $filename = $request->id.".".$photo_to_upload->getClientOriginalExtension();
              Image::make($photo_to_upload)->resize(620,720)->save(base_path('public/uploads/ProductImages/Productphoto/'.$filename));
              Product::find($request->id)->update([
                'product_image' => $filename,
              ]);
            }
            else {
              $delete_this_file = Product::find($request->id)->product_image;
              unlink(base_path('public/uploads/ProductImages/Productphoto/'.$delete_this_file));
    
              $photo_to_upload = $request->product_image;
              $filename = $request->id.".".$photo_to_upload->getClientOriginalExtension();
              Image::make($photo_to_upload)->resize(620,720)->save(base_path('public/uploads/ProductImages/Productphoto/'.$filename));
              Product::find($request->id)->update([
                'product_image' => $filename,
              ]);
            }
        }
        Product::find($request->id)->update([
        'product_name' => $request->product_name,
        'product_price' => $request->product_pricez,
        'product_alert' => $request->product_alert,
        'product_sales' => $request->product_sale,
        'category_id' => $request->category_id,
        'subcategory_id' => $request->subcategory_id,
        'brand_id' => $request->brand_id,
        'tax_id' => $request->tax_id,
        'product_unit' => $request->product_unit,
        'unit_id' => $request->unit_id,
        'product_description' => $request->product_description,
        ]);
        $single_product_info = Product::findOrFail($request->id);
        $multiple_photos = json_decode($single_product_info->product_mulimg, true);
        if ($multiple_photos=== null || $multiple_photos=== '') {
            if ($files = $request->file('photo_name_new')) {
                $destinationPath = base_path('public/uploads/ProductImages/ProductSlider/');
                $flag=0;
                foreach($files as $img) {
                    $profileImage =$request->id."-".$flag.".".$img->extension();
                    $img->move($destinationPath, $profileImage);
                    $data[] = $profileImage;
                    $flag++;
                    }
                $imagemodel= new Product();
                $imagemodel->where('id', $request->id)->update([
                'product_mulimg' => json_encode($data)
                ]);
            }
        }
        else{
            $last_photo =end($multiple_photos);
            $file_name = pathinfo($last_photo, PATHINFO_FILENAME); 
            $numbers = explode('-', $file_name);
            $lastNumber = end($numbers);
            if ($files = $request->file('photo_name_new')) {
                $destinationPath = base_path('public/uploads/ProductImages/ProductSlider/');
                $flag=$lastNumber + 1;
                foreach($files as $img) {
                    $profileImage =$request->id."-".$flag.".".$img->extension();
                    $img->move($destinationPath, $profileImage);
                    $data[] = $profileImage;
                    $flag++;
                }
                $all_images = array_merge($multiple_photos,$data);
                    $imagemodel= new Product();
                    $imagemodel->where('id', $request->id)->update([
                    'product_mulimg' => json_encode($all_images)
                ]);
            }
        }
        return back();
    }

    // public function deleteproductsingle($single_photo,$single_id){
    //        $single_product_info = Product::findOrFail($single_id);
    //        $multiple_photos = json_decode($single_product_info->product_mulimg, true);
    //        $photos_match[]="";
    //        $photos_new_db[]="";
    //         $i=0;
    //         $j=0;
    //        foreach($multiple_photos as $photos) {
    //          if($photos===$single_photo){
    //            $photos_match[$i]=$photos;
    //            $i++;
    //          }
    //          else{
    //            $photos_new_db[$j]=$photos;
    //            $j++;
    //          }
    //        }
    //        foreach($photos_match as $photos) {
    //             unlink(base_path('public/uploads/ProductImages/ProductSlider/'.$photos));
    //        }
    //        $imagemodel= new Product();
    //        if (in_array(null, $photos_new_db, true) || in_array('', $photos_new_db, true)) {
  
    //          $imagemodel->where('id', $single_id)->update([
    //            'product_mulimg' => '["defaultmulphoto.jpg"]'
    //          ]);
    //        }
    //        else{
    //          $imagemodel->where('id', $single_id)->update([
    //            'product_mulimg' => json_encode($photos_new_db)
    //          ]);
    //        }
    //       return back();
    // }

    
    public function destroy($id)
    {
        //
    }
}
