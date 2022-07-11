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

    public function analysis(){
        if(Auth::check()){
            if(Diary::where('user_id', Auth::user()->id)->where('stress', 1)->count() != 0){
                $stressPercent = ((Diary::where('user_id', Auth::user()->id)->where('stress', 1)->count()) / Diary::where('user_id', Auth::user()->id)->count()) * 100;
                $stressPercent = round($stressPercent, 2);
            } else {
                $stressPercent = 0;
            }
            if(Diary::where('user_id', Auth::user()->id)->where('low_water_intake', 1)->count() != 0){
                $hydrated = ((Diary::where('user_id', Auth::user()->id)->where('low_water_intake', 1)->count()) / Diary::where('user_id', Auth::user()->id)->count()) * 100;
                $hydrated = round($hydrated, 2);
            } else {
                $hydrated = 0;
            }
            if(Diary::where('user_id', Auth::user()->id)->where('chocolate', 1)->count() != 0){
                $chocolate = ((Diary::where('user_id', Auth::user()->id)->where('chocolate', 1)->count()) / Diary::where('user_id', Auth::user()->id)->count()) * 100;
                $chocolate = round($chocolate, 2);
            } else {
                $chocolate = 0;
            }
            if(Diary::where('user_id', Auth::user()->id)->where('cheese', 1)->count() != 0){
                $cheese = ((Diary::where('user_id', Auth::user()->id)->where('cheese', 1)->count()) / Diary::where('user_id', Auth::user()->id)->count()) * 100;
                $cheese = round($cheese, 2);
            } else {
                $cheese = 0;
            }
            if(Diary::where('user_id', Auth::user()->id)->where('yeast_goods', 1)->count() != 0){
                $yeast_goods = ((Diary::where('user_id', Auth::user()->id)->where('yeast_goods', 1)->count()) / Diary::where('user_id', Auth::user()->id)->count()) * 100;
                $yeast_goods = round($yeast_goods, 2);
            } else {
                $yeast_goods = 0;
            }
            if(Diary::where('user_id', Auth::user()->id)->where('yoghurt', 1)->count() != 0){
                $yoghurt = ((Diary::where('user_id', Auth::user()->id)->where('yoghurt', 1)->count()) / Diary::where('user_id', Auth::user()->id)->count()) * 100;
                $yoghurt = round($yoghurt, 2);
            } else {
                $yoghurt = 0;
            }
            if(Diary::where('user_id', Auth::user()->id)->where('fruit', 1)->count() != 0){
                $fruit = ((Diary::where('user_id', Auth::user()->id)->where('fruit', 1)->count()) / Diary::where('user_id', Auth::user()->id)->count()) * 100;
                $fruit = round($fruit, 2);
            } else {
                $fruit = 0;
            }
            if(Diary::where('user_id', Auth::user()->id)->where('nuts', 1)->count() != 0){
                $nuts = ((Diary::where('user_id', Auth::user()->id)->where('nuts', 1)->count()) / Diary::where('user_id', Auth::user()->id)->count()) * 100;
                $nuts = round($nuts, 2);
            } else {
                $nuts = 0;
            }
            if(Diary::where('user_id', Auth::user()->id)->where('olives', 1)->count() != 0){
                $olives = ((Diary::where('user_id', Auth::user()->id)->where('olives', 1)->count()) / Diary::where('user_id', Auth::user()->id)->count()) * 100;
                $olives = round($olives, 2);
            } else {
                $olives = 0;
            }
            if(Diary::where('user_id', Auth::user()->id)->where('tomato', 1)->count() != 0){
                $tomato = ((Diary::where('user_id', Auth::user()->id)->where('tomato', 1)->count()) / Diary::where('user_id', Auth::user()->id)->count()) * 100;
                $tomato = round($tomato, 2);
            } else {
                $tomato = 0;
            }
            if(Diary::where('user_id', Auth::user()->id)->where('soy', 1)->count() != 0){
                $soy = ((Diary::where('user_id', Auth::user()->id)->where('soy', 1)->count()) / Diary::where('user_id', Auth::user()->id)->count()) * 100;
                $soy = round($soy, 2);
            } else {
                $soy = 0;
            }
            if(Diary::where('user_id', Auth::user()->id)->where('vinegar', 1)->count() != 0){
                $vinegar = ((Diary::where('user_id', Auth::user()->id)->where('vinegar', 1)->count()) / Diary::where('user_id', Auth::user()->id)->count()) * 100;
                $vinegar = round($vinegar, 2);
            } else {
                $vinegar = 0;
            }
            return view('analysis', [
                'stressPercent' => $stressPercent,
                'hydrated' => $hydrated,
                'chocolate' => $chocolate,
                'cheese' => $cheese,
                'yeast_goods' => $yeast_goods,
                'yoghurt' => $yoghurt,
                'fruit' => $fruit,
                'nuts' => $nuts,
                'olives' => $olives,
                'tomato' => $tomato,
                'soy' => $soy,
                'vinegar' => $vinegar,
            ]);
        }

        

        $noAccess = 'You are not signed in, either sign in or register!';
        
        return redirect('loginpage')->with('noAccess', $noAccess);
    }
}
