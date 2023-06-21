<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductCategory;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class ProductCategoryController extends Controller
{
    public function index()
    {
        $data = [
            'title'             => 'Product Category List',
            'productCategory'   => ProductCategory::get(),
            'content'           => 'new-admin/product-category/index'
        ];
        return view('new-admin.layouts.wrapper', $data);
    }

    public function create()
    {
        $data = [
            'title'     => 'Add New Category Product',
            'content'   => 'new-admin/product-category/create'
        ];

        return view('new-admin.layouts.wrapper', $data);
    }

    public function store(Request $request)
    {
        // $data = $request->all();
        $data = $request->validate([
            'name'      => 'required|string|max:200',
            'photos'    => 'required|mimes:png,jpg,jpeg'
        ]);

        $data['slug'] = Str::slug($request->name);
        $data['photos'] = $request->file('photos')->store('assets/product-category', 'public');

        ProductCategory::create($data);
        Alert::success('Sukses', 'Category Product Added Successfully');
        return redirect()->route('product-category.index');
    }


    public function edit(string $id)
    {
        $data = [
            'title'             => 'Edit Product Category',
            'product_category'  => ProductCategory::find($id),
            'content'           => 'new-admin/product-category/edit'
        ];
        return view('new-admin.layouts.wrapper', $data);
    }

    public function update(Request $request, string $id)
    {
        $item = ProductCategory::find($id);
        $data = $request->validate([
            'name'          => 'string',
            'photos'        => 'mimes:png,jpg,jpeg',
        ]);

        if ($request->hasFile('photos')) {

            if ($item->photos != null) {
                $realLocation = "storage/" . $item->photos;
                if (file_exists($realLocation) && !is_dir($realLocation)) {
                    unlink($realLocation);
                }
            }

            $photos = $request->file('photos');
            $file_name = time() . '-' . $photos->getClientOriginalName();

            $data['slug'] = Str::slug($request->name);
            $data['photos'] = $request->file('photos')->store('assets/product-category', 'public');
        } else {
            $data['slug'] = Str::slug($request->name);
            $data['photos'] = $item->photos;
        }

        $item->update($data);
        Alert::success('Sukses', 'Product Category Updated Successfully');
        return redirect()->route('product-category.index');
    }


    public function destroy(ProductCategory $productCategory)
    {
        // if ($productCategory->photos != null) {
        //     $realLocation = "storage/" . $productCategory->photos;
        //     if (file_exists($realLocation) && !is_dir($realLocation)) {
        //         unlink($realLocation);
        //     }
        // }

        // Storage::delete($productCategory->photos);
        // $productCategory->delete();
        // Alert::success('Sukses', 'Product Category Deleted Successfully');
        // return redirect()->route('product-category.index');




        try {
            if ($productCategory->photos != null) {
                $realLocation = "storage/" . $productCategory->photos;
                if (file_exists($realLocation) && !is_dir($realLocation)) {
                    unlink($realLocation);
                }
            }

            Storage::delete($productCategory->photos);
            $productCategory->delete();
        } catch (\Throwable $e) {
            Alert::error('Error', $e->getMessage());
        } finally {
            return redirect()->route('product-category.index');
        }
    }
}
