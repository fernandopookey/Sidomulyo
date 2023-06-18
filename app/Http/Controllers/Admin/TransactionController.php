<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PaymentConfirmation;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class TransactionController extends Controller
{
    public function index()
    {
        $data = [
            'title'         => 'Transaksi Customer',
            'transaction'   => Transaction::get(),
            'content'       => 'new-admin/transaction/index'
        ];

        return view('new-admin.layouts.wrapper', $data);
    }

    public function destroy($id)
    {
        $payment = Transaction::find($id);

        if ($payment->photos != null) {
            $realLocation = "storage/" . $payment->photos;
            if (file_exists($realLocation) && !is_dir($realLocation)) {
                unlink($realLocation);
            }
        }

        Storage::delete($payment->photos);
        $payment->delete();
        Alert::success('Sukses', 'Transaksi Berhasil Dihapus');
        return redirect()->route('transaction.index');
    }

    public function show(string $id)
    {
        // $buyProduct = TransactionDetail::where('id', $id)->first();

        $transaction        = Transaction::with(['user', 'product'])->findOrFail($id);
        $transactions       = Transaction::where('id', $id)->where('users_id', Auth::id())->first();
        $transactionDetail = TransactionDetail::with(['product', 'transaction'])->findOrFail($id);
        // $transaction    = Transaction::find($id);
        $data = [
            'title'             => 'Detail Transaksi',
            'transaction'       => $transaction,
            'transactionDetail' => $transactionDetail,
            'transactions'      => $transactions,
            'content'           => 'new-admin/transaction/detail'
        ];

        return view('new-admin.layouts.wrapper', $data);
    }

    public function payment(Request $request, $id)
    {
        $payment = PaymentConfirmation::where('transaction_id', $id)->first();
        // $transaction        = Transaction::with(['user', 'product'])->findOrFail($id);
        // $transactionDetail = TransactionDetail::with(['product', 'transaction'])->find($id);

        if (!$payment) {
            $data = [
                'payment'           => $payment,
                'content'           => 'new-admin/transaction/paymentnull'
            ];
            return
                view('new-admin.layouts.wrapper', $data);
        }

        $data = [
            'title'             => 'Konfirmasi Pembayaran Customer',
            'payment'           => $payment,
            // 'transaction'       => $transaction,
            // 'transactionDetail' => $transactionDetail,
            'content'           => 'new-admin/transaction/payment'
        ];

        return view('new-admin.layouts.wrapper', $data);
    }
}
