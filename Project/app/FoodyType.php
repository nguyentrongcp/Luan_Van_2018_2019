<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FoodyType extends Model
{

    public function foodies() {
        return $this->hasMany(Foody::class);
    }

    public function foody_types() {
        return $this->hasMany(FoodyType::class);
    }

    public static function exit($slug) {
        return !self::whereSlug($slug)->get()->isEmpty();
    }

    public function noProduct() {
        return $this->products->isEmpty();
    }

//
//    public function getName() {
//        return $this->ten_loai;
//    }
//
//    public function matchedId($id) {
//        return $id == $this->id;
//    }
}
