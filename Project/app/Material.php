<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Material extends Model
{

    public static function getTotalGoodsReceiptMaterial(){
        $count = Material::where([
                ['value','<=',15],
                ['is_deleted',false]
            ])->count();
        return $count;
    }

    public function checkName($name){
        return (Material::where('name',$name)->count() > 0);
    }
}
