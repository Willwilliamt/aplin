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

    function delete(Request $request) {
        $id = $request->id;
        $data = Game::find($id);
        $data->delete();
        return redirect('securityadmin');
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
