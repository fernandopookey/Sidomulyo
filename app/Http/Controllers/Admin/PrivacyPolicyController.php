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
            'content'           => 'new-admin/privacy-policy/index'
        ];
        return view('new-admin.layouts.wrapper', $data);
    }

    public function create()
    {
        $data = [
            'title'     => 'Tambah Privacy Policy',
            'content'   => 'new-admin/privacy-policy/create'
        ];

        return view('new-admin.layouts.wrapper', $data);
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
            'content'           => 'new-admin/privacy-policy/detail'
        ];
        return view('new-admin.layouts.wrapper', $data);
    }

    public function edit(string $id)
    {
        $data = [
            'title'             => 'Edit Privacy Policy',
            'privacyPolicy'     => PrivacyPolicy::find($id),
            'content'           => 'new-admin/privacy-policy/edit'
        ];
        return view('new-admin.layouts.wrapper', $data);
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
