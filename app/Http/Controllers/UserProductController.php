<?php

namespace App\Http\Controllers;

use App\Models\Delivery;
use App\Models\Floating;
use App\Models\FourthFloating;
use App\Models\Header;
use App\Models\Product;
use App\Models\ProductCategory;
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
        $products = Product::orderBy('name')->with(['galleries', 'categories'])->paginate(12);
        return view('user.pages.product', [
            'product'           => $products,
            'sosmed'            => Sosmed::get(),
            'header'            => Header::get(),
            'floating'          => Floating::get(),
            'secondFloating'    => SecondFloating::get(),
            'thirdFloating'     => ThirdFloating::get(),
            'fourthFloating'    => FourthFloating::get(),
            'categories'        => $categories,
        ]);
    }

    public function details(Request $request, $id)
    {
        $product    = Product::with((['galleries', 'user', 'categories', 'related_products']))->findOrFail($id);
        $categories = ProductCategory::all();

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
        ]);
    }

    public function search(Request $request)
    {
        // return $request->input();
        $data = Product::where('name', 'like', '%' . $request->input('search') . '%')->get();

        return view('user.pages.search', [
            'product'       => $data,
            'sosmed'        => Sosmed::get(),
            'header'        => Header::get()

        ]);
    }
}
