<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProductGalleryRequest;
use App\Models\Product;
use App\Models\ProductGallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;
use Yajra\DataTables\Facades\DataTables;

class ProductGalleryController extends Controller
{
    public function index(Request $request)
    {
        $product = DB::table('product_galleries')->leftJoin('products', 'product_id', 'product_galleries.fk');

        if ($request->has('search')) {
            $query = ProductGallery::with(['product']);
            $data = [
                'title'             => 'List Gallery Produk',
                'productgallery'    => Product::with(['product'])->where('name', 'LIKE', '%' . $request->search . '%')->paginate(12),
                'content'           => 'admin/productgallery/index'
            ];
        } else {
            $data = [
                'title'             => 'List Gallery Produk',
                'productgallery'    => ProductGallery::paginate(12),
                'content'           => 'admin/productgallery/index'
            ];
        }

        return view('admin.layouts.wrapper', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = [
            'title'     => 'Tambah Foto',
            'content'   => 'admin/productgallery/create'
        ];

        $products = Product::all();

        return view(
            'admin.layouts.wrapper',
            $data,
            [
                'products'     => $products,
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductGalleryRequest $request)
    {
        $data = $request->all();

        $data['photos'] = $request->file('photos')->store('assets/productgallery', 'public');

        ProductGallery::create($data);
        Alert::success('Sukses', 'Gambar Produk Berhasil Ditambahkan');
        return redirect("/admin/productgallery");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = [
            'title'     => 'Detail Produk',
            'product'   => Product::find($id),
            'content'   => 'admin/product/detail'
        ];
        return view('admin.layouts.wrapper', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductGalleryRequest $request, string $id)
    {
        //
    }


    public function destroy($id)
    {
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
        return redirect("/admin/productgallery");
    }
}
