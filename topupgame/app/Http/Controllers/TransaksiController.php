<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\TransaksiTopUpGame;
use App\Models\transaksiInfluencer;
use App\Models\transaksiConsign;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class TransaksiController extends Controller
{
    public function order(Request $request)
    {
        
        $validatedData = $request->validate([
            'user_id' => 'required|exists:users,Id_user',
            'game_name' => 'required|string',
            'jumlah_topup' => 'required|integer',
        ]);

        
        $transaksi = new TransaksiTopUpGame();
        $transaksi->id_user = $validatedData['user_id'];
        $transaksi->game_name = $validatedData['game_name'];
        $transaksi->jumlah_topup = $validatedData['jumlah_topup'];
        $transaksi->Tanggal_transaksi = now(); 

        $transaksi->save();

        return response()->json(['message' => 'Transaksi berhasil'], 200);
    }

    public function viewAdmin(Request $request)
    {
        $trans = DB::table('transaksiConsign')
        ->join('Barang', 'transaksiConsign.id_barang', '=', 'Barang.Id_barang')
        ->join('users as pembeli', 'transaksiConsign.id_user', '=', 'pembeli.Id_user')
        ->join('users as penjual', 'transaksiConsign.id_seller', '=', 'penjual.Id_user')
        ->select('transaksiConsign.*', 'Barang.Nama_barang', 'pembeli.name as pembeli', 'penjual.name as penjual')
        ->get();

        $trans2 = DB::table('transaksi_influencer')
        ->join('Influencer', 'transaksi_influencer.id_influencer', '=', 'Influencer.Id_influencer')
        ->select('transaksi_influencer.*', 'Influencer.Nama_influencer')
        ->get();


        return view('viewadmin', compact('trans'), compact('trans2'));
    }
}
