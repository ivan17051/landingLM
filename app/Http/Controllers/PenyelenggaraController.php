<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penyelenggara;

class PenyelenggaraController extends Controller
{
    public function index(){
        $penyelenggara = Penyelenggara::all();
        // dd($penyelenggara);
        return view('master.penyelenggara', ['penyelenggara'=>$penyelenggara]);
    }

    public function detail($idPenyelenggara){
        return view('master.detailPenyelenggara');
    }

    public function store(Request $request){
        try{
            $penyelenggara_baru = new Penyelenggara($request->all());
            $penyelenggara_baru->save();
        }catch(QueryException $exception){
            $this->flashError($exception->getMessage());
            return back();
        }

        $this->flashSuccess('Data Penyelenggara Berhasil Ditambahkan');
        return back();
    }

    public function update(Request $request, $id){
        try{
            $penyelenggara = Penyelenggara::findOrFail($id);
            $penyelenggara->fill($request->all());
            $penyelenggara->save();
        }catch(QueryException $exception){
            $this->flashError($exception->getMessage());
            return back();
        }
        
        $this->flashSuccess('Data Penyelenggara Berhasil Diubah');
        return back();
    }

    public function destroy(Request $request, $id){
        try {
            $penyelenggara = Penyelenggara::findOrFail($id);
            $penyelenggara->delete();
        }catch (QueryException $exception) {
            $this->flashError($exception->getMessage());
            return back();
        }

        $this->flashSuccess('Data Penyelenggara Berhasil Dihapus');
        return back();
    }
}
