<?php

use Faker\Generator as Faker;

$factory->define(\App\Models\Reports\Report::class, function (Faker $faker) {

    return [
        'id_user'    => 2,
        'report'     => $faker->text('500'),
        'status'     => $faker->randomElement([
            'info',
            'disable'
        ]),
        'timeplus'=>$faker->date('Y-m-d'),
        'created_at' => $faker->date('Y-m-d'),
    ];
});
