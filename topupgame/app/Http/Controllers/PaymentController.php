<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TransaksiTopUpGame;
use Midtrans\Config;
use Midtrans\Snap;

class PaymentController extends Controller
{
    public function getSnapToken(Request $request)
    {
        Config::$serverKey = 'SB-Mid-server-84hdmckw7ImB5-ZLX0YS-1aj';
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

    public function purchase(Request $request, $id)
    {
        $validatedData = $request->validate([
            'user_id' => 'required',
            'zone_id' => 'required',
            'quantity' => 'required|integer|min=1',
            'snap_token' => 'required'
        ]);

        TransaksiTopUpGame::create([
            'id_user' => $request->user_id,
            'game_name' => 'Some Game Name',
            'jumlah_topup' => $request->quantity,
            'Tanggal_transaksi' => now(),
        ]);

        return redirect()->route('home')->with('success', 'Transaction successful');
    }
}

