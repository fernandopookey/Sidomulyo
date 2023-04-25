<?php

namespace App\Http\Controllers\Cs;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function index()
    {
        $data = [
            'title'     => 'Pesan',
            'content'   => 'cs/message/index'
        ];
        return view('cs.layouts.wrapper', $data);
    }
}