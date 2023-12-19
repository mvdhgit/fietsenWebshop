<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        if (!Auth::attempt($credentials)) {
            return back()->withErrors(['email' => 'Invalid E-mail or password']);
        }
        
        
        // return redirect()->route('pages.profile');
        return redirect()->intended(route('pages.profile'));
    }

    public function loginView(Request $request)
    {
        return view('login');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect()->route('pages.home');
    }
}
