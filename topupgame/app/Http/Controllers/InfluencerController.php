<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Influencer;


class InfluencerController extends Controller
{
    public function index(Request $request)
    {
        
        $promos = Influencer::all();
        return view('crudinfluencer', compact('promos'));
    }

    public function insert(Request $request) {
        $data = new Influencer;
        $data->Nama_influencer = $request->nama;
        $data->platform = $request->platform;
        

        $data->save();
        return redirect('/crudinfluencer');
    }

    public function update(Request $request, string $id)
    {
        $product = Influencer::findOrFail($id);
        $product->Nama_influencer = $request->input('nama');
        $product->platform = $request->input('platform');
      
        $product->save();

        return redirect('/crudinfluencer');
    }
    public function destroy($id)
    {
        $promo = Influencer::findOrFail($id);


        $promo->delete();
        return redirect('/crudinfluencer');
    }

    public function show($id)
    {
        $promo = Influencer::find($id);
        if (!$promo) {
            abort(404, 'Tidak ada');
        }
        return view('updateinfluencer', compact('promo'));
    }
}
