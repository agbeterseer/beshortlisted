<?php

use Faker\Generator as Faker;

$factory->define(App\Logo::class, function (Faker $faker) {
        return [
        'logo' => $faker->name,
        'status' => 1,
    ];
});

 