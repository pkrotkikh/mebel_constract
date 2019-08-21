<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKitchenModuleTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kitchen_module_types', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('image')->nullable();
            $table->boolean('favicon')->default(0);

            $table->integer('module_category_id')->unsigned();
            $table->foreign('module_category_id')->references('id')
                ->on('kitchen_module_categories')->onDelete('cascade');

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
        Schema::dropIfExists('kitchen_module_types');
    }
}
