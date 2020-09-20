<?php

namespace App\productmodel;

use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    protected $fillable = [
        'sub_category_name', 'sub_category_status' ,'sub_category_image', 'category_id'
    ];
    
    function relationcategory(){
        return $this->hasOne('App\productmodel\Category', 'id', 'category_id');
    }
}
