<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\FloatingRequest;
use App\Models\Floating;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class FloatingController extends Controller
{
    public function index()
    {
        $data = [
            'title'         => 'Floating Button 1',
            'floating'      => Floating::first(),
            'content'       => 'new-admin/floating/firstFloating'
        ];
        return view('new-admin.layouts.wrapper', $data);
    }


    public function update(Request $request)
    {
        $item = Floating::first();
        $data = $request->validate([
            'name'      => 'required',
            'link'      => 'required',
            'photos'    => 'mimes:png,jpg,jpeg,svg',
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
            $data['photos'] = $request->file('photos')->store('assets/floating', 'public');
        } else {
            $data['photos'] = $item->photos;
        }

        $item->update($data);
        Alert::success('Sukses', 'Data Berhasil Diubah');
        return redirect('/admin/first-floating');
    }
}
