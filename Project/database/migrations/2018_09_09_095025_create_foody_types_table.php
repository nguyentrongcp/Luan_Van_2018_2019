<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFoodyTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('foody_types', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 100);
//            $table->string('icon', 20)->nullable();
            $table->string('slug', 20);
            $table->integer('foody_type_id')->unsigned()->nullable();
            $table->boolean('is_deleted')->default(false);
            $table->timestamps();

            $table->foreign('foody_type_id')->references('id')->on('foody_types')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('foody_types');
    }
}
