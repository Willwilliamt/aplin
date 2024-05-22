<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;
use App\Models\Barang;
use App\Models\Game;

class KategoriController extends Controller
{
    public function index(Request $request)
    {
        
        $categories = Kategori::all();
        return view('crudkategori', compact('categories'));
    }

    public function home()
    {
        $categories = Kategori::all();
        $game = Game::all();
        return view('home', ['categories' => $categories,'game' => $game]);
    }
    public function create()
    {
        return view('kategori.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'nama_kategori' => 'required|unique:kategori|max:255',
        ]);

        Kategori::create($request->all());

        return redirect()->route('/addkategori')->with('success', 'Category created successfully.');
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
    public function update(Request $request, Kategori $kategori)
    {
        $product = Kategori::findOrFail($id);
        $product->nama_kategori = $request->input('nama');
        
        $product->save();

        return redirect('/crudkategori');
    }

    public function updateCategory(Request $request, string $id)
    {
        $product = Kategori::findOrFail($id);
        $product->nama_kategori = $request->input('nama');
        $product->save();

        return redirect('/crudkategori');
    }

    public function destroy(Kategori $kategori)
    {
        $kategori->delete();

        return redirect()->route('kategori.index')->with('success', 'Category deleted successfully.');
    }

    public function destroyCategory($id)
    {
        $category = Kategori::findOrFail($id);

        $barangs = Barang::where('id_kategori', $id)->get();
        foreach ($barangs as $barang) {
            $imagePath = public_path('uploads/barang/' . $barang->image);
            if (file_exists($imagePath)) {
                @unlink($imagePath);
            }
            $barang->delete();
        }

        $category->delete();
        return redirect('/crudkategori');
    }
}
