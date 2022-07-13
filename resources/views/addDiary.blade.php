@extends('layout')
@section('title')
    <title>
        Migraine Diary - Add Diary Entry
    </title>
@endsection
@section('maincontent')
    <main>
        <div class="container">
            @if(session('dateRequired'))
                <p class="text-danger">
                    {{ session('dateRequired') }}
                </p>
            @elseif(session('notSaved'))
                <p class="text-danger">
                    {{ session('notSaved') }}
                </p>
            @endif
            <form method="POST" action="{{ route('addDiaryEntry') }}">
            @csrf
            <div class="form-group row">
                <label for="text" class="col-4 col-form-label">Date</label> 
                <div class="col-8">
                    <input id="date" name="date" type="date" class="form-control" required>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-4">Stressed</label> 
                <div class="col-8">
                    <div class="custom-control custom-checkbox custom-control-inline">
                        <input name="stress" id="stress" type="checkbox" class="custom-control-input" value="1">
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-4">Dehydrated</label> 
                <div class="col-8">
                    <div class="custom-control custom-checkbox custom-control-inline">
                        <input name="dehydrated" id="dehydrated" type="checkbox" class="custom-control-input" value="1">
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-4">Chocolate</label> 
                <div class="col-8">
                    <div class="custom-control custom-checkbox custom-control-inline">
                        <input name="chocolate" id="chocolate" type="checkbox" class="custom-control-input" value="1">
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-4">Cheese</label> 
                <div class="col-8">
                    <div class="custom-control custom-checkbox custom-control-inline">
                        <input name="cheese" id="cheese" type="checkbox" class="custom-control-input" value="1">
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-4">Yeast Products</label> 
                <div class="col-8">
                    <div class="custom-control custom-checkbox custom-control-inline">
                        <input name="yeast" id="yeast" type="checkbox" class="custom-control-input" value="1">
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-4">Yoghurt</label> 
                <div class="col-8">
                    <div class="custom-control custom-checkbox custom-control-inline">
                        <input name="yoghurt" id="yoghurt" type="checkbox" class="custom-control-input" value="1">
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-4">Citrus Fruits</label> 
                <div class="col-8">
                    <div class="custom-control custom-checkbox custom-control-inline">
                        <input name="fruit" id="fruit" type="checkbox" class="custom-control-input" value="1">
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-4">Nuts</label> 
                <div class="col-8">
                    <div class="custom-control custom-checkbox custom-control-inline">
                        <input name="nuts" id="nuts" type="checkbox" class="custom-control-input" value="1">
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-4">Olives</label> 
                <div class="col-8">
                    <div class="custom-control custom-checkbox custom-control-inline">
                        <input name="olives" id="olives" type="checkbox" class="custom-control-input" value="1">
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-4">Tomato</label> 
                <div class="col-8">
                    <div class="custom-control custom-checkbox custom-control-inline">
                        <input name="tomato" id="tomato" type="checkbox" class="custom-control-input" value="1">
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-4">Soy</label> 
                <div class="col-8">
                    <div class="custom-control custom-checkbox custom-control-inline">
                        <input name="soy" id="soy" type="checkbox" class="custom-control-input" value="1">
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-4">Vinegar</label> 
                <div class="col-8">
                    <div class="custom-control custom-checkbox custom-control-inline">
                        <input name="vinegar" id="vinegar" type="checkbox" class="custom-control-input" value="1">
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label for="takenMeds" class="col-4 col-form-label">Medication Taken</label> 
                <div class="col-8">
                    <textarea id="takenMeds" name="takenMeds" cols="40" rows="5" class="form-control"></textarea>
                </div>
            </div>
            <div class="form-group row">
                <label for="comments" class="col-4 col-form-label">Comment</label> 
                <div class="col-8">
                    <textarea id="comments" name="comment" cols="40" rows="5" class="form-control"></textarea>
                </div>
            </div> 
            <div class="form-group row">
                <div class="offset-4 col-8">
                <button name="submit" type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </form>
        </div>
        
    </main>
@endsection