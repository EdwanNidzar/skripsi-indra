<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = User::create([
            'name' => 'Yosindra',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('password'),
        ]);
        $admin->assignRole('admin');

        $karyawan = User::create([
            'name' => 'Enny',
            'email' => 'karyawan@gmail.com',
            'password' => bcrypt('password'),
        ]);
        $karyawan->assignRole('karyawan');

        $dosen = User::create([
            'name' => 'Yosi',
            'email' => 'dosen@gmail.com',
            'password' => bcrypt('password'),
        ]);
        $dosen->assignRole('dosen');

        $mahasiswa = User::create([
            'name' => 'Indra',
            'email' => 'mahasiswa@gmail.com',
            'password' => bcrypt('password'),
        ]);
        $mahasiswa->assignRole('mahasiswa');
    }
}
