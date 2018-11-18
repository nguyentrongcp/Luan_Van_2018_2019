<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    public static function ExistedDistrict($district){
        return (District::where('district','like','%'.$district.'%')->count() > 0);
    }
}
