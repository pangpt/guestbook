<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\User;

class LoginController extends Controller
{
    //
    public function index(Request $request)
    {
        return view('loginpage');
    }

    public function logout(Request $request)
    {
        //cek
        $url = '/login';
        Auth::logout();
        return redirect($url);
    }

    public function login(Request $request) {
        $this->validate($request, [
            'username' => 'required',
            'password' => 'required|min:5',
        ]);

        $username = $request->username;
        $password = $request->password;

        if(Auth::attempt(['username' => $username, 'password' => $password])) {
            return redirect()->intended('/admin/dashboard');
        } else {
            return redirect()->back()->with('error', 'Username atau password tidak sesuai');
        }
    }
    // public function authenticateadmin(Request $request)
    // {
    //     if (Auth::validate(['username'=>$request->username,'password'=>$request->password])) {
    //         $cekuser = User::where('username',$request->username)->first();
    //         if($cekuser->role=='admin') {
    //             return redirect()->intended('/admin/dashboard');
    //         } else {
    //             Auth::attemp(['username'=>$request->username,'password'=>$request->password]);
    //             return redirect()->route('dashboard.index');
    //         }
    //     } else {
    //         return redirect()->back()->withErrors([
    //             'error' => 'Username atau password salah!'
    //         ])->withInput();
    //     }
    // }
}
