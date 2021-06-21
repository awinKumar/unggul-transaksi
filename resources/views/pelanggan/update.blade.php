@extends('layouts.layout')

@section('content')

<div class="w3-container">
    <br>
    <div class="w3-row-padding">
        <form class="w3-container w3-card-4" style="background: white;" action="/pelanggan/update/{{ $pelanggan->id }}" method="POST">
            @csrf
            <h2>Update Pelanggan</h2>
            <label id="id_pelanggan" name="id_pelanggan" hidden>{{ $pelanggan->id }}</label>
            <div class="w3-section">
                <input class="w3-input" type="text" id="nama" name="nama" value="{{ $pelanggan->nama }}" required="">
                <label>Nama</label>
            </div>
            <div class="w3-section">
                <input class="w3-input" type="text" id="domisili" name="domisili" value="{{ $pelanggan->domisili }}" required="">
                <label>Domisili</label>
            </div>
            <div class="w3-row">
                <div class="w3-half">
                    @if ($pelanggan->jenis_kelamin == 'laki-laki')
                    <input id="male" class="w3-radio" type="radio" name="jenis_kelamin" value="laki-laki" checked>
                    <label>Laki-laki</label>
                    <br>
                    <input id="female" class="w3-radio" type="radio" name="jenis_kelamin" value="perempuan">
                    <label>Perempuan</label>
                    @else
                    <input id="male" class="w3-radio" type="radio" name="jenis_kelamin" value="laki-laki">
                    <label>Laki-laki</label>
                    <br>
                    <input id="female" class="w3-radio" type="radio" name="jenis_kelamin" value="perempuan" checked>
                    <label>Perempuan</label>
                    @endif
                </div>
            </div>
            <div class="w3-row">
                <input class="w3-button w3-blue w3-right" type="submit" value="Update">
            </div>
        </form>
    </div>
    <br>
    <a href="/pelanggan"><button class="w3-button w3-dark-grey">Back to List <i class="fa fa-arrow-left"></i></button></a>
</div>

@endsection()