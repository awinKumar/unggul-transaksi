@extends('layouts.layout')

@section('content')

<div class="w3-container">
    <h5>Barang</h5>
    @if (count($barang) > 0)
    <table class="w3-table w3-striped w3-bordered w3-border w3-hoverable w3-white">
        @foreach($barang as $obj)
        <tr>
            <td>{{ $obj-> nama }}</td>
            <td>{{ $obj-> kategori }}</td>
            <td>{{ $obj-> harga }}</td>
            <td class="w3-right">
                <form action="/barang/{{ $obj->id }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="w3-button w3-red"><i class="fa fa-trash"></i></button>
                </form>
            </td>
            <td class="w3-right">
                <form action="/barang/update/{{ $obj->id }}" method="GET">
                    @csrf
                    <button class="w3-button w3-green"><i class="fa fa-pencil"></i></button>
                </form>
            </td>
        </tr>
        @endforeach
    </table><br>
    @else
    <h2>No Data</h2>
    @endif
    <a href="{{ url('/barang/create') }}"><button class="w3-button w3-dark-grey"><i class="fa fa-plus"></i> Tambah Barang </button></a>
</div>

@endsection()