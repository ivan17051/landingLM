<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penayangan;
use App\Models\Penyelenggara;
use App\Models\Tiket;
use App\Models\TiketFinal;
use App\Models\Paroki;
use App\Models\Foto;
use App\Models\Transaksi;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Redirect;

class TamuController extends Controller
{
    public function index(){
        $users = auth()->user();
        $users->parokis = Paroki::where('idparoki',$users->paroki)->get();
        $pesanan = Transaksi::where('pembeli',$users->id)->orderByDesc('tanggalWaktu')->get();
        $tiket2 = TiketFinal::where('email',auth()->user()->email)->orderByDesc('penayangan')->get();
        foreach ($tiket2 as $tk)
        {
            $penayangan = Penayangan::where('idpenayangan',$tk->penayangan)->get();
            $penayangan[0]->parokis = Paroki::where('idparoki',$penayangan[0]->paroki)->get();
            $tk->penayangan = $penayangan;
        }
        foreach ($pesanan as $p)
        {
            $tiket = Tiket::where('idtiket',$p->tiket)->get();
            foreach ($tiket as $t)
            {
                $penayangan = Penayangan::where('idpenayangan',$t->penayangan)->get();
                $t->penayangan = $penayangan;
            }
            $p->tikets = $tiket;
        }
        //dd($pesanan);
        return view('public.akun')->with(compact('users','pesanan','tiket2'));
    }

    public function checkout1(Request $request){
        if(!Auth::check()) { return Redirect::back()->withErrors(['msg' => 'Silahkan Login Terlebih Dahulu']); }
        else{
            $tiket = Tiket::where('idtiket',$request->idtiket)->get();
            if($request->jumlah < 1) { return Redirect::back()->withErrors(['msg' => 'Minimal Pembelian 1 Tiket']); }
            else if($tiket== null || $tiket == "") { return Redirect::back()->withErrors(['msg' => 'Tiket Tidak Ditemukan']); }
            else{
                $jumlah = $request->jumlah;
                $tiket = $tiket[0];
                if(($tiket->jumlah - $tiket->terjual - $tiket->pending)<$jumlah) { return Redirect::back()->withErrors(['msg' => 'Tiket Yang Tersedia Tidak Mencukupi / Tiket Habis']); }
                $fasilitas = DB::select('select * FROM fasilitastiket ft inner join fasilitas f on ft.fasilitas_idfasilitas = f.idfasilitas where ft.tiket_idtiket = \''.$tiket->idtiket.'\';');
                $tiket->fasilitas = $fasilitas;
                $penayangan = Penayangan::whereRaw('tanggal > DATE_ADD(NOW(), INTERVAL 1 HOUR) and idpenayangan = '.$tiket->penayangan)->get();
                $tiket->penayangan = $penayangan;
                $tiket->dibeli = $jumlah;
                $users = auth()->user();
                $users->parokis = Paroki::where('idparoki',$users->paroki)->get();

                return view('public.checkout1')->with(compact('tiket','users'));
            }
        }  
    }

    public function checkout2(Request $request){
        if(!Auth::check())
        {
            return Redirect::back()->withErrors(['msg' => 'Silahkan Login Terlebih Dahulu']);
        }
        else{
            $tiket = Tiket::findOrFail($request->tiket);
            $jumlah = $request->jumlah;
            $donasi = $request->donasi;
            $total = $tiket->harga * $jumlah + $donasi;
            //$promo = $request->promo;

            if(($tiket->jumlah - $tiket->terjual - $tiket->pending)<$jumlah) { return Redirect::back()->withErrors(['msg' => 'Tiket Yang Tersedia Tidak Mencukupi / Tiket Habis']); }
            $tiket->pending = $tiket->pending + $jumlah;
            //$tiket->save();

            $fasilitas = DB::select('select * FROM fasilitastiket ft inner join fasilitas f on ft.fasilitas_idfasilitas = f.idfasilitas where ft.tiket_idtiket = \''.$tiket->idtiket.'\';');
            $tiket->fasilitas = $fasilitas;
            $penayangan = Penayangan::whereRaw('tanggal > DATE_ADD(NOW(), INTERVAL 1 HOUR) and idpenayangan = '.$tiket->penayangan)->get();
            $tiket->penayangan = $penayangan;
            $tiket->dibeli = $jumlah;
            $users = auth()->user();
            $users->parokis = Paroki::where('idparoki',$users->paroki)->get();

            $tr = new Transaksi;
            $tr->idtransaksi = DATE('dmYHis');
            $idtransaksi = DATE('dmYHis');
            $tr->donasi = $donasi;
            $tr->harga = $tiket->harga;
            $tr->total = $total;
            $tr->status = 'BELUM DIBAYAR';
            $tr->pembeli = auth()->user()->id;
            $tr->tiket = $tiket->idtiket;
            $tr->jumlah = $jumlah;
            $tr->batasBayar = date("Y-m-d H:i:s", strtotime('+2 hours'));
            //$tr->save();
            return view('public.checkout2')->with(compact('tiket','tr','idtransaksi','users','jumlah','donasi','total'));
        }
        
    }
}
