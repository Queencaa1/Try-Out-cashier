<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Pelanggan;
use App\Models\Transaksi;
use App\Models\Stok;
use App\Models\DetailTransaksi;
use Carbon\Carbon;



class HomeController extends Controller
{
    public function index(Request $request)
    {
        $detailTransaksi = DetailTransaksi::all();
        $menu = Menu::get();
        $jumlahTransaksi = Transaksi::count();
        $jumlahMenu = $menu->count();

        $totalPendapatan = $detailTransaksi->groupBy(function ($date) {
            return Carbon::parse($date->created_at)->format('m/d');
        })->map(function ($groupedItems) {
            return $groupedItems->sum('subtotal');
        })->sum();

        $totalStok = $menu->map(function ($menu) {
            return $menu->stok()->sum('jumlah');
        })->sum();

        $menuSales = DetailTransaksi::select('menu_id', \DB::raw('SUM(jumlah) as total_sales'))
            ->with('menu')
            ->groupBy('menu_id')
            ->orderBy('total_sales', 'desc')
            ->take(5)
            ->get();

        $data = [
            'jumlahTransaksi' => $jumlahTransaksi,
            'detailTransaksi' => $detailTransaksi->count(),
            'jumlahMenu' => $jumlahMenu,
            'totalPendapatan' => $totalPendapatan,
            'totalStok' => $totalStok,
            'menuSales' => $menuSales,
        ];
        
        return view('template.home')->with($data);
    }

    public function filter(Request $request)
    {
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');

        $transaksi = Transaksi::filterByDate($startDate, $endDate)->get();

        return view('transaksi.index', compact('transaksi'));
    }

    public function detailTransaksi($lastCount)
    {
        if ($lastCount == 0)
            $data = Transaksi::select(
                'tgl_faktur',
                DB::raw('SUM(total_bayar) as total_bayar'),
                DB::raw('COUNT(id) as jumlahTransaksi'))
                ->groupBy('tgl_faktur')
                ->orderBy('tgl_faktur', 'asc')
                ->get();
        else
            $data = DetailTransaksi::select(
                'tgl_faktur',
                DB::raw('SUM(total_bayar) as total_bayar'),
                DB::raw('COUNT(id) as jumlahTransaksi'))
                ->groupBy('tgl_faktur')
                ->orderBy('tgl_faktur', 'asc')
                ->skip($lastCount - 1)
                ->limit(32434324324)
                ->get();

        return response($data);
    }
}
