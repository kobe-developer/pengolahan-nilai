<?php

namespace Database\Seeders;

use App\Models\Kelas;
use Illuminate\Database\Seeder;

class KelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach ([
            '7a-bis',
            '7b-bis',
            '7c-bis',
            '7d-bis',
            '7a-asi',
            '7b-asi',
            '7c-asi',
            '7d-asi'
        ] as $kelas) Kelas::create(['name' => strtoupper($kelas)]);
    }
}
