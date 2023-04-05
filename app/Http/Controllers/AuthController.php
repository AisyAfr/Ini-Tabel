<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;


class AuthController extends Controller
{
    public function login () {
        if(Auth::check()) {
            return redirect ('/')->with('login_message','Kamu Udah Login');
        } else {
            return view('auth.login');
        };
    }

    public function authenticate (Request $request) {
        $credential = $request->only('email','password');
        if(Auth::attempt($credential)){
            return redirect('/');
        } else {
            return redirect('login')->with('error_message','Username atau Password salah');
        }
    }

    public function logout(){
        Session::flush();
        Auth::logout();

        return redirect('login')->with('logout_message',"Kamu Udah Log Out");
    }

    public function register_form() {
        if(Auth::check()) {
            return redirect ('/')->with('login_message',"Kamu Udah Login");
        }
        return view('auth.register');
    }
    public function register(Request $request){
        $request->validate([
            'name' => 'min:2|max:25',
            'email' => 'email|unique:users',
            'password' => 'min:4|max:6|confirmed',
        ]);

        User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password'))
        ]);

        return redirect('login');
    }


}