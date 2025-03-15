<?php

namespace App\Http\Controllers;

use App\Models\PerhitunganModel;
use App\Models\SettingModel;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class RekomendasiController extends Controller
{
        public function index()
    {
        $user = auth()->user();
        $limit = SettingModel::where('key', 'rekomendasi_limit')->value('value') ?? 10;

        if ($user->role == 'Staff Kelurahan') {
            $rekomendasi = PerhitunganModel::with('warga')->orderBy('nilai_akhir', 'desc')->limit($limit)->get();
        } else {
            if (!empty($user->RT)) {
                $rt = $user->RT;

                $rekomendasi = PerhitunganModel::whereHas('warga', function ($query) use ($rt) {
                    $query->where('RT', $rt);
                })->with('warga')->orderBy('nilai_akhir', 'desc')->limit($limit)->get();
            } else {
                $rekomendasi = collect();
            }
        }
        return view('hasil-rekomendasi.index', compact('rekomendasi', 'limit'));
    }
        public function updateLimit(Request $request)
    {
        $request->validate([
            'limit' => 'required|integer|min:1'
        ]);

        SettingModel::updateOrCreate(
            ['key' => 'rekomendasi_limit'],
            ['value' => $request->limit]
        );

        return redirect()->back()->with('success', 'Jumlah data yang ditampilkan berhasil diperbarui.');
    }

    public function landing()
    {
        $limit = SettingModel::where('key', 'rekomendasi_limit')->value('value');
        // dd($limit);
        $rekomendasi = PerhitunganModel::with('warga')
            ->orderBy('nilai_akhir', 'desc')
            ->limit($limit)
            ->get();
            return view('welcome', compact('rekomendasi', 'limit'));


    }
        public function downloadPDF()
        {
            $user = auth()->user();

            if ($user->role == 'Staff Kelurahan') {
                $rekomendasi = PerhitunganModel::all();
            } else {
                // User biasa hanya bisa melihat data sesuai RT mereka sendiri
                if ($user->RT) {
                    $rekomendasi = PerhitunganModel::whereHas('warga', function ($query) use ($user) {
                        $query->where('RT', $user->RT);
                    })->get();
                } else {
                    $rekomendasi = collect();
                }
            }

            $pdf = Pdf::loadView('hasil-rekomendasi.report', compact('rekomendasi'));
            return $pdf->download('Rekomendasi_Warga_Penerima_Bansos.pdf');
        }


}
