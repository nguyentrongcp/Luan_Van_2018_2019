<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CalculationUnit extends Model
{
    public function materials() {
        return $this->hasMany(Material::class);
    }
}
