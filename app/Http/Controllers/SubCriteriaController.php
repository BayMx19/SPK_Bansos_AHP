<?php

namespace App\Http\Controllers;

use App\Models\AnalisaModel;
use App\Models\CriteriaModel;
use App\Models\SubCriteriaModel;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class SubCriteriaController extends Controller
{
    public function index(){
        $criteria = CriteriaModel::all();
        $subcriteria = SubCriteriaModel::with('criteria')->get();

        return view('/master-subcriteria.index', compact('criteria','subcriteria'));
    }

    public function create(){
        $criteria = CriteriaModel::all();
        $criteria_select = CriteriaModel::whereDoesntHave('subcriteria')->get();
        $subcriteria = SubCriteriaModel::with('criteria')->get();

        return view('/master-subcriteria.create', compact('criteria', 'subcriteria', 'criteria_select'));
    }

    public function store(Request $request){
        $criteria_id = $request->input('criteria_id');
        $subcriteria = $request->input('sub_criteria');
        $bobot = $request->input('bobot');
        $nilai_prioritas = $request->input('nilai_prioritas');
        $nilai_perbandingan = $request->input('nilai_perbandingan');

        $subcriteriaData = [];
        for ($i = 0; $i < count($subcriteria); $i++) {
            $subcriteriaData[] = [
                'criteria_id' => $criteria_id[$i],
                'sub_criteria' => $subcriteria[$i],
                'bobot' => $bobot[$i],
                'nilai_prioritas' => number_format($nilai_prioritas[$i], 6, '.', ''),
            ];
        }

        try{
            foreach($subcriteriaData as $data) {
                SubCriteriaModel::create($data);
            }

            $subcriteriaIds = DB::table('subcriteria')->whereIn('criteria_id', $criteria_id)->pluck('id');
            $criteriaId = DB::table('subcriteria')->whereIn('criteria_id', $criteria_id)->first();

            if ($criteriaId) {
                $combinedValue = 'Sub Kriteria ' . $criteriaId->criteria_id;
            } else {
                $combinedValue = 'Sub Kriteria Tidak Ditemukan';
            }

            foreach ($subcriteriaIds as $index => $subcriteriaId) {
                DB::table('analisa')->updateOrInsert(
                    ['subcriteria_id' => $subcriteriaId],
                    [
                        'data' => json_encode($nilai_perbandingan[$index]),
                        'tipe' => $combinedValue,
                        'criteria_id' => null,
                    ]
                );
            }

            return redirect('/master-subcriteria')->with('success', 'Data Sub Criteria Berhasil Ditambah');
            } catch(QueryException $e){
                return redirect('/master-subcriteria')->with('error', 'Data Sub Criteria Gagal Ditambah');
        }
    }

    // public function edit($id)
    // {
    //     $criteria = CriteriaModel::all();
    //     $subcriteria = SubCriteriaModel::with('criteria')->findOrFail($id);
    //     return view('master-subcriteria.edit', compact('criteria','subcriteria'));
    // }

    public function update(Request $request){
        $subcriteria_id = $request->input('subcriteria_id');
        $criteria_id = $request->input('criteria_id');
        $subcriteria = $request->input('sub_criteria');
        $bobot = $request->input('bobot');
        $nilai_prioritas = $request->input('nilai_prioritas');
        $nilai_perbandingan = $request->input('nilai_perbandingan');

        $subcriteriaData = [];
        for ($i = 0; $i < count($subcriteria); $i++) {
            $subcriteriaData[] = [
                'id' => $subcriteria_id[$i],
                'criteria_id' => $criteria_id[$i],
                'sub_criteria' => $subcriteria[$i],
                'bobot' => $bobot[$i],
                'nilai_prioritas' => number_format($nilai_prioritas[$i], 6, '.', ''),
            ];
        }

        try{
            foreach ($subcriteriaData as $data) {
                DB::table('subcriteria')
                    ->where('id', $data['id'])
                    ->update([
                        'sub_criteria' => $data['sub_criteria'],
                        'bobot' => $data['bobot'],
                        'nilai_prioritas' => $data['nilai_prioritas'],
                        'criteria_id' => $data['criteria_id'],
                    ]);
            }

            $subcriteriaIds = DB::table('subcriteria')->whereIn('criteria_id', $criteria_id)->pluck('id');
            $criteriaId = DB::table('subcriteria')->whereIn('criteria_id', $criteria_id)->first();

            if ($criteriaId) {
                $combinedValue = 'Sub Kriteria ' . $criteriaId->criteria_id;
            } else {
                $combinedValue = 'Sub Kriteria Tidak Ditemukan';
            }

            foreach ($subcriteriaIds as $index => $subcriteriaId) {
                DB::table('analisa')->updateOrInsert(
                    ['subcriteria_id' => $subcriteriaId],
                    [
                        'data' => json_encode($nilai_perbandingan[$index]),
                        'tipe' => $combinedValue,
                        'criteria_id' => null,
                    ]
                );
            }
            return redirect('master-subcriteria')->with('success', 'Data berhasil diperbarui!');

        } catch (QueryException $e) {
            return redirect('/master-subcriteria')->with('error', 'Gagal memperbaharui Sub Criteria: Coba Lagi' );
        }
    }

    public function destroy($id){
        $subcriteria = SubCriteriaModel::findOrFail($id);
        $subcriteria->delete();

        return redirect('master-subcriteria')->with('success', 'Data berhasil dihapus!');
    }

    public function detail($id){
        $combinedValue ='Sub Kriteria ' . $id;
        $criteria = CriteriaModel::select('id', 'nama')->get();
        $subcriteria = SubCriteriaModel::all()->where('criteria_id', $id);
        $analisa = AnalisaModel::select('data')->where('tipe', $combinedValue)->get()->map(function($item){
            return json_decode($item->data, true);
        })->toArray();
        return view('master-subcriteria.edit', compact('subcriteria', 'criteria', 'analisa'));
    }

}