<?php

/*
    need to customise look
    fix feedback to user
    fix register redirect
    check for other bugs
*/

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthorisationController extends Controller
{
    # index
    public function loginPage()
    {
        return view('auth.loginpage');
    }

    # customLogin
    public function completeLogin(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        # diary is dashboard
        $verifications = $request->only('username', 'password');
        if (Auth::attempt($verifications)) {
            return redirect()->intended('diary')
                        ->withSuccess('Welcome User!');
        }

        return redirect('loginpage')->withSuccess('Error! Entered details are not valid, please try again or register an account!');
    }

    # registration
    public function registerPage()
    {
        return view('auth.registerpage');
    }

    public function computeRegistration(Request $request)
    {
        $request->validate([
            'username' => 'required|unique:users',
            'password' => 'required|min:6',
        ]);

        $info = $request->all();
        $verify = $this->createUser($info);

        return redirect('diary')->withSuccess('You have created an account!');
    }

    public function createUser(array $info)
    {
        return User::create([
            'username' => $info['username'],
            'password' => Hash::make($info['password'])
        ]);
    }

    public function diary(){
        if(Auth::check()){
            return view('diary');
        }

        return redirect('loginpage')->withSuccess('You are not signed in, either sign in or register!');
    }

    public function logOut(){
        Session::flush();
        Auth::logout();

        return redirect('loginpage');
    }
}
