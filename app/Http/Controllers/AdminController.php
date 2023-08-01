<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function index()
    {
        $produks = Produk::paginate(10);
        $images = ['narutoshirt.jpg', 'rog6.jpg', 'burger.png'];
        return view('product.index', compact('produks', 'images'));
    }

    public function showAdd(Kategori $kategori)
    {
        $kategoris = Kategori::all();
        return view('product.add', compact('kategoris'));
    }



    public function add(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'kategori_id' => 'required',
        ]);

        $filename = date('Y-m-d') . '_' . uniqid() . '.' . $request->file('image')->getClientOriginalExtension();

        // Simpan gambar ke direktori public/images dengan nama yang sudah dibuat
        $request->file('image')->storeAs('images', $filename, 'public');

        Produk::create([
            'name' => $request->name,
            'price' => $request->price,
            'image' => 'images/' . $filename, // Simpan jalur relatif file di dalam database
            'kategori_id' => $request->kategori_id,
        ]);

        return redirect()->route('admin.produk')->with('success', 'Produk berhasil ditambahkan.');
    }



    public function showEdit(Produk $produk)
    {
        $kategoris = Kategori::all();
        return view('product.edit', compact('produk', 'kategoris'));
    }

    public function update(Request $request, Produk $produk)
    {
        $request->validate([
            'name' => 'nullable',
            'price' => 'nullable',
            'image' => 'nullable|file',
            'kategori_id' => 'nullable',
        ]);
        $filename = date('Y-m-d') . '_' . uniqid() . '.' . $request->file('image')->getClientOriginalExtension();

        // Simpan gambar ke direktori public/images dengan nama yang sudah dibuat
        $request->file('image')->storeAs('images', $filename, 'public');

        // Gunakan fungsi fill() pada model untuk mengisi atribut dari request
        $produk->fill([
            'name' => $request->name,
            'price' => $request->price,
            'kategori_id' => $request->kategori_id,
            'image' => 'images/' . $filename,
        ]);

        // Cek apakah ada file gambar baru yang diunggah
        if ($request->hasFile('image')) {
            // $imagePath = $request->file('image')->store('images');
            // $produk->image = $imagePath;
            
        }

        // Simpan perubahan ke database
        $produk->save();

        return redirect()->route('admin.produk')->with('success', 'Produk berhasil diperbarui.');
    }

    public function delete(Produk $produk)
    {
        $produk->delete();

        return redirect()->route('admin.produk')->with('success', 'Produk berhasil dihapus.');
    }
}
