<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Transaksi;

class TiketkuController extends Controller
{
    public function index(){
        $tiket = Transaksi::where('user', Auth::user()->email)->with('userRelation:email,nama')->get();
        // dd($tiket);
        return view('tiketku', ['tiket'=>$tiket]);
    }
}
