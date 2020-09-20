<?php

namespace App\productmodel;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'product_name','product_price','product_sales','product_alert','category_id','subcategory_id','brand_id','tax_id','unit_id','product_image','product_mul_img','product_Video','product_description','product_status'
    ];
    function relationcategory(){
        return $this->hasOne('App\productmodel\Category', 'id', 'category_id');
    }
    function relationsubcategory(){
        return $this->hasOne('App\productmodel\SubCategory', 'id', 'subcategory_id');
    }
    function relationbrand(){
        return $this->hasOne('App\productmodel\Brand', 'id', 'brand_id');
    }
    function relationtax(){
        return $this->hasOne('App\productmodel\Tax', 'id', 'tax_id');
    }
    function relationunit(){
        return $this->hasOne('App\productmodel\Unit', 'id', 'unit_id');
    }

    protected $attributes = [
        'product_mul_img' => ['database', 'defaultmulphoto.jpg']
    ];
}
