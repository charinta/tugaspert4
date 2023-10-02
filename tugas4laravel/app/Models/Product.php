<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $table = 'produk';
    protected $fillable = [
        'kode_produk',
        'nama_produk',
        'harga',
    ];

}