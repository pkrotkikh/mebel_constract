<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateParametersModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parameters_models', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title', 500);
            $table->enum('type', ['corner', 'twoBlocks', 'standard']);

            $table->integer('kitchen_model_id')->unsigned();
            $table->integer('type_modules_id')->unsigned();


            $table->foreign('kitchen_model_id')->references('id')
                ->on('kitchen_model')->onDelete('cascade');
            $table->foreign('type_modules_id')->references('id')
                ->on('type_modules');

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
        Schema::table('parameters_models', function (Blueprint $table) {
            $table->dropForeign(['kitchen_model_id']);
            $table->dropForeign(['type_modules_id']);
        });

        Schema::dropIfExists('parameters_models');
    }
}
