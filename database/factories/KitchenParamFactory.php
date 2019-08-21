<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\Models\KitchenParam::class, function (Faker $faker) {
    return [
        'depth_bottom' => rand(50, 60),
        'depth_top' => rand(50,60),
        'kitchen_model_id' => rand(1,10)
    ];
});
