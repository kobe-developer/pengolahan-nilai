<?php

namespace Database\Seeders;

use App\Models\Prodi;
use Illuminate\Database\Seeder;

class ProdiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['jurusan' => 'sistem informasi', 'fakultas' => 'ilmu komputer'],
            ['jurusan' => 'ilmu komputer', 'fakultas' => 'ilmu komputer'],
            ['jurusan' => 'manajemen', 'fakultas' => 'ekonomi dan bisnis'],
            ['jurusan' => 'akuntansi', 'fakultas' => 'ekonomi dan bisnis'],
            ['jurusan' => 'ilmu ekonomi', 'fakultas' => 'ekonomi dan bisnis'],
            ['jurusan' => 'pendidikan matematika', 'fakultas' => 'keguruan dan ilmu pendidikan'],
            ['jurusan' => 'pendidikan teknologi informasi', 'fakultas' => 'keguruan dan ilmu pendidikan'],
            ['jurusan' => 'pendidikan guru sekolah dasar', 'fakultas' => 'keguruan dan ilmu pendidikan'],
            ['jurusan' => 'pendidikan guru PAUD', 'fakultas' => 'keguruan dan ilmu pendidikan'],
            ['jurusan' => 'pendidikan bahasa dan sastra indonesia', 'fakultas' => 'keguruan dan ilmu pendidikan'],
            ['jurusan' => 'pendidikan bahasa inggris', 'fakultas' => 'keguruan dan ilmu pendidikan'],
            ['jurusan' => 'pendidikan biolgi', 'fakultas' => 'keguruan dan ilmu pendidikan'],
        ];
        foreach ($data as $value) {
            Prodi::create([
                'jurusan' => ucwords($value['jurusan']),
                'fakultas' => ucwords($value['fakultas']),
            ]);
        };
    }
}
