<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    public function province()
    {
        return $this->belongsTo('App\Models\Province', 'id_province');
    }

    public function district()
    {
        return $this->hasMany('App\Models\District', 'id_city');
    }
}