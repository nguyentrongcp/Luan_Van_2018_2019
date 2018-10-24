<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
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

    public function favorites() {
        return $this->hasMany(Favorite::class);
    }

    public function getFavorited() {
        return $this->favorites()->count();
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
//
    public function backendComments() {
        return $this->hasMany(Comment::class)
            ->where('parent_id', null)
            ->orderBy('created_at', 'desc');
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

    public function isSalesOff() {
        return $this->salesOffDetail()->count() > 0;
    }

    public function getSalePercent() {
        return ($this->isSalesOff()) ? $this->salesOffDetail()->first()->salesOff->percent : 0;
    }

    public function getSaleCost() {
        return $this->costs->max()->cost;
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
