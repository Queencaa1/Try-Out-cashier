<?php

namespace App\Imports;

use App\Models\Meja;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\collection;
use Maatwebsite\Excel\Concerns\WithHeadingrow;
use Maatwebsite\Excel\Concerns\ToCollection;

class MejaImport implements ToCollection, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function collection(Collection $collection)
    {
        foreach ($collection as $row){
            $nomor_meja = $row['nomor_meja'];
            $kapasitas = $row['kapasitas'];
            $status = $row['status'];

            Meja::create([
                'nomor_meja' => $nomor_meja,
                'kapasitas' => $kapasitas,
                'status' => $status
            ]);
        }
    }
}
