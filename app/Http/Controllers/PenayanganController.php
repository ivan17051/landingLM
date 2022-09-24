<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penayangan;
use App\Models\Tiket;
use App\Models\Fasilitas;
use App\Models\Promo;

class PenayanganController extends Controller
{
    public function index(){
        // $penayangan = Penayangan::get(['idpenayangan','nama','tanggal','alamat']);
        $penayangan = Penayangan::all();
        return view('master.penayangan', ['penayangan'=>$penayangan]);
    }

    public function detail($idPenayangan){
        $d['penayangan'] = Penayangan::findOrFail($idPenayangan);
        $d['tiket'] = Tiket::where('penayangan',$idPenayangan)->get();
        $d['fasilitas'] = Fasilitas::all();
        $d['promo'] = Promo::with('tiketRelation:idtiket,namaTiket','parokiRelation:idparoki,namaParoki')->get();
        
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

    public function storeTiket(Request $request){
        try{
            $tiket_baru = new Tiket($request->all());
            $tiket_baru->terjual = 0;
            $tiket_baru->save();
        }catch(QueryException $exception){
            $this->flashError($exception->getMessage());
            return back();
        }

        $this->flashSuccess('Data Tiket Berhasil Ditambahkan');
        return back();
    }

    public function updateTiket(Request $request){
        try{
            $tiket = Tiket::findOrFail($request->idtiket);
            $tiket->fill($request->all());
            $tiket->save();
        }catch(QueryException $exception){
            $this->flashError($exception->getMessage());
            return back();
        }
        
        $this->flashSuccess('Data Penayangan Berhasil Diubah');
        return back();
    }

    public function destroyTiket(Request $request, $id){
        try {
            $tiket = Tiket::findOrFail($id);
            $tiket->delete();
        }catch (QueryException $exception) {
            $this->flashError($exception->getMessage());
            return back();
        }

        $this->flashSuccess('Data Tiket Berhasil Dihapus');
        return back();
    }

    public function storePromo(Request $request){
        try{
            $idPromo = Promo::max('idPromo');
            $promo_baru = new Promo($request->all());
            $promo_baru->idPromo = $idPromo + 1;
            $promo_baru->terpakai = 0;
            $promo_baru->save();
        }catch(QueryException $exception){
            $this->flashError($exception->getMessage());
            return back();
        }

        $this->flashSuccess('Data Promo Berhasil Ditambahkan');
        return back();
    }

    public function updatePromo(Request $request){
        try{
            $promo = Promo::findOrFail($request->idPromo);
            $promo->fill($request->all());
            $promo->save();
        }catch(QueryException $exception){
            $this->flashError($exception->getMessage());
            return back();
        }
        
        $this->flashSuccess('Data Promo Berhasil Diubah');
        return back();
    }

    public function destroyPromo(Request $request, $id){
        try {
            $promo = Promo::findOrFail($id);
            $promo->delete();
        }catch (QueryException $exception) {
            $this->flashError($exception->getMessage());
            return back();
        }

        $this->flashSuccess('Data Tiket Berhasil Dihapus');
        return back();
    }
}
