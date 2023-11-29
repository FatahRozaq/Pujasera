<!-- resources/views/Barang/index.blade.php -->

@extends('layout') 

@section('content')
    <div class="container mt-4">
        <h1 class="mb-4">Data Barang</h1>

        @if(isset($message))
            <div class="alert alert-info">{{ $message }}</div>
        @endif
        <a href="{{ url('/barangs/create') }}" class="btn btn-primary">Add Data</a>
        <table class="table">
            <thead>
                <tr>
                    <th>Nama Barang</th>
                    <th>Satuan</th>
                    <th>Harga Satuan</th>
                    <th>Stok</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($barangs as $barang)
                    <tr>
                        <td>{{ $barang->NamaBarang }}</td>
                        <td>{{ $barang->Satuan }}</td>
                        <td>{{ $barang->HargaSatuan }}</td>
                        <td>{{ $barang->Stok }}</td>
                        <td>
                            <a href="/editbarangs/{{ $barang->KodeBarang }}" class="btn btn-warning">Edit</a>
                            <form action="/barangs/{{ $barang->KodeBarang }}" method="post" style="display: inline;">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
