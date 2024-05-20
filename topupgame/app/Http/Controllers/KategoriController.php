<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;

class KategoriController extends Controller
{
    public function index(Request $request) {
        $categories = Kategori::all();

         return view('crudkategori', compact('categories'));
    }
    public function insert(Request $request) {
        $data = new Kategori;
        $data->nama_kategori = $request->nama;
        
        

        $data->save();
        return redirect('/crudkategori');
    }
    public function show($id)
    {
        $category = Kategori::find($id);
        if (!$category) {
            abort(404, 'Tidak ada');
        }
        return view('updatekategori', compact('category'));
    }
    public function update(Request $request, string $id) {
        $product = Kategori::findOrFail($id);
        $product->nama_kategori = $request->input('nama');
        
        $product->save();

        return redirect('/crudkategori');
    }
}
