<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TiketOffline extends Model
{
    use HasFactory;
    protected $table = 'tiketOfflines';
    public $primaryKey = 'idtikets';

    public $timestamps = false;
}
