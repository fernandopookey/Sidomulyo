<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DiscountTotalPayment;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class DiscountTotalPaymentController extends Controller
{
    public function index()
    {
        $data = [
            'title'                 => 'List Diskon Total Pembayaran',
            'discountTotalPayment'  => DiscountTotalPayment::get(),
            'content'               => 'admin/discountTotalPayment/index'
        ];

        return view('admin.layouts.wrapper', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Tambah Diskon',
            'content' => 'admin/discountTotalPayment/create'
        ];

        return view('admin.layouts.wrapper', $data);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'total_payment'     => 'required',
            'discount'          => 'required'
        ]);

        DiscountTotalPayment::create($data);
        Alert::success('Sukses', 'Diskon Berhasil Ditambahkan');
        return redirect()->route('discountTotalPayment.index');
    }

    public function edit(string $id)
    {
        $data = [
            'title'                 => 'Edit Diskon Total Pembayaran',
            'discountTotalPayment'  => DiscountTotalPayment::find($id),
            'content'               => 'admin/discountTotalPayment/edit'
        ];
        return view('admin.layouts.wrapper', $data);
    }

    public function update(Request $request, string $id)
    {
        $item = DiscountTotalPayment::find($id);
        $data = $request->validate([
            'total_payment'     => 'required',
            'discount'          => 'required'
        ]);
        $item->update($data);
        Alert::success('Sukses', 'Diskon Berhasil Diubah');
        return redirect()->route('discountTotalPayment.index');
    }

    public function destroy(DiscountTotalPayment $discountTotalPayment)
    {
        $discountTotalPayment->delete();
        Alert::success('Sukses', 'Diskon Berhasil Dihapus');
        return redirect()->route('discountTotalPayment.index');
    }
}
