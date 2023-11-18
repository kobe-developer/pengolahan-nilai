<?php

namespace Database\Seeders;

use App\Models\MataKuliah;
use Illuminate\Database\Seeder;

class MataKuliahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create('id_ID');
        for ($i = 0; $i < 50; $i++)
            MataKuliah::create([
                'nama_mk' => trim($faker->text(20), '.'),
                'sks' => random_int(2, 4),
            ]);
    }
}
