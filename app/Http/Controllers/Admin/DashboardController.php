<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Machine;
use App\Models\PaymentConfirmation;
use App\Models\Product;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $data = [
            'product'               => Product::count(),
            'transaction'           => Transaction::count(),
            'paymentConfirmation'   => PaymentConfirmation::count(),
            'user'                  => User::count(),
            'title'                 => 'Sidomulyo Admin Dashboard',
            'content'               => 'new-admin/dashboard/index'
        ];
        return view('new-admin.layouts.wrapper', $data);
    }
}
