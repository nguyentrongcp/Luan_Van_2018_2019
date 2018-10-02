<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('votes', function (Blueprint $table) {
            $table->increments('id');
            $table->float('cost')->default(0);
            $table->float('quality')->default(0);
            $table->float('attitude')->default(0);
            $table->float('average')->default(0);
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
        Schema::dropIfExists('votes');
    }
}
