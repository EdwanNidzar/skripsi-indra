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
            'name' => 'Ade Indra',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('password'),
        ]);
        $admin->assignRole('admin');

        $karyawan = User::create([
            'name' => 'Aldi AL',
            'email' => 'karyawan@gmail.com',
            'password' => bcrypt('password'),
        ]);
        $karyawan->assignRole('karyawan');

        $dosen = User::create([
            'name' => 'Aqsal Arya',
            'email' => 'dosen@gmail.com',
            'password' => bcrypt('password'),
        ]);
        $dosen->assignRole('dosen');

        $mahasiswa = User::create([
            'name' => 'Indra OH Indra',
            'email' => 'mahasiswa@gmail.com',
            'password' => bcrypt('password'),
        ]);
        $mahasiswa->assignRole('mahasiswa');
        
    }
}
