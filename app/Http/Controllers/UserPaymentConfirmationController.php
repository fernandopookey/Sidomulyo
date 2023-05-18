<?php

namespace App\Http\Controllers;

use App\Models\Header;
use App\Models\PaymentConfirmation;
use App\Models\Sosmed;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class UserPaymentConfirmationController extends Controller
{
    public function index($id)
    {
        $sosmed         = Sosmed::get();
        $header         = Header::get();

        $payment   = Transaction::where('id', $id)->where('users_id', Auth::id())->first();

        $data = [
            'sosmed'    => $sosmed,
            'header'    => $header,
            'content'   => 'user/pages/payment-confirmation',
            'payment'   => $payment
        ];

        return view('user.pages.payment-confirmation', $data);
    }

    public function send(Request $request)
    {
        // Simpan Data User
        $user = Auth::user();
        $user->update($request->except('total_price'));

        //Proses Checkout
        $code = 'SM-' . mt_rand(000000, 999999);
        $payment = PaymentConfirmation::with(['product', 'user'])->where('user_id', Auth::user()->id)->get();

        //Transaksi Dibuat
        $transaction = PaymentConfirmation::create([
            'user_id'           => Auth::user()->id,
            'transaction_id'    => $transaction->id,
            'name'              => $request->name,
            'phone_number'      => $request->phone_number,
            'address'           => $request->address,
            'note'              => $request->note,
            'transaction_status' => 'PENDING',
            'total_price'       => $request->total_price,
            'code'              => $code
        ]);

        // foreach ($carts as $cart) {
        //     $tsm = 'TSM-' . mt_rand(000000, 999999);

        //     TransactionDetail::create([
        //         'transaction_id'        => $transaction->id,
        //         'products_id'           => $cart->product->id,
        //         'price'                 => $cart->product->price,
        //         'qty'                   => $cart->qty,
        //         'code'                  => $tsm
        //     ]);
        // }
        return redirect('cart')->with('success', 'Transaksi Diproses');
    }

    // public function send(Request $request)
    // {
    //     $data = $request->validate([
    //         'name'              => 'required',
    //         'bank'              => 'required',
    //         'account_number'    => 'required',
    //         'account_name'      => 'required',
    //         'photos'            => 'required|image'
    //     ]);

    //     $data['photos'] = $request->file('photos')->store('assets/userpaymentconfirmation', 'public');

    //     PaymentConfirmation::create($data);
    //     Alert::success('Sukses', 'Pesan terkirim, tunggu balasan admin melalui email yang anda kirim');
    //     return redirect('/konfirmasi_pembayaran/success');
    // }

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
