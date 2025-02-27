<?php

namespace App\Http\Controllers;

use App\Models\CriteriaModel;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CriteriaController extends Controller
{
    public function index()
    {
        $criteria = CriteriaModel::all();
        return view('/master-criteria.index', compact('criteria'));
    }
    public function create(){
        return view('/master-criteria.create');
    }
    public function store(Request $request)
{

    try{
        DB::table('criteria')->insert([
            'kode_criteria' => $request->kode_criteria,
            'nama' => $request->nama,
            'nilai_prioritas' => number_format($request->nilai_prioritas, 6, '.', ''),
        ]);

        // Redirect kembali dengan pesan sukses
        return redirect('/master-criteria')->with('success', 'Criteria berhasil ditambahkan.');
    } catch (QueryException $e) {
        return redirect('/master-criteria')->with('error', 'Gagal menambahkan Criteria: Coba Lagi' );
    }
}

public function edit($id)
{
    $criteria = CriteriaModel::findOrFail($id);
    return view('master-criteria.edit', compact('criteria'));
}
public function update(Request $request, $id)
{


    $criteria = CriteriaModel::find($id);
    DB::table('criteria')->where('id', $id)->update([
        'kode_criteria' => $request->kode_criteria,
        'nama' => $request->nama,
        'nilai_prioritas' => number_format($request->nilai_prioritas, 6, '.', ''),
    ]);

    return redirect('master-criteria')->with('success', 'Data berhasil diperbarui!');
}
public function destroy($id)
    {
        $criteria = CriteriaModel::findOrFail($id);
        $criteria->delete();

        return redirect('master-criteria')->with('success', 'Data berhasil dihapus!');
    }



}