<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PaymentConfirmation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class PaymentConfirmationController extends Controller
{
    public function index()
    {
        $data = [
            'title'                 => 'Konfirmasi Pembayaran Customer',
            'paymentConfirmation'   => PaymentConfirmation::get(),
            'content'               => 'new-admin/paymentConfirmation/index'
        ];

        return view('new-admin.layouts.wrapper', $data);
    }

    public function destroy($id)
    {
        $payment = PaymentConfirmation::find($id);

        if ($payment->photos != null) {
            $realLocation = "storage/" . $payment->photos;
            if (file_exists($realLocation) && !is_dir($realLocation)) {
                unlink($realLocation);
            }
        }

        Storage::delete($payment->photos);
        $payment->delete();
        Alert::success('Sukses', 'Konfirmasi Pembayaran Berhasil Dihapus');
        return redirect()->route('paymentConfirmation.index');
    }
}
