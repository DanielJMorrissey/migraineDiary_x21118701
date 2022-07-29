@extends('layout')
@section('title')
    <title>
        Migraine Diary - Add Diary Entry
    </title>
@endsection
@section('maincontent')
    <main>
        <div class="container">
            {{-- error messages --}}
            @if(session('dateRequired'))
                <span class="text-danger">
                    {{ session('dateRequired') }}
                </span>
            @elseif(session('notSaved'))
                <span class="text-danger">
                    {{ session('notSaved') }}
                </span>
            @endif
            <span class="text-danger" id="dateError"></span>
            <span>* - required</span>
            {{-- form for diary entry --}}
            <form id="form" method="POST" action="{{ route('addDiaryEntry') }}">
                {{-- @csrf prevents a CSRF eploit --}}
            @csrf
            <div class="form-group row">
                <label for="text" class="col-2 col-form-label">Date*</label> 
                <div class="col-10">
                    <input id="date" name="date" type="date" class="form-control date1" required>
                </div>
            </div>
            {{-- checkboxes for triggers, will supply data as 1 = true, 0 = false --}}
            <div class="form-group row diaryField">
                <label class="col-2 checkLabel">Stressed</label> 
                <div class="col-10">
                    <div class="custom-control custom-checkbox custom-control-inline">
                        <input name="stress" id="stress" type="checkbox" class="custom-control-input" value="1">
                    </div>
                </div>
            </div>
            <div class="form-group row diaryField">
                <label class="col-2 checkLabel">Dehydrated</label> 
                <div class="col-10">
                    <div class="custom-control custom-checkbox custom-control-inline">
                        <input name="dehydrated" id="dehydrated" type="checkbox" class="custom-control-input" value="1">
                    </div>
                </div>
            </div>
            <div class="form-group row diaryField">
                <label class="col-2 checkLabel">Chocolate</label> 
                <div class="col-10">
                    <div class="custom-control custom-checkbox custom-control-inline">
                        <input name="chocolate" id="chocolate" type="checkbox" class="custom-control-input" value="1">
                    </div>
                </div>
            </div>
            <div class="form-group row diaryField">
                <label class="col-2 checkLabel">Cheese</label> 
                <div class="col-10">
                    <div class="custom-control custom-checkbox custom-control-inline">
                        <input name="cheese" id="cheese" type="checkbox" class="custom-control-input" value="1">
                    </div>
                </div>
            </div>
            <div class="form-group row diaryField">
                <label class="col-2 checkLabel">Yeast Products</label> 
                <div class="col-10">
                    <div class="custom-control custom-checkbox custom-control-inline">
                        <input name="yeast" id="yeast" type="checkbox" class="custom-control-input" value="1">
                    </div>
                </div>
            </div>
            <div class="form-group row diaryField">
                <label class="col-2 checkLabel">Yoghurt</label> 
                <div class="col-10">
                    <div class="custom-control custom-checkbox custom-control-inline">
                        <input name="yoghurt" id="yoghurt" type="checkbox" class="custom-control-input" value="1">
                    </div>
                </div>
            </div>
            <div class="form-group row diaryField">
                <label class="col-2 checkLabel">Citrus Fruits</label> 
                <div class="col-10">
                    <div class="custom-control custom-checkbox custom-control-inline">
                        <input name="fruit" id="fruit" type="checkbox" class="custom-control-input" value="1">
                    </div>
                </div>
            </div>
            <div class="form-group row diaryField">
                <label class="col-2 checkLabel">Nuts</label> 
                <div class="col-10">
                    <div class="custom-control custom-checkbox custom-control-inline">
                        <input name="nuts" id="nuts" type="checkbox" class="custom-control-input" value="1">
                    </div>
                </div>
            </div>
            <div class="form-group row diaryField">
                <label class="col-2 checkLabel">Olives</label> 
                <div class="col-10">
                    <div class="custom-control custom-checkbox custom-control-inline">
                        <input name="olives" id="olives" type="checkbox" class="custom-control-input" value="1">
                    </div>
                </div>
            </div>
            <div class="form-group row diaryField">
                <label class="col-2 checkLabel">Tomato</label> 
                <div class="col-10">
                    <div class="custom-control custom-checkbox custom-control-inline">
                        <input name="tomato" id="tomato" type="checkbox" class="custom-control-input" value="1">
                    </div>
                </div>
            </div>
            <div class="form-group row diaryField">
                <label class="col-2 checkLabel">Soy</label> 
                <div class="col-10">
                    <div class="custom-control custom-checkbox custom-control-inline">
                        <input name="soy" id="soy" type="checkbox" class="custom-control-input" value="1">
                    </div>
                </div>
            </div>
            <div class="form-group row diaryField" >
                <label class="col-2 checkLabel">Vinegar</label> 
                <div class="col-10">
                    <div class="custom-control custom-checkbox custom-control-inline">
                        <input name="vinegar" id="vinegar" type="checkbox" class="custom-control-input" value="1">
                    </div>
                </div>
            </div>
            {{-- medication field where what medication is taken --}}
            <div class="form-group row diaryField">
                <label for="takenMeds" class="col-2 col-form-label">Medication Taken</label> 
                <div class="col-10">
                    <textarea id="takenMeds" name="takenMeds" cols="40" rows="5" class="form-control"></textarea>
                </div>
            </div>
            {{-- comment field for any other information --}}
            <div class="form-group row diaryField">
                <label for="comments" class="col-2 col-form-label">Comment</label> 
                <div class="col-10 ml-auto">
                    <textarea id="comments" name="comment" cols="40" rows="5" class="form-control"></textarea>
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