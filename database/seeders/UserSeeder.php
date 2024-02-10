<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\UserRole;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create('id_ID');
        $dosen = DB::table('dosen')->pluck('nip')->toArray();
        $userList = [
            [
                'username' => $faker->userName,
                'nickname' => $faker->name('female'),
                'email' => $faker->email,
                'password' => Hash::make('1234'),
                'role' => UserRole::ADMINSTRATOR
            ],
            [
                'username' => $faker->userName,
                'nickname' => $faker->name('female'),
                'email' => $faker->email,
                'password' => Hash::make('1234'),
                'role' => UserRole::DOSEN,
                'access_value' => $faker->randomElement($dosen)
            ],
            [
                'username' => $faker->userName,
                'nickname' => $faker->name('male'),
                'email' => $faker->email,
                'password' => Hash::make('1234'),
                'role' => UserRole::DOSEN,
                'access_value' => $faker->randomElement($dosen)
            ]
        ];
        foreach ($userList as $user) User::create($user);
    }
}
