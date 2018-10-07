<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GoodsReceiptNote extends Model
{
    public function admin() {
        return $this->belongsTo(Admin::class);
    }
    public function GoodsReceiptNote()
    {
        return $this->hasMany(GoodsReceiptNote::class);
    }

    public function GoodsReceiptNoteDetail()
    {
        return $this->hasMany(GoodsReceiptNoteDetail::class,'goods_receipt_id','id');
    }
    public function GoodsReceiptNoteCost()
    {
        return $this->hasMany(GoodsReceiptNoteCost::class,'goods_receipt_id','id');
    }
    public function soMaterial()
    {
        return GoodsReceiptNoteDetail::where('goods_receipt_note_id', $this->id)->count();
    }
}
