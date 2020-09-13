<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\category;
use Faker\Generator as Faker;

$factory->define(category::class, function (Faker $faker) {
    $catId = category::pluck('id')->toArray();
    $randCat = array_rand($catId);

    return [

        'slug'=>       $faker->slug(),
        'is_active'=>  $faker->boolean(),
        'name'=>       $faker->word(),
        'parent_id'=>$catId[$randCat],

    ];
});
