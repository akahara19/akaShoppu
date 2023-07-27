<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detailtransaksi extends Model
{
    use HasFactory;

    function transaksi() {
        return $this->belongsTo(Transaksi::class);
    }

    function user() {
        return $this->belongsTo(User::class);
    }
}
