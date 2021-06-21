@extends('layouts.layout')

@section('content')

<div class="w3-container">
    <br>
    <div class="w3-row-padding">
        <form class="w3-container w3-card-4" style="background: white;" action="/penjualan/update/{{ $penjualan->id }}" method="POST">
            @csrf
            <h2>Edit Penjualan</h2>
            </label>
            <div class="w3-section">
                <input class="w3-input" type="date" id="tanggal" name="tanggal" value="{{ $penjualan->tgl }}" required="">
                <label>Tanggal</label>
            </div>
            <div class="w3-section">
                <select class="w3-select" name="pelanggan">
                    <option value="" disabled>Pilih Pelanggan</option>
                    @foreach ($pelanggan as $user)
                    @if ($user->id == $penjualan->pelanggan_id)
                    <option value="{{ $user->id }}" selected>{{ $user->nama }}</option>
                    @else
                    <option value="{{ $user->id }}">{{ $user->nama }}</option>
                    @endif
                    @endforeach
                </select>
            </div>
            <div class="w3-row">
                <label>List Barang</label>
                <input type="button" class="w3-button w3-green" onclick="addBarang()" value="Add">
                <input id="del_barang" type="button" class="w3-button w3-red" onclick="deleteBarang()" value="Delete">
            </div>
            <div class="w3-container w3-border w3-padding" id="wrapper_barang">
                <div class="w3-half" id="list_barang">
                    <select class="w3-select" name="barang[]">
                        <option value="" disabled selected>Pilih Barang</option>
                        @foreach ($barang as $obj)
                        <option value="{{ $obj->id }}">{{ $obj->nama }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="w3-row">
                <input class="w3-button w3-blue w3-right" type="submit" value="Tambah">
            </div>
        </form>
    </div>
    <br>
    <a href="/penjualan"><button class="w3-button w3-dark-grey">Back to List <i class="fa fa-arrow-left"></i></button></a>
</div>
<script>
    var counter = 0;

    function addBarang() {
        counter++;
        var barang = $("#list_barang").clone();
        barang[0].id = barang[0].id + counter;
        barang.appendTo("#wrapper_barang");
    }

    function deleteBarang() {
        if (counter == 0) {
            alert("barang harus ada");
        } else {
            $("#list_barang" + counter).remove();
            counter--;
        }
    }
</script>
@endsection()