<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Cart;
use App\Models\Product;
use Faker\Generator as Faker;

$factory->define(Cart::class, function (Faker $faker) {
    return [
        'session_id' => $faker->uuid,
        'product_id' => App\Models\Product::all()->random()->id
    ];
});
