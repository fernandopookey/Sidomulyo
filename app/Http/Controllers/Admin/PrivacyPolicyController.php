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
            'title'             => 'Privacy Policy List',
            'privacyPolicy'     => PrivacyPolicy::get(),
            'content'           => 'new-admin/privacy-policy/index'
        ];
        return view('new-admin.layouts.wrapper', $data);
    }

    public function create()
    {
        $data = [
            'title'     => 'Add New Privacy Policy',
            'content'   => 'new-admin/privacy-policy/create'
        ];

        return view('new-admin.layouts.wrapper', $data);
    }

    public function store(PrivacyPolicyRequest $request)
    {
        $data = $request->all();

        PrivacyPolicy::create($data);
        Alert::success('Sukses', 'Privacy Policy Added Successfully');
        return redirect()->route('privacy-policy.index');
    }

    public function show(string $id)
    {
        $data = [
            'title'             => 'Privacy Policy Details',
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
        Alert::success('Sukses', 'Privacy Policy Updated Successfully');
        return redirect()->route('privacy-policy.index');
    }

    public function destroy(PrivacyPolicy $privacyPolicy)
    {
        $privacyPolicy->delete();
        Alert::success('Sukses', 'Privacy Policy Deleted Successfully');
        return redirect()->route('privacy-policy.index');
    }
}
