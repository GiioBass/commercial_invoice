<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Client;
use App\DocumentType;
use App\Invoice;
use App\Invoice_product;
use App\Product;
use App\Seller;
use Faker\Generator as Faker;

/** @var TYPE_NAME $factory */
$factory->define(Client::class, function (Faker $faker) {
    return [
        'id' => $faker->unique()->numberBetween($min = 100, $max = 99999999),
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'phone_number' => $faker->numberBetween($min = 100, $max = 999),
        'email' => $faker->safeEmail,
        'address' => $faker->address,
        'document_type_id' => DocumentType::all()->random()->id
        // 'updated_at'=>'NULL',
        // 'created_at'=>'NULL',
    ];
});

/** @var TYPE_NAME $factory */
$factory->define(Seller::class, function (Faker $faker) {
    return [
        'id' => $faker->unique()->numberBetween($min = 100, $max = 99999999),
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'email' => $faker->safeEmail,
        'phone_number' => $faker->numberBetween($min = 100, $max = 999),
    ];
});

/** @var TYPE_NAME $factory */
$factory->define(Product::class, function (Faker $faker) {
    return [
        'id' => $faker->unique()->numberBetween($min = 1000000, $max = 9999999),
        'name' => $faker->word,
        'description' => $faker->sentence($nbWord = 4, $variableNbWord = true),
        'unit_value' => $faker->numberBetween($min = 1000000, $max = 9999999),
    ];
});

/** @var TYPE_NAME $factory */
$factory->define(Invoice::class, function (Faker $faker) {
    return [
        'state' => $faker->randomElement($array = array('Por Pagar', 'Pagado')),
        'total' => 0,
        'iva' => 0,
        'subtotal' => 0,
        'expedition_date' => $faker->date($format = 'y-m-d', $max = 'now'),
        'expiration_date' => $faker->date($format = 'y-m-d', $max = 'now'),
        'seller_id' => Seller::all()->random()->id,
        'client_id' => Client::all()->random()->id,
    ];
});

/** @var TYPE_NAME $factory */
$factory->define(Invoice_product::class, function (Faker $faker) {
    return [
        'quantity' => $faker->numberBetween($min = 1, $max = 50),
        'invoice_id' => Invoice::all()->random()->id,
        'product_id' => Product::all()->random()->id,
    ];
});
