<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProductRequest;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductGallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class ProductController extends Controller
{
    public function index()
    {
        $data = [
            'title'         => 'List Product',
            'products'      => Product::get(),
            'categories'    => ProductCategory::all(),
            'content'       => 'admin/product/index'
        ];

        if (request()->ajax()) {
            $query = Product::with(['categories']);

            return DataTables::of($query)->addColumn('action', function ($item) {
                return '
                    <div class="d-flex justify-content-between">
                        <a class="btn btn-warning" href="' . route('admin-product-details', $item->id) . '">
                            <i class="fas fa-pen"></i> Edit
                        </a>
                        <form action="' . route('admin-product-delete', $item->id) . '" method="POST" onclick="return confirm(`Hapus Data ?`)">
                            ' . method_field('delete') . csrf_field() . '
                            <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i> Hapus</button>
                        </form>
                    </div>
                ';
            })->rawColumns(['action'])->make();
        }

        return view('admin.layouts.wrapper', $data);
    }

    public function uploadGallery(Request $request)
    {
        $data = $request->all();

        $data['photos'] = $request->file('photos')->store('assets/product', 'public');

        ProductGallery::create($data);

        return redirect()->route('admin-product-details', $request->product_id);
    }

    public function deleteGallery(Request $request, $id)
    {
        // $item = ProductGallery::findOrFail($id);
        // $item->delete();

        // return redirect()->route('admin-product-details', $item->product_id);

        $productgallery = ProductGallery::find($id);

        if ($productgallery->photos != null) {
            $realLocation = "storage/" . $productgallery->photos;
            if (file_exists($realLocation) && !is_dir($realLocation)) {
                unlink($realLocation);
            }
        }

        Storage::delete($productgallery->photos);
        $productgallery->delete();
        Alert::success('Sukses', 'Gambar Produk Berhasil Dihapus');
        return redirect()->route('admin-product-details', $productgallery->product_id);
    }

    public function create()
    {
        $data = [
            'title'         => 'Tambah Produk',
            'content'       => 'admin/product/create',
            'categories'      => ProductCategory::all()
        ];

        return view('admin.layouts.wrapper', $data);
    }

    public function store(ProductRequest $request)
    {
        // $data = $request->all();
        $data = $request->validate([
            'name'              => 'required|string|max:200',
            'price'             => 'required|integer',
            'description'       => 'required',
            'additional_info'   => 'required',
            'categories_id'     => 'required|exists:product_categories,id'
        ]);

        $data['slug'] = Str::slug($request->name);

        Product::create($data);
        Alert::success('Sukses', 'Produk Berhasil Ditambahkan');
        return redirect()->route('admin-product');
    }

    public function details(string $id)
    {
        $product = Product::with((['galleries', 'user', 'categories']))->findOrFail($id);
        $categories = ProductCategory::all();

        return view('admin.layouts.wrapper', [
            'title'         => 'Edit Produk',
            'content'       => 'admin/product/detail',
            'product'       => $product,
            'categories'    => $categories,
        ]);
    }


    public function edit(string $id)
    {
        $product = Product::findOrFail($id);
        $categories = ProductCategory::all();

        return view('admin.layouts.wrapper', [
            'content'   => 'admin/product/edit',
            'product'      => $product,
            'categories'  => $categories
        ]);
    }

    public function update(Request $request, string $id)
    {
        $item = Product::find($id);
        $data = $request->validate([
            'name'              => 'required|string|max:200',
            'price'             => 'required|integer',
            'description'       => 'required',
            'additional_info'   => 'required',
            'categories_id'     => 'required|exists:product_categories,id'
        ]);

        $data['slug'] = Str::slug($request->name);

        $item->update($data);
        Alert::success('Sukses', 'Produk Berhasil Diubah');
        return redirect()->route('admin-product');
    }


    public function destroy($id)
    {
        // $product = Product::findOrFail($product);
        // $product = Product::with((['galleries']))->findOrFail($id);
        $product = Product::findOrFail($id);
        // if ($productGallery->photos != null) {
        //     $realLocation = "storage/" . $productGallery->photos;
        //     if (file_exists($realLocation) && !is_dir($realLocation)) {
        //         unlink($realLocation);
        //     }
        // }

        // Storage::delete($productGallery->photos);
        // $productGallery->delete();
        $product->delete();
        Alert::success('Sukses', 'Produk Berhasil Dihapus');
        return redirect()->route('admin-product');
    }
}