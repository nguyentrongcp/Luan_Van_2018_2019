<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFoodiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('foodies', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 100);
            $table->dateTime('foody_created_at');
            $table->dateTime('foody_updated_at');
            $table->string('avatar', 100);
            $table->string('describe', 255)->nullable();
            $table->integer('foody_type_id')->unsigned();
            $table->string('slug', 100);
            $table->boolean('is_extra')->default(false);
            $table->boolean('is_deleted')->default(false);
            $table->timestamps();

            $table->foreign('foody_type_id')->references('id')->on('foody_types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('foodies');
    }
}
