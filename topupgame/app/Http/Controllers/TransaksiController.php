<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\TransaksiTopUpGame;

class TransaksiController extends Controller
{
    public function order(Request $request)
    {
        // Validasi input
        $validatedData = $request->validate([
            'user_id' => 'required|exists:users,Id_user',
            'game_name' => 'required|string',
            'jumlah_topup' => 'required|integer',
        ]);

        // Buat entri transaksi top-up game
        $transaksi = new TransaksiTopUpGame();
        $transaksi->id_user = $validatedData['user_id'];
        $transaksi->game_name = $validatedData['game_name'];
        $transaksi->jumlah_topup = $validatedData['jumlah_topup'];
        $transaksi->Tanggal_transaksi = now(); // Menggunakan tanggal dan waktu saat ini

        // Simpan transaksi ke database
        $transaksi->save();

        return response()->json(['message' => 'Transaksi berhasil'], 200);
    }
}
