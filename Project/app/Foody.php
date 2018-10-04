<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
/**
 * @property mixed costs
 * @property mixed name
 * @property mixed product_type_id
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

    public function getLiked() {
        return $this->likes()->count();
    }

    public function favorites() {
        return $this->hasMany(Favorite::class);
    }

    public function getFavorited() {
        return $this->favorites()->count();
    }

//    public function salesOffProducts() {
//        return $this->hasMany(SalesOffProduct::class);
//    }
//
//    public function quantities() {
//        return $this->hasMany(Quantity::class);
//    }
//
//    public function productTypeTrademark() {
//        return $this->belongsTo(ProductTypeTrademark::class);
//    }
//
//    public function goodsReceiptNote() {
//        return $this->hasMany(GoodsReceiptNote::class);
//    }

    public function orderFoodies() {
        return $this->hasMany(OrderFoody::class);
    }

    public function shoppingCartFoodies() {
        return $this->hasMany(ShoppingCart::class);
    }

//    public function status() {
//        if ($this->is_deleted) {
//            return 'Ngừng kinh doanh';
//        }
//        return ($this->is_activated) ? 'Đang bán' : 'Tạm hết hàng';
//    }
//
    public function currentCost() {
        return $this->costs->max()->cost;
    }
//
//    public function getQuantity() {
//        return $this->quantities->first()->quantity;
//    }
//
//    public function isSalesOff() {
//        return $this->salesOffProducts()->count() > 0;
//    }
//
//    public function getSalesOffPercent() {
//        return ($this->isSalesOff()) ? $this->salesOffProducts()->first()->salesOff->value : 0;
//    }
//
//    public function getSalesOffPrice() {
//        return $this->currentPrice() - ($this->currentPrice() * $this->getSalesOffPercent() / 100);
//    }
//
//    public function getChangedQuantity($quantity) {
//        $changed_quantity = $this->getQuantity() + $quantity;
//        return ($changed_quantity > 0) ? $changed_quantity : 0;
//    }

    public function matchedName($product_name) {
        return FoodyType::where('slug', str_slug($product_name))->count() > 0;
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
