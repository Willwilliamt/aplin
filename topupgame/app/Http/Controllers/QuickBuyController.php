<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Game;
use App\Models\Barang;

class QuickBuyController extends Controller
{
    public function quickbuy($id_game) {
        $game = Game::find($id_game);
        if (!$game) {
            return redirect()->route('home')->with('error', 'Game not found');
        }
        
        $barang = Barang::all(); 
        return view('quickbuy', compact('game', 'barang'));
    }
}
