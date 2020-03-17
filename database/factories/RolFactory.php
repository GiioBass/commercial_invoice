<?php

/** @var Factory $factory */


use Caffeinated\Shinobi\Models\Role;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(Role::class, function () {
    return [
        'name' => 'Admin',
        'slug' => 'admin',
        'special' => 'all-access'
    ];
});
