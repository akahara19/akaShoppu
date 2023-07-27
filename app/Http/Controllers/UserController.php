<?php

namespace App\Http\Controllers;

use App\Models\Detailtransaksi;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    function postCart(Request $request, Produk $produk) {
        $request->validate([
            'jumlah' => 'required',
        ]);
        Detailtransaksi::create([
            'qty' => $request->input('jumlah'),
            'user_id' => Auth::id(),
            'produk_id' => $produk->id,
            'status' => 'keranjang',
            'totalharga' => $produk->price * $request->input('jumlah'),
        ]);

        return redirect()->route('customer.cart')->with('status', 'produk berhasil di tambahkan ke keranjang');
    }
}
