<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $enteredPassword = $request->input('password');
        $hashedPassword = env('PASSWORD_HASH');

        if (Hash::check($enteredPassword, $hashedPassword)) {
            $request->session()->put('authenticated', true);
            return redirect('/');
        }

        return back()->withErrors('The provided password is incorrect.');
    }

    public function logout(Request $request)
    {
        $request->session()->forget('authenticated');
        return redirect('/login');
    }
}
