<?php

namespace App\productmodel;

use Illuminate\Database\Eloquent\Model;

class Tax extends Model
{
    protected $fillable = [
        'tax_name' ,'tax', 'tax_status'
    ];
}
