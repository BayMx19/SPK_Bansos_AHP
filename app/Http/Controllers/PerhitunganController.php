<?php

namespace App\Http\Controllers;

use App\Models\PerhitunganModel;
use App\Models\WargaModel;
use Illuminate\Http\Request;

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

        dd($warga);
        return view('/perhitungan.create', compact('warga', 'perhitungan'));
    }
}
