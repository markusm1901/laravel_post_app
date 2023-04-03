<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }
    public function login(Request $request)
    {
        $data = $request->validate([
            'login'=>'required|email',
            'password'=>'required|string'
        ]);
        if(Auth::attempt(['email' => $data['login'], 'password'=>$data['password']])){
            $request->session()->regenerate();
            return redirect()->intended('home');
        }
        return back()->withErrors([
            'login' => 'Login lub hasło nie sa poprawne.'
        ]);
    }
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('home')->with('wylogowano');
    }
}
