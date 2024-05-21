<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;
use App\Models\Barang;

class KategoriController extends Controller
{
    // Display a listing of the categories
    public function index(Request $request)
    {
        $categories = Kategori::all();
        return view('kategori.index', compact('categories'));
    }

    public function home()
    {
        $categories = Kategori::all();
        return view('home', compact('categories'));
    }

    // Show the form for creating a new category
    public function create()
    {
        return view('kategori.create');
    }

    // Store a newly created category in the database
    public function store(Request $request)
    {
        $request->validate([
            'nama_kategori' => 'required|unique:kategori|max:255',
        ]);

        Kategori::create($request->all());

        return redirect()->route('kategori.index')->with('success', 'Category created successfully.');
    }

    // Insert a new category (from your first class)
    public function insert(Request $request)
    {
        $data = new Kategori;
        $data->nama_kategori = $request->nama;
        $data->save();

        return redirect('/crudkategori');
    }

    // Show the form for editing the specified category
    public function edit(Kategori $kategori)
    {
        return view('kategori.edit', compact('kategori'));
    }

    // Show a specific category (from your first class)
    public function show($id)
    {
        $category = Kategori::find($id);
        if (!$category) {
            abort(404, 'Tidak ada');
        }
        return view('updatekategori', compact('category'));
    }

    // Update the specified category in the database
    public function update(Request $request, Kategori $kategori)
    {
        $request->validate([
            'nama_kategori' => 'required|unique:kategori|max:255',
        ]);

        $kategori->update($request->all());

        return redirect()->route('kategori.index')->with('success', 'Category updated successfully.');
    }

    // Update a specific category (from your first class)
    public function updateCategory(Request $request, string $id)
    {
        $product = Kategori::findOrFail($id);
        $product->nama_kategori = $request->input('nama');
        $product->save();

        return redirect('/crudkategori');
    }

    // Remove the specified category from the database
    public function destroy(Kategori $kategori)
    {
        $kategori->delete();

        return redirect()->route('kategori.index')->with('success', 'Category deleted successfully.');
    }

    // Remove a specific category and its related items (from your first class)
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
