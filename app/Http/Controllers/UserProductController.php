<?php

namespace App\Http\Controllers;

use App\Models\Header;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\Sosmed;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserProductController extends Controller
{

    public function index()
    {
        $categories = ProductCategory::take(6)->get();
        $products = Product::orderBy('name')->with(['galleries', 'categories'])->paginate(12);
        return view('user.pages.product', [
            'product'       => $products,
            'sosmed'        => Sosmed::get(),
            'header'        => Header::get(),
            'categories'    => $categories,
        ]);
    }

    public function details(Request $request, $id)
    {
        $product    = Product::with((['galleries', 'user', 'categories']))->findOrFail($id);
        $categories = ProductCategory::all();

        return view('user.pages.product-details', [
            'product'       => $product,
            'sosmed'        => Sosmed::get(),
            'header'        => Header::get(),
            'categories'    => $categories,
        ]);
    }
}