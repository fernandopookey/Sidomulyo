<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\HomeContentRequest;
use App\Models\HomeContent;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Storage;

class HomeContentController extends Controller
{
    public function index()
    {
        $data = [
            'title'     => 'Konten & Link Halaman Home',
            'homecontent'   => HomeContent::get(),
            'content'   => 'admin/homecontent/index'
        ];

        if (request()->ajax()) {
            $query = HomeContent::query();

            return DataTables::of($query)->addColumn('action', function ($item) {
                return '
                    <div class="btn-group">
                        <button type="button" class="btn btn-primary">Aksi</button>
                        <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
                            <span class="visually-hidden">Toggle Dropdown</span>
                        </button>
                        <ul class="dropdown-menu">
                                <a class="dropdown-item" href="' . route('homecontent.edit', $item->id) . '">
                                    Edit
                                </a>
                                <form action="' . route('homecontent.destroy', $item->id) . '" method="POST">
                                    ' . method_field('delete') . csrf_field() . '
                                    <button type="submit" class="dropdown-item text-danger">Hapus</button>
                                </form>
                        </ul>
                    </div>
                ';
            })->editColumn('icon', function ($item) {
                return $item->icon ? '<img src="' . Storage::url($item->icon) . '" style="max-height: 80px;" />' : '';
            })->rawColumns(['action', 'icon'])->make();
        }

        return view('admin.layouts.wrapper', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Tambah Konten',
            'content' => 'admin/homecontent/create'
        ];

        return view('admin.layouts.wrapper', $data);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title'     => 'required',
            'link'      => 'required',
            'icon'      => 'required|image',
        ]);

        $data['icon'] = $request->file('icon')->store('assets/homecontent', 'public');

        HomeContent::create($data);
        Alert::success('Sukses', 'Konten Berhasil Ditambahkan');
        return redirect()->route('homecontent.index');
    }

    public function edit(string $id)
    {
        $data = [
            'title'         => 'Edit Konten',
            'homecontent'   => HomeContent::find($id),
            'content'       => 'admin/homecontent/edit'
        ];
        return view('admin.layouts.wrapper', $data);
    }

    public function update(Request $request, string $id)
    {
        $homecontent = HomeContent::find($id);
        $data = $request->validate([
            'title'          => 'required',
            'link'              => 'required',
            'icon'            => 'image',
        ]);

        if ($request->hasFile('icon')) {

            if ($homecontent->icon != null) {
                $realLocation = "storage/" . $homecontent->icon;
                if (file_exists($realLocation) && !is_dir($realLocation)) {
                    unlink($realLocation);
                }
            }

            $icon = $request->file('icon');
            $file_name = time() . '-' . $icon->getClientOriginalName();

            $data['icon'] = $request->file('icon')->store('assets/homecontent', 'public');
        } else {
            $data['icon'] = $homecontent->icon;
        }

        $homecontent->update($data);
        Alert::success('Sukses', 'Konten Berhasil Diubah');
        return redirect()->route('homecontent.index');
    }

    public function destroy(HomeContent $homecontent)
    {
        if ($homecontent->icon != null) {
            $realLocation = "storage/" . $homecontent->icon;
            if (file_exists($realLocation) && !is_dir($realLocation)) {
                unlink($realLocation);
            }
        }

        Storage::delete($homecontent->icon);
        $homecontent->delete();
        Alert::success('Sukses', 'Konten Berhasil Dihapus');
        return redirect()->route('homecontent.index');
    }
}
