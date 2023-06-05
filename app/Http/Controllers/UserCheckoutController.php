<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserCheckoutController extends Controller
{
    public function process(Request $request)
    {
        // Simpan Data User
        $user = Auth::user();
        $user->update($request->except('total_price'));

        //Proses Checkout
        $code = 'SM-' . mt_rand(000000, 999999);
        $carts = Cart::with(['product', 'user'])->where('users_id', Auth::user()->id)->get();

        //Transaksi Dibuat
        $transaction = Transaction::create([
            'users_id'              => Auth::user()->id,
            'name'                  => $request->name,
            'email'                 => $request->email,
            'phone_number'          => $request->phone_number,
            'address'               => $request->address,
            'note'                  => $request->note,
            'transaction_status'    => 'PENDING',
            'total_price'           => $request->total_price,
            'code'                  => $code
        ]);

        foreach ($carts as $cart) {
            $tsm = 'TSM-' . mt_rand(000000, 999999);

            TransactionDetail::create([
                'transaction_id'        => $transaction->id,
                'products_id'           => $cart->product->id,
                'price'                 => $cart->product->price,
                'qty'                   => $cart->qty,
                'code'                  => $tsm
            ]);
        }

        //Hapus Data Keranjang
        Cart::where('users_id', Auth::user()->id)->delete();
        return redirect('cart')->with('success', 'Transaksi Diproses');
    }
}
