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
        $imageArray = ['narutoshirt.jpg', 'rog6.jpg', 'burger.png'];
        return view('product.index', compact('produks', 'imageArray'));

    }

    public function showAdd(Kategori $kategori)
    {
        $kategoris = Kategori::all();
        return view('product.add', compact('kategoris'));
    }

    function add(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'image' => 'required|file',
            'kategori_id' => 'required',
        ]);

        Produk::create([
            'name' => $request->name,
            'price' => $request->price,
            'image' => $request->image->store('images'),
            'kategori_id' => $request->kategori_id,
        ]);

        return redirect()->route('admin.produk');
    }
}
