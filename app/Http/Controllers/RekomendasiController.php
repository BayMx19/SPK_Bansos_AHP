<?php

namespace App\Http\Controllers;

use App\Models\PerhitunganModel;
use Illuminate\Http\Request;

class RekomendasiController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        if ($user->role == 'Staff Kelurahan') {
            $rekomendasi = PerhitunganModel::with('warga')->orderBy('nilai_akhir', 'desc')->get();
        } else {
            if (!empty($user->RT)) {
                $rt = $user->RT;

                $rekomendasi = PerhitunganModel::whereHas('warga', function ($query) use ($rt) {
                    $query->where('RT', $rt);
                })->with('warga')->orderBy('nilai_akhir', 'desc')->get();
            } else {
                $rekomendasi = collect();
            }
        }
        return view('hasil-rekomendasi.index', compact('rekomendasi'));
    }
        public function landing()
        {
            $rekomendasi = PerhitunganModel::with('warga')->orderBy('nilai_akhir', 'desc')->get();
            return view('welcome', compact('rekomendasi'));
        }

}