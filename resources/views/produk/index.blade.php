@extends('layouts.app')

@section('title', 'Daftar Produk')

@section('content')
    
<x-kartu>
    <x-slot:judul>Contoh Kartu Produk</x-slot:judul>
    Harga Keyboard Rp 150.000
</x-kartu>

    <h1>Daftar Produk</h1>
    
    
    <p>
        Harga normal:
        <x-harga-produk :nilai="150000" />
    </p>

    <p>
        Harga setelah diskon:
        <x-harga-produk :nilai="150000" :diskon="true" />
    </p>

    
    <x-alert tipe="success">
        Data produk berhasil ditampilkan.
    </x-alert>

    <table border="1">
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Harga</th>
            <th>Stok</th>
            <th>Aksi</th>
        </tr>

        @forelse ($produk as $p)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $p['nama'] }}</td>
                <td>Rp {{ number_format($p['harga'], 0, ',', '.') }}</td>
                <td>
                    @if ($p['stok'] > 10)
                        Aman
                    @elseif ($p['stok'] > 0)
                        Menipis
                    @else
                        Habis
                    @endif
                </td>
                <td>
                    <a href="{{ route('produk.show', $p['id']) }}">Detail</a>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="5">Belum ada produk.</td>
            </tr>
        @endforelse
    </table>
@endsection

@push('scripts')
    <script>
        console.log('produk dimuat');
    </script>
@endpush
