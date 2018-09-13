<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductType extends Model
{
    protected $fillable = ['name-type', 'slug'];

    public function products() {
        return $this->hasMany(Product::class);
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
