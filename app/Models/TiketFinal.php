<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TiketFinal extends Model
{
    use HasFactory;
    protected $table = 'tiketfinal';
    public $primaryKey = 'idtiketFinal';

    public $timestamps = false;

}
