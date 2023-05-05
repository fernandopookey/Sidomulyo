<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Header;
use App\Models\Sosmed;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;
use Mckenziearts\Notify\Facades\LaravelNotify;

class CartController extends Controller
{
    public function index()
    {
        $sosmed     = Sosmed::get();
        $header     = Header::get();
        $carts      = Cart::with(['product.galleries', 'user'])->where('users_id', Auth::user()->id)->get();
        $user       = Auth::user();

        return view('user.pages.cart', [
            'carts'     => $carts,
            'sosmed'    => $sosmed,
            'header'    => $header,
            'user'      => $user
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
        // toast('Produk Berhasil Ditambahkan', 'success');
        // toast('Success Toast', 'success');

        return redirect()->route('cart')->with('success', 'Produk Berhasil Ditambahkan');
    }

    public function update($id = null, $quantity = null)
    {
        DB::table('carts')->where('id', $id)->increment('qty', $quantity);
        // DB::table('carts')->where('id', $id)->decrement('qty', $quantity);
        return redirect()->route('cart')->with('success', 'Quantity Berhasil Diubah');
    }

    public function delete(Request $request, $id)
    {
        $cart = Cart::findOrFail($id);

        $cart->delete();
        // toast('Produk Berhasil Dihapus', 'success');
        return redirect()->route('cart')->with('success', 'Produk Berhasil Dihapus');
    }

    public function success()
    {
        return view('user.pages.transaction-success');
    }
}
