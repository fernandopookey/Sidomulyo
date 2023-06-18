<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FourthFloating;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class FourthFloatingController extends Controller
{
    public function index()
    {
        $data = [
            'title'         => 'Floating Button Keempat',
            'floating'      => FourthFloating::first(),
            'content'       => 'new-admin/floating/fourthFloating'
        ];
        return view('new-admin.layouts.wrapper', $data);
    }


    public function update(Request $request)
    {
        $item = FourthFloating::first();
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
        return redirect('/admin/fourth_floating');
    }
}
