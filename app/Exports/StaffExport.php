<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;

class StaffExport implements FromArray, WithHeadings
{
    public function array(): array
    {
        $staff = User::where('role', 'staff')->get();

        $data = [];

        foreach ($staff as $index => $user) {
            $data[] = [
                'No' => $index + 1,
                'Nama' => $user->name,
                'Email' => $user->email,
                'Provinsi' => optional($user->province)->name,
                'Dibuat' => $user->created_at->format('Y-m-d'),
            ];
        }

        return $data;
    }

    public function headings(): array
    {
        return [
            ['Data Staff'],
            ['No', 'Nama', 'Email', 'Provinsi', 'Dibuat'],
        ];
    }
}
