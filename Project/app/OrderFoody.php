<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderFoody extends Model
{
    public function getNameFoody()
    {
        return Foody::find($this->foody_id)->name;
    }

}
