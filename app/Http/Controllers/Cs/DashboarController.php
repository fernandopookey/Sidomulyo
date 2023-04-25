<?php

namespace App\Http\Controllers\Cs;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboarController extends Controller
{
    public function index()
    {
        $data = [
            'title'     => 'Dashboard Customer Service Sidomulyo',
            'content'   => 'cs/home/index'
        ];
        return view('cs.layouts.wrapper', $data);
    }
}
