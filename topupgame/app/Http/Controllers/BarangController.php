<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\Kategori;
class BarangController extends Controller
{
    function insert(Request $request) {
        $data = new Barang;
        $data->nama_barang = $request->nama;
        $data->harga_barang = $request->harga;
        $data->id_kategori = $request->kategori;
        $data->id_user = $request->session()->get('user_id');
        

        $data->save();
        return redirect('/cruduser');
    }
    public function index(Request $request) {
        $user_id = $request->session()->get('user_id');

        $barangs = Barang::where('id_user', $user_id)->get();

         return view('cruduser', compact('barangs'));
    }
    public function show(string $id)
    {
        $product = Barang::findOrFail($id);
  
        return view('show', compact('product'));
    }

    public function update(Request $request, string $id) {
        $product = Barang::findOrFail($id);
        $product->nama_barang = $request->input('nama');
        $product->harga_barang = $request->input('harga');
        $product->id_kategori = $request->input('kategori');
        $product->save();

        return redirect('/cruduser');
    }
    public function destroy(string $id)
    {
        $product = Barang::findOrFail($id);
        $product->delete();
        return redirect('/cruduser');
    }
    public function add(Request $request) {
        

        $categories = Kategori::all();

         return view('addbarang', compact('categories'));
    }

}
