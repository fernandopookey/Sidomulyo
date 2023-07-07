<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Sosmed;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class SosmedController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Footer Content',
            'sosmed' => Sosmed::first(),
            'content' => 'new-admin/sosmed/index'
        ];
        return view('new-admin.layouts.wrapper', $data);
    }


    public function update(Request $request)
    {
        $item = Sosmed::first();
        $data = $request->validate([
            'alamat'             => 'required',
            'whatsapp'           => 'required',
            'whatsapp_title'     => 'required',
            'instagram'          => 'required',
            'instagram_title'    => 'required',
            'shopee'             => 'required',
            'shopee_title'       => 'required',
            'tokopedia'          => 'required',
            'tokopedia_title'    => 'required',
            'twiter'             => 'required',
            'twiter_title'       => 'required',
            'facebook'           => 'required',
            'facebook_title'     => 'required',
            'photos'             => 'mimes:png,jpg,jpeg'
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

            $data['photos'] = $request->file('photos')->store('assets/footer', 'public');
        } else {
            $data['photos'] = $item->photos;
        }

        $item->update($data);
        Alert::success('Sukses', 'Footer Updated Successfully');
        return redirect('/admin/footer');
    }
}