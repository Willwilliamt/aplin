<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;

class ConsignmentController extends Controller
{
    public function index(Request $request)
    {
        
        $barang = Barang::all();
        return view('consignment', compact('barang'));
    }
}
