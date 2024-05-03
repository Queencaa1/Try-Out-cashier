<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use App\Models\Transaksi;
use App\Models\DetailTransaksi;
use App\Http\Requests\TransaksiRequest;
use Exception;

use App\Imports\TransaksiImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\TransaksiExport;
use Barryvdh\DomPDF\Facade\Pdf;

use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use PDOException;

use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $transaksi = Transaksi::latest()->get();
        return view('transaksi.index', compact('transaksi'));
    
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

    public function store(TransaksiRequest $request)
{
    try {
        $validated = $request->validated();
        $last_id = Transaksi::whereDate('tanggal', today())->orderBy('id', 'desc')->first();
        $last_id_number = $last_id ? substr($last_id->id, 8) : 0;
        $notrans = today()->format('Ymd') . str_pad($last_id_number + 1, 4, '0', STR_PAD_LEFT);
        
        DB::beginTransaction();
        
        $insertTransaksi = Transaksi::create([
            'id' => $notrans,
            'tanggal' => date('Y-m-d'),
            'total_harga' => $validated['total'],
            'metode_pembayaran' => 'cash',
            'keterangan' => ''
        ]);

        // input detail transaksi
        foreach ($validated['orderedList'] as $detail) {
            // dd($detail);
             DetailTransaksi::create([
                'transaksi_id' => $insertTransaksi->id,
                'menu_id' => $detail['menu_id'],
                'jumlah' => $detail['qty'],
                'subtotal' => $detail['harga'] * $detail['qty'] // Fixing this line
            ]);
            
        }

        DB::commit();
        return response()->json(['status' => true, 'message' => 'Pemesanan berhasil', 'notrans'=>$notrans]);
    } catch (Exception | QueryException | PDOException $e) {
        DB::rollBack();
        return response()->json(['status' => false, 'message' => 'Pemesanan gagal', 'error' => $e->getMessage()]);
    }
}
     public function faktur($nofaktur){
         try{
             $data['transaksi'] = Transaksi::where('id', $nofaktur)->with(['detailTransaksi' =>function($query){
                 $query->with('menu');
             }])->first();

             return view('cetak.faktur')->with($data);
         }
         catch (Exception | QueryException | PDOException $e){ 
             dd($e);
            return response()->json(['status' => false, 'message' => 'Pemesanan gagal']);
         }
        //  $data = transaksi::where('id', $nofaktur)->with(['DetailTransaksi'])->first();
        
     }
    

    /**s
     * Display the specified resource.
     */
    public function show(Transaksi $transaksi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Transaksi $transaksi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTransaksiRequest $request, $transaksi)
    {
        try {
            DB::beginTransaction();
            $transaksi = transaksi::findOrFail($transaksi);
            $validate = $request->validated();
            $transaksi->update($validate);
            DB::commit();
            return redirect()->back()->with('success', 'data berhasil di ubah');
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['message' => 'terjadi kesalahan']);
        }
    }
    public function destroy(Transaksi $transaksi)
    {
        try {
            $transaksi->delete();
            return redirect('/transaksi')->with('success', 'Data berhasil dihapus!');
        } catch (QueryException | Exception | PDOException $error) {
            $this->failResponse($error->getMessage(), $error->getCode());
        }
    }

    public function idGen()
    {
        $notransToday = now() -> format('Ymd');
        $lastCustomID = Transaksi::where('tanggal', $notransToday)->orderBy('id')->first();

        if($lastCustomID){
            $lastId = substr($lastCustomID->id, -4);
            $newId = $notransToday . str_pad((intval($lastId) + 1), 4, '0', STR_PAD_LET);
        }else {
            $newId = $notransToday . '0001';
        }
        return $newId;
    }
    public function generatepdf()
    {
        $transaksi = transaksi::all();
        $pdf = Pdf::loadView('transaksi.pdf', compact('transaksi'));
        return $pdf->download('transaksi.pdf');
    }
     
    public function exportData()
    {
        $date = date('Y-m-d');
        return excel::download(new TransaksiExport, $date . 'transaksi.xlsx');
    }

    public function importData(Request $request){
        // $import = new TransaksiImport();
        // Excel::import($import, request()->file('import'));
        // return redirect(request()->segment(1). '/transaksi')->with('success', 'Import data transaksi berhasil!');

        Excel::import(new TransaksiImport, $request->import);
        return redirect()->back()->with('success', 'Import Data Transaksi Berhasil');
    }
    
    
}