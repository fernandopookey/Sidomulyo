<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HomeTextContent;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class HomeTextContentController extends Controller
{
    public function index()
    {
        $data = [
            'title'     => 'Teks Halaman Utama',
            'item'      => HomeTextContent::first(),
            'content'   => 'admin/home-text-content/index'
        ];
        return view('admin.layouts.wrapper', $data);
    }

    public function update(Request $request)
    {
        $item = HomeTextContent::first();
        $data = $request->validate([
            'title'         =>  'required',
            'description'   =>  'required',
        ]);

        $item->update($data);
        Alert::success('Sukses', 'Data Berhasil Diubah');
        return redirect('/admin/home_text_content');
    }
}
