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
            'title' => 'Alamat Dan Link Sosial Media Footer',
            'sosmed' => Sosmed::first(),
            'content' => 'new-admin/sosmed/index'
        ];
        return view('new-admin.layouts.wrapper', $data);
    }


    public function update(Request $request)
    {
        $about = Sosmed::first();
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
        ]);

        $about->update($data);
        Alert::success('Sukses', 'Data Berhasil Diubah');
        return redirect('/admin/sosmed_footer');
    }
}
