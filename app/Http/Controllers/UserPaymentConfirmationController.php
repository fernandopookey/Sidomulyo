<?php

namespace App\Http\Controllers;

use App\Models\Header;
use App\Models\PaymentConfirmation;
use App\Models\Sosmed;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class UserPaymentConfirmationController extends Controller
{
    public function index()
    {
        $data = [
            'sosmed'    => Sosmed::get(),
            'header'    => Header::get(),
            'content' => 'user/pages/payment-confirmation'
        ];

        return view('user.pages.payment-confirmation', $data);
    }

    public function send(Request $request)
    {
        $data = $request->validate([
            'name'              => 'required',
            'bank'              => 'required',
            'account_number'    => 'required',
            'account_name'      => 'required',
            'photos'            => 'required|image'
        ]);

        $data['photos'] = $request->file('photos')->store('assets/userpaymentconfirmation', 'public');

        PaymentConfirmation::create($data);
        Alert::success('Sukses', 'Pesan terkirim, tunggu balasan admin melalui email yang anda kirim');
        return redirect('/konfirmasi_pembayaran/success');
    }

    public function success()
    {
        $data = [
            'sosmed'    => Sosmed::get(),
            'header'    => Header::get(),
            'content' => 'user/pages/paymentConfirmationSuccess'
        ];

        return view('user.pages.paymentConfirmationSuccess', $data);
    }
}
