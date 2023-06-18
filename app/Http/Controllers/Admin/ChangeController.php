<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use RealRashid\SweetAlert\Facades\Alert;

class ChangeController extends Controller
{
    public function status_update($id)
    {
        $user = DB::table('users')->select('status')->where('id', '=', $id)->first();

        if ($user->status == '1') {
            $status = '0';
        } else {
            $status = '1';
        }

        $values = array('status' => $status);
        DB::table('users')->where('id', $id)->update($values);
        session()->flash('msg', 'Sukses');
        return redirect()->route('user.index');
    }

    public function transaction_status($id)
    {
        $transaction = DB::table('transactions')->select('transaction_status')->where('id', '=', $id)->first();

        if ($transaction->transaction_status == 'SUCCESS') {
            $status = 'PENDING';
        } else {
            $status = 'SUCCESS';
        }

        $values = array('transaction_status' => $status);
        DB::table('transactions')->where('id', $id)->update($values);
        session()->flash('msg', 'Sukses');
        return redirect()->route('transaction.index');
    }

    public function slider_status_update($id)
    {
        $user = DB::table('sliders')->select('status')->where('id', '=', $id)->first();

        if ($user->status == 'Enable') {
            $status = 'Disable';
        } else {
            $status = 'Enable';
        }

        $values = array('status' => $status);
        DB::table('sliders')->where('id', $id)->update($values);
        Alert::success('Sukses', 'Status Berhasil Diubah');
        return redirect()->route('slider.index');
    }
}
