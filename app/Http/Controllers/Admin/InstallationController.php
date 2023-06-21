<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\InstallationRequest;
use App\Models\Installation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class InstallationController extends Controller
{
    public function index()
    {
        $data = [
            'title'         => 'Installation List',
            'installation'  => Installation::get(),
            'content'       => 'new-admin/installation/index'
        ];
        return view('new-admin.layouts.wrapper', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Add New Installation',
            'content' => 'new-admin/installation/create'
        ];

        return view('new-admin.layouts.wrapper', $data);
    }

    public function store(InstallationRequest $request)
    {
        $data = $request->all();

        $data['photos'] = $request->file('photos')->store('assets/installation', 'public');

        Installation::create($data);
        Alert::success('Sukses', 'Installation Added Successfully');
        return redirect()->route('installation.index');
    }

    public function edit(string $id)
    {
        $data = [
            'title' => 'Edit Installation',
            'installation' => Installation::find($id),
            'content' => 'new-admin/installation/edit'
        ];
        return view('new-admin.layouts.wrapper', $data);
    }

    public function update(Request $request, string $id)
    {
        $item = Installation::find($id);
        $data = $request->validate([
            'name'          => 'required',
            'photos'        => 'mimes:png,jpg,jpeg',
        ]);

        if ($request->hasFile('photos')) {

            if ($item->photos != null) {
                $realLocation = "storage/" . $item->photos;
                if (file_exists($realLocation) && !is_dir($realLocation)) {
                    unlink($realLocation);
                }
            }

            $photos = $request->file('photos');
            $file_name = time() . '-' . $photos->getClientOriginalName();

            $data['photos'] = $request->file('photos')->store('assets/installation', 'public');
        } else {
            $data['photos'] = $item->photos;
        }

        $item->update($data);
        Alert::success('Sukses', 'Installation Updated Successfully');
        return redirect()->route('installation.index');
    }

    public function destroy(Installation $installation)
    {
        if ($installation->photos != null) {
            $realLocation = "storage/" . $installation->photos;
            if (file_exists($realLocation) && !is_dir($realLocation)) {
                unlink($realLocation);
            }
        }

        Storage::delete($installation->photos);
        $installation->delete();
        Alert::success('Sukses', 'Installation Deleted Successfully');
        return redirect()->route('installation.index');
    }
}
