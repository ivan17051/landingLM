<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tiket extends Model
{
    use HasFactory;
    protected $table = 'tiket';
    public $primaryKey = 'idtiket';

    public $timestamps = false;

    protected $fillable = [
        'penayangan',
        'namaTiket',
        'deskripsi',
        'harga',
        'jumlah',
    ];

}
