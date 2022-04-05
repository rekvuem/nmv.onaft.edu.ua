<?php

use Faker\Generator as Faker;

$factory->define(\App\Models\Reports\Comment::class, function (Faker $faker) {
    return [
        'id_user'    => 2,
        'id_report'  => $faker->numberBetween(1,20),
        'comment'    => $faker->text('300'),
        'created_at' => $faker->date('Y-m-d'),
    ];
});
