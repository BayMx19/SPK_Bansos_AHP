<?php

namespace App\Http\Controllers;

use App\Models\KriteriaModel;
use Illuminate\Http\Request;

class KriteriaController extends Controller
{
    public function index()
    {
        $criteria = KriteriaModel::all();
        return view('/master-kriteria.index', compact('criteria'));
    }
    public function create(){
        return view('/master-kriteria.create');
    }

}