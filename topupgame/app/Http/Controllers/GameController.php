<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;
use App\Models\Game;
class GameController extends Controller
{
    public function kategori(Request $request) {
        
        
        $categories = Kategori::all();

         return view('addgame', compact('categories'));
    }
    public function index(Request $request){
        $data = Game::all();
        return view('securityadmin', compact('data'));
    }
    function insert(Request $request) {
        $data = new Game;
        $data->name = $request->name;
        $data->description = $request->desc;
        $data->nama_kategori = $request->kategori;

        if($request->hasfile('image'))
        {
            $file = $request->file('image');
            $extenstion = $file->getClientOriginalExtension();
            $filename = time().'.'.$extenstion;
            $file->move('uploads/game/', $filename);
            $data->image = $filename;
        }else{
            return $request;
            $data -> $image = '';
        }
        $data->save();
        return redirect('/securityadmin');
    }
    public function quickbuy($id)
    {
        $game = Game::find($id);
        if (!$game) {
            return redirect()->back()->with('error', 'Game not found.');
        }

        return view('quickbuy', compact('game'));
    }
    function delete(Request $request) {
        $id = $request->id;
        $data = Game::find($id);
        $data->delete();
        return redirect('securityadmin');
    }
}
