<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\InstallationRequest;
use App\Models\Installation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class InstallationController extends Controller
{
    public function index()
    {
        $data = [
            'title'     => 'Pemasangan',
            'installation'   => Installation::get(),
            'content'   => 'new-admin/installation/index'
        ];

        if (request()->ajax()) {
            $query = Installation::query();

            return DataTables::of($query)->addColumn('action', function ($item) {
                return '
                    <div class="btn-group">
                        <button type="button" class="btn btn-primary">Aksi</button>
                        <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
                            <span class="visually-hidden">Toggle Dropdown</span>
                        </button>
                        <ul class="dropdown-menu">
                                <a class="dropdown-item" href="' . route('installation.edit', $item->id) . '">
                                    Edit
                                </a>
                                <form action="' . route('installation.destroy', $item->id) . '" method="POST">
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
            'title' => 'Tambah Pemasangan',
            'content' => 'new-admin/installation/create'
        ];

        return view('new-admin.layouts.wrapper', $data);
    }

    public function store(InstallationRequest $request)
    {
        $data = $request->all();

        $data['photos'] = $request->file('photos')->store('assets/installation', 'public');

        Installation::create($data);
        Alert::success('Sukses', 'Pemasangan Berhasil Ditambahkan');
        return redirect()->route('installation.index');
    }

    public function edit(string $id)
    {
        $data = [
            'title' => 'Edit Pemasangan',
            'installation' => Installation::find($id),
            'content' => 'new-admin/installation/edit'
        ];
        return view('new-admin.layouts.wrapper', $data);
    }

    public function update(Request $request, string $id)
    {
        $item = Installation::find($id);
        $data = $request->validate([
            'name'          => 'required',
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

            $data['photos'] = $request->file('photos')->store('assets/installation', 'public');
        } else {
            $data['photos'] = $item->photos;
        }

        $item->update($data);
        Alert::success('Sukses', 'Pemasangan Berhasil Diubah');
        return redirect()->route('installation.index');
    }

    public function destroy(Installation $installation)
    {
        if ($installation->photos != null) {
            $realLocation = "storage/" . $installation->photos;
            if (file_exists($realLocation) && !is_dir($realLocation)) {
                unlink($realLocation);
            }
        }

        Storage::delete($installation->photos);
        $installation->delete();
        Alert::success('Sukses', 'Pemasangan Berhasil Dihapus');
        return redirect()->route('installation.index');
    }
}
