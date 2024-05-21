<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengguna;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function login(Request $request) {
        $username = $request->input('username');
        $password = $request->input('password');

        $pengguna = Pengguna::where('username', $username)
                             ->where('password', $password)
                             ->first();
        if($pengguna) {
            $request->session()->put('user',$username);
            $request->session()->put('user_id', $pengguna->Id_user);
            if ($pengguna->Role == 2) {
               return redirect('/superadmin');
           }
           else if ($pengguna->Role == 1) {
               return redirect('/securityadmin');
           }
            else if ($pengguna->Role == 0) {
                return redirect('/');
            } 
        } else {
            return back()->with('error', 'Username atau password salah.');
        }
    }
}
