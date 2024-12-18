<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Session;
use App\Models\Department;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
  public function __construct()
  {
      $this->middleware("auth");
  }
  
  public function index()
  {
    $users = User::all();

    return view('ehwunioleo.users.index', [
      'title' => 'Users',
      'users' => $users,
    ]);
  }

  public function add()
  {
    $users = User::all();

    return view('ehwunioleo.users.add', [
      'title' => 'Users',
      'users' => $users,
    ]);
  }

  public function store(Request $request)
  {

    $validatedData = $request->validate([
      'name' => 'required|max:255',
      'nik' => 'required|min:9|max:9|unique:users',
      'email' => 'required|email|unique:users',
      'role' => 'required',
      'title' => 'required',
      'password' => 'required|min:5|max:255',
    ]);

    $validatedData['password'] = bcrypt($validatedData['password']);

    User::create($validatedData);

    return redirect('/users')->with('success', 'User baru telah berhasil ditambahkan!');
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit($id)
  {
    $users = User::where('id', $id)->get();
    $departments = Department::all();
    $titles = DB::table('titles')->get();

    return view('ehwunioleo.users.edit', [
      'title' => 'Users',
      'users' => $users,
      'departments' => $departments,
      'titles' => $titles,
    ]);
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request)
  {
    $nik = User::where('id', $request->id)->value('nik');
    $email = User::where('id', $request->id)->value('email');

    $rules = [
      'name' => 'required|max:255',
      'role' => 'required',
      'title' => 'required',
      'department' => 'required',
    ];

    if($request->nik != $nik){
      $rules['nik'] = 'required|min:9|max:9|unique:users';
    }

    if($request->email != $email){
      $rules['email'] = 'required|unique:users';
    }

    $validatedData = $request->validate($rules);

    User::where('id', $request->id)->update($validatedData);

    return redirect('/users')->with('success', 'Data User telah berhasil diperbaharui!');
  }

  /**
   * Remove the specified resource from storage.
   */
  public function delete($id)
  {
    $users = User::where('id', $id)->get();

    return view('ehwunioleo.users.delete', [
      'title' => 'Users',
      'users' => $users,
    ]);
  }

  public function destroy(Request $request)
  {
    User::where('id', $request->id)->delete();

    return redirect('/users')->with('danger', 'User telah berhasil dihapus!');
  }
}
