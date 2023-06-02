<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\BackgroundImageRequest;
use App\Models\BackgroundImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;
use Yajra\DataTables\Facades\DataTables;

class BackgroundImageController extends Controller
{
    public function index()
    {
        $data = [
            'title'             => 'Background',
            'backgroundImage'   => BackgroundImage::first(),
            'content'           => 'admin/background-image/index'
        ];
        return view('admin.layouts.wrapper', $data);
    }


    public function update(Request $request)
    {
        $item = BackgroundImage::first();
        $data = $request->validate([
            'photos'    =>  'required|mimes:png,jpg,jpeg,svg',
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
            $data['photos'] = $request->file('photos')->store('assets/backgroundImages', 'public');
        } else {
            $data['photos'] = $item->photos;
        }

        // $item->update($data);
        // Alert::success('Sukses', 'Data Berhasil Diubah');
        // return redirect('/admin/header');

        // $data['logo'] = $request->file('logo')->store('assets/header', 'public');

        $item->update($data);
        Alert::success('Sukses', 'Data Berhasil Diubah');
        return redirect('/admin/background_image');
    }
}
