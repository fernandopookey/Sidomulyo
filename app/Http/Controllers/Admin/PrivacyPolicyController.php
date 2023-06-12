<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PrivacyPolicyRequest;
use App\Models\PrivacyPolicy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;
use RealRashid\SweetAlert\Facades\Alert;

class PrivacyPolicyController extends Controller
{
    public function index()
    {
        $data = [
            'title'             => 'List Privacy Policy',
            'privacyPolicy'     => PrivacyPolicy::get(),
            'content'           => 'admin/privacy-policy/index'
        ];

        if (request()->ajax()) {
            $query = PrivacyPolicy::query();

            return DataTables::of($query)->addColumn('action', function ($item) {
                return '
                    <div class="btn-group">
                        <button type="button" class="btn btn-primary">Aksi</button>
                        <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
                            <span class="visually-hidden">Toggle Dropdown</span>
                        </button>
                        <ul class="dropdown-menu">
                                <a class="dropdown-item text-success" href="' . route('privacyPolicy.show', $item->id) . '">
                                    Detail
                                </a>
                                <a class="dropdown-item" href="' . route('privacyPolicy.edit', $item->id) . '">
                                    Edit
                                </a>
                                <form action="' . route('privacyPolicy.destroy', $item->id) . '" method="POST" onclick="return confirm(`Hapus Data ?`)">
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
            'title'     => 'Tambah Privacy Policy',
            'content'   => 'admin/privacy-policy/create'
        ];

        return view('admin.layouts.wrapper', $data);
    }

    public function store(PrivacyPolicyRequest $request)
    {
        $data = $request->all();

        PrivacyPolicy::create($data);
        Alert::success('Sukses', 'Privacy Policy Berhasil Ditambahkan');
        return redirect()->route('privacyPolicy.index');
    }

    public function show(string $id)
    {
        $data = [
            'title'             => 'Detail Privacy Policy',
            'privacyPolicy'     => PrivacyPolicy::find($id),
            'content'           => 'admin/privacy-policy/detail'
        ];
        return view('admin.layouts.wrapper', $data);
    }

    public function edit(string $id)
    {
        $data = [
            'title'             => 'Edit Privacy Policy',
            'privacyPolicy'     => PrivacyPolicy::find($id),
            'content'           => 'admin/privacy-policy/edit'
        ];
        return view('admin.layouts.wrapper', $data);
    }

    public function update(Request $request, $id)
    {
        $item = PrivacyPolicy::find($id);
        $data = $request->validate([
            'title'         => 'string',
            'description'   => 'string'
        ]);

        $item->update($data);
        Alert::success('Sukses', 'Privacy Policy Berhasil Diubah');
        return redirect()->route('privacyPolicy.index');
    }

    public function destroy(PrivacyPolicy $privacyPolicy)
    {
        $privacyPolicy->delete();
        Alert::success('Sukses', 'Privacy Policy Berhasil Dihapus');
        return redirect()->route('privacyPolicy.index');
    }
}
