<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\ItemPenjualan;
use App\Models\Pelanggan;
use App\Models\Penjualan;
use Illuminate\Http\Request;

class PenjualanController extends Controller
{
    public function index()
    {
        $penjualan = Penjualan::all();
        return view('penjualan.index', ['penjualan' => $penjualan]);
    }

    public function create()
    {
        $pelanggan = Pelanggan::all();
        $barang = Barang::all();
        return view('penjualan.create', ['pelanggan' => $pelanggan, 'barang' => $barang]);
    }

    public function show($id)
    {
        $penjualan = Penjualan::findOrFail($id);
        $pelanggan = Pelanggan::all();
        $barang = Barang::all();
        return view('penjualan.update', ['penjualan' => $penjualan, 'pelanggan' => $pelanggan, 'barang' => $barang]);
    }

    public function store()
    {
        $subtotal = 0;
        $penjualan = new Penjualan();


        $penjualan->tgl = request("tanggal");
        $penjualan->pelanggan_id = request("pelanggan");

        for ($i = 0; $i < count(request("barang")); $i++) {
            $barangId = request("barang");
            $harga = Barang::where('id', $barangId[$i])->first();
            $subtotal += $harga->harga;
        }

        $penjualan->subtotal = $subtotal;
        $penjualan->save();

        for ($i = 0; $i < count(request("barang")); $i++) {
            $item = new ItemPenjualan();
            $item->penjualan_id = $penjualan->id;
            $item->barang_id = request("barang")[$i];
            $item->save();
        }

        return redirect('/penjualan')->with('mssg', 'Input Penjualan Successful');
    }

    public function update($id)
    {
        $subtotal = 0;
        $penjualan = Penjualan::findOrFail($id);


        $penjualan->tgl = request("tanggal");
        $penjualan->pelanggan_id = request("pelanggan");

        for ($i = 0; $i < count(request("barang")); $i++) {
            $barangId = request("barang");
            $harga = Barang::where('id', $barangId[$i])->first();
            $subtotal += $harga->harga;
        }

        $penjualan->subtotal = $subtotal;
        $penjualan->save();

        $old_item = ItemPenjualan::where('penjualan_id', $penjualan->id);
        $old_item->delete();

        for ($i = 0; $i < count(request("barang")); $i++) {
            $item = new ItemPenjualan();
            $item->penjualan_id = $penjualan->id;
            $item->barang_id = request("barang")[$i];
            $item->save();
        }

        return redirect('/penjualan')->with('mssg', 'Edit Penjualan Successful');
    }

    public function destroy($id)
    {
        $item_penjualan = ItemPenjualan::where('penjualan_id', $id);
        $penjualan = Penjualan::findOrFail($id);
        $item_penjualan->delete();
        $penjualan->delete();

        return redirect('/penjualan');
    }
}
