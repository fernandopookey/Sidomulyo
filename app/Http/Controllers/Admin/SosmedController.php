<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SosmedRequest;
use App\Models\Sosmed;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;
use Yajra\DataTables\Facades\DataTables;

class SosmedController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Alamat Dan Link Sosial Media',
            'sosmed' => Sosmed::first(),
            'content' => 'admin/sosmed/index'
        ];
        return view('admin.layouts.wrapper', $data);
    }


    public function update(Request $request)
    {
        $about = Sosmed::first();
        $data = $request->validate([
            'home_title'         => 'required',
            'other'              => 'required',
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
        Alert::success('Sukses', 'Data Sosial Media Berhasil Diubah');
        return redirect('/admin/sosmed');
    }
}
