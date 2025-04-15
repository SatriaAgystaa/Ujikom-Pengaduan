<?php

namespace App\Http\Controllers\HeadStaff;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StaffController extends Controller
{
    public function create()
    {
        return view('headstaff.staff.create');
    }

    public function index()
    {
        return view('headstaff.staff.index');
    }
}
