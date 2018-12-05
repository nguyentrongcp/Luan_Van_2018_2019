<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SalesOff extends Model
{
    public function salesOffDetails() {
        return $this->hasMany(SalesOffDetail::class);
    }
    public function salesOff() {
        return $this->belongsTo(SalesOff::class);
    }
    public function salesOffs() {
        return $this->hasMany(SalesOff::class);
    }

    public function isActive() {
        return date('Y-m-d') >= $this->start_date && date('Y-m-d') <= $this->end_date;
    }

    public function checkName($nameSalesOffs){
        return SalesOff::where('name',$nameSalesOffs)->count() > 0;
    }

}
