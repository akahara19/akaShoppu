<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index() {
        $produks = Produk::paginate(10);
        return view('produk.index', compact('produks'));
    }
}
