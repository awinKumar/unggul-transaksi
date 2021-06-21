<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pelanggan;

class PelangganController extends Controller
{
    public function index()
    {
        $pelanggan = Pelanggan::all();
        return view('pelanggan.index', ['pelanggan' => $pelanggan]);
    }

    public function create()
    {
        return view('pelanggan.create');
    }

    public function show($id)
    {
        $pelanggan = Pelanggan::findOrFail($id);
        return view('pelanggan.update', ['pelanggan' => $pelanggan]);
    }

    public function store()
    {
        $pelanggan = new Pelanggan();

        $pelanggan->nama = request('nama');
        $pelanggan->domisili = request('domisili');
        $pelanggan->jenis_kelamin = request('jenis_kelamin');

        $pelanggan->save();

        return redirect('/pelanggan')->with('mssg', 'Input Pelanggan Successful');
    }

    public function destroy($id)
    {
        $pelanggan = Pelanggan::findOrFail($id);
        $pelanggan->delete();

        return redirect('/pelanggan');
    }

    public function update($id)
    {
        $pelanggan = Pelanggan::findOrFail($id);

        $pelanggan->nama = request('nama');
        $pelanggan->domisili = request('domisili');
        $pelanggan->jenis_kelamin = request('jenis_kelamin');

        $pelanggan->save();

        return redirect('/pelanggan')->with('mssg', 'Update Pelanggan Successful');
    }
}
