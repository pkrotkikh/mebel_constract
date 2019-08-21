<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model;
use Faker\Generator as Faker;


$factory->define(App\Models\Addition::class, function (Faker $faker) {
    $strings = array(
        'tableTopColor',
        'baseColor',
        'eavesColor',
    );
    $key = array_rand($strings);

    $colors = array('Розовый', 'Серебро', 'Золото');
    $color = array_rand($colors);

    return [
        'title' => $colors[$color],
        'type' =>  $strings[$key],
        'kitchen_model_id' => rand(1, 10),
    ];
});
