<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Midtrans\Snap;
use App\Models\Topup; 
use App\Models\Game; 
class TransactionController extends Controller
{
    public function purchase(Request $request, $id)
    {
        // Find the game and topup
        $game = Game::find($id);
        $topup = Topup::find($request->input('product'));
    
        // Check if topup is found
        if (!$topup) {
            return redirect()->back()->withErrors(['error' => 'Topup not found']);
        }
    
        $quantity = $request->input('quantity');
    
        // Generate Snap token
        $params = array(
            'transaction_details' => array(
                'order_id' => 'ORDER-' . rand(),
                'gross_amount' => $topup->harga_topup * $quantity,
            ),
            'customer_details' => array(
                'first_name' => $request->input('user_id'),
                'email' => $request->input('email'),
                'phone' => $request->input('notelp'),
            ),
            'item_details' => array(
                array(
                    'id' => $topup->ID_TOPUP,
                    'price' => $topup->harga_topup,
                    'quantity' => $quantity,
                    'name' => $topup->Nama_topup,
                ),
            ),
        );
    
$snapToken = Snap::createTransaction($params)->token;
dd($snapToken);
return view('quickbuy', compact('game', 'topup', 'snapToken'));

    }
    
}
