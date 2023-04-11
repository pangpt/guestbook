<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Office;

class OfficeController extends Controller
{
    //
    public function index()
    {
        $datacontent = Office::where('id', 1)->first();

        return view('backend.office.index')->withTitle('Office General')->withOffice($datacontent)->withSection('Office Management');
    }

    public function editOffice (Request $request)
    {
        $data = Office::where('id', 1)->first();

        $data->nama_instansi = $request->nama_instansi;
        $data->email_instansi = $request->email_instansi;
        $data->phone_instansi = $request->phone_instansi;
        $data->alamat_instansi = $request->alamat_instansi;
        $data->website_instansi = $request->website_instansi;
        $data->update();

        return redirect()->route('office.index')->withErrors(['success' => 'Berhasil mengubah informasi kantor']);
    }
}
