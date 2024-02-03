<?php

namespace Database\Seeders;

use App\Models\Mahasiswa;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MahasiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create('id_ID');
        $prodi = DB::table('prodi')->pluck('id')->toArray();
        $kelas = DB::table('kelas')->pluck('id')->toArray();
        foreach (range(1, 1000) as $index) {
            $gender = $faker->randomElement(['P', 'L']);
            $nama = $faker->name($gender == 'P' ? 'female' : 'male');
            Mahasiswa::create([
                'nim' => $faker->unique()->numerify('1402######'),
                'nama' => $nama,
                'jenis_kelamin' => $gender,
                'alamat' => $faker->address,
                'email' => $faker->safeEmail(),
                'tahun_masuk' => date('Y'),
                'nomor_hp' => $faker->phoneNumber,
                'id_prodi' => $faker->randomElement($prodi),
                'id_kelas' => $faker->randomElement($kelas),
            ]);
        }
    }
}
