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
            'title'     => 'Question List',
            'faq'       => FAQ::get(),
            'content'   => 'new-admin/faq/index'
        ];
        return view('new-admin.layouts.wrapper', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Add New Question',
            'content' => 'new-admin/faq/create'
        ];

        return view('new-admin.layouts.wrapper', $data);
    }

    public function store(FaqRequest $request)
    {
        $data = $request->all();

        FAQ::create($data);
        Alert::success('Sukses', 'Question Added Successfully');
        return redirect()->route('faqs.index');
    }

    public function show(string $id)
    {
        $data = [
            'title'     => 'Question Details',
            'faq'       => FAQ::find($id),
            'content'   => 'new-admin/faq/detail'
        ];
        return view('new-admin.layouts.wrapper', $data);
    }

    public function edit(string $id)
    {
        $data = [
            'title'     => 'Edit Question',
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
        Alert::success('Sukses', 'Question Updated Successfully');
        return redirect()->route('faqs.index');
    }

    public function destroy(FAQ $faq)
    {
        $faq->delete();
        Alert::success('Sukses', 'Question Deleted Successfully');
        return redirect()->route('faqs.index');
    }
}
