@extends('layouts.layout')

@section('content')

<div class="w3-container">
    <br>
    <div class="w3-row-padding">
        <form class="w3-container w3-card-4" style="background: white;" action="/barang" method="POST">
            @csrf
            <h2>Tambah Barang</h2>
            <div class="w3-section">
                <input class="w3-input" type="text" id="nama" name="nama" required="">
                <label>Nama</label>
            </div>
            <div class="w3-section">
                <input class="w3-input" type="text" id="kategori" name="kategori" required="">
                <label>Kategori</label>
            </div>
            <div class="w3-section">
                <input class="w3-input" type="number" id="harga" name="harga" required="">
                <label>Harga</label>
            </div>
            <div class="w3-row">
                <input class="w3-button w3-blue w3-right" type="submit" value="Tambah">
            </div>
        </form>
    </div>
    <br>
    <a href="/barang"><button class="w3-button w3-dark-grey">Back to List <i class="fa fa-arrow-left"></i></button></a>
</div>

@endsection()