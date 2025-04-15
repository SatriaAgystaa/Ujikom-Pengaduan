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

    public function updateStatus(Request $request, Report $report)
    {
        $request->validate([
            'status' => 'required|in:PROSES,DITOLAK',
        ]);
   
        $report->status = $request->status;
        $report->save();
   
        if ($request->status === 'PROSES' && $request->has('redirect_to_detail')) {
            return redirect()->route('staff.reports.show', $report)->with('success', 'Laporan diproses. Silakan tambahkan progress.');
        }
   
        return redirect()->back()->with('success', 'Status laporan berhasil diperbarui.');
    }

    public function show(Report $report)
    {
        $report->load(['user', 'progress.staff']);
        return view('dashboard.staff.staff-detail', compact('report'));
    }

    public function storeProgress(Request $request, Report $report)
    {
        $request->validate([
            'description' => 'required|string|max:1000',
        ]);


        ResponseProgress::create([
            'report_id' => $report->id,
            'staff_id' => Auth::id(),
            'description' => $request->description,
        ]);


        return redirect()->route('staff.reports.show', $report)->with('success', 'Progress berhasil ditambahkan.');
    }

    public function markAsCompleted(Report $report)
    {
        $report->status = 'SELESAI';
        $report->save();


        return redirect()->route('staff.reports.show', $report)->with('success', 'Laporan telah diselesaikan.');
    }

    public function destroy(Report $report)
    {
        // Pastikan hanya laporan yang SELESAI yang bisa dihapus
        if (!in_array($report->status, ['SELESAI', 'DITOLAK'])) {
            return redirect()->back()->with('error', 'Laporan hanya bisa dihapus jika statusnya SELESAI atau DITOLAK.');
        }
   
        // Hapus semua relasi terkait
        $report->comments()->delete();
        $report->likes()->delete();
        $report->progress()->delete();
       
        if ($report->response) {
            $report->response()->delete(); // jika relasi hasOne
        }
   
        // Hapus gambar jika ada
        if ($report->image && file_exists(public_path('storage/' . $report->image))) {
            unlink(public_path('storage/' . $report->image));
        }
   
        // Hapus laporan
        $report->delete();
   
        return redirect()->back()->with('success', 'Laporan berhasil dihapus.');
    }    
}




