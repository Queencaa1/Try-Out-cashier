<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use App\Models\Menu;
use App\Http\Requests\StoreMenuRequest;
use App\Http\Requests\UpdateMenuRequest;
use Exception;
use App\Imports\MenuImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\MenuExport;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use PDOException;
use Illuminate\Http\Request;
use App\Models\Jenis;
use Illuminate\Support\Facades\Validator as FacadesValidator;


class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    $jenis = Jenis::orderBy('created_at', 'DESC')->get(); // Mendapatkan data jenis
    $menu = Menu::with('jenis')->get();
    return view('menu.index', compact('jenis', 'menu')); // Menggunakan compact untuk menyertakan variabel $jenis
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

    public function store(StoreMenuRequest $request)
    {

        $validated = $request->validated();
        DB::beginTransaction();
        $menu=Menu::create($request->all());

        //mendapatkan file yang di unggah
        $file = $request->file('image');
        //menyimpan file ke direktor penyimpanan
        $file_name = $file->getClientOriginalName();
        $file_path = $file->storeAs('ya/scripts', $file_name);
        //simpan nama file ke dalam kolom image ke database
        $menu->image = $file_path;
        $menu->save();
        // dd($request->file('foto'));
        // $foto = $request->file('foto');
        // Storage::put('foto/'.$request->file('foto'));
        // $foto->storeAs('gg', $foto->getClientOriginalName());
        
        DB::commit();
        return redirect()->back()->with('success', 'Data berhasil ditambahkan');
    }
    // public function store(StoreMenuRequest $request)
    // {
    //     $validated = $request->validated();
    //     DB::beginTransaction();
    //     $foto=$request->file('foto');
    //     $foto -> storeAs('foto'. $foto -> getClientOriginalName());
    //     // $foto->storeAs('foto', $foto->getClientOriginalName());
    //     menu::create($request->all());
    //     DB::commit();
    //     return redirect()->back()->with('success', 'Data berhasil di tambahakan');
    // }

    /**s
     * Display the specified resource.
     */
    public function show(Menu $menu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Menu $menu)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMenuRequest $request, $menu)
    {
        try {
            DB::beginTransaction();
            $menu = menu::findOrFail($menu);
            $validate = $request->validated();
            $menu->update($validate);
            DB::commit();
            return redirect()->back()->with('success', 'data berhasil di ubah');
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['message' => 'terjadi kesalahan']);
        }
    }
    public function destroy(Menu $menu)
    {
        try {
            $menu->delete();
            return redirect('/menu')->with('success', 'Data berhasil dihapus!');
        } catch (QueryException | Exception | PDOException $error) {
            $this->failResponse($error->getMessage(), $error->getCode());
        }
    }

    public function generatepdf()
    {
        $menu = menu::all();
        $pdf = Pdf::loadView('menu.pdf', compact('menu'));
        return $pdf->download('menu.pdf');
    }
     
    public function exportData()
    {
        $date = date('Y-m-d');
        return excel::download(new MenuExport, $date . 'menu.xlsx');
    }

    public function importData(Request $request){
        Excel::import(new MenuImport, $request->import);
        return redirect()->back()->with('success', 'Import Data menu Berhasil');
       
    }
}