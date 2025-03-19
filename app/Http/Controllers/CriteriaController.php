<?php

namespace App\Http\Controllers;

use App\Models\AnalisaModel;
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
        $criteria = CriteriaModel::all();
        $analisa = AnalisaModel::select('data')->where('tipe', 'Kriteria')->get()->map(function($item){
            return json_decode($item->data, true);
        })->toArray();
        return view('/master-criteria.create', compact('criteria', 'analisa'));
    }

    public function store(Request $request){
        $kode_criteria = $request->input('kode_criteria');
        $nama_criteria = $request->input('nama_criteria');
        $nilai_prioritas = $request->input('nilai_prioritas');
        $nilai_perbandingan = $request->input('nilai_perbandingan');

        $criteriaData = [];
        for ($i = 0; $i < count($kode_criteria); $i++) {
            $criteriaData[] = [
                'kode_criteria' => $kode_criteria[$i],
                'nama' => $nama_criteria[$i],
                'nilai_prioritas' => sprintf("%.3f", $nilai_prioritas[$i]),
            ];
        }

        try{
            DB::table('criteria')->upsert($criteriaData, ['kode_criteria'], ['nama', 'nilai_prioritas']);

            $criteriaIds = DB::table('criteria')->whereIn('kode_criteria', $kode_criteria)->pluck('id');

            foreach ($criteriaIds as $index => $criteriaId) {
                DB::table('analisa')->updateOrInsert(
                    ['criteria_id' => $criteriaId],
                    [
                        'data' => json_encode($nilai_perbandingan[$index]),
                        'tipe' => 'Kriteria',
                        'subcriteria_id' => null,
                    ]
                );
            }

            // Redirect kembali dengan pesan sukses
            return redirect('/master-criteria')->with('success', 'Criteria berhasil ditambahkan.');
        } catch (QueryException $e) {
            return redirect('/master-criteria')->with('error', 'Gagal menambahkan Criteria: Coba Lagi' );
        }
    }

    // public function edit($id){
    //     $criteria = CriteriaModel::findOrFail($id);
    //     return view('master-criteria.edit', compact('criteria'));
    // }

    // public function update(Request $request, $id){
    //     $criteria = CriteriaModel::find($id);
    //     DB::table('criteria')->where('id', $id)->update([
    //         'kode_criteria' => $request->kode_criteria,
    //         'nama' => $request->nama,
    //         'nilai_prioritas' => number_format($request->nilai_prioritas, 6, '.', ''),
    //     ]);

    //     return redirect('master-criteria')->with('success', 'Data berhasil diperbarui!');
    // }

    public function destroy($id){
        $criteria = CriteriaModel::findOrFail($id);
        $criteria->delete();

        return redirect('master-criteria')->with('success', 'Data berhasil dihapus!');
    }



}
