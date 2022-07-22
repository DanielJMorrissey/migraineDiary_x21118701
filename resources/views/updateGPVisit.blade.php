@extends('layout')
@section('title')
    <title>
        Migraine Diary - Update GP Visit
    </title>
@endsection
@section('maincontent')
    <main>
        <div class="container">
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
            <form id="form" method="POST" action="/completeGPVisitUpdate/{{ $updateGPVisit->id }}">
                @csrf
                @method('PUT')
                <div class="form-group row">
                    <label for="text" class="col-2 col-form-label">Date</label> 
                    <div class="col-10">
                        <input id="date" name="date" type="date" value="{{ $updateGPVisit->date }}" class="form-control" required>
                    </div>
                </div>
                <div class="form-group row trackerField">
                    <label class="col-2">GP Name</label> 
                    <div class="col-10">
                        <div class="custom-control custom-checkbox custom-control-inline">
                            <input name="gp" id="gp" type="text" value="{{ $updateGPVisit->gp }}" class="custom-control-input">
                        </div>
                    </div>
                </div>
                <div class="form-group row trackerField">
                    <label for="medication" class="col-2 col-form-label">Medication Prescribed</label> 
                    <div class="col-10">
                        <textarea id="medication" name="medication" cols="40" rows="5" class="form-control">{{ $updateGPVisit->medication }}</textarea>
                    </div>
                </div> 
                <div class="form-group row trackerField">
                    <label for="advice" class="col-2 col-form-label">Advice Given</label> 
                    <div class="col-10">
                        <textarea id="advice" name="advice" cols="40" rows="5" class="form-control">{{ $updateGPVisit->advice }}</textarea>
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