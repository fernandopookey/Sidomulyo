<?php

namespace App\Http\Controllers;

use App\Models\Header;
use App\Models\Sosmed;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserProfileController extends Controller
{
    public function account()
    {
        $header     = Header::get();
        $sosmed     = Sosmed::get();
        $user       = Auth::user();

        return view('user.pages.user-profile', [
            'user'          => $user,
            'header'        => $header,
            'sosmed'        => $sosmed,
        ]);
    }

    public function update(Request $request, $redirect)
    {
        $data = $request->all();
        $item = Auth::user();

        $item->update($data);

        return redirect()->route('user-profile');
    }
}
