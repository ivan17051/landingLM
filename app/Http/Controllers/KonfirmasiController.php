<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Paroki;
use App\Models\Verifikasi;
use App\Models\Penyelenggara;
use Hash;

class KonfirmasiController extends Controller
{
    public function index(){
        $konfirmasi = Verifikasi::all();
        return view('master.konfirmasi')->with(compact('konfirmasi'));
    }

    public function terbitkantiket($id){
        $konfirmasi = Verifikasi::all();
        return view('master.konfirmasi')->with(compact('konfirmasi'));
    }

    public function store(Request $request){

    }

    public function update(Request $request, $id){
        
    }

    public function destroy(Request $request, $email){
     
    }
}
