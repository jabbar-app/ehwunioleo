<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use App\Models\User;
use App\Models\Waste;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        // Ambil data yang diperlukan
        $schedules = Schedule::all();
        $requests = Schedule::where('step', '0')->get();
        $processes = Schedule::where('step', '1')->get();
        $users = User::orderBy('created_at', 'DESC')->get();
        $wastes = Waste::orderBy('capacity', 'DESC')->get();
        $reports = DB::table('reports')->select('date', 'waste_name', 'cost', 'source')->get();

        // Tentukan tampilan berdasarkan peran pengguna
        $viewData = [
            'title' => 'Dashboard',
            'schedules' => $schedules,
            'wastes' => $wastes,
            'processes' => $processes,
            'reports' => $reports,
        ];

        switch (Auth::user()->role) {
            case "Admin":
                return view('ehwunioleo.admin.dashboard.index', $viewData);
            case "Safety Leader":
                $viewData['requests'] = $requests;
                // dd($viewData);
                return view('ehwunioleo.safetyleader.dashboard.index', $viewData);
            case "User":
                $viewData['requests'] = $requests;
                $viewData['processes'] = $processes;
                return view('ehwunioleo.user.dashboard.index', $viewData);
            default:
                $viewData['name'] = Auth::user()->name;
                $viewData['role'] = Auth::user()->role;
                $viewData['processes'] = $processes;
                $viewData['requests'] = $requests;
                $viewData['users'] = $users;
                return view('ehwunioleo.dashboard', $viewData);
        }
    }

    public function users()
    {
        return view('ehwunioleo.users.index');
    }
}
