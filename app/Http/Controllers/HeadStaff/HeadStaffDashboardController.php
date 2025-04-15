<?php

namespace App\Http\Controllers\HeadStaff;

use App\Http\Controllers\Controller;
use App\Models\Report;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class HeadStaffDashboardController extends Controller
{
    public function index()
    {
        $totalUsers = User::where('role', 'user')->count();
        $totalStaff = User::where('role', 'staff')->count();
        $totalReports = Report::count();

        $completedReports = Report::where('status', 'SELESAI')->count();
        $inProgressReports = Report::where('status', 'PROSES')->count();

        $complaintsPerProvince = Report::select('province', DB::raw('count(*) as total'))
            ->groupBy('province')
            ->pluck('total', 'province');

        return view('dashboard.head.head', compact(
            'totalUsers',
            'totalStaff',
            'totalReports',
            'completedReports',
            'inProgressReports',
            'complaintsPerProvince'
        ));
    }
}


