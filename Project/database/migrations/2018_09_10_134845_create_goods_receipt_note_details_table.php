<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGoodsReceiptNoteDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('goods_receipt_note_details', function (Blueprint $table) {
            $table->increments('id');
            $table->string('material', 100);
            $table->float('value');
            $table->integer('amount');
            $table->double('cost');
            $table->double('total_of_cost');
            $table->integer('goods_receipt_note_id')->unsigned();
            $table->timestamps();

            $table->foreign('goods_receipt_note_id')->references('id')->on('goods_receipt_notes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('goods_receipt_note_details');
    }
}
