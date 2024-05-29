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
        $data->deskripsi = $request->deskripsi;
        $data->id_user = $request->session()->get('user_id');

        if($request->hasfile('image'))
        {
            $file = $request->file('image');
            $extenstion = $file->getClientOriginalExtension();
            $filename = time().'.'.$extenstion;
            $file->move('uploads/barang/', $filename);
            $data->image = $filename;
        }else{
            return $request;
            $data -> $image = '';
        }

        

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
        $categories = Kategori::all();
  
        return view('show', compact('product', 'categories'));
    }

    public function update(Request $request, string $id) {
        $product = Barang::findOrFail($id);
        $product->nama_barang = $request->input('nama');
        $product->harga_barang = $request->input('harga');
        $product->id_kategori = $request->input('kategori');
        $product->deskripsi = $request->input('deskripsi');

        if ($request->hasFile('image')) {

            $oldImage = public_path('uploads/barang/' . $product->image);
            if (file_exists($oldImage)) {
                @unlink($oldImage);
            }

            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/barang/', $filename);
            $product->image = $filename;
        }

        $product->save();

        return redirect('/cruduser');
    }
    public function destroy(string $id)
    {
        $product = Barang::findOrFail($id);
        $imagePath = public_path('uploads/barang/' . $product->image);
        if (file_exists($imagePath)) {
            @unlink($imagePath);
        }
        $product->delete();
        return redirect('/cruduser');
    }
    public function add(Request $request) {
        

        $categories = Kategori::all();

         return view('addbarang', compact('categories'));
    }

}
