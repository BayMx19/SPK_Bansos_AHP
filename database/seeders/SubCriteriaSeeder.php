<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubCriteriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('subcriteria')->insert([
            // Usia (K1)
            ['criteria_id' => 1, 'sub_criteria' => '>50 tahun', 'bobot' => 'Sangat Baik (A)', 'nilai_prioritas' => 1],
            ['criteria_id' => 1, 'sub_criteria' => '30-50 tahun', 'bobot' => 'Baik (B)', 'nilai_prioritas' => 0.332424279],
            ['criteria_id' => 1, 'sub_criteria' => '<30 tahun', 'bobot' => 'Cukup (C)', 'nilai_prioritas' => 0.102171833],

            // Pekerjaan (K2)
            ['criteria_id' => 2, 'sub_criteria' => 'Tidak Bekerja', 'bobot' => 'Sangat Baik (A)', 'nilai_prioritas' => 1],
            ['criteria_id' => 2, 'sub_criteria' => 'Pekerjaan tidak tetap', 'bobot' => 'Baik (B)', 'nilai_prioritas' => 0.362364924],
            ['criteria_id' => 2, 'sub_criteria' => 'Pekerjaan tetap', 'bobot' => 'Cukup (C)', 'nilai_prioritas' => 0.130561204],

            // Pendapatan (K3)
            ['criteria_id' => 3, 'sub_criteria' => 'Tidak memiliki pendapatan', 'bobot' => 'Sangat Baik (A)', 'nilai_prioritas' => 1],
            ['criteria_id' => 3, 'sub_criteria' => '<Rp. 1.000.000', 'bobot' => 'Baik (B)', 'nilai_prioritas' => 0.311861104],
            ['criteria_id' => 3, 'sub_criteria' => '>Rp. 1.000.000', 'bobot' => 'Cukup (C)', 'nilai_prioritas' => 0.087068012],

            // Jumlah Tanggungan Anak (K4)
            ['criteria_id' => 4, 'sub_criteria' => '>3 Anak', 'bobot' => 'Sangat Baik (A)', 'nilai_prioritas' => 1],
            ['criteria_id' => 4, 'sub_criteria' => '1-3 Anak', 'bobot' => 'Baik (B)', 'nilai_prioritas' => 0.410079228],
            ['criteria_id' => 4, 'sub_criteria' => 'Tidak Memiliki tanggungan', 'bobot' => 'Cukup (C)', 'nilai_prioritas' => 0.167215302],

            // Kepemilikan Rumah (K5)
            ['criteria_id' => 5, 'sub_criteria' => 'Menumpang', 'bobot' => 'Sangat Baik (A)', 'nilai_prioritas' => 1],
            ['criteria_id' => 5, 'sub_criteria' => 'Kontrak / Sewa', 'bobot' => 'Baik (B)', 'nilai_prioritas' => 0.44628679],
            ['criteria_id' => 5, 'sub_criteria' => 'Milik Sendiri', 'bobot' => 'Cukup (C)', 'nilai_prioritas' => 0.196871755],
        ]);
    }
}