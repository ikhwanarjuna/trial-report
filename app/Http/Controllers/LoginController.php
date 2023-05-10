<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('content.authentication.auth-login-cover');
    }
    public function authenticate(Request $request)
    {
       $credentials = $request->validate([
        'username' =>'required',
        'password'=>'required'
       ]);

        if(Auth::attempt($credentials)){
            session()->regenerate();

            return redirect()->intended('/app');
        }       

        return back()->with('loginError', 'Login Failed');
    }
    public function logout()
    {
        Auth::logout();
        session()->invalidate();
        session()->regenerateToken();
        return redirect('/');
    }

}
