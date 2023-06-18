<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Delivery;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class DeliveryController extends Controller
{
    public function index()
    {
        $data = [
            'title'     => 'Pengiriman',
            'delivery'  => Delivery::first(),
            'content'   => 'new-admin/delivery/index'
        ];
        return view('new-admin.layouts.wrapper', $data);
    }


    public function update(Request $request)
    {
        $delivery           = Delivery::first();
        $data               = $request->validate([
            'title'         => 'required',
            'description'   => 'required'
        ]);

        $delivery->update($data);
        Alert::success('Sukses', 'Data Berhasil Diubah');
        return redirect('/admin/pengiriman');
    }
}
