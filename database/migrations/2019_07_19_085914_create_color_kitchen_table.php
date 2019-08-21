<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateColorKitchenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('color_kitchen', function (Blueprint $table) {
            $table->increments('id');
            $table->string('image')->nullable();
            $table->string('title', 250);
            $table->enum('type', ['kitchen_facade', 'body_color']);
            $table->integer('kitchen_model_id')->unsigned();

            $table->foreign('kitchen_model_id')->references('id')
                ->on('kitchen_model')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('color_kitchen', function (Blueprint $table) {
            $table->dropForeign(['kitchen_model_id']);
        });
        Schema::dropIfExists('color_kitchen');
    }
}
