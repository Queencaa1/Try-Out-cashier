<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use App\Models\Stok;
use App\Models\Menu;
use App\Http\Requests\StoreStokRequest;
use App\Http\Requests\UpdateStokRequest;
use Exception;
use App\Imports\StokImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\StokExport;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use PDOException;

use Illuminate\Http\Request;


class StokController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $stok = Stok::all();
       try{
           $data['stok'] = Stok::with(['menu'])->get();
           $data['menu'] = Menu::get();
           return view('stok.index')->with($data);
       }catch (Exception $e){
           return redirect()->back()->withErrors(['message' => 'terjadi kesalagan']);
       }
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

    public function store(StoreStokRequest $request)
    {

        $validated = $request->validated();
        DB::beginTransaction();
        // dd($request->file('foto'));
        $foto = $request->file('foto');
        // Storage::put('foto/'.$request->file('foto'));
      
        Stok::create($request->all());
        DB::commit();
        return redirect()->back()->with('success', 'Data berhasil ditambahkan');
    }
    // public function store(StoreStokRequest $request)
    // {
    //     $validated = $request->validated();
    //     DB::beginTransaction();
    //     $foto=$request->file('foto');
    //     $foto -> storeAs('foto'. $foto -> getClientOriginalName());
    //     // $foto->storeAs('foto', $foto->getClientOriginalName());
    //     stok::create($request->all());
    //     DB::commit();
    //     return redirect()->back()->with('success', 'Data berhasil di tambahakan');
    // }

    /**s
     * Display the specified resource.
     */
    public function show(Stok $stok)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Stok $stok)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStokRequest $request, $stok)
    {
        try {
            DB::beginTransaction();
            $stok = stok::findOrFail($stok);
            $validate = $request->validated();
            $stok->update($validate);
            DB::commit();
            return redirect()->back()->with('success', 'data berhasil di ubah');
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['message' => 'terjadi kesalahan']);
        }
    }
    public function destroy(Stok $stok)
    {
        try {
            $stok->delete();
            return redirect('/stok')->with('success', 'Data berhasil dihapus!');
        } catch (QueryException | Exception | PDOException $error) {
            $this->failResponse($error->getMessage(), $error->getCode());
        }
    }
    public function generatepdf()
    {
        $stok = stok::all();
        $pdf = Pdf::loadView('stok.pdf', compact('stok'));
        return $pdf->download('stok.pdf');
    }
     
    public function exportData()
    {
        $date = date('Y-m-d');
        return excel::download(new StokExport, $date . 'stok.xlsx');
    }

    public function importData(Request $request){
        Excel::import(new StokImport, $request->import);
        return redirect()->back()->with('success', 'Import Data Stok Berhasil');
       
    }

    
}