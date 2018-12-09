<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFkToGoodsReceiptDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('goods_receipt_note_details', function (Blueprint $table) {
            $table->foreign('unit_id')->references('id')->on('calculation_units')->onDelete('cascade');
            $table->foreign('material_id')->references('id')->on('calculation_units')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
