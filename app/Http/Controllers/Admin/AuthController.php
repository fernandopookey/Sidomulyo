<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;

class AuthController extends Controller
{
    function index()
    {
        $data = [
            'content' => 'auth/login'
        ];
        return view('auth.login', $data);
    }

    function doLogin(Request $request)
    {
        // dd($request->all());
        $data = $request->validate([
            'username'      => 'required',
            'email'         => 'required',
            'password'      => ['required', 'confirmed', Password::min(5)
                ->mixedCase()->letters()->numbers()->uncompromised()],
        ]);

        if (Auth::attempt($data)) {
            $request->session()->regenerate();
            return redirect('/admin');
        }

        return back()->with('loginError', 'Gagal Login, Email atau Password tidak ditemukan');
    }

    public function register()
    {
        $data = [
            'content' => 'auth/register'
        ];
        return view('auth.register', $data);
    }

    function logout()
    {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect('/');
    }
}
