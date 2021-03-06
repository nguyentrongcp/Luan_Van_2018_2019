<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Material extends Model
{

    public function calculationUnit() {
        return $this->belongsTo(CalculationUnit::class);
    }

    public static function getTotalGoodsReceiptMaterial(){
        $count = Material::where([
                ['value','<=',15],
                ['is_deleted',false]
            ])->count();
        return $count;
    }

    public function goodsNoteReceiptMaterials() {
        return $this->hasMany(GoodsReceiptNoteDetail::class, 'material_id', 'id');
    }

    public function checkName($name){
        return (Material::where('name',$name)->count() > 0);
    }
}
