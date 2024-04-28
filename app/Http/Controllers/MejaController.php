<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use App\Models\Meja;
use App\Http\Requests\StoreMejaRequest;
use App\Http\Requests\UpdateMejaRequest;
use Exception;
use App\Imports\MejaImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\MejaExport;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use PDOException;
use Illuminate\Http\Request;

class MejaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $meja = Meja::latest()->get();
        return view('meja.index', compact('meja'));
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

    public function store(StoreMejaRequest $request)
    {

        $validated = $request->validated();
        DB::beginTransaction();
        // dd($request->file('foto'));
        // $foto = $request->file('foto');
        // Storage::put('foto/'.$request->file('foto'));
        // $foto->storeAs('gg', $foto->getClientOriginalName());
        Meja::create($request->all());
        DB::commit();
        return redirect()->back()->with('success', 'Data berhasil ditambahkan');
    }
    // public function store(StoreMejaRequest $request)
    // {
    //     $validated = $request->validated();
    //     DB::beginTransaction();
    //     $foto=$request->file('foto');
    //     $foto -> storeAs('foto'. $foto -> getClientOriginalName());
    //     // $foto->storeAs('foto', $foto->getClientOriginalName());
    //     meja::create($request->all());
    //     DB::commit();
    //     return redirect()->back()->with('success', 'Data berhasil di tambahakan');
    // }

    /**s
     * Display the specified resource.
     */
    public function show(Meja $meja)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Meja $meja)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMejaRequest $request, $meja)
    {
        try {
            DB::beginTransaction();
            $meja = meja::findOrFail($meja);
            $validate = $request->validated();
            $meja->update($validate);
            DB::commit();
            return redirect()->back()->with('success', 'data berhasil di ubah');
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['message' => 'terjadi kesalahan']);
        }
    }
    public function destroy(Meja $meja)
    {
        try {
            $meja->delete();
            return redirect('/meja')->with('success', 'Data berhasil dihapus!');
        } catch (QueryException | Exception | PDOException $error) {
            $this->failResponse($error->getMessage(), $error->getCode());
        }
    }

    public function generatepdf()
    {
        $meja = meja::all();
        $pdf = Pdf::loadView('meja.pdf', compact('meja'));
        return $pdf->download('meja.pdf');
    }
     
    public function exportData()
    {
        $date = date('Y-m-d');
        return excel::download(new MejaExport, $date . 'meja.xlsx');
    }

    public function importData(Request $request){
        Excel::import(new MejaImport, $request->import);
        return redirect()->back()->with('success', 'Import Data Meja Berhasil');
       
    }
}