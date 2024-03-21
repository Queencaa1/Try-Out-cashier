<?php

namespace App\Imports;

use App\Models\Jenis;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\collection;
use Maatwebsite\Excel\Concerns\WithHeadingrow;
use Maatwebsite\Excel\Concerns\ToCollection;

class JenisImport implements ToCollection, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function collection(Collection $collection)
    {
        foreach ($collection as $row){
            $nama_jenis = $row['nama_jenis'];
            $kategory_id = $row['kategory_id'];
           

            Jenis::create([
                'nama_jenis' => $nama_jenis,
                'kategory_id' => $kategory_id
            ]);
        }
    }
}
