<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFoodyStatusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('foody_statuses', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('foody_id')->unsigned();
            $table->tinyInteger('status')->default(1); // 0 - tam het, 1 - dang ban
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
        Schema::dropIfExists('foody_statuses');
    }
}
