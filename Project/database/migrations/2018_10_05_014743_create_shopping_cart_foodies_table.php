<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShoppingCartFoodiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shopping_cart_foodies', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('shopping_cart_id')->unsigned();
            $table->integer('foody_id')->unsigned();
            $table->integer('count');
            $table->timestamps();

            $table->foreign('shopping_cart_id')->references('id')->on('shopping_carts')->onDelete('cascade');
            $table->foreign('foody_id')->references('id')->on('foodies')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shopping_cart_foodies');
    }
}
