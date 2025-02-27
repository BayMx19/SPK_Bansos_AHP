<?php

namespace App\Http\Controllers;

use App\Models\WargaModel;
use Illuminate\Database\Events\QueryExecuted;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WargaController extends Controller
{
    public function index()
    {
        $warga = WargaModel::all();
        return view('/master-warga.index', compact('warga'));
    }

    public function create(){
        return view('/master-warga.create');
    }
    public function store(Request $request){
        try{
            DB::table('warga')->insert([
                'nama' => $request->nama,
                'alamat' => $request->alamat,
                'RT' => $request->RT,
                'RW' => $request->RW,
                'usia' => $request->usia,
                'status_pekerjaan' => $request->status_pekerjaan,
                'pendapatan' => $request->pendapatan,
                'jumlah_tanggungan_anak' => $request->jumlah_tanggungan_anak,
                'kepemilikan_rumah' => $request->kepemilikan_rumah,
            ]);
            return redirect('master-warga')->with('success', 'Warga berhasil ditambahkan.');

        }catch (QueryException $e){
            return redirect('/master-users')->with('error', 'Gagal menambahkan Warga: Coba Lagi' );

        }
    }

        public function edit($id)
    {
        $warga = WargaModel::findOrFail($id);
        return view('master-warga.edit', compact('warga'));
    }

// Mengupdate data warga
    public function update(Request $request, $id)
    {


        $warga = WargaModel::findOrFail($id);
        DB::table('warga')->where('id', $id)->update([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'RT' => $request->RT,
            'RW' => $request->RW,
            'usia' => $request->usia,
            'status_pekerjaan' => $request->status_pekerjaan,
            'pendapatan' => $request->pendapatan,
            'jumlah_tanggungan_anak' => $request->jumlah_tanggungan_anak,
            'kepemilikan_rumah' => $request->kepemilikan_rumah,
        ]);

        return redirect('master-warga')->with('success', 'Data warga berhasil diperbarui!');
    }



public function destroy($id)
{
    $warga = WargaModel::findOrFail($id);
    $warga->delete();

    return redirect('master-warga')->with('success', 'Data warga berhasil dihapus');
}
}