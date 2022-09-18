<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penayangan;
use App\Models\Tiket;

class PenayanganController extends Controller
{
    public function index(){
        // $penayangan = Penayangan::get(['idpenayangan','nama','tanggal','alamat']);
        $penayangan = Penayangan::all();
        // dd($penayangan);
        return view('master.penayangan', ['penayangan'=>$penayangan]);
    }

    public function detail($idPenayangan){
        $d['penayangan'] = Penayangan::findOrFail($idPenayangan);
        $d['tiket'] = Tiket::where('penayangan',$idPenayangan)->get();
        return view('master.detailPenayangan', ['data'=>$d]);
    }

    public function store(Request $request){
        try{
            $penayangan_baru = new Penayangan($request->all());
            $penayangan_baru->save();
        }catch(QueryException $exception){
            $this->flashError($exception->getMessage());
            return back();
        }

        $this->flashSuccess('Data Penayangan Berhasil Ditambahkan');
        return back();
    }

    public function update(Request $request, $id){
        try{
            $penayangan = Penayangan::findOrFail($id);
            $penayangan->fill($request->all());
            $penayangan->save();
        }catch(QueryException $exception){
            $this->flashError($exception->getMessage());
            return back();
        }
        
        $this->flashSuccess('Data Penayangan Berhasil Diubah');
        return back();
    }

    public function destroy(Request $request, $id){
        try {
            $penayangan = Penayangan::findOrFail($id);
            $penayangan->delete();
        }catch (QueryException $exception) {
            $this->flashError($exception->getMessage());
            return back();
        }

        $this->flashSuccess('Data Penayangan Berhasil Dihapus');
        return back();
    }
}
