<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSettingRequest;
use App\Http\Requests\UpdateSettingRequest;
use App\Models\Provider;
use App\Models\Report;
use App\Models\Setting;
use App\Models\Waste;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class SettingController extends Controller
{
    public function __construct()
    {
        $this->middleware("auth");
    }

    public function index()
    {
        if (Auth::user()->role != 'Super Admin') {
            return redirect('/dashboard');
        }
        
        $wastes = Waste::all();
        $reports = Report::all();
        $providers = Provider::all();
        $sources = DB::table('sources')->get();
        $departments = DB::table('departments')->get();

        return view('ehwunioleo.setting.index', [
            'title' => 'Pengaturan',
            'wastes' => $wastes,
            'reports' => $reports,
            'providers' => $providers,
            'sources' => $sources,
            'departments' => $departments,
        ]);
    }
}
