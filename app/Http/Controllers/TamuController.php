<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Penayangan;
use App\Models\Penyelenggara;
use App\Models\Tiket;
use App\Models\TiketFinal;
use App\Models\TiketOffline;
use App\Models\Paroki;
use App\Models\Foto;
use App\Models\User;
use App\Models\Verifikasi;
use App\Models\Transaksi;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Elibyy\TCPDF\Facades\TCPDF;
use App\Mail\konfirmasi;
use HTTP_Request2;
use Illuminate\Support\Facades\Mail;
use Redirect;

class TamuController extends Controller
{
    public function index(){
        $users = auth()->user(); $json;
        $users->parokis = Paroki::where('idparoki',$users->paroki)->get();
        $pesanan = Transaksi::where('pembeli',$users->id)->orderByDesc('tanggalWaktu')->get();
        $penayangan2 =DB::select('select distinct p.*from penayangan p inner join tiketfinal tf on p.idpenayangan = tf.penayangan where tf.email = "'.$users->email.'" ');
        $verifikasi = Verifikasi::where('email',$users->email)->get();
        foreach ($penayangan2 as $p)
        {
            $tiket2 = TiketFinal::where('email',auth()->user()->email)->where('penayangan',$p->idpenayangan)->get();
            $p->tiket = $tiket2;
            $p->parokis = Paroki::where('idparoki',$p->paroki)->get();
        }
       
        foreach ($pesanan as $p)
        {
            //echo 'https://api-stg.oyindonesia.com/api/payment-checkout/status?partner_tx_id='.$p->paymentLinkId.'&send_callback=false';
            $tiket = Tiket::where('idtiket',$p->tiket)->get(); 
            if($p->metode == 'ONLINE' && $p->status =='BELUM DIBAYARa')
            {
                $rq = new HTTP_Request2();
                $rq->setUrl('https://api-stg.oyindonesia.com/api/payment-checkout/status?partner_tx_id='.$p->paymentLinkId.'&send_callback=false');
                $rq->setMethod(HTTP_Request2::METHOD_GET);
                $rq->setConfig(array(
                'follow_redirects' => TRUE
                ));
                $rq->setHeader(array(
                'Content-Type' => 'application/json',
                'x-oy-username' => 'rmivani',
                'x-api-key' => '85f84a47-2276-44b5-afe3-bfedc89286cf'
                ));
               
                try {
                $response = $rq->send();
                if ($response->getStatus() == 200) {
                     $json = json_decode($response->getBody(), TRUE); 
                     if($json['status']== 'complete')
                     {
                         $p->status == 'SUDAH DIBAYAR';
                         $p->waktuBayar = date('d m Y h:i:s',strtotime($json['updated']));
                        // $p->save();
     
                         for ($i=0; $i < $p->jumlah ; $i++) { 
                             $tk = new TiketFinal();
                             $tk->tiketOnline = 'BA1'.$p->idtransaksi.$i;
                             $tk->transaksi= $p->idtransaksi;
                             $tk->namaTiket= $tiket->namaTiket;
                             $tk->tanggalWaktuOnline = $p->waktuBayar;
                             $tk-> penayangan = $tiket->penayangan;
                             $tk-> qrcode = sha1(sha1($tk->tiketOnline).date("dmYHis"));
                             $tk-> pemesan = auth()->user()->nama;
                             $tk->email = auth()->user()->email;
                             $tk-> noTelp = auth()->user()->noTelp;
                             $tk-> paroki = auth()->user()->paroki;
                             $tk-> status = 'Pembelian Online';
                            // $tk->save();
                         }
                     }
                     else if ($json['status']== 'closed' || $json['status']== 'failed')
                     {
                         $p->status == 'BATAL';
                         $p->save();
                     }
                }
                else {
                    echo 'Unexpected HTTP status: ' . $response->getStatus() . ' ' .
                    $response->getReasonPhrase();
                }
                }
                catch(HTTP_Request2_Exception $e) {
                echo 'Error: ' . $e->getMessage();
                }
                dd($rq);
            }

            foreach ($tiket as $t)
            {
                $penayangan = Penayangan::where('idpenayangan',$t->penayangan)->get();
                $t->penayangan = $penayangan;
            }
            $p->tikets = $tiket;
        }
        return view('public.akun')->with(compact('users','pesanan','penayangan2','verifikasi'));
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
            $res = '';
            $tiket = Tiket::findOrFail($request->tiket);
            $jumlah = $request->jumlah;
            $donasi = 0;//$request->donasi;
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
            $tr->kodeUnik = 0;//rand(1,200);
            $tr->total = $total + $tr->kodeUnik;
            $tr->status = 'BELUM DIBAYAR';
            $tr->pembeli = auth()->user()->id;
            $tr->tiket = $tiket->idtiket;
            $tr->jumlah = $jumlah;
            $tr->metode = 'ONLINE';
            $tr->batasBayar = date("Y-m-d H:i:s", strtotime('+23 hours'));
            

            $rq = new HTTP_Request2();
            $rq->setUrl('https://api-stg.oyindonesia.com/api/payment-checkout/create-v2');
            $rq->setMethod(HTTP_Request2::METHOD_POST);
            $rq->setConfig(array(
            'follow_redirects' => TRUE
            ));
            $rq->setHeader(array(
            'Content-Type' => 'application/json',
            'x-oy-username' => 'rmivani',
            'x-api-key' => '85f84a47-2276-44b5-afe3-bfedc89286cf'
            ));
            $rq->setBody('{    
                "description": "'.$idtransaksi.'",    
                "partner_tx_id": "'.$idtransaksi.'",  
                "notes": "", 
                "sender_name" : "Mochamad Suryono",     
                "amount" : '.$tr->total.',   
                "email": "",    
                "phone_number": "",     
                "is_open" : false,
                "include_admin_fee" : true,    
                "expiration": "'.$tr->batasBayar.'"
            }');
            $json;
            try {
            //dd($rq);
            $response = $rq->send();
            if ($response->getStatus() == 200) {
                $json = json_decode($response->getBody(), TRUE); 
            }
            else {
                echo 'Unexpected HTTP status: ' . $response->getStatus() . ' ' .
                $response->getReasonPhrase();
            }
            }
            catch(HTTP_Request2_Exception $e) {
            echo 'Error: ' . $e->getMessage();
            }
            $tr->paymentLinkId = $json['payment_link_id'];
            $tr->save();
            return redirect('/akun/#tr'.$idtransaksi)->withErrors(['msg' => 'Pemesanan Berhasil, Silahkan Melakukan Pembayaran']);;
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

    public function verifikasi(Request $request)
    {
        $v = new Verifikasi;
        $v->nama = $request->nama;
        $v->tgltf = $request->tgl;
        $v->jumlah = $request->jumlah;
        $v->idPesanan = $request->idorder;
        $v->email = auth()->user()->email;
        $v->save();
        Mail::to('21stefsk@gmail.com')->send(new konfirmasi($v->idPesanan.' '.$v->nama.' '.$v->jumlah.' '.$v->tgltf));
        return redirect('/akun')->withErrors(['msg' => 'Data Konfirmasi Pembayaran Berhasil Disimpan']);
    }

    public function pay(Request $request)
    {
        /*
        $rq = new HTTP_Request2();
        $rq->setUrl('https://api-stg.oyindonesia.com/api/payment-checkout/status?partner_tx_id=07112022172751&send_callback=false');
        $rq->setMethod(HTTP_Request2::METHOD_GET);
        $rq->setConfig(array(
        'follow_redirects' => TRUE
        ));
        $rq->setHeader(array(
        'Content-Type' => 'application/json',
        'x-oy-username' => 'rmivani',
        'x-api-key' => '85f84a47-2276-44b5-afe3-bfedc89286cf'
        ));
        try {
        $response = $rq->send();
        if ($response->getStatus() == 200) {
             $json = json_decode($response->getBody(), TRUE); 
        }
        else {
            echo 'Unexpected HTTP status: ' . $response->getStatus() . ' ' .
            $response->getReasonPhrase();
        }
        }
        catch(HTTP_Request2_Exception $e) {
        echo 'Error: ' . $e->getMessage();
        */
       // dd($json);
/*
        $rq = new HTTP_Request2();
        $rq->setUrl('https://api-stg.oyindonesia.com/api/payment-checkout/status');
        $rq->setMethod(HTTP_Request2::METHOD_POST);
        $rq->setConfig(array(
        'follow_redirects' => TRUE
        ));
        $rq->setHeader(array(
        'Content-Type' => 'application/json',
        'x-oy-username' => 'rmivani',
        'x-api-key' => '85f84a47-2276-44b5-afe3-bfedc89286cf'
        ));
        $rq->setBody('{    
            "partner_tx_id	": "07112022172751",    
            "send_callback": false"
        }');
        $json;
        try {
        //dd($rq);
        $response = $rq->send();
        if ($response->getStatus() == 200) {
            echo $json = json_decode($response->getBody(), TRUE); 
        }
        else {
            echo 'Unexpected HTTP status: ' . $response->getStatus() . ' ' .
            $response->getReasonPhrase();
        }
        }
        catch(HTTP_Request2_Exception $e) {
        echo 'Error: ' . $e->getMessage();
        }
        */

        //dd($request->amount);
        //$json = json_decode($request->getBody(), TRUE); 
       // echo 'insert into simpan (simpan) values(\''.$response->getBody().'\')';
        $json = json_decode($request, TRUE); 
        //dd($request->status);
        DB::insert('insert into simpan (simpan) values(\''.$request->status.'\')');
       // echo $json;
    }

    public function email()
    {
        $penerima = auth()->user(); $json;
        $penerima->parokis = Paroki::where('idparoki',$penerima->paroki)->get();
        $pesanan = DB::select('select *, tr.jumlah as pj from transaksi tr inner join tiket t on tr.tiket = t.idtiket inner join penayangan p on t.penayangan = p.idpenayangan inner join paroki pa on p.paroki = pa.idparoki where tr.idtransaksi ="'.'07112022172751'.'" ');
        $pesanan = $pesanan[0];
        $tiket =DB::select('select * from tiketfinal  where transaksi = "'.'07112022172751'.'" ');

        return view('mail.tiket')->with(compact('penerima','pesanan','tiket'));
    }
}
