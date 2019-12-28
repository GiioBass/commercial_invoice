<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Client;
use App\Seller;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Client::class, function (Faker $faker) {
    return [
            'id'=>$faker->unique()->randomDigit(1000, 1000000),
            'first_name'=> $faker->firstName,
            'last_name'=> $faker->lastName,
            'phone_number'=> $faker->randomDigit,
            'address'=> $faker->address,
            // 'updated_at'=>'NULL',
            // 'created_at'=>'NULL',
    ];
});

$factory->define(Seller::class, function(Faker $faker){
    return [

    ];
});