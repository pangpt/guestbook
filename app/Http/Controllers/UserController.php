<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    //
    public function index()
    {
        $title = 'Daftar Pengguna';

        $datauser = User::get();

        return view('backend.pengguna.index',[
            'user' => $datauser
        ])->withTitle($title)->withSection('Tabel Pengguna');
        
    }
}
