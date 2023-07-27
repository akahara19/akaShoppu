<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;

    function kategori() {
        return $this->belongsTo(Kategori::class);
    }

    function detailtransaksi() {
        return $this->hasOne(Detailtransaksi::class);
    }
}
