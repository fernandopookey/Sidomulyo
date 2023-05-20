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

    public function send(Request $request, string $id)
    {
        // Simpan Data User
        // $user = Auth::user();
        // $user->update($request->except('total_price'));

        // dd($user);

        //Proses Checkout
        $code = 'SM-' . mt_rand(000000, 999999) . 'PAYMENT';
        // $transaction = PaymentConfirmation::with(['product', 'user'])->where('user_id', Auth::user()->id)->get();
        $transactionf   = Transaction::where('id', $id)->where('users_id', Auth::id())->first();

        // dd($transactionf);
        //Transaksi Dibuat
        $transaction = PaymentConfirmation::create([
            'user_id'               => Auth::user()->id,
            'transaction_id'        => $transactionf->id,
            'bank'                  => $request->bank,
            'name'                  => $request->name,
            'address'               => $request->address,
            'note'                  => $request->note,
            'account_number'        => $request->account_number,
            'account_name'          => $request->account_name,
            'photos'                => $request->photos,
            'code'                  => $code
        ]);

        $transaction['photos'] = $request->file('photos')->store('assets/paymentconfirmation', 'public');

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
        // dd($transaction);
        PaymentConfirmation::create($transaction);
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
