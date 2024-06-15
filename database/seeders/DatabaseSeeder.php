<?php

namespace Database\Seeders;

use App\Models\Jabatan;
use App\Models\Pegawai;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Jabatan::insert([
            ['nama' => 'Owner'],
            ['nama' => 'Manajer'],
            ['nama' => 'Asisten'],
            ['nama' => 'Karyawan'],
        ]);

        $faker = Faker::create();
        for ($i = 0; $i < 15; $i++) {
            Pegawai::insert([
                'nama' => $faker->name(),
                'alamat' => $faker->address(),
                'no_telp' => $faker->phoneNumber(),
                'email' => $faker->email(),
                'tanggal_masuk' => $faker->date(),
                'tanggal_keluar' => rand(0, 1) == 1 ? $faker->date() : null,
                'jabatan_id' => rand(2, 4),
            ]);
        }
    }
}
