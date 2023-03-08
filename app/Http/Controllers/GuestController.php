<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Guest;

class GuestController extends Controller
{
    //
    public function index(Request $request)
    {
        $title = 'Buku Tamu';

        $category = Category::all();
        $guest = Guest::get();

        if($request->categories_id){
            if($request->categories_id != 0){
                $guest->where('category_id',$request->categories_id);
            }
        }
        

        return view('backend.bukutamu.index', [
            'categories' => $category
        ])->withTitle($title)->withGuest($guest)->withSection('Register');
    }

    public function store(Request $request)
    {
        $guest = new Guest;
        $guest->nama = $request->nama;
        $guest->jenis_kelamin = $request->jenis_kelamin;
        $guest->tujuan_kunjungan = $request->tujuan_kunjungan;
        $guest->category_id = $request->category_id;
        $guest->catatan = $request->catatan;
        $guest->waktu_kunjungan = \Carbon\Carbon::now()->toDateTimeString();$request->catatan;
        $guest->tanggal_kunjungan = $request->tanggal_kunjungan;
        $guest->kategori = 'cek';
        $guest->foto_tamu = 'asdasd';

        $guest->save();

        return redirect()->back()->withErrors(['success' => 'Create Data Success !']);
    }
}
