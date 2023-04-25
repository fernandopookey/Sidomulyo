<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Machine;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $data = [
            'product'   => Product::count(),
            'machine'   => Machine::count(),
            'blog'      => Blog::count(),
            'user'      => User::count(),
            'title'     => 'Dashboard Admin Sidomulyo',
            'content'   => 'new-admin/dashboard/index'
        ];
        return view('new-admin.layouts.wrapper', $data);
    }
}
