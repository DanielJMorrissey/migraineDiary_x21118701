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
                <span class="text-danger">
                    {{ session('dateRequired') }}
                </span>
            @elseif(session('notSaved'))
                <span class="text-danger">
                    {{ session('notSaved') }}
                </span>
            @endif
            <span class="text-danger" id="dateError"></span>
            <form id="form" method="POST" action="{{ route('addedGPVisit') }}">
                @csrf
                <div class="form-group row">
                    <label for="text" class="col-2 col-form-label">Date</label> 
                    <div class="col-10">
                        <input id="date" name="date" type="date" class="form-control" required>
                    </div>
                </div>
                <div class="form-group row trackerField">
                    <label class="col-2">GP Name</label> 
                    <div class="col-10">
                        <div class="custom-control custom-checkbox custom-control-inline">
                            <input name="gp" id="gp" type="text" class="custom-control-input">
                        </div>
                    </div>
                </div>
                <div class="form-group row trackerField">
                    <label for="medication" class="col-2 col-form-label">Medication Prescribed</label> 
                    <div class="col-10">
                        <textarea id="medication" name="medication" cols="40" rows="5" class="form-control"></textarea>
                    </div>
                </div> 
                <div class="form-group row trackerField">
                    <label for="advice" class="col-2 col-form-label">Advice Given</label> 
                    <div class="col-10">
                        <textarea id="advice" name="advice" cols="40" rows="5" class="form-control"></textarea>
                    </div>
                </div> 
                <div class="form-group row trackerField">
                    <div class="offset-5 col-12">
                        <button id="submit" name="submit" type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </main>
@endsection