<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Promo;


class PromoController extends Controller
{
    public function index(Request $request)
    {
        
        $promos = Promo::all();
        return view('crudpromo', compact('promos'));
    }

    public function insert(Request $request) {
        $data = new Promo;
        $data->Nama_promo = $request->nama;
        $data->Jenis_promo = $request->jenis;
        $data->Nilai_promo = $request->nilai;

        $data->save();
        return redirect('/crudpromo');
    }

    public function update(Request $request, string $id)
    {
        $product = Promo::findOrFail($id);
        $product->Nama_promo = $request->input('nama');
        $product->Jenis_promo = $request->input('jenis');
        $product->Nilai_promo = $request->input('nilai');
        $product->save();

        return redirect('/crudpromo');
    }
    public function destroy($id)
    {
        $promo = Promo::findOrFail($id);


        $promo->delete();
        return redirect('/crudpromo');
    }

    public function show($id)
    {
        $promo = Promo::find($id);
        if (!$promo) {
            abort(404, 'Tidak ada');
        }
        return view('updatepromo', compact('promo'));
    }

}
