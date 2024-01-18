<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(){
        return view('auth.login', [
            'title' => 'Login'
        ]);
    }

    public function login(Request $request){

        $validatedData = $request->validate([
            'username' => 'required|min:3',
            'password' => 'required'
        ]);


        if (Auth::attempt($validatedData)) {
            $request->session()->regenerate();

            return redirect()->intended('/dashboard');
        }
        
        return back()->with('loginError', 'Login Gagal!');
    }


}
