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
use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\FromController;
use App\Http\Controllers\StokController;
use App\Http\Controllers\RegisterController;






Route::get('home', [HomeController::class, 'index']);
Route::get('totalPendapatan/{lastCount}', 'HomeController@totalPendapatan');
Route::resource('karyawan', KaryawanController::class);
Route::resource('pemesanan', PemesananController::class);
Route::resource('jenis', JenisController::class);
Route::resource('transaksi', TransaksiController::class);
Route::resource('menu', MenuController::class);
Route::resource('stok', StokController::class);
Route::resource('pelanggan', PelangganController::class);
Route::resource('meja', MejaController::class);
Route::resource('produkTitipan', ProdukTitipanController::class);
Route::resource('absensi', AbsensiController::class);
Route::get('/tentang', [TentangController::class, 'index']);
Route::get('/contactUs', [ContactUsController::class, 'index']);
Route::resource('/send_email', FromController::class);
Route::post('/submit-form', 'FormController@submitForm');

Route::resource('/register', RegisterController::class);





Route::get('nota/{nofaktur}', [TransaksiController::class, 'faktur']);

// Transaksi
Route::get('generate/transaksi', [TransaksiController::class, 'generatepdf'])->name('transaksi-pdf');
Route::get('export/transaksi', [TransaksiController::class, 'exportData'])->name('transaksiexcel');
Route::post('transaksi/import', [TransaksiController::class, 'importData'])->name('ikan');

// Karyawan
Route::get('generate/karyawan', [KaryawanController::class, 'generatepdf'])->name('karyawan-pdf');
Route::get('export/karyawan', [KaryawanController::class, 'exportData'])->name('karyawanexcel');
Route::post('karyawan/import', [KaryawanController::class, 'importData'])->name('ikan');

// Meja
Route::get('generate/meja', [MejaController::class, 'generatepdf'])->name('meja-pdf');
Route::get('export/meja', [MejaController::class, 'exportData'])->name('mejaexcel');
Route::post('meja/import', [MejaController::class, 'importData'])->name('ikan');


// Pelanggan
Route::get('generate/pelanggan', [PelangganController::class, 'generatepdf'])->name('pelanggan-pdf');
Route::get('export/pelanggan', [PelangganController::class, 'exportData'])->name('pelangganexcel');
Route::post('pelanggan/import', [PelangganController::class, 'importData'])->name('ikan');

// Menu
Route::get('generate/menu', [MenuController::class, 'generatepdf'])->name('menu-pdf');
Route::get('export/menu', [MenuController::class, 'exportData'])->name('menuexcel');
Route::post('menu/import', [MenuController::class, 'importData'])->name('ikan');

// Jenis
Route::get('generate/jenis', [JenisController::class, 'generatepdf'])->name('jenis-pdf');
Route::get('export/jenis', [JenisController::class, 'exportData'])->name('jenisexcel');
Route::post('jenis/import', [JenisController::class, 'importData'])->name('ikan');

// Stok
Route::get('generate/stok', [StokController::class, 'generatepdf'])->name('stok-pdf');
Route::get('export/stok', [StokController::class, 'exportData'])->name('stokexcel');
Route::post('stok/import', [StokController::class, 'importData'])->name('ikan');


//login
Route::get('/login', [UserController::class, 'index'])->name('login');
Route::post('/login/cek', [UserController::class, 'cekLogin'])->name('cekLogin');
Route::get('/logout', [UserController::class, 'logout'])->name('logout');

Route::group(['middleware' => 'auth'], function() {
    // Rute untuk halaman beranda, profil, dan kontak
    Route::get('/', [HomeController::class, 'index']);
    Route::get('profile', [HomeController::class, 'profile']);
    Route::get('contact', [HomeController::class, 'contact']);
    Route::resource('menu', MenuController::class);
    Route::resource('karyawan', KaryawanController::class);
    Route::resource('jenis', JenisController::class);
    Route::resource('pelanggan', PelangganController::class);
    Route::resource('transaksi', TransaksiController::class);
    Route::resource('produkTitipan', ProdukTitipanController::class);
    Route::resource('absensi', AbsensiController::class);

    // Rute untuk admin
    Route::group(['middleware' => ['cekUserLogin:1']], function(){
        Route::resource('pemesanan', PemesananController::class);
    });

    // Rute untuk pengguna biasa
    Route::group(['middleware' => ['cekUserLogin:2']], function(){
        Route::resource('pemesanan', PemesananController::class);
    });
});

// produk titipan
Route::get('generate/produkTitipan', [ProdukTitipanController::class, 'generatepdf'])->name('hiu');
Route::get('export/produkTitipan', [ProdukTitipanController::class, 'exportData'])->name('ratna');
Route::post('produkTitipan/import', [ProdukTitipanController::class, 'importData'])->name('import');

// absensi
Route::get('generate/absensi', [AbsensiController::class, 'generatepdf'])->name('absensi-pdf');
Route::get('export/absensi', [AbsensiController::class, 'exportData'])->name('absensiexcel');
Route::post('absensi/import', [AbsensiController::class, 'importData'])->name('ikan');

//tampilanpdf
// Route::get('/generate-pdf', [PdfController::class, 'generatePdf'])->name('pelanggan-pdf');










