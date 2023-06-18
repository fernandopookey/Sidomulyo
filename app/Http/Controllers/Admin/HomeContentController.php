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
            'title'         => 'Tautan Halaman Utamaaa',
            'homecontent'   => HomeContent::get(),
            'content'       => 'new-admin/homecontent/index'
        ];

        return view('new-admin.layouts.wrapper', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Tambah Tautan',
            'content' => 'new-admin/homecontent/create'
        ];

        return view('new-admin.layouts.wrapper', $data);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title'     => 'required',
            'link'      => 'required',
            'icon'      => 'required|mimes:png,jpg,jpeg,svg',
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
            'content'       => 'new-admin/homecontent/edit'
        ];
        return view('new-admin.layouts.wrapper', $data);
    }

    public function update(Request $request, string $id)
    {
        $homecontent = HomeContent::find($id);
        $data = $request->validate([
            'title'          => 'required',
            'link'           => 'required',
            'icon'           => 'mimes:png,jpg,jpeg,svg',
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
