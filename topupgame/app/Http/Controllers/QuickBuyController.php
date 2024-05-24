<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\Request;

class QuickBuyController extends Controller
{
    public function quickbuy($id)
    {
        $game = Game::find($id);
        
        if (!$game) {
            return redirect()->back()->with('error', 'Game not found.');
        }

        return view('quickbuy', compact('game'));
    }
}
