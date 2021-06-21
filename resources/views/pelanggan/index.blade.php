@extends('layouts.layout')

@section('content')

<div class="w3-container">
    <h5>Pelanggan</h5>
    @if (count($pelanggan) > 0)
    <table class="w3-table w3-striped w3-bordered w3-border w3-hoverable w3-white">
        @foreach($pelanggan as $user)
        <tr>
            <td>{{ $user-> nama }}</td>
            <td>{{ $user-> domisili }}</td>
            <td>{{ $user-> jenis_kelamin }}</td>
            <td class="w3-right">
                <form action="/pelanggan/{{ $user->id }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="w3-button w3-red"><i class="fa fa-trash"></i></button>
                </form>
            </td>
            <td class="w3-right">
                <form action="/pelanggan/update/{{ $user->id }}" method="GET">
                    @csrf
                    <button class="w3-button w3-green"><i class="fa fa-pencil"></i></button>
                </form>
            </td>
        </tr>
        @endforeach
    </table><br>
    @else
    <h3>No Data</h3>
    @endif
    <a href="{{ url('/pelanggan/create') }}"><button class="w3-button w3-dark-grey"><i class="fa fa-plus"></i> Tambah Pelanggan </button></a>
</div>

@endsection()