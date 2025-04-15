<?php


namespace App\Http\Controllers\User;


use App\Models\Report;
use App\http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;


class UserDashboardController extends Controller
{
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
       
        return view('dashboard.user.user', compact('reports'));
    }
}
