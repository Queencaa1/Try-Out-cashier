<?php

namespace App\Imports;

use App\Models\Absensi;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\collection;
use Maatwebsite\Excel\Concerns\WithHeadingrow;
use Maatwebsite\Excel\Concerns\ToCollection;

class AbsensiImport implements ToCollection, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function collection(Collection $collection)
    {
        foreach ($collection as $row){
            $namaKaryawan = $row['namaKaryawan'];
            $tanggalMasuk = $row['tanggalMasuk'];
            $waktuMasuk = $row['waktuMasuk'];
            $status = $row['status'];
            $waktuKeluar = $row['waktuKeluar'];

            Absensi::create([
                'namaKaryawan' => $namaKaryawan,
                'tanggalMasuk' => $tanggalMasuk,
                'waktuMasuk' => $waktuMasuk,
                'status' => $status,
                'waktuKeluar' => $waktuKeluar
            ]);
        }
    }
}
