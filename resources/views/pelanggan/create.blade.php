@extends('layouts.layout')

@section('content')

<div class="w3-container">
    <br>
    <div class="w3-row-padding">
        <form class="w3-container w3-card-4" style="background: white;" action="/pelanggan" method="POST">
            @csrf
            <h2>Tambah Pelanggan</h2>
            </label>
            <div class="w3-section">
                <input class="w3-input" type="text" id="nama" name="nama" required="">
                <label>Nama</label>
            </div>
            <div class="w3-section">
                <input class="w3-input" type="text" id="domisili" name="domisili" required="">
                <label>Domisili</label>
            </div>
            <div class="w3-row">
                <div class="w3-half">
                    <input id="male" class="w3-radio" type="radio" name="jenis_kelamin" value="laki-laki" checked>
                    <label>Laki-laki</label>
                    <br>
                    <input id="female" class="w3-radio" type="radio" name="jenis_kelamin" value="perempuan">
                    <label>Perempuan</label>
                </div>
            </div>
            <div class="w3-row">
                <input class="w3-button w3-blue w3-right" type="submit" value="Tambah">
            </div>
        </form>
    </div>
    <br>
    <a href="/pelanggan"><button class="w3-button w3-dark-grey">Back to List <i class="fa fa-arrow-left"></i></button></a>
</div>

@endsection()