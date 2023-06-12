<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\TermsAndConditionsRequest;
use App\Models\TermsAndConditions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;
use RealRashid\SweetAlert\Facades\Alert;

class TermsAndConditionsController extends Controller
{
    public function index()
    {
        $data = [
            'title'         => 'Syarat Dan Ketentuan',
            'terms'         => TermsAndConditions::get(),
            'content'       => 'admin/terms/index'
        ];

        if (request()->ajax()) {
            $query = TermsAndConditions::query();

            return DataTables::of($query)->addColumn('action', function ($item) {
                return '
                    <div class="btn-group">
                        <button type="button" class="btn btn-primary">Aksi</button>
                        <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
                            <span class="visually-hidden">Toggle Dropdown</span>
                        </button>
                        <ul class="dropdown-menu">
                                <a class="dropdown-item text-success" href="' . route('termsAndConditions.show', $item->id) . '">
                                    Detail
                                </a>
                                <a class="dropdown-item" href="' . route('termsAndConditions.edit', $item->id) . '">
                                    Edit
                                </a>
                                <form action="' . route('termsAndConditions.destroy', $item->id) . '" method="POST" onclick="return confirm(`Hapus Data ?`)">
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
            'title' => 'Tambah Syarat Dan Ketentuan',
            'content' => 'admin/terms/create'
        ];

        return view('admin.layouts.wrapper', $data);
    }

    public function store(TermsAndConditionsRequest $request)
    {
        $data = $request->all();

        TermsAndConditions::create($data);
        Alert::success('Sukses', 'Syarat dan Ketentuan Berhasil Ditambahkan');
        return redirect()->route('termsAndConditions.index');
    }

    public function show(string $id)
    {
        $data = [
            'title'         => 'Detail Syarat Dan Ketentuan',
            'terms'         => TermsAndConditions::find($id),
            'content'       => 'admin/terms/detail'
        ];
        return view('admin.layouts.wrapper', $data);
    }

    public function edit(string $id)
    {
        $data = [
            'title'     => 'Edit Syarat Dan Ketentuan',
            'terms'     => TermsAndConditions::find($id),
            'content'   => 'admin/terms/edit'
        ];
        return view('admin.layouts.wrapper', $data);
    }

    public function update(Request $request, $id)
    {
        $item = TermsAndConditions::find($id);
        $data = $request->validate([
            'title'         => 'string',
            'description'   => 'string'
        ]);

        $item->update($data);
        Alert::success('Sukses', 'Syarat Dan Ketentuan Berhasil Diubah');
        return redirect()->route('termsAndConditions.index');
    }

    // public function destroy(TermsAndConditions $terms)
    // {
    //     // dd($termsAndConditions);
    //     $terms->delete();
    //     Alert::success('Sukses', 'Terms And Conditions Berhasil Dihapus');
    //     return redirect()->route('terms.index');
    // }

    public function destroy($id)
    {
        $terms = TermsAndConditions::find($id);
        $terms->delete();
        Alert::success('Sukses', 'Syarat Dan Ketentuan Berhasil Dihapus');
        return redirect()->route('termsAndConditions.index');
    }
}
