@extends('layouts.app')

@section('title', 'Detail Produk')

@section('content')
    <h1>Detail Produk</h1>

    <p>ID Produk: {{ $id }}</p>

    <a href="{{ route('produk.index') }}">
        Kembali ke Daftar Produk
    </a>
@endsection
