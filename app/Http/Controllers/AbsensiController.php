<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use App\Models\Absensi;
use App\Http\Requests\StoreAbsensiRequest;
use App\Http\Requests\UpdateAbsensiRequest;
use Exception;
use App\Imports\AbsensiImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\AbsensiExport;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use PDOException;
use Illuminate\Http\Request;

class AbsensiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $absensi = Absensi::all();
        // $absensi = Absensi::latest()->get();
        return view('absensi.index', compact('absensi'));
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

    public function store(StoreAbsensiRequest $request)
    {

        $validated = $request->validated();
        DB::beginTransaction();
        absensi::create($request->all());
        DB::commit();
        return redirect()->back()->with('success', 'Data berhasil ditambahkan');
    }
   
    public function show(Absensi $absensi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
{
    $absensi = Absensi::findOrFail($id);
    return view('absensi.edit', compact('absensi'));
}


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $absensi = Absensi::findOrFail($id);
        $absensi->status = $request->status;
        // Lakukan validasi dan operasi lain jika diperlukan
        $absensi->save();
    
        return redirect()->route('absensi.index')->with('success', 'Absensi berhasil diperbarui.');
    }
    public function destroy(Absensi $absensi)
    {
        try {
            $absensi->delete();
            return redirect('/absensi')->with('success', 'Data berhasil dihapus!');
        } catch (QueryException | Exception | PDOException $error) {
            $this->failResponse($error->getMessage(), $error->getCode());
        }
    }

    public function generatepdf()
    {
        $absensi = absensi::all();
        $pdf = Pdf::loadView('absensi.pdf', compact('absensi'));
        return $pdf->download('absensi.pdf');
    }
     
    public function exportData()
    {
        $date = date('Y-m-d');
        return excel::download(new AbsensiExport, $date . 'absensi.xlsx');
    }

    public function importData(Request $request){
        Excel::import(new AbsensiImport, $request->import);
        return redirect()->back()->with('success', 'Import Data Absensi Berhasil');
       
    }
}