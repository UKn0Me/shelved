<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->freeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'group_id' => 2,
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Tags::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->sentence(2),
        'description' => $faker->text(120, 1),
        'user_id' => $faker->numberBetween(1, 40),
    ];
});

$factory->define(App\Bookmarks::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->sentence,
        'description' => $faker->text(240, 1),
        'url' => $faker->url,
        'user_id' => $faker->numberBetween(1, 40),
        'tag_id' => $faker->numberBetween(1, 200),
    ];
});