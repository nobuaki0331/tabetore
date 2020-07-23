<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;

$factory->define(App\Models\Post::class, function (Faker $faker) {
    return [
        'user_id' => $faker->randomDigit(),
        'content' => $faker->text,
        'title'   => $faker->text,
    ];
});
