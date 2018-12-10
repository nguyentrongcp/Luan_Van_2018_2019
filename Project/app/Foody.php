<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

/**
 * @property mixed costs
 * @property mixed name
 * @property mixed foody_type_id
 * @property mixed trademark_id
 * @property mixed id
 */


class Foody extends Model
{
    private $price = -1;
    private $salePercent = -1;

    public function costs()
    {
        return $this->hasMany(Cost::class);
    }

    public function images() {
        return $this->hasMany(ImageFoody::class);
    }

    public function likes() {
        return $this->hasMany(Like::class);
    }

    public function comments() {
        return $this->hasMany(Comment::class);
    }

    public function getLiked() {
        return $this->likes()->count();
    }

    public function checkLiked($customer_id) {
        return $this->likes()->where('customer_id', $customer_id)->count() > 0;
    }

    public function favorites() {
        return $this->hasMany(Favorite::class);
    }

    public function getFavorited() {
        return $this->favorites()->count();
    }

    public function checkFavorited($customer_id) {
        return $this->favorites()->where('customer_id', $customer_id)->count() > 0;
    }

    public function salesOffDetail() {
        return $this->hasMany(SalesOffDetail::class);
    }
    public function foodyType(){
        return $this->belongsTo(FoodyType::class);
    }
    public function foodyStatuses(){
        return $this->hasOne(FoodyStatus::class,'foody_id','id');
    }
    public function getStatus(){
        return $this->foodyStatuses->status;
    }

    public function getNameType(){
        return $this->foodyType->name;
    }
//
    public function votes() {
        return $this->hasMany(Vote::class);
    }
    public function voteDetails() {
        return $this->hasMany(VoteDetail::class);
    }
    public function getVoted() {
        return $this->votes()->first();
    }
//
    public function backendComments() {
        return $this->hasMany(Comment::class);
    }


    public function orderFoodies() {
        return $this->hasMany(OrderFoody::class);
    }

    public function shoppingCartFoodies() {
        return $this->hasMany(ShoppingCart::class);
    }

    public function currentCost() {
        return $this->costs->max()->cost;
    }
//
    public function getCostVotes() {
        return $this->votes->avg('cost');
    }

    public function getQualityVotes() {
        return $this->votes->avg('quality');
    }

    public function getAttitudeVotes() {
        return $this->votes->avg('attitude');
    }

    public function getBuyCount() {
        return DB::table('foodies')->join('order_foodies', 'foodies.id', 'foody_id')
            ->join('orders', 'order_foodies.order_id', 'orders.id')
            ->join('order_statuses', 'orders.id', 'order_statuses.order_id')
            ->where('foodies.id', $this->id)
            ->where(function ($query) {
                $query->where('status', 2)
                    ->orWhere('status', 3);})
            ->count('order_foodies.foody_id');
    }
    public function getBuyCountByDate($date) {
        return DB::table('foodies')->join('order_foodies', 'foodies.id', 'foody_id')
            ->join('orders', 'order_foodies.order_id', 'orders.id')
            ->join('order_statuses', 'orders.id', 'order_statuses.order_id')
            ->where('foodies.id', $this->id)
            ->where('order_created_at', '<=', $date)
            ->where(function ($query) {
                $query->where('status', 2)
                    ->orWhere('status', 3);})
            ->count('order_foodies.foody_id');
    }
    public function getBuyCountByDates($start, $end) {
        return DB::table('foodies')->join('order_foodies', 'foodies.id', 'foody_id')
            ->join('orders', 'order_foodies.order_id', 'orders.id')
            ->join('order_statuses', 'orders.id', 'order_statuses.order_id')
            ->where('foodies.id', $this->id)
            ->where('order_created_at', '>=', $start)
            ->where('order_created_at', '<=', $end)
            ->where(function ($query) {
                $query->where('status', 2)
                    ->orWhere('status', 3);})
            ->count('order_foodies.foody_id');
    }

    public function isSalesOff() {
        foreach ($this->salesOffDetail as $sale_detail) {
            if ($sale_detail->salesOff->salesOff->isActive()) {
                return true;
            }
        }
        return false;
    }

    public function getSalePercent() {
        foreach ($this->salesOffDetail as $sale_detail) {
            if ($sale_detail->salesOff->salesOff->isActive()) {
                return $sale_detail->salesOff->percent;
            }
        }

        return 0;
    }

    public function getSaleCost() {
        if ($this->isSalesOff()) {
            return $this->currentCost() - $this->currentCost() * $this->getSalePercent() / 100;
        }
        else {
            return $this->currentCost();
        }
    }

    public function materialFoodies() {
        return $this->hasMany(MaterialFoody::class);
    }
    public function isMaterial() {
        return $this->materialFoodies()->count() > 0;
    }
    public function checkQuantity($qty) {
        if ($this->isMaterial()) {
            foreach($this->materialFoodies as $material) {
                if ($qty * $material->value > Material::find($material->material_id)->value) {
                    return false;
                }
            }
        }
        return true;
    }
    public function minusQuantity($qty) {
        if ($this->isMaterial()) {
            foreach($this->materialFoodies as $material_foody) {
                $material = Material::find($material_foody->material_id);
                $material->value -= $material_foody->value * $qty;
                $material->update();
            }
        }
    }
    public function getQuantity() {
        $sorts = [];
        if ($this->isMaterial()) {
            foreach($this->materialFoodies as $material_foody) {
                $material = Material::find($material_foody->material_id);
                $sorts[] = (int)($material->value / $material_foody->value);
            }
            return min($sorts);
        }
        return -1;
    }

    public function restoreMaterial($qty) {
        if ($this->isMaterial()) {
            foreach($this->materialFoodies as $material_foody) {
                $material = Material::find($material_foody->material_id);
                $material->value += $material_foody->value * $qty;
                $material->update();
            }
        }
    }

//
//    public function getChangedQuantity($quantity) {
//        $changed_quantity = $this->getQuantity() + $quantity;
//        return ($changed_quantity > 0) ? $changed_quantity : 0;
//    }

    public function matchedName($product_name) {
        return Foody::where('slug', str_slug($product_name))->count() > 0;
    }

    public function canDelete() {
//        if (($this->orderProducts->count() > 0)
//            || ($this->shoppingCartProducts->count() > 0)) {
//            return false;
//        }
        return true;
    }
//
//    public function getName() {
//        return $this->getProductTypeName().' '.$this->name;
//    }

    public function createNewInformation(array $data)
    {
        $product = new self();

        $product->name = $data['name-pro'];
        $product->prodduct_created_at = date('Y-m-d H:i:s');
        $product->product_updated_at = date('Y-m-d H:i:s');
        $product->describe = $data['des'];
        $product->product_type_id = $data['product-type-id'];

        return $product;
    }
    public function updateInformation(array $data)
    {
        $product = new self();

        $product->name = $data['name-pro'];
        $product->product_updated_at = date('Y-m-d H:i:s');
        $product->describe = $data['des'];
        $product->product_type_id = $data['product-type-id'];

        return $product;
    }
}
