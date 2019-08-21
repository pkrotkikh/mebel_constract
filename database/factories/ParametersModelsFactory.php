<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\Models\Parameter::class, function (Faker $faker) {
    $strings = array(
        'corner',
        'standard',
        'twoBlocks',
    );
    $key = array_rand($strings);

    $titles = array('Угловой навесной шкаф', 'Тумба', 'Высокий шкаф', 'Угловая тумба');
    $title = array_rand($titles);

    return [
        'title' => $titles[$title],
        'type' =>  $strings[$key],
        'kitchen_model_id' => rand(1, 10),
        'type_modules_id' => rand(1, 2),
    ];
});
