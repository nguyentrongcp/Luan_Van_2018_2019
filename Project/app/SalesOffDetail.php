<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SalesOffDetail extends Model
{
    public function salesOff() {
        return $this->belongsTo(SalesOff::class);
    }

    public function foody() {
        return $this->belongsTo(Foody::class);
    }
}
