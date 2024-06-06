<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Influencer;
use App\Models\transaksiInfluencer;
use App\Models\Promo;
use Illuminate\Support\Facades\DB;

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
        $data->waktu = $request->waktu;
        
        $data->save();

        $maxId = DB::table('influencer')->max('id_influencer');
        
        $data2 = new transaksiInfluencer;
        $data2->id_influencer = $maxId;
        $data2->waktu = $request->waktu;
        $data2->tanggal = now();
        $data2->kode_promo = $request->kode;
        $data2->jumlah_promo = $request->jumlah;
        
        $data2->save();
        
        $data3 = new Promo;
        $data3->Nama_promo = $request->kode;
        $data3->Jenis_promo = "POTONGAN";
        $data3->Nilai_promo = $request->jumlah;
        
        $data3->save();



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
