<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\BackgroundImageRequest;
use App\Models\BackgroundImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;
use Yajra\DataTables\Facades\DataTables;

class BackgroundImageController extends Controller
{
    public function index()
    {
        $data = [
            'title'             => 'List Background Image',
            'backgroundImage'   => BackgroundImage::get(),
            'content'           => 'new-admin/background-image/index'
        ];

        if (request()->ajax()) {
            $query = BackgroundImage::query();

            return DataTables::of($query)->addColumn('action', function ($item) {
                return '
                    <div class="btn-group">
                        <button type="button" class="btn btn-primary">Aksi</button>
                        <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
                            <span class="visually-hidden">Toggle Dropdown</span>
                        </button>
                        <ul class="dropdown-menu">
                                <a class="dropdown-item" href="' . route('backgroundImage.edit', $item->id) . '">
                                    Edit
                                </a>
                                <form action="' . route('backgroundImage.destroy', $item->id) . '" method="POST">
                                    ' . method_field('delete') . csrf_field() . '
                                    <button type="submit" class="dropdown-item text-danger">Hapus</button>
                                </form>
                        </ul>
                    </div>
                ';
            })->editColumn('photos', function ($item) {
                return $item->photos ? '<img src="' . Storage::url($item->photos) . '" style="height: 100px; width: 120px; object-fit: cover;" />' : '';
            })->rawColumns(['action', 'photos'])->make();
        }

        return view('new-admin.layouts.wrapper', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Tambah Background Image',
            'content' => 'new-admin/background-image/create'
        ];

        return view('new-admin.layouts.wrapper', $data);
    }

    public function store(BackgroundImageRequest $request)
    {
        $data = $request->all();

        $data['photos'] = $request->file('photos')->store('assets/backgroundImage', 'public');

        BackgroundImage::create($data);
        Alert::success('Sukses', 'Background Image Berhasil Ditambahkan');
        return redirect()->route('backgroundImage.index');
    }

    public function edit(string $id)
    {
        $data = [
            'title'             => 'Edit Background Image',
            'backgroundImage'   => BackgroundImage::find($id),
            'content'           => 'new-admin/background-image/edit'
        ];
        return view('new-admin.layouts.wrapper', $data);
    }

    public function update(Request $request, string $id)
    {
        $item = BackgroundImage::find($id);
        $data = $request->validate([
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

            $data['photos'] = $request->file('photos')->store('assets/backgroundImage', 'public');
        } else {
            $data['photos'] = $item->photos;
        }

        $item->update($data);
        Alert::success('Sukses', 'Background Berhasil Diubah');
        return redirect()->route('backgroundImage.index');
    }
}
