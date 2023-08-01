<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;

    protected $guarded  = ["id"];

    function kategori() {
        return $this->belongsTo(Kategori::class);
    }

    function detailtransaksi() {
        return $this->belongsTo(Detailtransaksi::class);
    }
}
