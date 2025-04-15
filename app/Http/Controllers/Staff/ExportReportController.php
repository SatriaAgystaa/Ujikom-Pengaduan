<?php

namespace App\Http\Controllers\Staff;

use Illuminate\Http\Request;
use App\Models\Report;
use App\Exports\SingleReportExport;
use App\Http\Controllers\Controller;
use App\Exports\AllReportsExport;
use Maatwebsite\Excel\Facades\Excel;

class ExportReportController extends Controller
{
    public function exportAll()
    {
        return Excel::download(new AllReportsExport, 'laporan_semua.xlsx');
    }

    public function exportSingle(Report $report)
    {
        return Excel::download(new SingleReportExport($report), 'laporan_' . $report->id . '.xlsx');
    }
}

