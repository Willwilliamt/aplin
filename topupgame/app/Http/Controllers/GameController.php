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
        return view('quickbuy', compact('barang'));
    }

    public function delete(Request $request) {
        $id = $request->id;
        $data = Game::find($id);
        $data->delete();
        return redirect('/securityadmin');
    }
}
