<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Paroki;

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
            $paroki_baru = new Paroki($request->all());
            $paroki_baru->save();
        }catch(QueryException $exception){
            $this->flashError($exception->getMessage());
            return back();
        }

        $this->flashSuccess('Data Paroki Berhasil Ditambahkan');
        return back();
    }

    public function update(Request $request, $id){
        try{
            $paroki = Paroki::findOrFail($id);
            $paroki->fill($request->all());
            $paroki->save();
        }catch(QueryException $exception){
            $this->flashError($exception->getMessage());
            return back();
        }
        
        $this->flashSuccess('Data Paroki Berhasil Diubah');
        return back();
    }

    public function destroy(Request $request, $id){
        try {
            $paroki = Paroki::findOrFail($id);
            $paroki->delete();
        }catch (QueryException $exception) {
            $this->flashError($exception->getMessage());
            return back();
        }

        $this->flashSuccess('Data Paroki Berhasil Dihapus');
        return back();
    }
}
