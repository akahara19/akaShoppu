<?php

namespace App\Http\Controllers;

use App\Models\Detailtransaksi;
use App\Models\Produk;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class UserController extends Controller
{
    function postCart(Request $request, Produk $produk)
    {
        $request->validate([
            'jumlah' => 'required',
        ]);

        if (auth()->user()->role == 'admin') {
            return redirect()->back()->with('message', 'Maaf, Barang hanya bisa dibeli oleh User');
        }

        DetailTransaksi::create(
            [
                'qty' => $request->jumlah,
                'user_id' => Auth::id(),
                'produk_id' => $produk->id,
                'status' => 'keranjang',
                'totalharga' => $produk->price * $request->jumlah
            ]
        );

        return redirect()->route('cart')->with('status', 'Berhasil Dimasukan Keladam Keranjang');
    }

    function cart(Request $request)
    {
        $detailtransaksi = Detailtransaksi::where('status', 'keranjang')->with('produk')->get();

        return view('cart', compact('detailtransaksi'));
    }

    function pay(Request $request, Detailtransaksi $detailtransaksi)
    {
        $produk = $detailtransaksi->produk;
        return view('pay', compact('produk', 'detailtransaksi'));
    }

    public function payprocess(Request $request, Detailtransaksi $detailtransaksi)
    {
        $request->validate([
            'bukti' => 'required|file'
        ]);

        $transaksi = Transaksi::create([
            'user_id' => auth()->id(),
            'totalharga' => $detailtransaksi->totalharga,
            'kode' => 'INV' . Str::random(10)
        ]);

        $detailtransaksi->update([
            'transaksi_id' => $transaksi->id,
            'status' => 'checkout',
            'bukti' => $request->bukti->store('images'),
        ]);

        return redirect()->route('customer.summary')->with('status', 'Berhasil Checkout/Upload Bukti');
    }

    public function summary(Request $request)
    {
        $detailtransaksi = Detailtransaksi::where('user_id', auth()->id())->where('status', 'checkout')->get();

        return view('summary', compact('detailtransaksi'));
    }
}
