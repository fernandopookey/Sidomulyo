<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\FaqRequest;
use App\Models\FAQ;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;
use RealRashid\SweetAlert\Facades\Alert;

class FaqController extends Controller
{
    public function index()
    {
        $data = [
            'title'     => 'List FAQ',
            'faq'       => FAQ::get(),
            'content'   => 'admin/faq/index'
        ];

        if (request()->ajax()) {
            $query = FAQ::query();

            return DataTables::of($query)->addColumn('action', function ($item) {
                return '
                    <div class="btn-group">
                        <button type="button" class="btn btn-primary">Aksi</button>
                        <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
                            <span class="visually-hidden">Toggle Dropdown</span>
                        </button>
                        <ul class="dropdown-menu">
                                <a class="dropdown-item text-success" href="' . route('faqs.show', $item->id) . '">
                                    Detail
                                </a>
                                <a class="dropdown-item" href="' . route('faqs.edit', $item->id) . '">
                                    Edit
                                </a>
                                <form action="' . route('faqs.destroy', $item->id) . '" method="POST" onclick="return confirm(`Hapus Data ?`)">
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
            'title' => 'Tambah FAQS',
            'content' => 'admin/faq/create'
        ];

        return view('admin.layouts.wrapper', $data);
    }

    public function store(FaqRequest $request)
    {
        $data = $request->all();

        FAQ::create($data);
        Alert::success('Sukses', 'FAQS Berhasil Ditambahkan');
        return redirect()->route('faqs.index');
    }

    public function show(string $id)
    {
        $data = [
            'title'     => 'Detail FAQs',
            'faq'       => FAQ::find($id),
            'content'   => 'admin/faq/detail'
        ];
        return view('admin.layouts.wrapper', $data);
    }

    public function edit(string $id)
    {
        $data = [
            'title'     => 'Edit FAQs',
            'faq'       => FAQ::find($id),
            'content'   => 'admin/faq/edit'
        ];
        return view('admin.layouts.wrapper', $data);
    }

    public function update(Request $request, $id)
    {
        $item = FAQ::find($id);
        $data = $request->validate([
            'title'         => 'string',
            'description'   => 'string'
        ]);

        $item->update($data);
        Alert::success('Sukses', 'FAQs Berhasil Diubah');
        return redirect()->route('faqs.index');
    }

    public function destroy(FAQ $faq)
    {
        $faq->delete();
        Alert::success('Sukses', 'FAQs Berhasil Dihapus');
        return redirect()->route('faqs.index');
    }
}
