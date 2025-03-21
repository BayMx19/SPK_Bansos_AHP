<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WargaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('warga')->insert([
            'nama' => "Warga 1",
            'NIK' => "1234567890123123",
            'alamat' => "Kediri",
            'RT' => "002",
            'RW' => "013",
            'kecamatan' => "Mojoroto",
            'kelurahan' => "Campurejo",
            'usia' => "51",
            'status_pekerjaan' => "Pekerjaan Tetap",
            'pendapatan' => "3000000",
            'jumlah_tanggungan_anak' => "1",
            'kepemilikan_rumah' => "Sewa",

        ]);
    }
}