<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\FloatingRequest;
use App\Models\Floating;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class FloatingController extends Controller
{
    public function index()
    {
        $data = [
            'title'     => 'List Float',
            'blog'      => Floating::get(),
            'content'   => 'admin/floating/index'
        ];

        if (request()->ajax()) {
            $query = Floating::query();

            return DataTables::of($query)->addColumn('action', function ($item) {
                return '
                    <div class="btn-group">
                        <button type="button" class="btn btn-primary">Aksi</button>
                        <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
                            <span class="visually-hidden">Toggle Dropdown</span>
                        </button>
                        <ul class="dropdown-menu">
                                <a class="dropdown-item" href="' . route('floating.edit', $item->id) . '">
                                    Edit
                                </a>
                                <form action="' . route('floating.destroy', $item->id) . '" method="POST" onclick="return confirm(`Hapus Data ?`)">
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

        return view('admin.layouts.wrapper', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Tambah Float',
            'content' => 'admin/floating/create'
        ];

        return view('admin.layouts.wrapper', $data);
    }

    public function store(FloatingRequest $request)
    {
        $data = $request->all();

        $data['photos'] = $request->file('photos')->store('assets/floating', 'public');

        Floating::create($data);
        Alert::success('Sukses', 'Floating Berhasil Ditambahkan');
        return redirect()->route('floating.index');
    }

    public function edit(string $id)
    {
        $data = [
            'title'     => 'Edit Floating',
            'floating'      => Floating::find($id),
            'content'   => 'admin/floating/edit'
        ];
        return view('admin.layouts.wrapper', $data);
    }

    public function update(Request $request, string $id)
    {
        $item = Floating::find($id);
        $data = $request->validate([
            'name'          => 'required',
            'link'          => 'required',
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

            $data['photos'] = $request->file('photos')->store('assets/floating', 'public');
        } else {
            $data['photos'] = $item->photos;
        }

        $item->update($data);
        Alert::success('Sukses', 'Floating Berhasil Diubah');
        return redirect()->route('floating.index');
    }

    public function destroy(Floating $floating)
    {
        if ($floating->photos != null) {
            $realLocation = "storage/" . $floating->photos;
            if (file_exists($realLocation) && !is_dir($realLocation)) {
                unlink($realLocation);
            }
        }

        Storage::delete($floating->photos);
        $floating->delete();
        Alert::success('Sukses', 'Floating Berhasil Dihapus');
        return redirect()->route('floating.index');
    }
}
