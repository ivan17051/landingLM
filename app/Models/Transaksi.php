<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;
    protected $table = 'transaksi';
    public $primaryKey = 'idtransaksi';

    public $timestamps = false;

    protected $fillable = [
        'paymentLinkId',
        'tanggalWaktu',
        'donasi',
        'diskon',
        'total',
        'status',
        'user',
        'metode',
        'bookingCode',
    ];
    public function userRelation(){
        return $this->belongsTo(User::class, 'user', 'email');
    }
    public function tiketFinalRelation(){
        return $this->hasOne('tiketfinal');
    }
}
