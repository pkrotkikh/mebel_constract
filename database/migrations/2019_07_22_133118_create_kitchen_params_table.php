<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKitchenParamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kitchen_params', function (Blueprint $table) {
            $table->increments('id');
            $table->text('depth_top', 250);
            $table->text('depth_bottom', 250);
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
        Schema::table('kitchen_params', function (Blueprint $table) {
            $table->dropForeign(['kitchen_model_id']);
        });
        Schema::dropIfExists('kitchen_params');
    }
}
