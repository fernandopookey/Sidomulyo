<?php

namespace App\Http\Controllers\Cs;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        $data = [
            'title'     => 'Service',
            'content'   => 'cs/service/index'
        ];
        return view('cs.layouts.wrapper', $data);
    }

    public function changeStatus($id)
    {
    }
}