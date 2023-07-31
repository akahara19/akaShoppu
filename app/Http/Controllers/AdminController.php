<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Produk;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $produks = Produk::paginate(10);
        return view('product.index', compact('produks'));
    }

    public function showAdd(Kategori $kategori)
    {
        $kategoris = Kategori::all();
        return view('product.add', compact('kategoris'));
    }

    public function storeProduct(Request $request)
    {
        $request->validate([
            'kategori_id' => 'required',
            'name' => 'required',
            'price' => 'required',
            'image' => 'required|file',
        ]);

        Produk::create([
            'kategori_id' => $request->kategori_id,
            'name' => $request->name,
            'price' => $request->price,
            'image' => $request->image->store('images'),
        ]);

        return redirect()->route('admin.produk');
    }
}
