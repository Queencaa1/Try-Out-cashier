<?php

namespace App\Imports;

use App\Models\Menu;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\collection;
use Maatwebsite\Excel\Concerns\WithHeadingrow;
use Maatwebsite\Excel\Concerns\ToCollection;

class MenuImport implements ToCollection, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function collection(Collection $collection)
    {
        foreach ($collection as $row){
            $nama_menu = $row['nama_menu'];
            $harga = $row['harga'];
            $image = $row['image'];
            $deskripsi = $row['deskripsi'];
            $jenis_id = $row['jenis_id'];

            Menu::create([
                'nama_menu' => $nama_menu,
                'harga' => $harga,
                'image' => $image,
                'deskripsi' => $deskripsi,
                'jenis_id' => $jenis_id
            ]);
        }
    }
}
