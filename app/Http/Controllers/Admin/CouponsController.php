<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CouponsController extends Controller
{
    public function index()
    {
        $data = [
            'title'     => 'List Kupon',
            'coupon'    => Coupon::get(),
            'content'   => 'admin/coupon/index'
        ];

        return view('admin.layouts.wrapper', $data);
    }

    public function show($id)
    {
        $coupons = DB::table('coupons')->select('status')->where('id', '=', $id)->first();

        if ($coupons->status == '1') {
            $status = '0';
        } else {
            $status = '1';
        }

        $values = array('status' => $status);
        DB::table('coupons')->where('id', $id)->update($values);
        session()->flash('msg', 'Sukses');
        return redirect()->route('coupons.index');
    }
}
