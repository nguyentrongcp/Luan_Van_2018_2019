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

}
