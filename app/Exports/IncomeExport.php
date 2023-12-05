<?php

namespace App\Exports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Style\Border;

class IncomeExport implements FromCollection, WithHeadings, WithStyles
{
    protected $incomeData;

    public function __construct($incomeData)
    {
        $this->incomeData = $incomeData;
    }

    public function collection()
    {
        // Hitung total pemasukan
        $totalPemasukan = $this->incomeData->sum('gross_amount');

        // Buat koleksi dengan data dan total pemasukan
        $koleksi = $this->incomeData->map(function ($item, $loop) {
            return [
                'No' => $loop + 1,
                'ID Order' => $item->order_id,
                'Nama Pemesan' => $item->user->first_name . ' ' . $item->user->last_name,
                'Total Pembayaran' => $item->gross_amount,
                'Tanggal' => $item->updated_at->format('Y-m-d H:i:s'),
            ];
        });

        // Tambahkan baris total pemasukan sebelum baris total pembayaran
        $koleksi->push([
            'No' => '',
            'ID Order' => '',
            'Nama Pemesan' => 'Total Pemasukan',
            'Total Pembayaran' => '', // Kosongkan total pembayaran di sini
            'Tanggal' => '',
        ]);

        // Tambahkan baris total pembayaran di bawah baris total pemasukan
        $koleksi->push([
            'No' => '',
            'ID Order' => '',
            'Nama Pemesan' => '',
            'Total Pembayaran' => '',
            'Tanggal' => '',
        ]);

        return $koleksi;
    }

    public function headings(): array
    {
        return [
            'No',
            'ID Order',
            'Nama Pemesan',
            'Total Pembayaran',
            'Tanggal',
        ];
    }

    public function styles(Worksheet $sheet)
    {
        // Deklarasikan $totalPemasukan
        $totalPemasukan = $this->incomeData->sum('gross_amount');
        // Terapkan gaya ke baris header
        $sheet->getStyle('A1:E1')->applyFromArray([
            'font' => [
                'bold' => true,
            ],
            'fill' => [
                'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                'startColor' => [
                    'rgb' => '3498db', // Warna latar belakang header
                ],
            ],
            'borders' => [
                'outline' => [
                    'borderStyle' => Border::BORDER_THIN,
                ],
            ],
        ]);

        // Terapkan gaya ke baris data
        $sheet->getStyle('A2:E' . ($this->incomeData->count() + 2))->applyFromArray([
            'borders' => [
                'allBorders' => [
                    'borderStyle' => Border::BORDER_THIN,
                ],
            ],
        ]);

        // Format merge dan center untuk baris total pemasukan (baris terakhir)
        $sheet->mergeCells('A' . ($this->incomeData->count() + 2) . ':C' . ($this->incomeData->count() + 2));
        $sheet->getStyle('A' . ($this->incomeData->count() + 2) . ':C' . ($this->incomeData->count() + 2))->applyFromArray([
            'alignment' => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
            ],
        ]);

        // Set nilai di dalam sel 'Total Pemasukan'
        $sheet->setCellValue('A' . ($this->incomeData->count() + 2), 'Total Pemasukan');
        $sheet->getStyle('A' . ($this->incomeData->count() + 2))->applyFromArray([
            'font' => [
                'bold' => true,
            ],
        ]);
        // Format merge dan center untuk baris total pemasukan (baris terakhir)
        $sheet->mergeCells('D' . ($this->incomeData->count() + 2) . ':E' . ($this->incomeData->count() + 2));
        $sheet->getStyle('D' . ($this->incomeData->count() + 2) . ':E' . ($this->incomeData->count() + 2))->applyFromArray([
            'alignment' => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
            ],
        ]);

        // Set nilai di dalam sel 'Total Pemasukan'
        $sheet->setCellValue('D' . ($this->incomeData->count() + 2), $totalPemasukan);
        $sheet->getStyle('D' . ($this->incomeData->count() + 2))->applyFromArray([
            'font' => [
                'bold' => true,
            ],
        ]);

        // Atur lebar kolom berdasarkan kontennya
        foreach (range('A', 'E') as $column) {
            $sheet->getColumnDimension($column)->setAutoSize(true);
        }

        return [];
    }
}
