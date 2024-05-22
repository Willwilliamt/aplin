<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GameController extends Controller
{
    function kategori(){
        $data = Kategori::all();
    }
    function insert(Request $request) {
        $data = new Game;
        $data->name = $request->name;
        $data->description = $request->desc;
        $data->id_kategori = $request->kategori;

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
}
