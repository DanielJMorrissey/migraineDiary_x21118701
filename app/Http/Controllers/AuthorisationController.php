<?php

/*
    need to customise look
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

        $successful = 'Welcome User!';
        $failedLogin = 'Error! Entered details are not valid, please try again or register an account!';

        # diary is dashboard
        $verifications = $request->only('username', 'password');
        if (Auth::attempt($verifications)) {
            return redirect()->intended('diary')
                        ->with('success', $successful);
        }

        return redirect('loginpage')->with('failed', $failedLogin);
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
        # $verify = $this->createUser($info);

        User::create([
            'username' => $info['username'],
            'password' => Hash::make($info['password'])
        ]);

        $successRegistration = 'You have created an account! Please log in!';

        return redirect('loginpage')->with('successReg', $successRegistration);
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

        $noAccess = 'You are not signed in, either sign in or register!';
        return redirect('loginpage')->with('noAccess', $noAccess);
    }

    public function logOut(){
        Session::flush();
        Auth::logout();

        $loggedOut = 'You have logged out, want to log back in?';

        return redirect('loginpage')->with('loggedOut', $loggedOut);
    }
}