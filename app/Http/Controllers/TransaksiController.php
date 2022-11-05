<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penayangan;
use App\Models\Tiket;
use App\Models\Fasilitas;
use App\Models\Promo;
use App\Models\Paroki;
use App\Models\Penyelenggara;
use App\Models\Transaksi;

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
    
    public function gettoken(Request $request){
        $ACCESS_TOKEN_URL = 'https://app.sandbox.midtrans.com/snap/v1/transactions';
        
        $num = substr(str_repeat(0, 3) . $request->penayangan_submit, -3);
        $ORDER_ID = 'ORDER-'.$num.'-'.date('Ymd');
        dd($ORDER_ID);
        
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => $ACCESS_TOKEN_URL,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS =>'{
                "transaction_details": {
                    "order_id": "'.$ORDER_ID.'",
                    "gross_amount": '.$request->harga_submit.'
                },
                "credit_card":{
                    "secure" : true
                },
                "customer_details": {
                    "first_name": "'.$request->nama_submit.'",
                    "last_name": "",
                    "email": "'.$request->email_submit.'",
                    "phone": "'.$request->nohp_submit.'"
                }
            }',
            CURLOPT_HTTPHEADER => array(
                'Accept: application/json',
                'Content-Type: application/json',
                'Authorization: Basic U0ItTWlkLXNlcnZlci1oaGN6d2dPazhBRmdHSFUyN3kwVF9oOEM6'
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);

        $json = json_decode($response,true);
        
        try{
            $transaksi = new Transaksi();
            $transaksi->user = $request->email_submit;
            $transaksi->paymentLinkId = $json['redirect_url'];
            $transaksi->tanggalWaktu = date('Y m d h:i:s');
            $transaksi->total = $request->total_submit;
            dd($transaksi);
            $transaksi->save();
        }catch(QueryException $exception){
            $this->flashError($exception->getMessage());
            return back();
        }

        return back();
    }
}
