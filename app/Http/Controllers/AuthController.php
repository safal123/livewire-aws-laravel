<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function postLogin(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);
        $remember_me = $request->remember_me === "on" ? true : false;
        $user = $request->all('email', 'password');
        if (!Auth::attempt($user, $remember_me)) {
            Session::flash('error', 'Your credentials does not match our record.');
            return redirect()->back();
        }
        Session::flash('success', 'You are successfully logged in on our system.');
        return redirect('/');
    }

    public function register()
    {
        return view('auth.register');
    }

    public function postRegister(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|min:5',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
        ]);
        if (!$user) {
            Session::flash('error', 'Something went wrong.');
            return redirect()->back();
        }
        $user->profile()->save(new Profile);
        Auth::login($user);
        Session::flash('success', 'Account created successfully.');
        return redirect('/');
    }

    public function logout(Request $request)
    {
        $request->session()->flush();
        Auth::logout();
        Session::flash('success', 'See you again....');
        return redirect()->route('login');
    }
}
