<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penayangan;
use App\Models\Tiket;
use App\Models\Fasilitas;
use App\Models\Promo;
use App\Models\Paroki;
use App\Models\Penyelenggara;

class TransaksiController extends Controller
{
    public function show($id){
        $tiket = Tiket::findOrFail($id);
        
        return view('beliTiket', ['tiket'=>$tiket]);
    }

    public function getPromo($kode,$tiket,$paroki){
        try{
            $tglNow = date('Y-m-d');
            $promo = Promo::where('kodePromo',$kode)->where('tiket',$tiket)->where('paroki',$paroki)
                ->where('mulai','<=',$tglNow)->where('selesai','>=',$tglNow)->first();
            
            if(isset($promo) && $promo->terpakai < $promo->kuota) return $promo;
            else 0;
        }catch(QueryException $exception){
            $this->flashError($exception->getMessage());
            return back();
        }
    }
}
