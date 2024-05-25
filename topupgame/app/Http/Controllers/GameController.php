<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;
use App\Models\Game;

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
    
    public function home()
{
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

    public function showQuickBuyForm(Game $game) {
        return view('quickbuy', compact('game'));
    }

    public function delete(Request $request) {
        $id = $request->id;
        $data = Game::find($id);
        $data->delete();
        return redirect('/securityadmin');
    }
}
