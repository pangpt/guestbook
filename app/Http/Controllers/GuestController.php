<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Guest;
use Illuminate\Support\Facades\Storage;

class GuestController extends Controller
{
    //
    public function index(Request $request)
    {
        $title = 'Buku Tamu';

        $category = Category::all();
        $guest = Guest::where('id', '!=', 0);

        if($request->category_id){
            if($request->category_id != 0){
                $guest->where('category_id',$request->category_id);
            }
        }
        
        $guest= $guest->get();
        return view('backend.bukutamu.index', [
            'categories' => $category
        ])->withTitle($title)->withGuest($guest)->withSection('Register');
    }

    public function store(Request $request)
    {
        // dd($request->foto_tamu);
        if(!empty($request->foto_tamu)) {
        // $image = Storage::disk('public')->put('product', $request->file('foto_tamu'));
        $img = $request->foto_tamu;
        $folderPath = "uploads/";
        
        $image_parts = explode(";base64,", $img);
        $image_type_aux = explode("image/", $image_parts[0]);
        $image_type = $image_type_aux[1];
        
        $image_base64 = base64_decode($image_parts[1]);
        $fileName = uniqid() . '.png';

        
        $file = $folderPath . $fileName;
        $foto_final = Storage::disk('public')->put($file, $image_base64);
        // Storage::put($file, $image_base64);
        }
        else {
        $image = 'null';
        }
        
        // dd('Image uploaded successfully: '.$fileName);

        $guest = new Guest;
        $guest->nama = $request->nama;
        $guest->jenis_kelamin = $request->jenis_kelamin;
        $guest->tujuan_kunjungan = $request->tujuan_kunjungan;
        $guest->foto_tamu = $folderPath . $fileName;
        $guest->instansi = $request->instansi;
        $guest->category_id = $request->category_id;
        $guest->catatan = $request->catatan;
        $guest->waktu_kunjungan = \Carbon\Carbon::now()->toDateTimeString();$request->catatan;
        $guest->tanggal_kunjungan = $request->tanggal_kunjungan;
        $guest->kategori = 'cek';

        // dd($guest);

        $guest->save();

        return redirect()->back()->withErrors(['success' => 'Berhasil menambahkan data !']);
    }
}
