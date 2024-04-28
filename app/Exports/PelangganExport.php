<?php

namespace App\Exports;

use App\Models\pelanggan; 
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\concerns\WithEvents;
use Maatwebsite\Excel\Events\BeforeExport;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Sheet;
use Maatwebsite\Excel\Concerns\Exportable;


class PelangganExport implements FromCollection, WithHeadings, WithEvents, WithMapping
{
    public function collection()
    {
        return Pelanggan::all(); // Return pertama akan selalu dieksekusi, baris selanjutnya tidak akan dijalankan
        return Pelanggan::where('id_outlet', auth()->user()->id_outlet)->get(); // Baris ini tidak akan dijalankan karena kode akan berhenti pada baris sebelumnya
        return PelangganModel::select('id', 'nama', 'email', 'nomor_telepon', 'alamat')->get(); // Baris ini juga tidak akan dijalankan karena kode akan berhenti pada baris pertama
    }

    public function map($model): array
    {
        return [
            $model->id,
            $model->nama,
            $model->email,
            $model->nomor_telepon,
            $model->alamat,
        ];
    }

    public function headings(): array
    {
        return [
            'No',
            'Nama',
            'Email',
            'Nomor_telepon',
            'Alamat'
        ];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function(AfterSheet $event) {
                // Gaya untuk header
                $event->sheet->getStyle('A1:E1')->applyFromArray([
                    'font' => ['bold' => true],
                    'fill' => ['fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID, 'startColor' => ['rgb' => 'FFC0CB']],
                ]);
    
                // Gaya untuk border
                $event->sheet->getStyle('A1:E' . $event->sheet->getHighestRow())->applyFromArray([
                    'borders' => [
                        'allBorders' => [
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                            'color' => ['argb' => '000000'],
                        ],
                    ],
                ]);
            },
        ];
        }
        
}
                    