<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
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
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('ehwunioleo.department.add', [
            'title' => 'Department',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255|unique:users',
        ]);

        Department::create($validatedData);

        return redirect('/settings')->with('success', 'Department baru telah berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Department $department)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        // dd($id);
        $departments = Department::where('id', $id)->get();
        return view('ehwunioleo.department.edit', [
            'title' => 'Edit Department',
            'departments' => $departments,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        Department::where('id', $id)->update([
            'name' => $request->name,
        ]);

        return redirect('/settings')->with('success', 'Data Department berhasil diperbaharui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Department::find($id)->delete();
        return redirect('/settings')->with('danger', 'Data Department telah berhasil dihapus!');
    }
}
