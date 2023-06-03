<?php

namespace App\Http\Controllers;

use App\Models\Floating;
use App\Models\FourthFloating;
use App\Models\Header;
use App\Models\SecondFloating;
use App\Models\Sosmed;
use App\Models\ThirdFloating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserProfileController extends Controller
{
    public function account()
    {
        $header             = Header::get();
        $sosmed             = Sosmed::get();
        $user               = Auth::user();
        $floating           = Floating::get();
        $secondFloating     = SecondFloating::get();
        $thirdFloating      = ThirdFloating::get();
        $fourthFloating     = FourthFloating::get();

        return view('user.pages.user-profile', [
            'user'              => $user,
            'header'            => $header,
            'sosmed'            => $sosmed,
            'floating'          => $floating,
            'secondFloating'    => $secondFloating,
            'thirdFloating'     => $thirdFloating,
            'fourthFloating'    => $fourthFloating,
        ]);
    }

    public function update(Request $request, $redirect)
    {
        $data = $request->all();
        $item = Auth::user();

        $item->update($data);

        return redirect()->route('user-profile');
    }

    public function changePassword()
    {
        $header             = Header::get();
        $sosmed             = Sosmed::get();
        $user               = Auth::user();
        $floating           = Floating::get();
        $secondFloating     = SecondFloating::get();
        $thirdFloating      = ThirdFloating::get();
        $fourthFloating     = FourthFloating::get();

        return view('user.pages.change-password', [
            'user'              => $user,
            'header'            => $header,
            'sosmed'            => $sosmed,
            'floating'          => $floating,
            'secondFloating'    => $secondFloating,
            'thirdFloating'     => $thirdFloating,
            'fourthFloating'    => $fourthFloating,
        ]);
    }

    public function updatePassword(Request $request)
    {
    }
}
