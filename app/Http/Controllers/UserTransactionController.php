<?php

namespace App\Http\Controllers;

use App\Models\Header;
use App\Models\Sosmed;
use Illuminate\Http\Request;

class UserTransactionController extends Controller
{
    public function index()
    {
        return view('user.pages.transaction', [
            'sosmed'        => Sosmed::get(),
            'header'        => Header::get(),
        ]);
    }
}
