<?php

namespace Database\Seeders;

use App\Models\MataKuliah;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MataKuliahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create('id_ID');
        $dosen = DB::table('dosen')->pluck('nip')->toArray();
        foreach (range(1, 50) as $index) {
            MataKuliah::create([
                'nama_mk' => trim($faker->text(20), '.'),
                'sks' => random_int(2, 4),
                'stmt' => random_int(1, 8),
                'dosen_nip' => $faker->randomElement($dosen),
            ]);
        }
    }
}
