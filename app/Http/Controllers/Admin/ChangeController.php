<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

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

        // Log::info($request->all());
        // $user = User::find($request->user_id);
        // $user->status = $request->status;
        // $user->save();

        // return response()->json(['success' => 'Status change successfully.']);
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
}
