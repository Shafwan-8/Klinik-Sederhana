<?php

namespace App\Http\Controllers;

use App\Events\UserLogin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(){
        return view('auth.login', [
            'title' => 'Trika Klinik | Login'
        ]);
    }

    public function login(Request $request){

        $validatedData = $request->validate([
            'username' => 'required|min:3',
            'password' => 'required'
        ]);


        if (Auth::attempt($validatedData)) {
            $request->session()->regenerate();

            UserLogin::dispatch($request);

            return redirect()->intended('/dashboard');
        }
        
        return redirect()->back()->with('loginError', 'Login Gagal!');
    }

    public function logout(Request $request){
    
        Auth::logout(); 

        $request->session()->invalidate();

        $request->session()->regenerateToken(); 
        
        return redirect('/');
    }


}
