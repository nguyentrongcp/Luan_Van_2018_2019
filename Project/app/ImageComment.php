<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ImageComment extends Model
{
    //

    public function Image() {
        return $this->belongsTo(Image::class);
    }
}
