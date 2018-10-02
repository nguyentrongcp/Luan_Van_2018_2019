<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->increments('id');
            $table->string('content', 255);
            $table->dateTime('date');
            $table->string('name');
            $table->integer('customer_id')->unsigned()->nullable();
            $table->integer('admin_id')->unsigned()->nullable();
            $table->integer('foody_id')->unsigned();
            $table->timestamps();

            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');
            $table->foreign('foody_id')->references('id')->on('foodies')->onDelete('cascade');
            $table->foreign('admin_id')->references('id')->on('admins')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comments');
    }
}
