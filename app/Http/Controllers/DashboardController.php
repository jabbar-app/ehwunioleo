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
        return view('ehwunioleo.dashboard', [
            'title' => 'Dashboard',
            'schedules' => Schedule::all(),
            'requests' => Schedule::where('step', '0')->get(),
            'processes' => Schedule::where('step', '1')->get(),
            'users' => User::orderBy('created_at', 'DESC')->get(),
            'wastes' => Waste::orderBy('capacity', 'DESC')->get(),
            'reports' => DB::table('reports')->select('date', 'waste_name', 'cost', 'source')->get(),
        ]);
    }

    public function users()
    {
        return view('ehwunioleo.users.index');
    }
}
