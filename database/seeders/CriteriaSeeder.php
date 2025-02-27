<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CriteriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('criteria')->insert([
            ['kode_criteria' => 'K1', 'nama' => 'Usia', 'nilai_prioritas' => 0.414],
            ['kode_criteria' => 'K2', 'nama' => 'Pekerjaan', 'nilai_prioritas' => 0.159],
            ['kode_criteria' => 'K3', 'nama' => 'Pendapatan', 'nilai_prioritas' => 0.058],
            ['kode_criteria' => 'K4', 'nama' => 'Jumlah Tanggungan Anak', 'nilai_prioritas' => 0.260],
            ['kode_criteria' => 'K5', 'nama' => 'Kondisi Kepemilikan Rumah', 'nilai_prioritas' => 0.110],
        ]);
    }
}