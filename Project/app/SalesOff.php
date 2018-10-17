<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SalesOff extends Model
{
    public function salesDetail() {
        return $this->hasMany(SalesOffsDetails::class);
    }
    public function salesOff() {
        return $this->belongsTo(SalesOff::class);
    }
}
