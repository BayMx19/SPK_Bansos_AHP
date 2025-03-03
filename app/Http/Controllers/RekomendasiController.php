<?php

namespace App\Http\Controllers;

use App\Models\PerhitunganModel;
use Illuminate\Http\Request;

class RekomendasiController extends Controller
{
    public function index()
    {
        $rekomendasi = PerhitunganModel::with('warga')->orderBy('nilai_akhir', 'desc')->get();
        return view('hasil-rekomendasi.index', compact('rekomendasi'));
    }
    public function landing()
    {
        $rekomendasi = PerhitunganModel::with('warga')->orderBy('nilai_akhir', 'desc')->get();
        return view('welcome', compact('rekomendasi'));
    }

}