<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;
use App\Models\Game;
use App\Models\Barang;

class GameController extends Controller
{
    public function kategori() {
        $categories = Kategori::all();
        return view('addgame', compact('categories'));
    }

    public function index(Request $request) {
        $games = Game::all();
        return view('securityadmin', compact('games'));
    }
    
    public function home() {
        $games = Game::all();
        $categories = Kategori::all();
        return view('home', ['games' => $games, 'categories' => $categories]);
    }

    public function insert(Request $request) {
        $data = new Game;
        $data->name = $request->name;
        $data->description = $request->desc;
        $data->nama_kategori = $request->kategori;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/game'), $filename);
            $data->image = $filename;
        }

        $data->save();
        return redirect('/securityadmin');
    }

    public function showQuickBuyForm($id_game) {
        $game = Game::find($id_game);
        if (!$game) {
            return redirect()->route('home')->with('error', 'Game not found');
        }
        $barang = Barang::all(); 
        return view('quickbuy', compact('game', 'barang'));
    }

    public function delete(Request $request) {
        $id = $request->id;
        $data = Game::find($id);
        $data->delete();
        return redirect('/securityadmin');
    }


    public function show(string $id)
{
    $product = Game::findOrFail($id);
    $categories = Kategori::all();

    return view('updategame', compact('product', 'categories'));
}


    public function update(Request $request, string $id) {
        $product = Game::findOrFail($id);
        $product->name = $request->input('nama');
        $product->description = $request->input('deskripsi');
        $product->nama_kategori = $request->input('kategori');

        if ($request->hasFile('image')) {

            $oldImage = public_path('uploads/barang/' . $product->image);
            if (file_exists($oldImage)) {
                @unlink($oldImage);
            }

            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/game/', $filename);
            $product->image = $filename;
        }

        $product->save();

        return redirect('securityadmin');
    }
}
