<?php

namespace App\Exports;

use App\Models\Report;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromArray;

use Maatwebsite\Excel\Concerns\WithMapping;

class AllReportsExport implements FromCollection, WithHeadings, WithMapping
{
    public function collection()
    {
        return Report::with('user','responseProgress.staff')->get();
    }

    public function map($report): array
    {
        return [
            $report->id,
            $report->description,
            $report->status,
            $report->user?->name ?? 'Tidak diketahui',
            $report->responseProgress?->staff?->name ?? 'Tidak Ditindaklanjuti',
            $report->created_at->format('Y-m-d H:i:s'),
        ];
    }

    public function headings(): array
    {
        return [
            ['Report Details'],
            ['ID',
            'Judul',
            'Status',
            'Pelapor',
            'Ditangani Oleh',
            'Tanggal Dibuat',]
        ];
    }
}