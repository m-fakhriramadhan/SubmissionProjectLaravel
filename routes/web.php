<?php

use App\Http\Controllers\JurusanController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\ProductController;

use App\Http\Controllers\MatakuliahController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/sapa', function () {
    return 'Selamat datang di Aplikasi Perpustakaan Kampus!';
});

Route::get('/tanggal', fn () => now()->translatedFormat('l, d F Y'));

Route::get('/info', fn () => [
    'aplikasi' => 'Perpustakaan Kampus',
    'versi' => '1.0',
    'framework' => 'Laravel 13',
]);

Route::get('/anggota/{nama}', function (string $nama) {
    return "Anggota perpustakaan: {$nama}";
});

Route::get('/rak/{genre?}', function (?string $genre = 'umum') {
    return "Menampilkan rak buku genre: {$genre}";
});

Route::get('/buku/{kategori}/tahun/{tahun}', function (string $kategori, int $tahun) {
    return "Buku kategori {$kategori} terbitan tahun {$tahun}";
});

Route::get('/peminjaman/{id}', function (int $id) {
    return "Detail peminjaman nomor {$id}";
})->whereNumber('id');

Route::get('/penulis/{nama}', function (string $nama) {
    return "Penulis: {$nama}";
})->whereAlpha('nama');

Route::get('/isbn/{isbn}', function (string $isbn) {
    return "ISBN: {$isbn}";
})->where('isbn', '[0-9]{13}');

Route::get('/status/{status}', function (string $status) {
    return "Status peminjaman: {$status}";
})->whereIn('status', ['dipinjam', 'dikembalikan', 'terlambat']);

Route::view('/layanan', 'layanan')->name('layanan');

Route::get('/bantuan', function () {
    return view('bantuan', ['telepon' => '(024) 1234567']);
})->name('bantuan');

Route::prefix('petugas')->name('petugas.')->group(function () {

    Route::get('/beranda', fn () => 'Beranda Petugas')
        ->name('beranda');

    Route::get('/laporan', fn () => 'Laporan Peminjaman')
        ->name('laporan');

    Route::get('/anggota/{id}', fn (int $id) => "Detail anggota #{$id}")
    ->whereNumber('id')
    ->name('anggota');
});

Route::redirect('/home', '/');

Route::permanentRedirect('/katalog-lama', '/info');

//controller & blade
Route::get('/produk', [ProdukController::class, 'index'])
    ->name('produk.index');

Route::get('/produk/{id}', [ProdukController::class, 'show'])
    ->name('produk.show');



Route::get('/produk/tambah', [ProdukController::class, 'create'])
    ->name('produk.create');

Route::post('/produk', [ProdukController::class, 'store'])
    ->name('produk.store');


/*Route::get('products',[ProductController::class,'index']);

Route::get('products/{id}',funtion ($id) {
    return 'Produk #'. $id;
});*/

//pertemuan 6
Route::get('/jurusan', [JurusanController::class, 'index'])
    ->name('jurusan.index');

Route::get('/jurusan/create', [JurusanController::class, 'create'])
    ->name('jurusan.create');

Route::post('/jurusan', [JurusanController::class, 'store'])
    ->name('jurusan.store');


Route::get('/jurusan/{id}', [JurusanController::class, 'show']);

Route::get('/products/{id}',[ProductController::class,'show']);

// PENGELOLAAN DATA MATA KULIAH

Route::get('/matakuliah', [MatakuliahController::class, 'index'])
    ->name('matakuliah.index');

Route::get('/matakuliah/create', [MatakuliahController::class, 'create'])
    ->name('matakuliah.create');

Route::post('/matakuliah', [MatakuliahController::class, 'store'])
    ->name('matakuliah.store');

Route::get('/matakuliah/{id}', [MatakuliahController::class, 'show'])
    ->name('matakuliah.show');

Route::fallback(function () {
    return response('Maaf, halaman yang Anda cari tidak tersedia.', 404);
});