<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    use HasFactory;

    public function city()
    {
        return $this->belongsTo('App\Models\City', 'id_city');
    }

    public function village()
    {
        return $this->hasMany('App\Models\Village', 'id_district');
    }
}