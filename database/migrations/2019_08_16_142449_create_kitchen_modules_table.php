<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKitchenModulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kitchen_modules', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('module_type_id')->unsigned();
            $table->foreign('module_type_id')->references('id')
                ->on('kitchen_module_types')->onDelete('cascade');

            $table->integer('kitchen_id')->unsigned();
            $table->foreign('kitchen_id')->references('id')
                ->on('kitchen_model')->onDelete('cascade');

            $table->string('title');
            $table->string('comment')->nullable();
            $table->decimal('price');
            $table->string('image')->nullable();

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
        Schema::dropIfExists('kitchen_modules');
    }
}
