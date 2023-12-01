<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Validator;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }
    public function signup()
    {
        return view('auth.signup');
    }
    public function logout()
    {
        Auth()->logout();

        return redirect('/auth/login');
    }

    public function login_post(Request $request)
    {

        if ($request->input('check')) {
            $check = true;
        } else {
            $check = false;
        }


        $result = $request->validate([ 
            'username' => 'required',
            'password' => 'required'
        ]);

        $credentials = $request->only('username', 'password');

        $result = Auth()->attempt($credentials,$check);

        if ($result) {
            return redirect()->route('home');
        } else {
            return redirect()->back()->with('msg', 'Account does not exist');
        }

    }


    public function signup_post(Request $request)
    {
        if ($request->input('check')) {
            $check = true;
        } else {
            $check = false;
        }

         $request->validate([ 
            'username' => 'required|unique:users',
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed'
        ]);

         User::create([
            'username'=>$request->input('username'),
            'email'=>$request->input('email'),
            'password'=>Hash::make($request->input('password'))
        ]);

        $credentials = $request->only('username', 'password');

        $result = Auth()->attempt($credentials,$check);

        if ($result) {
            return redirect()->route('home');
        } else {
            return redirect()->back()->with('msg', 'Account does not exist');
        }

    }



}