@extends('layout')
@section('title')
    <title>
        Migraine Diary - Add GP Visit
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
            <form method="POST" action="{{ route('addedGPVisit') }}">
                @csrf
                <div class="form-group row">
                    <label for="text" class="col-4 col-form-label">Date</label> 
                    <div class="col-8">
                        <input id="date" name="date" type="date" class="form-control" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-4">GP Name</label> 
                    <div class="col-8">
                        <div class="custom-control custom-checkbox custom-control-inline">
                            <input name="gp" id="gp" type="text" class="custom-control-input">
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="medication" class="col-4 col-form-label">Medication Prescribed</label> 
                    <div class="col-8">
                        <textarea id="medication" name="medication" cols="40" rows="5" class="form-control"></textarea>
                    </div>
                </div> 
                <div class="form-group row">
                    <label for="advice" class="col-4 col-form-label">Advice Given</label> 
                    <div class="col-8">
                        <textarea id="advice" name="advice" cols="40" rows="5" class="form-control"></textarea>
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