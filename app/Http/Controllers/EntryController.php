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
        check for bugs
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
            return redirect()->back()->with('dateRequired', 'The date is required!');
        }

        $data = $request->all();
        $diaryEntry = new Diary();
        $diaryEntry->user_id = Auth::user()->id;
        $diaryEntry->date = $data['date'];
        if(isset($data['stress'])){
            $diaryEntry->stress = $data['stress'];
        } else {
            $diaryEntry->stress = 0;
        }
        if(isset($data['dehydrated'])){
            $diaryEntry->low_water_intake = $data['dehydrated'];
        } else{
            $diaryEntry->low_water_intake = 0;
        }
        if(isset($data['choclate'])){
            $diaryEntry->chocolate = $data['chocolate'];
        } else{
            $diaryEntry->chocolate = 0;
        }
        if(isset($data['cheese'])){
            $diaryEntry->cheese = $data['cheese'];
        } else{
            $diaryEntry->cheese = 0;
        }
        if(isset($data['yeast'])){
            $diaryEntry->yeast_goods = $data['yeast'];
        } else{
            $diaryEntry->yeast_goods = 0;
        }
        if(isset($data['yoghurt'])){
            $diaryEntry->yoghurt = $data['yoghurt'];
        } else{
            $diaryEntry->yoghurt = 0;
        }
        if(isset($data['fruit'])){
            $diaryEntry->fruit = $data['fruit'];
        } else{
            $diaryEntry->fruit = 0;
        }
        if(isset($data['nuts'])){
            $diaryEntry->nuts = $data['nuts'];
        } else{
            $diaryEntry->nuts = 0;
        }
        if(isset($data['olives'])){
            $diaryEntry->olives = $data['olives'];
        } else{
            $diaryEntry->olives = 0;
        }
        if(isset($data['tomato'])){
            $diaryEntry->tomato = $data['tomato'];
        } else{
            $diaryEntry->tomato = 0;
        }
        if(isset($data['soy'])){
            $diaryEntry->soy = $data['soy'];
        } else{
            $diaryEntry->soy = 0;
        }
        if(isset($data['vinegar'])){
            $diaryEntry->vinegar = $data['vinegar'];
        } else{
            $diaryEntry->vinegar = 0;
        }
        if(isset($data['takenMeds'])){
            $diaryEntry->medication = $data['takenMeds'];
        } else{
            $diaryEntry->medication = null;
        }
        if(isset($data['comment'])){
            $diaryEntry->comment = $data['comment'];
        } else{
            $diaryEntry->comment = null;
        }

        if (!$diaryEntry->save())
        {
            return redirect()->back();
        }

        $diaryEntry->save();

        return redirect('diary');
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'date' => 'required',
        ];

        $validator = Validator::make($request->all(), $rules);
        if($validator->fails())
        {
            return redirect()->back()->with('dateRequired', 'The date is required!');
        }

        $diary = Diary::find($id);
        $data = $request->all();
        $diary->date = $data['date'];
        if(isset($data['stress'])){
            $diary->stress = $data['stress'];
        } else {
            $diary->stress = 0;
        }
        if(isset($data['dehydrated'])){
            $diary->low_water_intake = $data['dehydrated'];
        } else{
            $diary->low_water_intake = 0;
        }
        if(isset($data['choclate'])){
            $diary->chocolate = $data['chocolate'];
        } else{
            $diary->chocolate = 0;
        }
        if(isset($data['cheese'])){
            $diary->cheese = $data['cheese'];
        } else{
            $diary->cheese = 0;
        }
        if(isset($data['yeast'])){
            $diary->yeast_goods = $data['yeast'];
        } else{
            $diary->yeast_goods = 0;
        }
        if(isset($data['yoghurt'])){
            $diary->yoghurt = $data['yoghurt'];
        } else{
            $diary->yoghurt = 0;
        }
        if(isset($data['fruit'])){
            $diary->fruit = $data['fruit'];
        } else{
            $diary->fruit = 0;
        }
        if(isset($data['nuts'])){
            $diary->nuts = $data['nuts'];
        } else{
            $diary->nuts = 0;
        }
        if(isset($data['olives'])){
            $diary->olives = $data['olives'];
        } else{
            $diary->olives = 0;
        }
        if(isset($data['tomato'])){
            $diary->tomato = $data['tomato'];
        } else{
            $diary->tomato = 0;
        }
        if(isset($data['soy'])){
            $diary->soy = $data['soy'];
        } else{
            $diary->soy = 0;
        }
        if(isset($data['vinegar'])){
            $diary->vinegar = $data['vinegar'];
        } else{
            $diary->vinegar = 0;
        }
        if(isset($data['takenMeds'])){
            $diary->medication = $data['takenMeds'];
        } else{
            $diary->medication = null;
        }
        if(isset($data['comment'])){
            $diary->comment = $data['comment'];
        } else{
            $diary->comment = null;
        }

        if (!$diary->update())
        {
            return redirect()->back();
        }

        $diary->update();
        return redirect('diary');
    }

    
}
