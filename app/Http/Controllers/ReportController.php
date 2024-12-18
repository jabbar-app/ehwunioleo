<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function __construct()
    {
        $this->middleware("auth");
    }
    
    public function index()
    {
        $reports = Report::all();

        return view('ehwunioleo.report.index', [
            'title' => 'Reports',
            'reports' => $reports,
        ]);
    }

    public function cost_edit(Request $request){
        $reports = Report::where('id', $request->id)->get();

        return view('ehwunioleo.cost.edit', [
            'title' => 'Cost',
            'reports' => $reports,
        ]);
    }

    public function cost_update(Request $request){
        DB::table('reports')->where('id', $request->id)->update([
            'cost' => $request->cost,
          ]);
      
          return redirect('/settings')->with('success', 'Data cost telah berhasil diperbaharui!');
    }
}
