<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penyelenggara extends Model
{
    use HasFactory;
    protected $table = 'penyelenggara';
    public $primaryKey = 'idpenyelenggara';

    public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nama',
        'namaContactPerson',
        'noTelpContactPerson',
        'saldoPenyelenggara',
        'saldoLeadme',
        'hpptiket',
    ];
}
