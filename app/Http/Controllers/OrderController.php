<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Commission;
use App\Models\User;
use App\Models\Product;

class OrderController extends Controller
{
    public function create(Request $request)
{
    // Validasi input request
    $request->validate([
        'product_id' => 'required|exists:products,id',
        'quantity' => 'required|integer|min:1',
    ]);

    // Ambil data pengguna yang membuat order
    $user = auth()->user();
    $product = Product::find($request->product_id);

    // Total harga pesanan
    $total_price = $product->price * $request->quantity;

    // Simpan order baru
    $order = Order::create([
        'user_id' => $user->id,
        'total_price' => $total_price,
        'status' => 'pending',
    ]);

    // Cek apakah pengguna memiliki upline (referer)
    if ($user->upline_id) {
        // Dapatkan data upline (referrer)
        $upline = User::find($user->upline_id);

        // Tentukan persentase komisi, misalnya 10%
        $commission_amount = $total_price * 0.1;

        // Simpan komisi untuk upline
        Commission::create([
            'user_id' => $upline->id,
            'order_id' => $order->id,
            'amount' => $commission_amount,
            'description' => 'Commission for referral',
        ]);
        
        // Update saldo wallet upline
        $this->updateWalletBalance($upline, $commission_amount);

        // Cek apakah bonus referral untuk upline perlu diberikan
        if (!$upline->referralBonuses()->where('referred_user_id', $user->id)->exists()) {
            // Berikan bonus referral 50% dari komisi yang diberikan
            $bonus_amount = $commission_amount * 0.5;

            // Simpan bonus referral untuk upline
            ReferralBonus::create([
                'user_id' => $upline->id,
                'referred_user_id' => $user->id,
                'bonus_amount' => $bonus_amount,
            ]);

            // Update saldo wallet upline
            $this->updateWalletBalance($upline, $bonus_amount);
        }
    }

    return response()->json([
        'message' => 'Order created successfully!',
        'order' => $order,
    ]);
}

    private function updateWalletBalance(User $user, $amount)
    {
    // Ambil wallet pengguna
    $wallet = $user->wallet;

    // Update saldo wallet
    $wallet->balance += $amount;
    $wallet->save();

    // Simpan transaksi wallet
    WalletTransaction::create([
        'wallet_id' => $wallet->id,
        'type' => 'credit', // 'credit' untuk penambahan saldo
        'amount' => $amount,
        'description' => 'Referral commission', // Deskripsi transaksi
    ]);
}

}