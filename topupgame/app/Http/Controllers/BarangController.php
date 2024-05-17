<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
class BarangController extends Controller
{
    function insert(Request $request) {

        $data = new Barang;
        $data->nama_barang = $request->nama;
        $data->harga_barang = $request->harga;
        $data->id_kategori = $request->kategori;
        

        $data->save();
        return redirect('/cruduser');
    }
    public function index() {
        $barangs = Barang::all();
        return view('cruduser', compact('barangs'));
    }
}
