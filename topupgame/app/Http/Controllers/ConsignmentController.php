<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\Pengguna;
use App\Models\transaksiConsign;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class ConsignmentController extends Controller
{
    public function index(Request $request)
    {
        $barang = Barang::all();
        return view('consignment', compact('barang'));
    }
    public function buyview(Request $request)
    {
        $id_seller = $request->input('id_seller');
        $id_barang = $request->input('id_barang');


        $request->session()->put('id_seller',$id_seller);
        $request->session()->put('id_barang', $id_barang);

        $barang = Barang::find($id_barang);
        $pengguna = Pengguna::find($id_seller);

        return view('buyconsignment', compact('barang'),compact('pengguna'));
    }
    public function buybarang(Request $request){
        $data = new transaksiConsign;
        $data->id_barang = $request->idbarang;
        $data->id_user = $request->iduser;
        $data->id_seller = $request->idseller;
        $data->Tanggal_transaksi = Carbon::now(); 
        $data->status = '0';
        $data->nama_admin = 'rico';
    
        $data->save();
        return redirect('/consignment');
    }

    public function showadmin(Request $request)
    {
        $trans = DB::table('transaksiConsign')
        ->join('Barang', 'transaksiConsign.id_barang', '=', 'Barang.Id_barang')
        ->join('users as pembeli', 'transaksiConsign.id_user', '=', 'pembeli.Id_user')
        ->join('users as penjual', 'transaksiConsign.id_seller', '=', 'penjual.Id_user')
        ->select('transaksiConsign.*', 'Barang.Nama_barang', 'pembeli.name as pembeli', 'penjual.name as penjual')
        ->get();

        return view('adminconsign', compact('trans'));
    }

    

}
