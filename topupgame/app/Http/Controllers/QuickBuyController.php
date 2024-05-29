<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Barang;
use App\Models\Topup; 
use Illuminate\Http\Request;

class QuickBuyController extends Controller
{
    public function quickbuy($id_game)
    {
        $game = Game::find($id_game);
        if (!$game) {
            return redirect()->route('home')->with('error', 'Game not found');
        }

        $topups = Topup::where('id_game', $id_game)->get();

        return view('quickbuy', compact('game', 'topups')); 
    }
}
