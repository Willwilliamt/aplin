<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TransaksiTopUpGame;
use App\Models\Game;
use Midtrans\Config;
use Midtrans\Snap;

class PaymentController extends Controller
{
    public function getSnapToken(Request $request)
    {
        Config::$serverKey = 'SB-Mid-server-f9mEsBzKvNMV8JgDP-UNlvXe';
        Config::$isProduction = false;
        Config::$isSanitized = true;
        Config::$is3ds = true;

        $orderId = uniqid();
        $grossAmount = $request->product_price * $request->quantity;

        $transactionDetails = [
            'order_id' => $orderId,
            'gross_amount' => $grossAmount,
        ];

        $itemDetails = [
            [
                'id' => $request->product_id,
                'price' => $request->product_price,
                'quantity' => $request->quantity,
                'name' => 'Product Name',
            ],
        ];

        $customerDetails = [
            'first_name' => 'Customer',
            'last_name' => 'Name',
            'email' => 'customer@example.com',
            'phone' => '081234567890',
        ];

        $transaction = [
            'transaction_details' => $transactionDetails,
            'customer_details' => $customerDetails,
            'item_details' => $itemDetails,
        ];

        try {
            $snapToken = Snap::getSnapToken($transaction);
            return response()->json(['token' => $snapToken]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()]);
        }
    }

    public function purchase(Request $request, $id_game)
    {
        $user_id = session('user_id');

        if (!$user_id) {
            return redirect()->back()->with('error', 'User tidak ditemukan.');
        }

        $data = new TransaksiTopUpGame;
        $data->id_user = $user_id;
        $data->game_name = Game::find($id_game)->name;
        $data->jumlah_topup = $request->quantity;
        $data->tanggal_transaksi = now();

        $data->save();

        return redirect('/')->with('success', 'Transaksi berhasil.');
    }
}




