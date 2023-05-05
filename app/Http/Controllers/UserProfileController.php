<?php

namespace App\Http\Controllers;

use App\Models\Header;
use App\Models\Sosmed;
use App\Models\TransactionDetail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserProfileController extends Controller
{
    public function account()
    {
        $header     = Header::get();
        $sosmed     = Sosmed::get();
        $user       = Auth::user();

        $transactions = TransactionDetail::with(['transaction.user', 'product.galleries'])->whereHas('transaction', function ($transaction) {
            $transaction->where('users_id', Auth::user()->id);
        })->get();

        return view('user.pages.user-profile', [
            'user'      => $user,
            'header'    => $header,
            'sosmed'    => $sosmed,
            'transactions' => $transactions,
        ]);
    }

    public function update(Request $request, $redirect)
    {
        $data = $request->all();
        $item = Auth::user();

        $item->update($data);

        return redirect()->route('user-profile');
    }

    public function transaction()
    {
        $transactions = TransactionDetail::with(['transaction.user', 'product.galleries'])->whereHas('transaction', function ($transaction) {
            $transaction->where('users_id', Auth::user()->id);
        })->get();

        return view('pages.dashboard-transactions', [
            'sellTransactions' => $transactions,
        ]);
    }
}
