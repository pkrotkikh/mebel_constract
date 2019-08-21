<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemParametersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item_parameters', function (Blueprint $table) {
            $table->increments('id');
            $table->string('height', 50);
            $table->string('width', 50);
            $table->integer('items_models_id')->unsigned();

            $table->foreign('items_models_id')->references('id')
                ->on('items_models')->onDelete('cascade');

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
        Schema::table('item_parameters', function (Blueprint $table) {
            $table->dropForeign(['items_models_id']);
        });
        Schema::dropIfExists('item_parameters');
    }
}
