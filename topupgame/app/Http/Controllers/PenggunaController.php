<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengguna;
use Illuminate\Support\Facades\Session;

class PenggunaController extends Controller
{
    function index (){
        $data = Pengguna::all();
        
        return view('superadmin',[
            'users' => $data
        ]);
    }
    function promote (Request $request){
        
        $data = Pengguna::find($request->id);
        $data->Role = "1";
        $data->save();
        return redirect()->back();
    }
    function demote (Request $request){
        
        $data = Pengguna::find($request->id);
        $data->Role = "0";
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

    public function logout()
    {

        Session::flush();

        return redirect('/login');
    }

    public function signup()
    {
        Session::flush();

        return redirect('/login');
    }

}
