<?php

use Faker\Generator as Faker;

$factory->define(\App\Models\Status::class, function (Faker $faker) {
    $date_time = $faker->dateTime();

    return [
        'content' => $faker->text(),
        'user_id' => rand(1, 5),
        'created_at' => $date_time,
        'updated_at' => $date_time,
    ];
});
