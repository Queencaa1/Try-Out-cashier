<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use App\Models\Pelanggan;
use App\Http\Requests\StorePelangganRequest;
use App\Http\Requests\UpdatePelangganRequest;
use Exception;
use App\Imports\PelangganImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\PelangganExport;
use Barryvdh\DomPDF\Facade\Pdf;
// use App\Models\pelanggan;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use PDOException;
use Illuminate\Http\Request;


class PelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pelanggan = Pelanggan::latest()->get();
        return view('pelanggan.index', compact('pelanggan'));
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

    public function store(StorePelangganRequest $request)
    {

        $validated = $request->validated();
        DB::beginTransaction();
        // dd($request->file('foto'));
        // $foto = $request->file('foto');
        // Storage::put('foto/'.$request->file('foto'));
        // $foto->storeAs('gg', $foto->getClientOriginalName());
        Pelanggan::create($request->all());
        DB::commit();
        return redirect()->back()->with('success', 'Data berhasil ditambahkan');
    }
    // public function store(StorePelangganRequest $request)
    // {
    //     $validated = $request->validated();
    //     DB::beginTransaction();
    //     $foto=$request->file('foto');
    //     $foto -> storeAs('foto'. $foto -> getClientOriginalName());
    //     // $foto->storeAs('foto', $foto->getClientOriginalName());
    //     pelanggan::create($request->all());
    //     DB::commit();
    //     return redirect()->back()->with('success', 'Data berhasil di tambahakan');
    // }

    /**s
     * Display the specified resource.
     */
    public function show(Pelanggan $pelanggan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pelanggan $pelanggan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePelangganRequest $request, $pelanggan)
    {
        try {
            DB::beginTransaction();
            $pelanggan = pelanggan::findOrFail($pelanggan);
            $validate = $request->validated();
            $pelanggan->update($validate);
            DB::commit();
            return redirect()->back()->with('success', 'data berhasil di ubah');
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['message' => 'terjadi kesalahan']);
        }
    }
    public function destroy(Pelanggan $pelanggan)
    {
        try {
            $pelanggan->delete();
            return redirect('/pelanggan')->with('success', 'Data berhasil dihapus!');
        } catch (QueryException | Exception | PDOException $error) {
            $this->failResponse($error->getMessage(), $error->getCode());
        }
    }

    public function generatepdf()
    {
        $pelanggan = pelanggan::all();
        // $pdf = Pdf::loadView('pelanggan.data', compact('pelanggan'));
        // return $pdf->download('pelanggan.pdf');
        $pdf = PDF::loadView('pelanggan.pdf');
        return $pdf->download('pelanggan.pdf');
    }
     
    public function exportData()
    {
        $date = date('Y-m-d');
        return excel::download(new PelangganExport, $date . 'pelanggan.xlsx');
    }

    public function importData(Request $request){
        Excel::import(new PelangganImport, $request->import);
        return redirect()->back()->with('success', 'Import Data Pelanggan Berhasil');
       
    }
}