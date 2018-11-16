<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MiniComment extends Model
{
    public function customer() {
        return $this->belongsTo(Customer::class);
    }
}
