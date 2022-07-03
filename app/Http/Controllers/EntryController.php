<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Diary;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class EntryController extends Controller
{

    /*
        need to fix date format
        use isset on a lot of fill ins as can be null
        check for bugs
        check stackoverflow x21118701
        change order
        research sql injection prevention
        sort out update and delete
    */

    public function addDiaryEntry(Request $request)
    {
        $rules = [
            'date' => 'required',
        ];

        $validator = Validator::make($request->all(), $rules);
        if($validator->fails())
        {
            return redirect()->back();
        }

        $data = $request->all();
        $diaryEntry = new Diary();
        $diaryEntry->user_id = Auth::user()->id;
        $diaryEntry->date = $data['date'];
        $diaryEntry->stress = $data['stress'];
        $diaryEntry->low_water_intake = $data['dehydrated'];
        $diaryEntry->chocolate = $data['chocolate'];
        $diaryEntry->cheese = $data['cheese'];
        $diaryEntry->yeast_goods = $data['yeast'];
        $diaryEntry->yoghurt = $data['yoghurt'];
        $diaryEntry->fruit = $data['fruit'];
        $diaryEntry->nuts = $data['nuts'];
        $diaryEntry->olives = $data['olives'];
        $diaryEntry->tomato = $data['tomato'];
        $diaryEntry->soy = $data['soy'];
        $diaryEntry->vinegar = $data['vinegar'];
        $diaryEntry->medication = $data['takenMeds'];
        $diaryEntry->comment = $data['comment'];

        if (!$diaryEntry->save())
        {
            return redirect()->back();
        }

        $diaryEntry->save();

        return redirect('diary');
    }

    
}
