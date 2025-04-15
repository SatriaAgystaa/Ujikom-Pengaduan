<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Report;

class GuestReportController extends Controller
{
    /*************  ✨ Windsurf Command ⭐  *************/

    /**
     * Show the guest reports index.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\View\View
     */
    public function index(Request $request)
    {
        $query = Report::with(['user'])->withCount('likes');

        if ($request->filled('search')) {
            $query->where('description', 'like', '%' . $request->search . '%');
        }

        if ($request->filled('type')) {
            $query->where('type', $request->type);
        }

        $sortOrder = $request->get('sort', 'desc');
        $query->orderBy('created_at', $sortOrder);

        $reports = $query->paginate(10)->withQueryString();

        return view('dashboard.guest.reports.index', compact('reports'));
    }

    public function show(Report $report)
    {
        $report->increment('views');

        $comments = $report->comments()->with('user')->latest()->paginate(5);

        return view('dashboard.guest.reports.show', compact('report', 'comments'));
    }
}

