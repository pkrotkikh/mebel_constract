<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemsModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items_models', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title', 500);
            $table->text('description');
            $table->string('price', 100);

            $table->integer('parameters_models_id')->unsigned();
            $table->foreign('parameters_models_id')->references('id')
                ->on('parameters_models')->onDelete('cascade');

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
        Schema::table('items_models', function (Blueprint $table) {
            $table->dropForeign(['parameters_models_id']);
        });
        Schema::dropIfExists('items_models');
    }
}
