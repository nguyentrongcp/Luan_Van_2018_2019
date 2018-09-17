<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    private $price = -1;
    private $salePercent = -1;

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
