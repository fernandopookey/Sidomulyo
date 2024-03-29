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
            'content'   => 'new-admin/home-text-content/index'
        ];
        return view('new-admin.layouts.wrapper', $data);
    }

    public function update(Request $request)
    {
        $item = HomeTextContent::first();
        $data = $request->validate([
            'title'         =>  'required',
            'description'   =>  'required',
        ]);

        $item->update($data);
        Alert::success('Sukses', 'Data Updated Successfully');
        return redirect('/admin/home-text-content');
    }
}
