<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengguna;

class PenggunaController extends Controller
{
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
