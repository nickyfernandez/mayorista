<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use App\Category;
use Faker\Generator as Faker;

// $categorias = \Category::all();

$factory->define(Product::class, function (Faker $faker) {
    return [
        //
        "product_name" => $faker->sentence(3),
        "id_category" => $faker->numberBetween(0,2),
        "stock" => $faker->numberBetween(0,500),
        "price" => $faker->numberBetween(0,1000),
        "id_local" => $faker->numberBetween(0,2),

    ];
});
