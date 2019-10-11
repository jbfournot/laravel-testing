<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Product;
use App\Models\Supplier;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'name' => $faker->sentence(3),
        'description' => $faker->sentence(20, true),
        'supplier_id' => App\Models\Supplier::all()->random()->id,
        'supplier_product_id' => $faker->isbn10,
        'qty' => $faker->numberBetween(0, 100),
        'last_refresh_at' => $faker->dateTimeBetween('-5 months', 'now')
    ];
});
