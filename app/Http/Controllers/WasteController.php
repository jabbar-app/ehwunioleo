<?php

namespace App\Http\Controllers;

use App\Models\Waste;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class WasteController extends Controller
{
    public function __construct()
    {
        $this->middleware("auth");
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $wastes = Waste::orderBy('capacity', 'DESC')->get();

        return view('ehwunioleo.wastes.index', [
            'title' => 'Limbah B3',
            'wastes' => $wastes,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('ehwunioleo.waste.add', [
            'title' => 'Limbah B3',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        DB::table('wastes')->insert([
            'waste_name' => $request->waste_name,
            'waste_code' => $request->waste_code,
            'packaging' => $request->packaging,
            'capacity' => $request->capacity,
        ]);

        return redirect('/settings')->with('success', 'Data Limbah telah berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Waste $waste)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update()
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */

    public function destroy($id)
    {

        // DB::table('wastes')->where('id', $request->id)->delete();
        // dd($id);
        Waste::find($id)->delete();

        return redirect('/settings')->with('danger', 'Data Limbah telah dihapus!');
    }

    public function capacity_edit(Request $request)
    {
        $wastes = Waste::where('id', $request->id)->get();

        return view('ehwunioleo.capacity.edit', [
            'title' => 'Limbah B3',
            'wastes' => $wastes,
        ]);
    }

    public function capacity_update(Request $request)
    {
        DB::table('wastes')->where('id', $request->id)->update([
            'waste_name' => $request->waste_name,
            'waste_code' => $request->waste_code,
            'capacity' => $request->capacity,
            'packaging' => $request->packaging,
        ]);

        return redirect('/settings')->with('success', 'Data Limbah telah berhasil diperbaharui!');
    }
}
