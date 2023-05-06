<?php

namespace App\Http\Controllers;

use App\Models\Header;
use App\Models\Sosmed;
use Illuminate\Http\Request;

class UserTransactionController extends Controller
{
    public function index()
    {
        $sosmed         = Sosmed::get();
        $header         = Header::get();

        return view('user.pages.transaction-details', [
            'sosmed'        => $sosmed,
            'header'        => $header
        ]);
    }
}
