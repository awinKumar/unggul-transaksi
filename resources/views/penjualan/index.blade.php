@extends('layouts.layout')

@section('content')

<div class="w3-container">
    <h5>Penjualan</h5>
    @if (count($penjualan) > 0)
    <table class="w3-table w3-striped w3-bordered w3-border w3-hoverable w3-white">
        <thead>
            <tr>
                <th>Tanggal</th>
                <th>Pelanggan</th>
                <th>Subtotal</th>
                <th>Barang</th>
                <th style="float: right;">Action</th>
            </tr>
        </thead>
        @foreach($penjualan as $jual)
        <tr>
            <td>{{ $jual-> tgl }}</td>
            <td>{{ $jual-> pelanggan -> nama }}</td>
            <td>{{ $jual-> subtotal }}</td>
            <td>
                @for($i = 0;$i < count($jual-> item_penjualan); $i++)

                    @if ($i == 0)
                    {{ $jual-> item_penjualan[$i] -> barang -> nama  }}
                    @else
                    , {{ $jual-> item_penjualan[$i] -> barang -> nama  }}
                    @endif

                    @endfor
            </td>
            <td class="w3-right">
                <form action="/penjualan/{{ $jual->id }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="w3-button w3-red"><i class="fa fa-trash"></i></button>
                </form>
            </td>
            <td class="w3-right">
                <form action="/penjualan/update/{{ $jual->id }}" method="GET">
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
    <a href="{{ url('/penjualan/create') }}"><button class="w3-button w3-dark-grey"><i class="fa fa-plus"></i> Tambah Penjualan </button></a>
</div>

@endsection()