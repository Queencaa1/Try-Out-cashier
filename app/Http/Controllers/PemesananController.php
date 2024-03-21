<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use App\Models\Pemesanan;
use App\Http\Requests\StorePemesananRequest;
use App\Http\Requests\UpdatePemesananRequest;
use Exception;
use App\Import\PemesananImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\PemesananExport;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\jenis;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use PDOException;


class PemesananController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $pemesanan = Pemesanan::latest()->get();
        // return view('pemesanan.index', compact('pemesanan'));
        // // catch (QueryException)

        $data['jenis'] = jenis::with(['menu'])->get();
        // dd($data['jenis']);
        return view('pemesanan.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(StorePemesananRequest $request)
    {

        $data['pemesanan'] = Pemesanan::orderBy('created_at', 'DESC')->get();
        $jenis = Jenis::all();
        return view('pemesanan.index', compact('data', 'jenis'));
    }
   
    /**s
     * Display the specified resource.
     */
    public function show(Pemesanan $pemesanan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pemesanan $pemesanan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePemesananRequest $request, $pemesanan)
    {
        try {
            DB::beginTransaction();
            $pemesanan = pemesanan::findOrFail($pemesanan);
            $validate = $request->validated();
            $pemesanan->update($validate);
            DB::commit();
            return redirect()->back()->with('success', 'data berhasil di ubah');
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['message' => 'terjadi kesalahan']);
        }
    }
    public function destroy(Pemesanan $pemesanan)
    {
        try {
            $pemesanan->delete();
            return redirect('/pemesanan')->with('success', 'Data berhasil dihapus!');
        } catch (QueryException | Exception | PDOException $error) {
            $this->failResponse($error->getMessage(), $error->getCode());
        }
    }

    public function generatepdf()
    {
        $pemesanan = pemesanan::all();
        $pdf = Pdf::loadView('pemesanan.data', compact('pemesanan'));
        return $pdf->download('pemesanan.pdf');
    }
     
    public function exportData()
    {
        $date = date('Y-m-d');
        return excel::download(new PemesananExport, $date . 'pemesanan.xlsx');
    }

    public function import(Request $request)
    {
        $request->validate([
            'import' => 'required|mimes:xlsx,xls|max:2048', // Validasi file Excel
            'jenis_id' => 'required|exists:jenis,id', // Validasi jenis_id
        ]);
    
        $file = $request->file('import');
        $jenis_id = $request->jenis_id;
    
        // Proses menyimpan data dari file Excel ke dalam database
        // Anda perlu menggunakan library seperti Maatwebsite\Excel atau PHPExcel
        // Setelah itu, Anda dapat memproses data dan menyimpannya ke dalam tabel produk
    
        // Misalnya, Anda menyimpan data produk ke dalam tabel 'produk' dengan jenis_id yang sesuai
        foreach ($dataMenu as $menu) {
            Menu::create([
                'nama_menu' => $menu['nama_menu'],
                'harga' => $menu['harga'],
                'image' => $menu['image'],
                'deskrpsi' => $menu['deskrpsi'],
                'jenis_id' => $jenis_id,
                // Tambahkan kolom lain yang diperlukan
            ]);
        }
    
        // Setelah menyimpan produk, Anda bisa memasukkan produk ke dalam pemesanan
        // Lakukan proses ini sesuai kebutuhan aplikasi Anda
    
        // Tampilkan notifikasi bahwa impor berhasil dilakukan
        return redirect()->back()->with('success', 'Import berhasil dilakukan.');
    }
    
}