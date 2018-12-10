<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmployeeRole extends Model
{
    public function function() {
        return $this->belongsTo(Functions::class, 'function_id', 'id');
    }
}
