<?php

namespace App\Imports;

use App\Models\Pelanggan;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\collection;
use Maatwebsite\Excel\Concerns\WithHeadingrow;
use Maatwebsite\Excel\Concerns\ToCollection;

class PelangganImport implements ToCollection, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function collection(Collection $collection)
    {
        foreach ($collection as $row){
            $nama = $row['nama'];
            $email = $row['email'];
            $nomor_telepon = $row['nomor_telepon'];
            $alamat = $row['alamat'];

            Pelanggan::create([
                'nama' => $nama,
                'email' => $email,
                'nomor_telepon' => $nomor_telepon,
                'alamat' => $alamat
            ]);
        }
    }
}
