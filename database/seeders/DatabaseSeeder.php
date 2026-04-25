<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Jurusan;
use App\Models\Mahasiswa;
use App\Models\Matakuliah;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create Users
        User::create([
            'name' => 'Admin',
            'email' => 'admin@test.com',
            'password' => bcrypt('password'),
        ]);

        User::create([
            'name' => 'Test User',
            'email' => 'user@test.com',
            'password' => bcrypt('password'),
        ]);

        // Create Jurusans
        $jurusan1 = Jurusan::create([
            'nama_jurusan' => 'Teknik Informatika',
            'akreditasi' => 'A',
        ]);

        $jurusan2 = Jurusan::create([
            'nama_jurusan' => 'Teknik Elektro',
            'akreditasi' => 'A',
        ]);

        $jurusan3 = Jurusan::create([
            'nama_jurusan' => 'Manajemen Bisnis',
            'akreditasi' => 'B',
        ]);

        // Create Mahasiswas
        Mahasiswa::create([
            'nim' => '2301001',
            'nama' => 'Budi Santoso',
            'id_jurusan' => $jurusan1->id_jurusan,
        ]);

        Mahasiswa::create([
            'nim' => '2301002',
            'nama' => 'Siti Nurhaliza',
            'id_jurusan' => $jurusan1->id_jurusan,
        ]);

        Mahasiswa::create([
            'nim' => '2301003',
            'nama' => 'Ahmad Gunawan',
            'id_jurusan' => $jurusan1->id_jurusan,
        ]);

        Mahasiswa::create([
            'nim' => '2302001',
            'nama' => 'Rina Wijaya',
            'id_jurusan' => $jurusan2->id_jurusan,
        ]);

        Mahasiswa::create([
            'nim' => '2303001',
            'nama' => 'Dedi Hermawan',
            'id_jurusan' => $jurusan3->id_jurusan,
        ]);

        // Create Matakuliahs
        Matakuliah::create([
            'nama_matakuliah' => 'Pemrograman Web 2',
            'sks' => 3,
            'id_jurusan' => $jurusan1->id_jurusan,
        ]);

        Matakuliah::create([
            'nama_matakuliah' => 'Basis Data',
            'sks' => 3,
            'id_jurusan' => $jurusan1->id_jurusan,
        ]);

        Matakuliah::create([
            'nama_matakuliah' => 'Pemrograman Mobile',
            'sks' => 3,
            'id_jurusan' => $jurusan1->id_jurusan,
        ]);

        Matakuliah::create([
            'nama_matakuliah' => 'Sistem Digital',
            'sks' => 3,
            'id_jurusan' => $jurusan2->id_jurusan,
        ]);

        Matakuliah::create([
            'nama_matakuliah' => 'Manajemen Proyek',
            'sks' => 2,
            'id_jurusan' => $jurusan3->id_jurusan,
        ]);
    }
}
