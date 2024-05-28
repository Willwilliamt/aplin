<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Barang;
use Illuminate\Http\Request;

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
?>
