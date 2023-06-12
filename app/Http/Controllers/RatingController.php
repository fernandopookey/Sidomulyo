<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Rating;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RatingController extends Controller
{
    public function add(Request $request)
    {
        $stars_rated = $request->input('product_rating');
        $product_id = $request->input('product_id');

        $product_check = Product::where('id', $product_id)->first();
        if ($product_check) {
            $verified_purchase = Transaction::where('transactions.users_id', Auth::id())
                ->join('transaction_details', 'transactions.id', 'transaction_details.transaction_id')
                ->where('transaction_details.products_id', $product_id)->get();

            if ($verified_purchase->count() > 0) {
                $existing_rating = Rating::where('user_id', Auth::id())->where('product_id', $product_id)->first();
                if ($existing_rating) {
                    $existing_rating->stars_rated = $stars_rated;
                    $existing_rating->update();
                } else {
                    Rating::create([
                        'user_id' => Auth::id(),
                        'product_id' => $product_id,
                        'stars_rated' => $stars_rated
                    ]);
                }
                return redirect()->back()->with('success', 'Terima kasih atas penilaian anda');
            } else {
                return redirect()->back()->with('success', 'Anda tidak bisa memberikan rating tanpa membeli produk');
            }
        } else {
            return redirect()->back()->with('success', 'Link rusak');
        }
    }

    public function show($id)
    {
        $product = Product::with((['user']))->findOrFail($id);

        $data = [
            'title'     => 'Detail Blog',
            'product'   => $product,
            'content'   => 'admin/product/rating'
        ];
        return view('admin.layouts.wrapper', $data);
    }
}
