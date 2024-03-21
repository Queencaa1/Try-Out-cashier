<?php

namespace App\Imports;

use App\Models\ProdukTitipan;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\collection;
use Maatwebsite\Excel\Concerns\WithHeadingrow;
use Maatwebsite\Excel\Concerns\ToCollection;

class ProdukTitipanImport implements ToCollection, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function collection(Collection $collection)
    {
        foreach ($collection as $row){
            $nama_produk = $row['nama_produk'];
            $nama_supplier = $row['nama_supplier'];
            $harga_beli = $row['harga_beli'];
            $harga_jual = $row['harga_jual'];
            $stok = $row['stok'];
            $keterangan = $row['keterangan'];

            ProdukTitipan::create([
                'nama_produk' => $nama_produk,
                'nama_supplier' => $nama_supplier,
                'harga_beli' => $harga_beli,
                'harga_jual' => $harga_jual,
                'stok' => $stok,
                'keterangan' => $keterangan
            ]);
        }
    }
}
