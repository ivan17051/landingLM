<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penayangan;
use App\Models\Penyelenggara;
use App\Models\Tiket;
use App\Models\TiketFinal;
use App\Models\TiketOffline;
use App\Models\Paroki;
use App\Models\Foto;
use App\Models\User;
use App\Models\Transaksi;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Elibyy\TCPDF\Facades\TCPDF;
use Redirect;

class TamuController extends Controller
{
    public function index(){
        $users = auth()->user();
        $users->parokis = Paroki::where('idparoki',$users->paroki)->get();
        $pesanan = Transaksi::where('pembeli',$users->id)->orderByDesc('tanggalWaktu')->get();
        $penayangan2 =DB::select('select distinct p.*from penayangan p inner join tiketFinal tf on p.idpenayangan = tf.penayangan where tf.email = "'.$users->email.'" ');
       
        foreach ($penayangan2 as $p)
        {
            $tiket2 = TiketFinal::where('email',auth()->user()->email)->where('penayangan',$p->idpenayangan)->get();
            $p->tiket = $tiket2;
            $p->parokis = Paroki::where('idparoki',$p->paroki)->get();
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
        return view('public.akun')->with(compact('users','pesanan','penayangan2'));
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
            $tiket->save();

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
            $tr->kodeUnik = rand(1,200);
            $tr->total = $total + $tr->kodeUnik;
            $tr->status = 'BELUM DIBAYAR';
            $tr->pembeli = auth()->user()->id;
            $tr->tiket = $tiket->idtiket;
            $tr->jumlah = $jumlah;
            $tr->batasBayar = date("Y-m-d H:i:s", strtotime('+23 hours'));
            $tr->save();
            return view('public.checkout2')->with(compact('tiket','tr','idtransaksi','users','jumlah','donasi','total'));
        }
    }

    public function cetakTiket($id){
        if(!Auth::check()) { return Redirect::back()->withErrors(['msg' => 'Silahkan Login Terlebih Dahulu']); }
        else{
            $tiket = TiketFinal::where('idtiketFinal',$id)->get();
            if($tiket== null || $tiket == "") { return Redirect::back()->withErrors(['msg' => 'Tiket Tidak Ditemukan']); }
            else{
                $tiket = $tiket[0];
                $penayangan = Penayangan::whereRaw('tanggal > DATE_ADD(NOW(), INTERVAL 1 HOUR) and idpenayangan = '.$tiket->penayangan)->get();
                $penayangan[0]->parokis = Paroki::where('idparoki',$penayangan[0]->paroki)->get();
                $tiket->penayangan = $penayangan[0];
                $users = User::where('email',$tiket->email)->get();

                $filename = 'LEADME'.$tiket->tiketOnline.'_'.$users[0]->nama.'.pdf';
                
                $data = [
                    'tiket' => $tiket,
                    'users' =>$users
                ];

                $view = \View::make('public.tiketpdf', $data);
                $html = $view->render();
                
                $pdf = new TCPDF('p', 'pt', [58, 110], true, 'UTF-8', false);
                $pdf::SetTitle('LEADME TIKET');
                $style = array(
                    'vpadding' => 'auto',
                    'hpadding' => 'auto',
                    'fgcolor' => array(0,0,0),
                    'bgcolor' => false,
                    'module_width' => 1, 
                    'module_height' => 1 
                );
                $pdf::setPrintHeader(false);
                $pdf::setPrintFooter(false);
                $pdf::SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
                $pdf::SetMargins(5, 5, 5, true);
                $pdf::SetAutoPageBreak(true, 0);
                $pdf::AddPage('P', array(80, 150), true);
                $pdf::writeHTML($html, true, false, true, false, '');
                $pdf::write2DBarcode('https://leadmefilm.com/cektiket/'.$tiket->qrCode, 'QRCODE,M', 15, 15, 50, 50, $style, 'N'); 
                $pdf::Output($filename, 'D');
                //return response()->download(public_path($filename));
            }
        }  
    }

    public function cekTiket($id){
        $tiketf = TiketFinal::whereRaw('tiketOnline = "'.$id.'" or qrCode = "'.$id.'"')->get();
        $tiketof = TiketFinal::whereRaw('tiketOffline = "'.$id.'" or qrOffline = "'.$id.'"')->get();
        $tiketo = TiketOffline::whereRaw('noTiket = "'.$id.'" or enkripsi = "'.$id.'"')->get();
        $jenis = 0; $tiket;
       
        if(isset($tiketf[0]->idtiketFinal)){
            $jenis = 1; 
            $tiket = $tiketf[0];
            $tiket->penayangan =  Penayangan::where('idpenayangan',$tiket->penayangan)->get();
            $tiket->parokis = Paroki::where('idparoki',$tiket->penayangan[0]->paroki)->get();
        } 
        else if(isset($tiketof[0]->idtiketFinal)){
            $jenis = 2; 
            $tiket = $tiketof[0];
            $tiket->penayangan =  Penayangan::where('idpenayangan',$tiket->penayangan)->get();
            $tiket->parokis = Paroki::where('idparoki',$tiket->penayangan[0]->paroki)->get();
        }
        else if(isset($tiketo[0]->idtikets)){
            $jenis = 3; 
            $tiket = $tiketo[0];
            $tiket->penayangan =  Penayangan::where('idpenayangan',$tiket->penayangan)->get();
            $tiket->parokis = Paroki::where('idparoki',$tiket->penayangan[0]->paroki)->get();
        }
        else{
            return redirect('/')->withErrors(['msg' => 'Tiket Tidak Ditemukan, Silahkan Periksa Nomor Tiket']);
        }

        return view('public.cektiket1')->with(compact('tiket','jenis'));
    }
}
