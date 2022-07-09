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
use App\Models\Diary;
use App\Models\GPTracker;
use Illuminate\Support\Facades\Auth;

class AuthorisationController extends Controller
{
    # index
    public function loginPage()
    {
        if (!Auth::check()){
            return view('auth.loginpage'); 
        } else{
            return redirect('diary');
        }
        
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

        # diary
        $verifications = $request->only('username', 'password');
        if (Auth::attempt($verifications)) {
            return redirect('diary')->with('success', $successful);
        }

        return redirect('loginpage')->with('failed', $failedLogin);
    }

    # registration
    public function registerPage()
    {
        if (!Auth::check()){
            return view('auth.registerpage');
        } else {
            return redirect('diary');
        }
    }

    public function computeRegistration(Request $request)
    {
        $request->validate([
            'username' => 'required|unique:users',
            'password' => 'required|min:6',
            'password1' => 'required|min:6',
        ]);


        $info = $request->all();

        if($info['password'] == $info['password1']){
            User::create([
                'username' => $info['username'],
                'password' => Hash::make($info['password'])
            ]);

            $successRegistration = 'You have created an account!';

            $verifications = $request->only('username', 'password');
            if (Auth::attempt($verifications)) {
                return redirect('diary')->with('successReg', $successRegistration);
            }
            
        } else {
            $notMatching = 'Passwords do not match';
            return redirect('register')->with('notMatching', $notMatching);
        }
        
    }

    public function diary(){
        if(Auth::check()){
            $data = Diary::where('user_id', Auth::user()->id)->orderBy('date', 'desc')->get();
            return view('diary', [
                'diaries' => $data,
            ]);
        }

        $noAccess = 'You are not signed in, either sign in or register!';
        
        return redirect('loginpage')->with('noAccess', $noAccess);
    }

    public function edit($id)
    {
        if(Auth::check()){
            $diary = Diary::find($id);
            return view('update', compact('diary'));
        }

        $noAccess = 'You are not signed in, either sign in or register!';
        
        return redirect('loginpage')->with('noAccess', $noAccess);
    }

    public function addDiary()
    {
        if(Auth::check()){
            return view('addDiary');
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

    public function gpTracker(){
        if(Auth::check()){
            $gpVisits = GPTracker::where('user_id', Auth::user()->id)->orderBy('date', 'desc')->get();
            return view('gptracker', [
                'gpVisits' => $gpVisits,
            ]);
        }

        $noAccess = 'You are not signed in, either sign in or register!';
        
        return redirect('loginpage')->with('noAccess', $noAccess);
    }

    public function addGPVisit(){
        if(Auth::check()){
            return view('addGPTracker');
        }

        $noAccess = 'You are not signed in, either sign in or register!';
        
        return redirect('loginpage')->with('noAccess', $noAccess);
    }

    public function editGPVisit($id){
        if(Auth::check()){
            $updateGPVisit = GPTracker::find($id);
            return view('updateGPVisit', compact('updateGPVisit'));
        }

        $noAccess = 'You are not signed in, either sign in or register!';
        
        return redirect('loginpage')->with('noAccess', $noAccess);
    }
}
