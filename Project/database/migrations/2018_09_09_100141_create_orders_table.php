<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('order_code', 15);
            $table->string('receiver', 50);
            $table->string('to', 100);
            $table->string('location', 100)->nullable();
            $table->integer('customer_id')->unsigned()->nullable();
            $table->string('email', 100);
            $table->string('phone', 20);
            $table->string('address', 100);
            $table->dateTime('order_created_at');
            $table->tinyInteger('payment_type');
            $table->double('total_of_cost');
//            $table->tinyInteger('payment_status');
            $table->double('transport_fee');
            $table->boolean('is_deleted')->default(false);
            $table->timestamps();

            $table->foreign('customer_id')->references('id')->on('customers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
