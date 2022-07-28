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
use Illuminate\Validation\Rules\Password;

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
            'password' => ['required', Password::min(7)->letters()->mixedCase()->numbers()],
            'password1' => 'required',
        ]);


        $info = $request->all();

        if($info['password'] == $info['password1']){
            User::create([
                'username' => trim($info['username']),
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
            if($diary == null){
                $doesNotExist = 'Diary entry does not exist.';
                return redirect('diary')->with('doesNotExist', $doesNotExist);
            }
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
            if($updateGPVisit == null){
                $doesNotExist = 'GP Visit does not exist.';
                return redirect('gpTracker')->with('doesNotExist', $doesNotExist);
            }
            return view('updateGPVisit', compact('updateGPVisit'));
        }

        $noAccess = 'You are not signed in, either sign in or register!';
        
        return redirect('loginpage')->with('noAccess', $noAccess);
    }

    

    public function analysis(){

        function percentageCalc($attribute){
        return ((Diary::where('user_id', Auth::user()->id)->where($attribute, 1)->count()) / Diary::where('user_id', Auth::user()->id)->count()) * 100;
        }

        function countCheck($attribute){
            return Diary::where('user_id', Auth::user()->id)->where($attribute, 1)->count();
        }

        if(Auth::check()){
            if(countCheck('stress') != 0){
                $stressPercent = percentageCalc('stress');
                $stressPercent = round($stressPercent, 2);
            } else {
                $stressPercent = 0;
            }
            if(countCheck('low_water_intake') != 0){
                $hydrated = percentageCalc('low_water_intake');
                $hydrated = round($hydrated, 2);
            } else {
                $hydrated = 0;
            }
            if(countCheck('chocolate') != 0){
                $chocolate = percentageCalc('chocolate');
                $chocolate = round($chocolate, 2);
            } else {
                $chocolate = 0;
            }
            if(countCheck('cheese') != 0){
                $cheese = percentageCalc('cheese');
                $cheese = round($cheese, 2);
            } else {
                $cheese = 0;
            }
            if(countCheck('yeast_goods') != 0){
                $yeast_goods = percentageCalc('yeast_goods');
                $yeast_goods = round($yeast_goods, 2);
            } else {
                $yeast_goods = 0;
            }
            if(countCheck('yoghurt') != 0){
                $yoghurt = percentageCalc('yoghurt');
                $yoghurt = round($yoghurt, 2);
            } else {
                $yoghurt = 0;
            }
            if(countCheck('fruit') != 0){
                $fruit = percentageCalc('fruit');
                $fruit = round($fruit, 2);
            } else {
                $fruit = 0;
            }
            if(countCheck('nuts') != 0){
                $nuts = percentageCalc('nuts');
                $nuts = round($nuts, 2);
            } else {
                $nuts = 0;
            }
            if(countCheck('olives') != 0){
                $olives = percentageCalc('olives');
                $olives = round($olives, 2);
            } else {
                $olives = 0;
            }
            if(countCheck('tomato') != 0){
                $tomato = percentageCalc('tomato');
                $tomato = round($tomato, 2);
            } else {
                $tomato = 0;
            }
            if(countCheck('soy') != 0){
                $soy = percentageCalc('soy');
                $soy = round($soy, 2);
            } else {
                $soy = 0;
            }
            if(countCheck('vinegar') != 0){
                $vinegar = percentageCalc('vinegar');
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
