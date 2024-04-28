<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use App\Models\ProdukTitipan;
use App\Http\Requests\StoreProdukTitipanRequest;
use App\Http\Requests\UpdateProdukTitipanRequest;
use Exception;
use App\Imports\ProdukTitipanImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ProdukTitipanExport;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use PDOException;
use Illuminate\Http\Request;

class ProdukTitipanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $produkTitipan = ProdukTitipan::latest()->get();
        return view('produkTitipan.index', compact('produkTitipan'));
        // catch (QueryException)
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

    public function store(StoreProdukTitipanRequest $request)
    {

        $data = $request->all();
        $data['harga_jual'] = $this->hitungHargaJual($request->input('harga_beli'));

        produkTitipan::create($data);
        return redirect('produkTitipan')->with('success', 'Data Product berhasil di tambahkan!');
        
        $validated = $request->validated();
        DB::beginTransaction();
        // dd($request->file('foto'));
        $foto = $request->file('foto');
       
        ProdukTitipan::create($request->all());
        DB::commit();
        return redirect()->back()->with('success', 'Data berhasil ditambahkan');
    }
    // public function store(StoreProdukTitipanRequest $request)
    // {
    //     $validated = $request->validated();
    //     DB::beginTransaction();
    //     $foto=$request->file('foto');
    //     $foto -> storeAs('foto'. $foto -> getClientOriginalName());
    //     // $foto->storeAs('foto', $foto->getClientOriginalName());
    //     ProdukTitipan::create($request->all());
    //     DB::commit();
    //     return redirect()->back()->with('success', 'Data berhasil di tambahakan');
    // }

    /**s
     * Display the specified resource.
     */
    public function show(ProdukTitipan $produkTitipan)
    {
        //
    }

    private function hitungHarga_jual($harga_beli)
    {
        $keuntungan = $harga_beli * 1.7;
        $harga_jual = ceil($keuntungan / 500) * 500;
        return $harga_jual;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProdukTitipan $produkTitipan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProdukTitipanRequest $request, $produkTitipan)
    {
        try {
            DB::beginTransaction();
            $produkTitipan = ProdukTitipan::findOrFail($produkTitipan);
            $validate = $request->validated();
            $produkTitipan->update($validate);
            DB::commit();
            return redirect()->back()->with('success', 'data berhasil di ubah');
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['message' => 'terjadi kesalahan']);
        }
    }
    public function destroy(ProdukTitipan $produkTitipan)
    {
        try {
            $produkTitipan->delete();
            return redirect('/produkTitipan')->with('success', 'Data berhasil dihapus!');
        } catch (QueryException | Exception | PDOException $error) {
            $this->failResponse($error->getMessage(), $error->getCode());
        }
    }

    public function generatepdf()
    {
        $produkTitipan = produkTitipan::all();
        $pdf = Pdf::loadView('produkTitipan.pdf', compact('produkTitipan'));
        return $pdf->download('produkTitipan.pdf');
    }
     
    public function exportData()
    {
        $date = date('Y-m-d');
        return excel::download(new ProdukTitipanExport, $date . 'ProdukTitipan.xlsx');
    }

    public function importData(Request $request){
        Excel::import(new ProdukTitipanImport, $request->import);
        return redirect()->back()->with('success', 'Import Data ProdukTitipan Berhasil');
       
    }
}