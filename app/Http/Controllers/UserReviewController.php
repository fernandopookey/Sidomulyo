<?php

namespace App\Http\Controllers;

use App\Models\Floating;
use App\Models\FourthFloating;
use App\Models\Header;
use App\Models\Product;
use App\Models\Review;
use App\Models\SecondFloating;
use App\Models\Sosmed;
use App\Models\ThirdFloating;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserReviewController extends Controller
{
    public function add($product_slug)
    {
        $sosmed             = Sosmed::get();
        $header             = Header::get();
        $floating           = Floating::get();
        $secondFloating     = SecondFloating::get();
        $thirdFloating      = ThirdFloating::get();
        $fourthFloating     = FourthFloating::get();

        $product = Product::where('slug', $product_slug)->first();

        if ($product) {
            $product_id = $product->id;
            $review = Review::where('user_id', Auth::id())->where('product_id', $product_id)->first();
            if ($review) {
                return view('user.pages.reviews-edit', compact('review', 'sosmed', 'header', 'floating', 'secondFloating', 'thirdFloating', 'fourthFloating'));
            } else {
                $verified_purchase = Transaction::where('transactions.users_id', Auth::id())
                    ->join('transaction_details', 'transactions.id', 'transaction_details.transaction_id')
                    ->where('transaction_details.products_id', $product_id)->get();
                return view('user.pages.reviews', compact('product', 'verified_purchase', 'header', 'sosmed', 'floating', 'secondFloating', 'thirdFloating', 'fourthFloating'));
            }
        } else {
            return redirect()->back()->with('success', 'Link rusak');
        }
    }

    public function create(Request $request)
    {
        $product_id     = $request->input('product_id');
        $product        = Product::where('id', $product_id)->first();

        if ($product) {
            $user_review        = $request->input('user_review');
            $new_review         = Review::create([
                'user_id'       => Auth::id(),
                'product_id'    => $product_id,
                'user_review'   => $user_review
            ]);
            // $category_slug = $product->categories->slug;
            // $product_slug = $product->slug;

            if ($new_review) {
                // return redirect()->back()->with('success', 'Terima kasih atas ulasan anda');
                // return redirect('/' . $product_slug)->with('success', 'Terima kasih atas ulasan anda');
                return redirect('produk/' . $product_id)->with('success', 'Terima kasih atas ulasan anda');
            }
        } else {
            return redirect()->back()->with('success', 'Link rusak');
        }
    }

    public function edit($product_slug)
    {
        $sosmed             = Sosmed::get();
        $header             = Header::get();
        $floating           = Floating::get();
        $secondFloating     = SecondFloating::get();
        $thirdFloating      = ThirdFloating::get();
        $fourthFloating     = FourthFloating::get();

        $product = Product::where('slug', $product_slug)->first();

        if ($product) {
            $product_id = $product->id;
            $review = Review::where('user_id', Auth::id())->where('product_id', $product_id)->first();
            if ($review) {
                return view('user.pages.reviews-edit', compact(
                    'review',
                    'sosmed',
                    'header',
                    'floating',
                    'secondFloating',
                    'thirdFloating',
                    'fourthFloating'
                ));
            } else {
                return redirect()->back()->with('success', 'Link rusak');
            }
        } else {
            return redirect()->back()->with('success', 'Link rusak');
        }
    }

    public function update(Request $request)
    {
        $user_review = $request->input('user_review');
        if ($user_review != '') {
            $review_id = $request->input('review_id');
            $review = Review::where('id', $review_id)->where('user_id', Auth::id())->first();
            if ($review) {
                $review->user_review = $request->input('user_review');
                $review->update();
                return redirect('produk/' . $review->product->id . '/')->with('success', 'Ulasan anda berhasil diubah');
            } else {
                return redirect()->back()->with('danger', 'Link rusak');
            }
        } else {
            return redirect()->back()->with('danger', 'Anda tidak bisa mengirim ulasan kosong');
        }
    }
}
