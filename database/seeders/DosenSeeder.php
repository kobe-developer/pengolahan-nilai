<?php

namespace Database\Seeders;

use App\Models\Dosen;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DosenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create('id_ID');
        $prodi = DB::table('prodi')->pluck('id')->toArray();
        foreach (range(1, 25) as $index) {
            $gender = $faker->randomElement(['P', 'L']);
            $nama = $faker->name($gender == 'P' ? 'female' : 'male');
            $nip = (string)$faker->numberBetween(1000000000, 9999999999);
            Dosen::create([
                'nip' => $nip,
                'nama' => $nama,
                'jenis_kelamin' => $gender,
                'alamat' => $faker->address,
                'email' => $faker->safeEmail(),
                'id_prodi' => $faker->randomElement($prodi),
                'img_src' => $faker->imageUrl,
            ]);
        }
    }
}
