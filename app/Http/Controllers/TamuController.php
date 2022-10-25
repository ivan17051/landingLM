<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penayangan;
use App\Models\Penyelenggara;
use App\Models\Tiket;
use App\Models\Foto;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class TamuController extends Controller
{
    public function index(){
        $penayangan = Penayangan::whereRaw('tanggal > DATE_ADD(NOW(), INTERVAL 1 HOUR)')->orderByDesc('tanggal')->get();
        return view('public.home')->with(compact('penayangan'));
        
    }


}
