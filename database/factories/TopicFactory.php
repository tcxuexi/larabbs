<?php

use Faker\Generator as Faker;

$factory->define(
    App\Models\Topic::class,
    function (Faker $faker) {
        $sentence = $faker->sentence();

        // 随机取一个月内的时间
        $updated_at = $faker->dateTimeThisMonth();

        //创建时间永远要比更新时间要早
        $created_at = $faker->dateTimeThisMonth($updated_at);

        return [
            'title'      => $sentence,
            'body'       => $faker->text(),
            'excerpt'    => $sentence,
            'created_at' => $created_at,
            'updated_at' => $updated_at,
        ];
    }
);
