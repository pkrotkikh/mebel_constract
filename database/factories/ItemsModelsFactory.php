<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model;
use Faker\Generator as Faker;
$factory->define(App\Models\Item::class, function (Faker $faker) {

    return [
        'title' =>  $faker->title,
        'description' =>  $faker->paragraph,
        'parameters_models_id' => rand(1, 40),
        'price' => rand(100, 5000),
    ];
});
