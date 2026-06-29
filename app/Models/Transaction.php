<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = [
        'nama_barang',
        'harga',
        'jumlah',
        'total',
        'tanggal'
    ];
}