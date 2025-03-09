<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;
use App\Models\CriteriaModel;
use App\Models\PerhitunganModel;
use App\Models\SubCriteriaModel;
use App\Models\WargaModel;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class PerhitunganController extends Controller
{
    public function index()
    {
        $perhitungan = PerhitunganModel::with('warga')->get();
        return view('perhitungan.index', compact('perhitungan'));
    }
    public function create(){
        $warga = WargaModel::all();
        $perhitungan = PerhitunganModel::with('warga')->get();
        $idWargaPerhitungan = $perhitungan->pluck('warga.id')->toArray();

        $wargaBelumDihitung = $warga->filter(function($warga) use ($idWargaPerhitungan) {
            return !in_array($warga->id, $idWargaPerhitungan);
        });

        // dd($perhitungan);
        return view('/perhitungan.create', compact('wargaBelumDihitung', 'perhitungan'));
    }

    public function store(Request $request) {
        try{
            DB::table('perhitungan')->insert([
                'warga_id' => $request->wargaId,
                'k1' => $request->k1,
                'k2' => $request->k2,
                'k3' => $request->k3,
                'k4' => $request->k4,
                'k5' => $request->k5,
                'nilai_akhir' => $request->nilai_akhir,
            ]);

            return redirect('perhitungan')->with('success', 'Data Berhasil Ditambahkan.');
        }catch (QueryException $e){
            return redirect('/perhitungan')->with('error', 'Data Gagal Ditambahkan.');
        }
    }

    public function hitung_data(Request $request){

        $usia_criteria = CriteriaModel::where('id', 1)->pluck('nilai_prioritas')->first();
        $kerja_criteria = CriteriaModel::where('id', 2)->pluck('nilai_prioritas')->first();
        $pendapatan_criteria = CriteriaModel::where('id', 3)->pluck('nilai_prioritas')->first();
        $anak_criteria = CriteriaModel::where('id', 4)->pluck('nilai_prioritas')->first();
        $rumah_criteria = CriteriaModel::where('id', 5)->pluck('nilai_prioritas')->first();

        $usia = $request->input('usia');
        $nilai_usia_subcriteria = $this->getNilai('usia', $usia);

        $kerja = $request->input('status_pekerjaan');
        $nilai_kerja_subcriteria = $this->getNilai('kerja', $kerja);

        $pendapatan = $request->input('pendapatan');
        $nilai_pendapatan_subcriteria = $this->getNilai('pendapatan', $pendapatan);

        $anak = $request->input('jumlah_tanggungan_anak');
        $nilai_anak_subcriteria = $this->getNilai('anak', $anak);

        $rumah = $request->input('kepemilikan_rumah');
        $nilai_rumah_subcriteria = $this->getNilai('rumah', $rumah);

        $k1 = sprintf("%.9f", $usia_criteria*$nilai_usia_subcriteria);
        $k2 = sprintf("%.9f", $kerja_criteria*$nilai_kerja_subcriteria);
        $k3 = sprintf("%.9f", $pendapatan_criteria*$nilai_pendapatan_subcriteria);
        $k4 = sprintf("%.9f", $anak_criteria*$nilai_anak_subcriteria);
        $k5 = sprintf("%.9f", $rumah_criteria*$nilai_rumah_subcriteria);
        $nilai_akhir = min(1.00000, sprintf("%.9f", $k1 + $k2 + $k3 + $k4 + $k5));
        $warga_id = $request->input('warga_id');

        return response()->json([
            'success' => true,
            'k1' => $k1,
            'k2' => $k2,
            'k3' => $k3,
            'k4' => $k4,
            'k5' => $k5,
            'nilai_akhir' => $nilai_akhir,
            'warga_id' => $warga_id,
        ]);
    }

    private function getNilai($tipe, $nilai) {
        // Menentukan nilai berdasarkan criteria_id

        switch ($tipe) {
            case 'usia':
                $criteria_id = 1;
                if ($nilai < 30) {
                    $id = 3;
                } elseif ($nilai <= 50) {
                    $id = 2;
                } else {
                    $id = 1;
                }
                break;

            case 'kerja':
                $criteria_id = 2;
                if ($nilai == 'Tidak Bekerja') {
                    $id = 4;
                } elseif ($nilai == 'Pekerjaan Tidak Tetap') {
                    $id = 5;
                } else {
                    $id = 6;
                }
                break;

            case 'pendapatan':
                $criteria_id = 3;
                if ($nilai == 0) {
                    $id = 7;
                } elseif ($nilai <= 1000000) {
                    $id = 8;
                } else {
                    $id = 9;
                }
                break;

            case 'anak':
                $criteria_id = 4;
                if ($nilai == 0) {
                    $id = 12;
                } elseif ($nilai <= 3 && $nilai >= 1) {
                    $id = 11;
                } else {
                    $id = 10;
                }
                break;

            case 'rumah':
                $criteria_id = 5;
                if($nilai == 'Menumpang') {
                    $id = 13;
                } elseif ($nilai == 'Sewa') {
                    $id = 14;
                } else {
                    $id = 15;
                }
                break;

            default:
                // Jika jenis tipe tidak sesuai
                return null;
        }

        // Mengambil nilai_prioritas berdasarkan criteria_id dan id yang ditentukan
        $prioritas = SubCriteriaModel::where('criteria_id', $criteria_id)
                                     ->where('id', $id)
                                     ->pluck('nilai_prioritas')
                                     ->first();

        return $prioritas;
    }
    public function destroy($id)
    {
        $perhitungan = PerhitunganModel::findOrFail($id);
        $perhitungan->delete();

        return redirect('perhitungan')->with('success', 'Data perhitungan berhasil dihapus');
    }
    public function downloadPDF()
    {
        $perhitungan = PerhitunganModel::all();
        $pdf = Pdf::loadView('perhitungan.report', compact('perhitungan'));
        return $pdf->download('Perhitungan_AHP.pdf');
    }

}