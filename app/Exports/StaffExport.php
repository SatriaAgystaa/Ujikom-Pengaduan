<?php


namespace App\Exports;


use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;


class StaffExport implements FromCollection, WithHeadings, WithMapping
{
    public function collection()
    {
        return User::where('role', 'staff')
            ->select('id', 'name', 'email', 'created_at')
            ->get();
    }


    public function headings(): array
    {
        return [
            'ID',
            'Nama',
            'Email',
            'Dibuat pada',
        ];
    }


    public function map($row): array
    {
        return [
            $row->id,
            $row->name,
            $row->email,
            $row->created_at->format('Y-m-d H:i:s'),
        ];
    }
}
