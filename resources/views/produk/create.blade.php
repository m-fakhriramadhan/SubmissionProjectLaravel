@extends('layouts.app')

@section('title', 'Tambah Produk')

@section('content')
    <h1>Tambah Produk</h1>

    @if (session('status'))
        <p>{{ session('status') }}</p>
    @endif

    <form action="{{ route('produk.store') }}" method="POST">
        @csrf

        <p>
            <label>Nama Produk</label><br>
            <input type="text" name="nama" value="{{ old('nama') }}">

            @error('nama')
                <span style="color: red">{{ $message }}</span>
            @enderror
        </p>

        <p>
            <label>Harga Produk</label><br>
            <input type="number" name="harga" value="{{ old('harga') }}">

            @error('harga')
                <span style="color: red">{{ $message }}</span>
            @enderror
        </p>

        <button type="submit">Simpan Produk</button>
    </form>

    <p><a href="{{ route('produk.index') }}">Kembali ke Daftar Produk</a></p>
@endsection
