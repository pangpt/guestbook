<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    //
    public function index ()
    {
        $title = 'Kategori';

        $category = Category::with('guests')->get();

        return view('backend.Category.index',[
            'category' => $category,
        ])->withTitle($title)->withSection('Guest Management');
    }

    public function store(Request $request)
    {
        $category = new Category;
        $category->name = $request->name;
        $category->save();

        return redirect()->back()->withErrors(['success' => 'Data Berhasil disimpan!']);
    }

}
