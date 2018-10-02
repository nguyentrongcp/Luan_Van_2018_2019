<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('costs', function (Blueprint $table) {
            $table->increments('id');
            $table->double('cost');
            $table->dateTime('cost_updated_at');
            $table->integer('foody_id')->unsigned();
            $table->timestamps();

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
        Schema::dropIfExists('costs');
    }
}
