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
            'title'     => 'List FAQs',
            'faq'       => FAQ::get(),
            'content'   => 'new-admin/faq/index'
        ];
        return view('new-admin.layouts.wrapper', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Tambah FAQS',
            'content' => 'new-admin/faq/create'
        ];

        return view('new-admin.layouts.wrapper', $data);
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
            'content'   => 'new-admin/faq/detail'
        ];
        return view('new-admin.layouts.wrapper', $data);
    }

    public function edit(string $id)
    {
        $data = [
            'title'     => 'Edit FAQs',
            'faq'       => FAQ::find($id),
            'content'   => 'new-admin/faq/edit'
        ];
        return view('new-admin.layouts.wrapper', $data);
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
