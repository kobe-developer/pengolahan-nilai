<?php

namespace Database\Seeders;

use App\Models\UserRole;
use Illuminate\Database\Seeder;

class UserRoleSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        UserRole::create(['role_name' => 'Administrator']);
        UserRole::create(['role_name' => 'Dosen']);
        UserRole::create(['role_name' => 'Mahasiswa']);
    }
}
