<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\TransaksiTopUpGame;
use Midtrans\Config;
use Midtrans\Snap;
use Illuminate\Support\Facades\Log;

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
    Log::info('Request data for purchase: ', $request->all());

    $validatedData = $request->validate([
        'user_id' => 'nullable|integer',
        'zone_id' => 'nullable|integer',
        'quantity' => 'nullable|integer|min:1',
        'nap_token' => 'required'
    ]);
    $gameName = Game::find($id_game)->name;

    $transaksi = new TransaksiTopUpGame();
    $transaksi->id_user = $request->user_id;
    $transaksi->game_name = $gameName;
    $transaksi->jumlah_topup = $request->quantity;
    $transaksi->Tanggal_transaksi = now();

    if ($transaksi->save()) {
        Log::info('Transaction saved to database for user: '. $request->user_id);
        return redirect()->route('home')->with('success', 'Transaction successful');
    } else {
        Log::error('Error saving transaction to database: '. $transaksi->getError());
        return redirect()->route('home')->with('error', 'Transaction failed');
    }
}
}

