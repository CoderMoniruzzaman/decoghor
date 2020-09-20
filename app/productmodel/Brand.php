<?php

namespace App\productmodel;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $fillable = [
        'brand_name', 'brand_image','brand_status' 
    ];
}
