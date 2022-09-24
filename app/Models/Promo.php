<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promo extends Model
{
    use HasFactory;
    protected $table = 'promo';
    public $primaryKey = 'idPromo';

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

    public function tiketRelation(){
        return $this->belongsTo(Tiket::class, 'tiket', 'idtiket');
    }
    public function parokiRelation(){
        return $this->belongsTo(Paroki::class, 'paroki', 'idparoki');
    }
}
