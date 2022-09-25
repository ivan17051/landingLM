<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penayangan extends Model
{
    use HasFactory;
    protected $table = 'penayangan';
    public $primaryKey = 'idpenayangan';

    public $timestamps = false;

    protected $fillable = [
        'nama',
        'keterangan',
        'tanggal',
        'penyelenggara',
        'alamat',
        'embedLink',
        'paroki',
        'jual',
    ];
}
