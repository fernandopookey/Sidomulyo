<?php

namespace App\Http\Controllers;

use App\Models\Bank;
use App\Models\Floating;
use App\Models\FourthFloating;
use App\Models\Header;
use App\Models\PaymentConfirmation;
use App\Models\SecondFloating;
use App\Models\Sosmed;
use App\Models\ThirdFloating;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class UserPaymentConfirmationController extends Controller
{
    public function index($id)
    {
        $sosmed             = Sosmed::get();
        $header             = Header::get();
        $floating           = Floating::get();
        $secondFloating     = SecondFloating::get();
        $thirdFloating      = ThirdFloating::get();
        $fourthFloating     = FourthFloating::get();
        $bank               = Bank::get();
        $payment            = Transaction::where('id', $id)->where('users_id', Auth::id())->first();

        $data = [
            'sosmed'            => $sosmed,
            'header'            => $header,
            'floating'          => $floating,
            'secondFloating'    => $secondFloating,
            'thirdFloating'     => $thirdFloating,
            'fourthFloating'    => $fourthFloating,
            'bank'              => $bank,
            'content'           => 'user/pages/payment-confirmation',
            'payment'           => $payment
        ];

        return view('user.pages.payment-confirmation', $data);
    }

    public function send(Request $request, string $id)
    {
        $code           = 'SM-' . mt_rand(000000, 999999) . '-PAYMENT';
        $transactionf   = Transaction::where('id', $id)->where('users_id', Auth::id())->first();
        // $total = Transaction::where('total_price', $id)->first();
        $total        = Transaction::where('id', $id)->where('users_id', Auth::id())->first();

        $transaction = ([
            'user_id'               => Auth::user()->id,
            'transaction_id'        => $transactionf->id,
            'bank_id'               => $request->bank_id,
            'name'                  => Auth::user()->fullname,
            'account_number'        => $request->account_number,
            'account_name'          => $request->account_name,
            'photos'                => $request->photos,
            'total'                 => $total,
            'code'                  => $code
        ]);

        $transaction['photos'] = $request->file('photos')->store('assets/paymentconfirmation', 'public');
        PaymentConfirmation::create($transaction);
        // return view('user.pages.paymentConfirmationSuccess')->with('success', 'Konfirmasi Pembayaran Diproses');
        // return redirect('cart')->with('success', 'Transaksi Diproses');
        return redirect()->back()->with('success', 'Konfirmasi Pembayaran Berhasil Dilakukan');
    }
}
