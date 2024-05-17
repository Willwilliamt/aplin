<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengguna;

class PenggunaController extends Controller
{
    function index (){
        $data = Pengguna::where("role", 0)->get();
        return view('superadmin',[
            'users' => $data
        ]);
    }
    function promote (Request $request){
    
        $data = Pengguna::find($request->id);
        $data->role = "1";
        $data->save();
        return redirect()->back();
    }
    function insert(Request $request) {

        $data = new Pengguna;
        $data->username = $request->username;
        $data->password = $request->password;
        $data->name = $request->name;
        $data->phone = $request->phone;
        $data->email = $request->email;
        $data->role = "0";

        $data->save();
        return redirect()->back();
    }
}
