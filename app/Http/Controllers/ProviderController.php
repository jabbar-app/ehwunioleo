<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProviderRequest;
use Illuminate\Http\Request;
use App\Models\Provider;
use App\Models\Waste;
use Illuminate\Support\Facades\DB;

class ProviderController extends Controller
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
        $providers = Provider::all();

        // dd($providers);

        return view('ehwunioleo.providers.index', [
            'title' => 'Info 3P',
            'providers' => $providers,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('ehwunioleo.providers.add', [
            'title' => 'Info 3P',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        DB::table('providers')->insert([
            'name' => $request->name,
            'waste' => $request->waste,
            'contract' => $request->contract,
            'address' => $request->address,
          ]);

        return redirect('/settings')->with('success', 'Data 3P baru telah berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Provider $provider)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $providers = Provider::where('id', $id)->get();
        $wastes = Waste::all();

        return view('ehwunioleo.providers.edit', [
            'title' => 'Info 3P',
            'providers' => $providers,
            'wastes' => $wastes,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // dd($request);
        DB::table('providers')->where('id', $id)->update([
            'name' => $request->name,
            'waste' => $request->waste,
            'contract' => $request->contract,
            'address' => $request->address,
        ]);

        return redirect('/settings')->with('success', 'Data 3P telah berhasil diperbaharui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Provider::find($id)->delete();
        return redirect('/settings')->with('danger', 'Data 3P telah berhasil dihapus!');
    }
}
