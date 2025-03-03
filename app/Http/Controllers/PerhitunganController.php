<?php

namespace App\Http\Controllers;

use App\Models\PerhitunganModel;
use Illuminate\Http\Request;

class PerhitunganController extends Controller
{
    public function index()
    {
        $perhitungan = PerhitunganModel::with('warga')->get();
        return view('perhitungan.index', compact('perhitungan'));
    }
    public function create(){
        return view('/perhitungan.create');
    }
}