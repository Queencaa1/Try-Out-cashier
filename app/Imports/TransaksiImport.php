<?php

namespace App\Imports;

use App\Models\Transaksi;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingrow;
use Illuminate\Support\collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class TransaksiImport implements ToCollection, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function collection(Collection $collection)
    {
       foreach ($collection as $row){
        //    dd($row);
        $last_id = Transaksi::whereDate('tanggal', today())->latest()->first();
        $last_id_number = $last_id ? substr($last_id->id, 8) : 0;
        $notrans = today()->format('Ymd') . str_pad($last_id_number + 1, 4, '0', STR_PAD_LEFT);
           Transaksi::create([
               'id' => $notrans,
               'tanggal' => 
               \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['tanggal'])->format('Y-m-d'),
               'total_harga' => $row['total_harga'],
               'metode_pembayaran' => $row['metode_pembayaran'],
               'keterangan' => $row['keterangan']
           ]);
       }

    }
     
    // public function headingRow(): intdiv{
    //     return 3;
    // }
}
