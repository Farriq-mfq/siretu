<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function __construct()
    {
    }

    public function login()
    {

        return view('auth.login');
    }

    public function loginProcess(AuthRequest $request)
    {
        $credentials = $request->only(['username', 'password']);
        if (Auth::attempt($credentials)) {
            return redirect()->intended('/');
        } else {
            return to_route('login')->with('unauthorized', "Login gagal Periksa Kembali Username dan Password");
        }
    }


    public function logout()
    {
        Auth::logout();
        return to_route('login');
    }
}
