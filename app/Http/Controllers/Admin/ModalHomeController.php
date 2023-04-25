<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ModalHome;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ModalHomeController extends Controller
{
    public function index()
    {
        $data = [
            'title'     => 'Pop Up Halaman Utama',
            'modalHome' => ModalHome::first(),
            'content'   => 'admin/modalHome/index'
        ];
        return view('admin.layouts.wrapper', $data);
    }


    public function update(Request $request)
    {
        $item = ModalHome::first();
        $data = $request->validate([
            'photos'        => 'image',
            'name'          => 'string',
            'description'   => 'string'
        ]);

        // $data['logo'] = $request->file('logo')->store('assets/header', 'public');

        if ($request->hasFile('photos')) {

            if ($item->photos != null) {
                $realLocation = "storage/" . $item->photos;
                if (file_exists($realLocation) && !is_dir($realLocation)) {
                    unlink($realLocation);
                }
            }

            $photos = $request->file('photos');
            $file_name = time() . '-' . $photos->getClientOriginalName();
            $data['photos'] = $request->file('photos')->store('assets/modalHome', 'public');
        } else {
            $data['photos'] = $item->photos;
        }

        $item->update($data);
        Alert::success('Sukses', 'Modal Halaman Utama Berhasil Diubah');
        return redirect('/admin/modalHome');
    }
}
