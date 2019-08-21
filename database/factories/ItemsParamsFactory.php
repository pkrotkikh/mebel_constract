<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\Models\ParamItem::class, function (Faker $faker) {

    return [
        'height' =>  rand(40, 60),
        'width' =>  rand(40, 60),
        'items_models_id' => rand(1, 40),
    ];
});
