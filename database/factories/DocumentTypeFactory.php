<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\DocumentType;
use Faker\Generator as Faker;

$factory->define(DocumentType::class, function (Faker $faker) {
    return
        [
        'id' => 1,
        'documentType' => 'CC',
        'documentName' => 'Cedula de Ciudadania'
        ];
});
