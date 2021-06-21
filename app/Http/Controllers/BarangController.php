<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    public function index()
    {
        $barang = Barang::all();
        return view('barang.index', ['barang' => $barang]);
    }

    public function create()
    {
        return view('barang.create');
    }

    public function show($id)
    {
        $barang = Barang::findOrFail($id);
        return view('barang.update', ['barang' => $barang]);
    }

    public function store()
    {
        $barang = new Barang();

        $barang->nama = request('nama');
        $barang->kategori = request('kategori');
        $barang->harga = request('harga');

        $barang->save();

        return redirect('/barang')->with('mssg', 'Input barang Successful');
    }

    public function destroy($id)
    {
        $barang = Barang::findOrFail($id);
        $barang->delete();

        return redirect('/barang');
    }

    public function update($id)
    {
        $barang = Barang::findOrFail($id);

        $barang->nama = request('nama');
        $barang->kategori = request('kategori');
        $barang->harga = request('harga');

        $barang->save();

        return redirect('/barang')->with('mssg', 'Update barang Successful');
    }
}
