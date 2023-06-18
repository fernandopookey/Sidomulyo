<?php

namespace App\Http\Controllers;

use App\Models\Delivery;
use App\Models\Floating;
use App\Models\FourthFloating;
use App\Models\Header;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\Rating;
use App\Models\Review;
use App\Models\SecondFloating;
use App\Models\Sosmed;
use App\Models\ThirdFloating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserProductController extends Controller
{

    public function index()
    {
        $categories = ProductCategory::take(6)->get();
        $products = Product::orderBy('name')->with(['galleries', 'categories'])->paginate(2);

        // $rating = Rating::with('product_id');

        return view('user.pages.product', [
            'sosmed'            => Sosmed::get(),
            'header'            => Header::get(),
            'floating'          => Floating::get(),
            'secondFloating'    => SecondFloating::get(),
            'thirdFloating'     => ThirdFloating::get(),
            'fourthFloating'    => FourthFloating::get(),
            'categories'        => $categories,
            // 'rating'            => $rating,
            'product'           => $products,
        ]);
    }

    public function details(Request $request, $id)
    {
        $product    = Product::with((['galleries', 'user', 'categories', 'related_products']))->findOrFail($id);
        $categories = ProductCategory::all();
        $user       = Auth::user();

        $rating = Rating::where('product_id', $product->id)->get();
        $rating_sum = Rating::where('product_id', $product->id)->sum('stars_rated');
        $user_rating = Rating::where('product_id', $product->id)->where('user_id', Auth::id())->first();
        $reviews = Review::where('product_id', $product->id)->get();

        if ($rating->count() > 0) {
            $rating_value = $rating_sum / $rating->count();
        } else {
            $rating_value = 0;
        }

        return view('user.pages.product-details', [
            'product'           => $product,
            'sosmed'            => Sosmed::get(),
            'delivery'          => Delivery::first(),
            'header'            => Header::get(),
            'floating'          => Floating::get(),
            'secondFloating'    => SecondFloating::get(),
            'thirdFloating'     => ThirdFloating::get(),
            'fourthFloating'    => FourthFloating::get(),
            'categories'        => $categories,
            'rating'            => $rating,
            'rating_value'      => $rating_value,
            'userRating'        => $user_rating,
            'user'              => $user,
            'reviews'           => $reviews
        ]);
    }

    public function search(Request $request)
    {
        // return $request->input();
        $data = Product::where('name', 'like', '%' . $request->input('search') . '%')->get();

        return view('user.pages.search', [
            'product'           => $data,
            'sosmed'            => Sosmed::get(),
            'header'            => Header::get(),
            'floating'          => Floating::get(),
            'secondFloating'    => SecondFloating::get(),
            'thirdFloating'     => ThirdFloating::get(),
            'fourthFloating'    => FourthFloating::get(),

        ]);
    }
}
