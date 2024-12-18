<?php

namespace App\Http\Controllers;

use App\Models\Source;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class SourceController extends Controller
{
    public function __construct()
    {
        $this->middleware("auth");
    }

    public function edit($id)
    {
        $sources = Source::where('id', $id)->get();

        return view('ehwunioleo.source.edit', [
            'title' => 'Sumber',
            'sources' => $sources,
        ]);
    }

    public function update(Request $request)
    {
        DB::table('sources')->where('id', $request->id)->update([
            'name' => $request->name,
        ]);

        return redirect('/settings')->with('success', 'Data Sumber telah berhasil diperbaharui!');
    }

    public function source_delete(Request $request)
    {
        $sources = DB::table('sources')->where('id', $request->id)->get();

        return view('ehwunioleo.source.delete', [
            'title' => 'Hapus Sumber',
            'sources' => $sources,
        ]);
    }

    public function source_destroy(Request $request)
    {
        Source::where('id', $request->id)->delete();
    
        return redirect('/settings')->with('danger', 'Sumber telah berhasil dihapus!');
    }

    public function destroy($id)
    {
        Source::find($id)->delete();
        return redirect('/settings')->with('danger', 'Sumber telah berhasil dihapus!');
    }

    public function create()
    {
        return view('ehwunioleo.source.add', [
            'title' => 'Tambah Sumber',
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
          'name' => 'required|max:255|unique:users',
        ]);
    
        Source::create($validatedData);
    
        return redirect('/settings')->with('success', 'Sumber baru telah berhasil ditambahkan!');
    }
}
