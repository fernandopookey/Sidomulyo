<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Header;
use App\Models\Sosmed;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        $sosmed         = Sosmed::get();
        $header         = Header::get();
        $carts = Cart::with(['product.galleries', 'user'])->where('users_id', Auth::user()->id)->get();

        return view('user.pages.cart', [
            'carts' => $carts,
            'sosmed'        => $sosmed,
            'header'        => $header
        ]);
    }

    public function add(Request $request, $id)
    {
        $qty = $request->qty;

        $data = [
            'products_id'   => $id,
            'users_id'      => Auth::user()->id,
            'qty'           => $qty
        ];

        // dd($data);


        Cart::create($data);

        return redirect()->route('cart');
    }

    public function delete(Request $request, $id)
    {
        $cart = Cart::findOrFail($id);

        $cart->delete();

        return redirect()->route('cart');
    }

    public function success()
    {
        return view('user.pages.transaction-success');
    }
}
