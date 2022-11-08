<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penayangan;
use App\Models\Penyelenggara;
use App\Models\Tiket;
use App\Models\Paroki;
use App\Models\Foto;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class LandingController extends Controller
{
    public function index(){
        $penayangan = Penayangan::whereRaw('tanggal > DATE_ADD(NOW(), INTERVAL 1 HOUR)')->orderBy('tanggal')->get();
        foreach ($penayangan as $p)
        {
            $p->parokis = Paroki::where('idparoki',$p->paroki)->get();
            $p->foto = Foto::where('penayangan',$p->idpenayangan)->get();
        }
        return view('public.home')->with(compact('penayangan'));
        
    }

    public function jadwal(){
        return view('public.jadwal');
    }

    public function login(){
        return view('auth.login');
    }

    public static function penyelenggara($id)
    {
        return Penyelenggara::where('idpenyelenggara',$id)->get();
    }

    public static function foto($id)
    {
        return Foto::where('penayangan',$id)->get();
    }

    public static function tiket($id)
    {
        $tiket = Tiket::where('penayangan',$id)->get();
        foreach ($tiket as $t)
        {
            $fasilitas = DB::select('select * FROM fasilitastiket ft inner join fasilitas f on ft.fasilitas_idfasilitas = f.idfasilitas where ft.tiket_idtiket = \''.$t->idtiket.'\';');
            $t->fasilitas = $fasilitas;
        }
        return $tiket;
    }
}
