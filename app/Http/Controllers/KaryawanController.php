<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use App\Models\Karyawan;
use App\Http\Requests\StoreKaryawanRequest;
use App\Http\Requests\UpdateKaryawanRequest;
use Exception;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\KaryawanExport;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use PDOException;
use Illuminate\Http\Request;
use App\Imports\KaryawanImport;

class KaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $karyawan = Karyawan::latest()->get();
        return view('karyawan.index', compact('karyawan'));
        
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

    public function store(StoreKaryawanRequest $request)
    {

        $validated = $request->validated();
        DB::beginTransaction();
        // dd($request->file('foto'));
        $foto = $request->file('foto');
        // Storage::put('foto/'.$request->file('foto'));
        $foto->storeAs('gg', $foto->getClientOriginalName());
        Karyawan::create($request->all());
        DB::commit();
        return redirect()->back()->with('success', 'Data berhasil ditambahkan');
    }
    // public function store(StoreKaryawanRequest $request)
    // {
    //     $validated = $request->validated();
    //     DB::beginTransaction();
    //     $foto=$request->file('foto');
    //     $foto -> storeAs('foto'. $foto -> getClientOriginalName());
    //     // $foto->storeAs('foto', $foto->getClientOriginalName());
    //     karyawan::create($request->all());
    //     DB::commit();
    //     return redirect()->back()->with('success', 'Data berhasil di tambahakan');
    // }

    /**s
     * Display the specified resource.
     */
    public function show(Karyawan $karyawan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Karyawan $karyawan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateKaryawanRequest $request, $karyawan)
    {
        try {
            DB::beginTransaction();
            $karyawan = karyawan::findOrFail($karyawan);
            $validate = $request->validated();
            $karyawan->update($validate);
            DB::commit();
            return redirect()->back()->with('success', 'data berhasil di ubah');
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['message' => 'terjadi kesalahan']);
        }
    }
    public function destroy(Karyawan $karyawan)
    {
        try {
            $karyawan->delete();
            return redirect('/karyawan')->with('success', 'Data berhasil dihapus!');
        } catch (QueryException | Exception | PDOException $error) {
            $this->failResponse($error->getMessage(), $error->getCode());
        }
    }

    public function generatepdf()
    {
        
        $karyawan = karyawan::all();
        $pdf = Pdf::loadView('karyawan.pdf', compact('karyawan'));
        return $pdf->download('karyawan.pdf');
    }
     
    public function exportData()
    {
        $date = date('Y-m-d');
        return excel::download(new KaryawanExport, $date . 'karyawan.xlsx');
    }

    public function importData(Request $request){
        Excel::import(new KaryawanImport, $request->import);
        return redirect()->back()->with('success', 'Import Data Karyawan Berhasil');
       
    }
}