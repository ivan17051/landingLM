<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promo extends Model
{
    use HasFactory;
    protected $table = 'promo';

    public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'kodePromo',
        'kuota',
        'terpakai',
        'minimumQuantity',
        'minimumTotal',
        'potonganPersen',
        'maksimumPotongan',
        'maksimalPenggunaanUser',
        'bisaDigabung',
        'mulai',
        'selesai',
        'penanggung',
        'penayangan',
        'paroki',
        'tiket',
    ];
}
