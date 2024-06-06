<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\Pengguna;
use App\Models\Promo;
use App\Models\Game;
use App\Models\transaksiConsign;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class ConsignmentController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        if ($search) {
            $barang = Barang::where('Nama_barang', 'LIKE', '%' . $search . '%')->get();
        } else {
            $barang = Barang::all();
        }

        return view('consignment', compact('barang'));
    }
    public function buyview(Request $request)
    {
        $id_seller = $request->input('id_seller');
        $id_barang = $request->input('id_barang');
        $id_game = $request->input('id_game');

        $request->session()->put('id_seller',$id_seller);
        $request->session()->put('id_game',$id_game);
        $request->session()->put('id_barang', $id_barang);

        $barang = Barang::find($id_barang);
        $game= Game::find($id_game);
        $pengguna = Pengguna::find($id_seller);
        $admin = Pengguna::where('role', 1)->get();
        return view('buyconsignment', compact('barang','admin','pengguna','game'));
    }
    public function buybarang(Request $request){
        $promo = Promo::where('Nama_promo', $request->promo)->first();
        if(!$promo && $request->promo != '') {
            return redirect('/consignment')->withErrors(['error' => 'Invalid kode promo']);
        }else if ($request->promo == ''){
            $data = new transaksiConsign;
            $data->id_barang = $request->idbarang;
            $data->id_user = $request->iduser;
            $data->id_seller = $request->idseller;
            $data->Tanggal_transaksi = Carbon::now();
            $data->status = '0';
            $data->nama_admin = $request->id_admin;
            $data->harga = $request->harga;
            $data->kode_promo = $request->promo;
            $data->subtotal = $request->harga;
        }else{
            $harga = $request->harga;
            $nilai_promo = $promo->Nilai_promo;
            $Subtotal = $harga - $nilai_promo;
            $data = new transaksiConsign;
            $data->id_barang = $request->idbarang;
            $data->id_user = $request->iduser;
            $data->id_seller = $request->idseller;
            $data->Tanggal_transaksi = Carbon::now();
            $data->status = '0';
            $data->nama_admin = $request->id_admin;
            $data->harga = $request->harga;
            $data->kode_promo = $request->promo;
            $data->subtotal = $Subtotal;
        }


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
    
    public function confirmTransaction($id)
    {
        

        $transaction = transaksiConsign::findOrFail($id);
        $transaction->status = 1;
        $transaction->save();

        return redirect()->route('transaksiconsign'); 
    }
    public function confirmTransaction2($id)
    {
        

        $transaction = transaksiConsign::findOrFail($id);
        $transaction->status = 3;
        $transaction->save();

        return redirect()->route('transaksiconsign'); 
    }
    public function berikanBuyer($id)
    {
    

        $transaction = transaksiConsign::findOrFail($id);
        $transaction->status = 2;
        $transaction->save();

        return redirect()->route('showseller'); 
    }
    

    public function showuser(Request $request)
    {
        $userId = $request->session()->get('user_id');
        $trans = DB::table('transaksiConsign')
        ->join('Barang', 'transaksiConsign.id_barang', '=', 'Barang.Id_barang')
        ->join('users as pembeli', 'transaksiConsign.id_user', '=', 'pembeli.Id_user')
        ->join('users as penjual', 'transaksiConsign.id_seller', '=', 'penjual.Id_user')
        ->select('transaksiConsign.*', 'Barang.Nama_barang', 'pembeli.name as pembeli', 'penjual.name as penjual')
        ->where('transaksiConsign.id_user', $userId)
        ->get();

        return view('transaksiconsignuser', compact('trans'));
    }
    public function showseller(Request $request)
    {
        $userId = $request->session()->get('user_id');
        $trans = DB::table('transaksiConsign')
        ->join('Barang', 'transaksiConsign.id_barang', '=', 'Barang.Id_barang')
        ->join('users as pembeli', 'transaksiConsign.id_user', '=', 'pembeli.Id_user')
        ->join('users as penjual', 'transaksiConsign.id_seller', '=', 'penjual.Id_user')
        ->select('transaksiConsign.*', 'Barang.Nama_barang', 'pembeli.name as pembeli', 'penjual.name as penjual')
        ->where('transaksiConsign.id_seller', $userId)
        ->get();

        return view('sellerconsign', compact('trans'));
    }

    public function search(Request $request)
    {
        $search = $request->input('search');
        if ($search) {
            $barang = Barang::where('Nama_barang', 'LIKE', '%' . $search . '%')->get();
        } else {
            $barang = Barang::all();
        }

        return view('partials.consignment_results', compact('barang'));
    }







}
