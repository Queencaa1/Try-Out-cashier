<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use App\Models\DetailTransaksi;
use App\Http\Requests\StoreDetailTransaksiRequest;
use App\Http\Requests\UpdateDetailTransaksiRequest;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use PDOException;

class DetailTransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $detailTransaksi = DetailTransaksi::latest()->get();
        return view('detailTransaksi.index', compact('detailTransaksi'));
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

    public function store(StoreDetailTransaksiRequest $request)
    {

        $validated = $request->validated();
        DB::beginTransaction();
        // dd($request->file('foto'));
        $foto = $request->file('foto');
        // Storage::put('foto/'.$request->file('foto'));
        $foto->storeAs('gg', $foto->getClientOriginalName());
        DetailTransaksi::create($request->all());
        DB::commit();
        return redirect()->back()->with('success', 'Data berhasil ditambahkan');
    }
    // public function store(StoreDetailTransaksiRequest $request)
    // {
    //     $validated = $request->validated();
    //     DB::beginTransaction();
    //     $foto=$request->file('foto');
    //     $foto -> storeAs('foto'. $foto -> getClientOriginalName());
    //     // $foto->storeAs('foto', $foto->getClientOriginalName());
    //     detailTransaksi::create($request->all());
    //     DB::commit();
    //     return redirect()->back()->with('success', 'Data berhasil di tambahakan');
    // }

    /**s
     * Display the specified resource.
     */
    public function show(DetailTransaksi $detailTransaksi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DetailTransaksi $detailTransaksi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDetailTransaksiRequest $request, $detailTransaksi)
    {
        try {
            DB::beginTransaction();
            $detailTransaksi = detailTransaksi::findOrFail($detailTransaksi);
            $validate = $request->validated();
            $detailTransaksi->update($validate);
            DB::commit();
            return redirect()->back()->with('success', 'data berhasil di ubah');
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['message' => 'terjadi kesalahan']);
        }
    }
    public function destroy(DetailTransaksi $detailTransaksi)
    {
        try {
            $detailTransaksi->delete();
            return redirect('/detailTransaksi')->with('success', 'Data berhasil dihapus!');
        } catch (QueryException | Exception | PDOException $error) {
            $this->failResponse($error->getMessage(), $error->getCode());
        }
    }
}