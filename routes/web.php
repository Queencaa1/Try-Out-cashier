<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\PemesananController;
use App\Http\Controllers\JenisController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\MejaController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProdukTitipanController;
use App\Http\Controllers\TentangController;




Route::get('/',[HomeController::class, 'index']);
Route::resource('karyawan', KaryawanController::class);
Route::resource('pemesanan', PemesananController::class);
Route::resource('jenis', JenisController::class);
Route::resource('transaksi', TransaksiController::class);
Route::resource('menu', MenuController::class);
Route::resource('pelanggan', PelangganController::class);
Route::resource('meja', MejaController::class);
Route::resource('produkTitipan', ProdukTitipanController::class);
Route::get('/tentang', [TentangController::class, 'index']);




Route::get('nota/{nofaktur}', [TransaksiController::class, 'faktur']);

// Transaksi
Route::get('generate/transaksi', [TransaksiController::class, 'generatepdf'])->name('hiu');
Route::get('export/transaksi', [TransaksiController::class, 'exportData'])->name('ratna');
Route::post('transaksi/import', [TransaksiController::class, 'importData'])->name('import');

// Pelanggan
Route::get('generate/pelanggan', [PelangganController::class, 'generatepdf'])->name('hiu');
Route::get('export/pelanggan', [PelangganController::class, 'exportData'])->name('ratna');
Route::post('pelanggan/import', [PelangganController::class, 'importData'])->name('import');

// Karyawan
Route::get('generate/karyawan', [KaryawanController::class, 'generatepdf'])->name('hiu');
Route::get('export/karyawan', [KaryawanController::class, 'exportData'])->name('ratna');
Route::post('karyawan/import', [KaryawanController::class, 'importData'])->name('import');

// Meja
Route::get('generate/meja', [MejaController::class, 'generatepdf'])->name('hiu');
Route::get('export/meja', [MejaController::class, 'exportData'])->name('ratna');
Route::post('meja/import', [MejaController::class, 'importData'])->name('import-meja');


// Pelanggan
Route::get('generate/pelanggan', [PelangganController::class, 'generatepdf'])->name('hiu');
Route::get('export/pelanggan', [PelangganController::class, 'exportData'])->name('ratna');
Route::post('pelanggan/import', [PelangganController::class, 'importData'])->name('import');

// Menu
Route::get('generate/menu', [MenuController::class, 'generatepdf'])->name('hiu');
Route::get('export/menu', [MenuController::class, 'exportData'])->name('ratna');
Route::post('menu/import', [MenuController::class, 'importData'])->name('import');

// Jenis
Route::get('generate/jenis', [JenisController::class, 'generatepdf'])->name('hiu');
Route::get('export/jenis', [JenisController::class, 'exportData'])->name('ratna');
Route::post('jenis/import', [JenisController::class, 'importData'])->name('import');

// Stok
Route::get('generate/stok', [StokController::class, 'generatepdf'])->name('hiu');
Route::get('export/stok', [StokController::class, 'exportData'])->name('ratna');
Route::post('stok/import', [StokController::class, 'importData'])->name('import');

//login
Route::get('/login', [UserController::class, 'index'])->name('login');
Route::post('/login/cek', [UserController::class, 'cekLogin'])->name('cekLogin');
Route::get('/logout', [UserController::class, 'logout'])->name('logout');

// produk titipan
Route::get('generate/produkTitipan', [ProdukTitipanController::class, 'generatepdf'])->name('hiu');
Route::get('export/produkTitipan', [ProdukTitipanController::class, 'exportData'])->name('ratna');
Route::post('produkTitipan/import', [ProdukTitipanController::class, 'importData'])->name('import');









