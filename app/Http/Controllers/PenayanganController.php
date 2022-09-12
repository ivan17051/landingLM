<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penayangan;

class PenayanganController extends Controller
{
    public function index(){
        return view('master.penayangan');
    }

    public function detail($idPenayangan){
        return view('master.detailPenayangan');
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
