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
            'title'              => 'List Kategori Product',
            'product-category'   => ProductCategory::get(),
            'content'            => 'new-admin/product-category/index'
        ];

        if (request()->ajax()) {
            $query = ProductCategory::query();

            return DataTables::of($query)->addColumn('action', function ($item) {
                return '
                    <div class="btn-group">
                        <button type="button" class="btn btn-primary">Aksi</button>
                        <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
                            <span class="visually-hidden">Toggle Dropdown</span>
                        </button>
                        <ul class="dropdown-menu">
                                <a class="dropdown-item" href="' . route('product-category.edit', $item->id) . '">
                                    Edit
                                </a>
                                <form action="' . route('product-category.destroy', $item->id) . '" method="POST">
                                    ' . method_field('delete') . csrf_field() . '
                                    <button type="submit" class="dropdown-item text-danger">Hapus</button>
                                </form>
                        </ul>
                    </div>
                ';
            })->editColumn('photos', function ($item) {
                return $item->photos ? '<img src="' . Storage::url($item->photos) . '" style="max-height: 80px;" />' : '';
            })->rawColumns(['action', 'photos'])->make();
        }

        return view('new-admin.layouts.wrapper', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Tambah Kategori Produk',
            'content' => 'new-admin/product-category/create'
        ];

        return view('new-admin.layouts.wrapper', $data);
    }

    public function store(Request $request)
    {
        // $data = $request->all();
        $data = $request->validate([
            'name'      => 'required|string|max:200',
            'photos'    => 'required|image'
        ]);

        $data['slug'] = Str::slug($request->name);
        $data['photos'] = $request->file('photos')->store('assets/product-category', 'public');

        ProductCategory::create($data);
        Alert::success('Sukses', 'Kategori Produk Berhasil Ditambahkan');
        return redirect()->route('product-category.index');
    }


    public function edit(string $id)
    {
        $data = [
            'title'             => 'Edit Kategori Produk',
            'product_category'  => ProductCategory::find($id),
            'content'           => 'new-admin/product-category/edit'
        ];
        return view('new-admin.layouts.wrapper', $data);
    }

    public function update(Request $request, string $id)
    {
        $item = ProductCategory::find($id);
        $data = $request->validate([
            'name'          => 'required|string',
            'photos'        => 'image',
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
        Alert::success('Sukses', 'Kategori Produk Berhasil Diubah');
        return redirect()->route('product-category.index');
    }


    public function destroy(ProductCategory $productCategory)
    {
        if ($productCategory->photos != null) {
            $realLocation = "storage/" . $productCategory->photos;
            if (file_exists($realLocation) && !is_dir($realLocation)) {
                unlink($realLocation);
            }
        }

        Storage::delete($productCategory->photos);
        $productCategory->delete();
        Alert::success('Sukses', 'Kategori Produk Berhasil Dihapus');
        return redirect()->route('product-category.index');
    }
}
