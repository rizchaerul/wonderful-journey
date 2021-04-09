<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Article;
use Faker\Generator as Faker;

$factory->define(Article::class, function (Faker $faker) {
    $userCount = count(App\User::all());
    $categoryCount = count(App\Category::all());

    return [
        'user_id' => random_int(1, $userCount),
        'category_id' => random_int(1, $categoryCount),
        'title' => $faker->sentence(),
        'description' => '<p>'.$faker->paragraph(10).'</p>'.'<p>'.$faker->paragraph(25).'</p>'.'<p>'.$faker->paragraph(25).'</p>',
        'image' => '/img/article/'.random_int(1, 5).'.jpg',
    ];
});
