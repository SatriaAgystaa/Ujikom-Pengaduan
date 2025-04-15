<?php


namespace App\Http\Controllers\Staff;


use App\Models\Report;
use App\Models\ResponseProgress;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class StaffDashboardController extends Controller
{
    public function index()
    {
        $reports = Report::latest()->paginate(10);
        return view('dashboard.staff.staff', compact('reports'));
    }

}