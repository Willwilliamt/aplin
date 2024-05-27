<?php

namespace App\Http\Controllers;
use App\Models\Game;
use App\Models\Produk;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function game(){
        $game = Game::all();
        return view('addproduk', compact('game'));
    }
    public function insert(Request $request){
        $data = new Produk;

        $data->Nama_topup = $request->nama;
        $data->id_game = $request->id_game;
        $data->harga_topup = $request->harga;

        $data->save();
        return redirect('/addproduk');
    }
    public function index(){
        $topup = Produk::with('games')->get();
        $game = Game::with('produk')->get();
        return view('crudproduk', compact('topup','game'));
    }
    public function show($id)
    {
        $produk = Produk::find($id);
        if (!$produk) {
            abort(404, 'Tidak ada');
        }
        $game = Game::all();
        return view('updateproduk', compact('produk','game'));
    }
    public function update(Request $request, string $id){
        $topup = Produk::findOrFail($id);
        $topup->Nama_topup = $request->input('nama');
        $topup->id_game = $request->input('id_game');
        $topup->harga_topup = $request->input('harga');
        $topup->save();
        return redirect('/crudproduk');
    }
    public function destroy($id){
        $topup = Produk::findOrFail($id);
        $topup->delete();
        return redirect('/crudproduk');
    }
}
