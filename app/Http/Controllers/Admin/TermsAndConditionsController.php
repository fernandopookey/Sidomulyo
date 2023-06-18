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
            'content'       => 'new-admin/terms/index'
        ];
        return view('new-admin.layouts.wrapper', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Tambah Syarat Dan Ketentuan',
            'content' => 'new-admin/terms/create'
        ];

        return view('new-admin.layouts.wrapper', $data);
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
            'content'       => 'new-admin/terms/detail'
        ];
        return view('new-admin.layouts.wrapper', $data);
    }

    public function edit(string $id)
    {
        $data = [
            'title'     => 'Edit Syarat Dan Ketentuan',
            'terms'     => TermsAndConditions::find($id),
            'content'   => 'new-admin/terms/edit'
        ];
        return view('new-admin.layouts.wrapper', $data);
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
    public function destroy($id)
    {
        $terms = TermsAndConditions::find($id);
        $terms->delete();
        Alert::success('Sukses', 'Syarat Dan Ketentuan Berhasil Dihapus');
        return redirect()->route('termsAndConditions.index');
    }
}
