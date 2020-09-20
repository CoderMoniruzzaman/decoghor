<?php

namespace App\productmodel;

use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    protected $fillable = [
        'unit_code' ,'unit', 'unit_status'
    ];
}
