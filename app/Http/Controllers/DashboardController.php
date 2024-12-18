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
    $schedules = Schedule::all();
    $requests = Schedule::where('step', '0')->get();
    $process = Schedule::where('step', '1')->get();

    // dd($request);
    $users   = User::orderBy('created_at', 'DESC')->get();
    $wastes  = Waste::orderBy('capacity', 'DESC')->get();

    $reports = DB::table('reports')
      ->select('date', 'waste_name', 'cost', 'source')
      ->get();


    if (Auth::user()->role == "Admin") {
      return view('ehwunioleo.admin.dashboard.index', [
        'title' => 'Dashboard',
        'schedules' => $schedules,
        'wastes' => $wastes,
        'reports' => $reports,
      ]);
    } elseif (Auth::user()->role == "Safety Leader") {
      return view('ehwunioleo.safetyleader.dashboard.index', [
        'title' => 'Dashboard',
        'schedules' => $schedules,
        'requests' => $requests,
        'process' => $process,
        'wastes' => $wastes,
      ]);
    } elseif (Auth::user()->role == "User") {
      return view('ehwunioleo.user.dashboard.index', [
        'title' => 'Dashboard',
        'schedules' => $schedules,
        'requests' => $requests,
        'process' => $process,
        'wastes' => $wastes,
      ]);
    }

    return view('ehwunioleo.dashboard.index', [
      'title' => 'Dashboard',
      'name' => Auth::user()->name,
      'role' => Auth::user()->role,
      'process' => $process,
      'requests' => $requests,
      'schedules' => $schedules,
      'users' => $users,
      'wastes' => $wastes,
      'reports' => $reports,
    ]);
  }

  public function users()
  {
    return view('ehwunioleo.users.index');
  }
}
