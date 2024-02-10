<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserRoleSeed::class,
            ProdiSeeder::class,
            KelasSeeder::class,
            DosenSeeder::class,
            UserSeeder::class,
            MahasiswaSeeder::class,
            MataKuliahSeeder::class,
        ]);
    }
}
