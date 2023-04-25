<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\Request;

class UserProductCategoryController extends Controller
{
    public function index()
    {
        $categories = ProductCategory::all();
        $products   = Product::with(['galleries'])->paginate(32);
        return view('user.pages.product', [
            'categories'    => $categories,
            'product'      => $products
        ]);
    }

    public function detail(Request $request, $slug)
    {
        $categories = ProductCategory::all();
        $category   = ProductCategory::where('slug', $slug)->firstOrFail();
        $products   = Product::with(['galleries'])->where('categories_id', $category->id)->paginate(32);
        return view('user.pages.product', [
            'categories'    => $categories,
            'product'    => $products
        ]);
    }
}
