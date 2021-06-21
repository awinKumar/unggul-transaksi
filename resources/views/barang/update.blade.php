@extends('layouts.layout')

@section('content')

<div class="w3-container">
    <br>
    <div class="w3-row-padding">
        <form class="w3-container w3-card-4" style="background: white;" action="/barang/update/{{ $barang->id }}" method="POST">
            @csrf
            <h2>Update Barang</h2>
            <label id="id_barang" name="id_barang" hidden>{{ $barang->id }}</label>
            <div class="w3-section">
                <input class="w3-input" type="text" id="nama" name="nama" value="{{ $barang->nama }}" required="">
                <label>Nama</label>
            </div>
            <div class="w3-section">
                <input class="w3-input" type="text" id="kategori" value="{{ $barang->kategori }}" name="kategori" required="">
                <label>Kategori</label>
            </div>
            <div class="w3-section">
                <input class="w3-input" type="number" id="harga" value="{{ $barang->harga }}" name="harga" required="">
                <label>Harga</label>
            </div>
            <div class="w3-row">
                <input class="w3-button w3-blue w3-right" type="submit" value="Update">
            </div>
        </form>
    </div>
    <br>
    <a href="/barang"><button class="w3-button w3-dark-grey">Back to List <i class="fa fa-arrow-left"></i></button></a>
</div>

@endsection()