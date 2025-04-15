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
        return view('dashboard.head.head');
    }
}


