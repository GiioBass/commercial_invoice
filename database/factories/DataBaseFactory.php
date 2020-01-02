<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Client;
use App\Invoice;
use App\Product;
use App\Seller;
use Faker\Generator as Faker;

$factory->define(Client::class, function (Faker $faker) {
    return [
            'id'=> $faker->unique()->numberBetween($min = 100, $max = 99999999),
            'first_name'=> $faker->firstName,
            'last_name'=> $faker->lastName,
            'phone_number'=> $faker->numberBetween($min = 100, $max = 999),
            'address'=> $faker->address,
            // 'updated_at'=>'NULL',
            // 'created_at'=>'NULL',
    ];
});

$factory->define(Seller::class, function(Faker $faker){
    return [
            'id'=>$faker->unique()->numberBetween($min = 100, $max = 99999999),
            'first_name'=> $faker->firstName,
            'last_name'=> $faker->lastName,
            'email'=> $faker->safeEmail,
            'phone_number'=> $faker->numberBetween($min = 100, $max = 999),
    ];
});

$factory->define(Product::class, function (Faker $faker){
    return[
        'id'=> $faker->unique()->numberBetween($min = 1000000, $max = 9999999),
        'name'=> $faker->word,
        'description'=> $faker->sentence($nbWord = 4, $variableNbWord = true),
        'unit_value'=> $faker->numberBetween($min = 1000000, $max = 9999999)
    ];
});

// $factory->define(Invoice::class, function ( Faker $faker){
//     return[
//         'state'=> 'Por Pagar',
//         'total'=> 0,
//         'iva'=> 0,
//         'subtotal'=> 0,
//         'expedition_date'=> $faker->date($format = 'y-m-d', $max = 'now'),
//         'expiration_date'=> $faker->date($format = 'y-m-d', $max = 'now'),
//     ];
// });