<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware("auth");
    }
    
    public function index() {

        // return redirect('/dashboard');
        $profile = DB::table('users')->where('id', Auth::user()->id)->get();

        return view('ehwunioleo.profile.index', [
            'title' => 'Profil',
            'profile' => $profile,
        ]);
    }

    public function update(Request $request) {

        if($request->name!=null){
            DB::table('users')->where('id', Auth::user()->id)->update([
                'name' => $request->name,
                // 'email' => $request->email,
            ]);
        }
        elseif($request->password!=null){
            DB::table('users')->where('id', Auth::user()->id)->update([
                'password' => bcrypt($request->password),
                // 'email' => $request->email,
            ]);
        }
        else {
            dd($request);
        }

        return redirect('/profile')->with('success', 'Data Profil berhasil diperbaharui!');
    }
}
