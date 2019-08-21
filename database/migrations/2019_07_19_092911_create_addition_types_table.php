<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdditionTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addition_types', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('comment')->nullable();

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
        Schema::dropIfExists('addition_types');
    }
}
