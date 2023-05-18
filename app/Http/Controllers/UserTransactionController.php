<?php

namespace App\Http\Controllers;

use App\Models\Header;
use App\Models\Sosmed;
use App\Models\Transaction;
use App\Models\TransactionDetail;
// use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserTransactionController extends Controller
{
    public function index()
    {
        $sosmed         = Sosmed::get();
        $header         = Header::get();

        $transactions   = Transaction::where('users_id', Auth::id())->get();

        return view('user.pages.transactions', [
            'sosmed'        => $sosmed,
            'header'        => $header,
            'transactions'  => $transactions
        ]);
    }

    public function detail($id)
    {
        $sosmed         = Sosmed::get();
        $header         = Header::get();

        $transactions   = Transaction::where('id', $id)->where('users_id', Auth::id())->first();

        return view('user.pages.transaction-details', compact('transactions', 'header', 'sosmed'));

        // return view('user.pages.transaction-details', [
        //     'sosmed'        => $sosmed,
        //     'header'        => $header,
        //     'transactions'  => $transactions
        // ]);
    }
}
