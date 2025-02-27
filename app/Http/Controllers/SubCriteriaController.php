<?php

namespace App\Http\Controllers;

use App\Models\CriteriaModel;
use App\Models\SubCriteriaModel;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class SubCriteriaController extends Controller
{
    public function index()
    {
        $subcriteria = SubCriteriaModel::with('criteria')->get();

        return view('/master-subcriteria.index', compact('subcriteria'));
    }
    public function create(){
        $criteria = CriteriaModel::all();
        $subcriteria = SubCriteriaModel::with('criteria')->get();

        return view('/master-subcriteria.create', compact('criteria', 'subcriteria'));
    }
    public function store(Request $request)
    {
        try{
            DB::table('subcriteria')->insert([
                'criteria_id' => $request->criteria_id,
                'sub_criteria' => $request->sub_criteria,
                'bobot' => $request->bobot,
                'nilai_prioritas' => number_format($request->nilai_prioritas, 6, '.', ''),
            ]);

            // Redirect kembali dengan pesan sukses
            return redirect('/master-subcriteria')->with('success', 'Sub Criteria berhasil ditambahkan.');
        } catch (QueryException $e) {
            return redirect('/master-subcriteria')->with('error', 'Gagal menambahkan Sub Criteria: Coba Lagi' );
        }
    }
    public function edit($id)
    {
        $criteria = CriteriaModel::all();
        $subcriteria = SubCriteriaModel::with('criteria')->findOrFail($id);
        return view('master-subcriteria.edit', compact('criteria','subcriteria'));
    }
    public function update(Request $request, $id)
    {


        $subcriteria = SubCriteriaModel::find($id);
        DB::table('subcriteria')->where('id', $id)->update([
            'criteria_id' => $request->criteria_id,
                'sub_criteria' => $request->sub_criteria,
                'bobot' => $request->bobot,
                'nilai_prioritas' => number_format($request->nilai_prioritas, 6, '.', ''),
        ]);

        return redirect('master-subcriteria')->with('success', 'Data berhasil diperbarui!');
    }
    public function destroy($id)
    {
        $subcriteria = SubCriteriaModel::findOrFail($id);
        $subcriteria->delete();

        return redirect('master-subcriteria')->with('success', 'Data berhasil dihapus!');
    }

}
