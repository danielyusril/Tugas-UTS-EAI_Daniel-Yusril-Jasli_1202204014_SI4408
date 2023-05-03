<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class logistik extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'logistik';
    protected $fillable = [
        'pengirim',
        'alamatpengirim',
        'barang',
        'jumlahbarang',
        'penerima',
        'alamatpenerima'
    ];

    protected $hidden = [];
}
