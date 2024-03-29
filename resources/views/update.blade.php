@extends('layout')
@section('title')
    <title>
        Migraine Diary - Update Diary Entry
    </title>
@endsection
@section('maincontent')
    <main>
        <div class="container">
            {{-- same as addDiary.blade.php but containes old values by checking data passed to view from database --}}
            @if(session('dateRequired'))
                <span class="text-danger d-flex justify-content-center">
                    {{ session('dateRequired') }}
                </span>
            @elseif(session('notUpdated'))
                <span class="text-danger d-flex justify-content-center">
                    {{ session('notUpdated') }}
                </span>
            @endif
            <span class="text-danger" id="dateError"></span>
            <span>* - required</span>
            <form id="form" method="POST" action="/completeUpdateDiary/{{ $diary->id }}">
            @csrf
            @method('PUT')
            <div class="form-group row">
                <label for="text" class="col-2 col-form-label">Date*</label> 
                <div class="col-10">
                    <input id="date" name="date" type="date" value="{{ $diary->date }}" class="form-control date1" required>
                </div>
            </div>
            <div class="form-group row diaryField">
                <label class="col-2 checkLabel">Stressed</label> 
                <div class="col-10">
                    <div class="custom-control custom-checkbox custom-control-inline">
                        <input name="stress" id="stress" type="checkbox" {{ $diary->stress == '1' ? 'checked=checked' : '' }} class="custom-control-input" value="1">
                    </div>
                </div>
            </div>
            <div class="form-group row diaryField">
                <label class="col-2 checkLabel">Dehydrated</label> 
                <div class="col-10">
                    <div class="custom-control custom-checkbox custom-control-inline">
                        <input name="dehydrated" id="dehydrated" type="checkbox" {{ $diary->low_water_intake == '1' ? 'checked=checked' : '' }} class="custom-control-input" value="1">
                    </div>
                </div>
            </div>
            <div class="form-group row diaryField">
                <label class="col-2 checkLabel">Chocolate</label> 
                <div class="col-10">
                    <div class="custom-control custom-checkbox custom-control-inline">
                        <input name="chocolate" id="chocolate" type="checkbox" {{ $diary->chocolate == '1' ? 'checked=checked' : '' }} class="custom-control-input" value="1">
                    </div>
                </div>
            </div>
            <div class="form-group row diaryField">
                <label class="col-2 checkLabel">Cheese</label> 
                <div class="col-10">
                    <div class="custom-control custom-checkbox custom-control-inline">
                        <input name="cheese" id="cheese" type="checkbox" {{ $diary->cheese == '1' ? 'checked=checked' : '' }} class="custom-control-input" value="1">
                    </div>
                </div>
            </div>
            <div class="form-group row diaryField">
                <label class="col-2 checkLabel">Yeast Products</label> 
                <div class="col-10">
                    <div class="custom-control custom-checkbox custom-control-inline">
                        <input name="yeast" id="yeast" type="checkbox" {{ $diary->yeast_goods == '1' ? 'checked=checked' : '' }} class="custom-control-input" value="1">
                    </div>
                </div>
            </div>
            <div class="form-group row diaryField">
                <label class="col-2 checkLabel">Yoghurt</label> 
                <div class="col-10">
                    <div class="custom-control custom-checkbox custom-control-inline">
                        <input name="yoghurt" id="yoghurt" type="checkbox" {{ $diary->yoghurt == '1' ? 'checked=checked' : '' }} class="custom-control-input" value="1">
                    </div>
                </div>
            </div>
            <div class="form-group row diaryField">
                <label class="col-2 checkLabel">Citrus Fruits</label> 
                <div class="col-10">
                    <div class="custom-control custom-checkbox custom-control-inline">
                        <input name="fruit" id="fruit" type="checkbox" {{ $diary->fruit == '1' ? 'checked=checked' : '' }} class="custom-control-input" value="1">
                    </div>
                </div>
            </div>
            <div class="form-group row diaryField">
                <label class="col-2 checkLabel">Nuts</label> 
                <div class="col-10">
                    <div class="custom-control custom-checkbox custom-control-inline">
                        <input name="nuts" id="nuts" type="checkbox" {{ $diary->nuts == '1' ? 'checked=checked' : '' }} class="custom-control-input" value="1">
                    </div>
                </div>
            </div>
            <div class="form-group row diaryField">
                <label class="col-2 checkLabel">Olives</label> 
                <div class="col-10">
                    <div class="custom-control custom-checkbox custom-control-inline">
                        <input name="olives" id="olives" type="checkbox" {{ $diary->olives == '1' ? 'checked=checked' : '' }} class="custom-control-input" value="1">
                    </div>
                </div>
            </div>
            <div class="form-group row diaryField">
                <label class="col-2 checkLabel">Tomato</label> 
                <div class="col-10">
                    <div class="custom-control custom-checkbox custom-control-inline">
                        <input name="tomato" id="tomato" type="checkbox" {{ $diary->tomato == '1' ? 'checked=checked' : '' }} class="custom-control-input" value="1">
                    </div>
                </div>
            </div>
            <div class="form-group row diaryField">
                <label class="col-2 checkLabel">Soy</label> 
                <div class="col-10">
                    <div class="custom-control custom-checkbox custom-control-inline">
                        <input name="soy" id="soy" type="checkbox" {{ $diary->soy == '1' ? 'checked=checked' : '' }} class="custom-control-input" value="1">
                    </div>
                </div>
            </div>
            <div class="form-group row diaryField">
                <label class="col-2 checkLabel">Vinegar</label> 
                <div class="col-10">
                    <div class="custom-control custom-checkbox custom-control-inline">
                        <input name="vinegar" id="vinegar" type="checkbox" {{ $diary->vinegar == '1' ? 'checked=checked' : '' }} class="custom-control-input" value="1">
                    </div>
                </div>
            </div>
            <div class="form-group row diaryField">
                <label for="takenMeds" class="col-2 col-form-label">Medication Taken</label> 
                <div class="col-10">
                    <textarea id="takenMeds" name="takenMeds" cols="40" rows="5" class="form-control">{{ $diary->medication }}</textarea>
                </div>
            </div>
            <div class="form-group row diaryField">
                <label for="comments" class="col-2 col-form-label">Comment</label> 
                <div class="col-10">
                    <textarea id="comments" name="comment" cols="40" rows="5" class="form-control">{{ $diary->comment }}</textarea>
                </div>
            </div> 
            <div class="form-group row diaryField">
                <div class="offset-5 col-12">
                    <button id="submit" name="submit" type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </form>
        </div>
        
    </main>
@endsection