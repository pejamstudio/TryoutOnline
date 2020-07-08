<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
    return [
        'nama' =>  $faker->firstName($gender = null|'male'|'female'),
        'alamat' => $faker->citySuffix,
        'email' => $faker->email ,
        'tempat_lahir' => $faker->city ,
        'tanggal_lahir' => $faker->date($format = 'Y-m-d', $max = 'now') ,
        'telp' => $faker->phoneNumber ,
        'username' => $faker->firstName($gender = null|'male'|'female') ,
        'password' => $faker->randomDigit ,
        'level_user' => 'A' ,
    ];
});
