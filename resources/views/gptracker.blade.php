@extends('layout')
@section('title')
    <title>
        Migraine Diary - GP Tracker
    </title>
@endsection
@section('maincontent')
    <main>
        <div class="form-group row d-flex justify-content-center" >
            {{-- user feedback --}}
            @if(session('saved'))
                <p class="text-success d-flex justify-content-center">
                    {{ session('saved') }}
                </p>
            @elseif(session('updated'))
                <p class="text-success d-flex justify-content-center">
                    {{ session('updated') }}
                </p>
            @elseif(session('deleted'))
                <p class="text-success d-flex justify-content-center">
                    {{ session('deleted') }}
                </p>
            @elseif(session('notDeleted'))
                <p class="text-danger d-flex justify-content-center">
                    {{ session('notDeleted') }}
                </p>
            @elseif(session('notUpdated'))
                <p class="text-danger d-flex justify-content-center">
                    {{ session('notUpdated') }}
                </p>
            @elseif(session('doesNotExist'))
                <p class="text-danger d-flex justify-content-center">
                    {{ session('doesNotExist') }}
                </p>
            @endif
            <div class="offset-5 col-8" style="width:80%;margin:0em auto;text-align:center;" >
                <a href="/addGPVisit" style="color:#000;">
                    <button class="btn btn-primary">
                        Add GP Visit 
                    </button>
                </a>
            </div>
        </div>
        {{-- gp visit entries displayed here --}}
        @foreach ($gpVisits as $gpVisit)
            <div class="container card diaryEntry" style="display:none;box-shadow: 4.0px 8.0px 8.0px hsl(0deg 0% 0% / 0.38);">
                <div class='row'>
                    <h4 style="font-weight: bold;" class="col-lg-2">
                        Date
                    </h4>
                    <p class="col-lg-2">
                        {{ date('d-m-Y', strtotime($gpVisit->date)) }}
                    </p>
                        {{-- update and display buttons for crud --}}
                        <a href="/updateGPVisit/{{ $gpVisit->id }}" class="col-lg-2">
                            <button class="btn btn-primary" style="margin-top: 0.1em;">
                                Update
                            </button>
                        </a>
                    
                    
                        <a href="/deleteGPVisit/{{ $gpVisit->id }}" class="col-lg-2">
                            <button class="btn btn-primary" style="margin-top: 0.1em;"> 
                                Delete
                            </button>  
                        </a>
                     
                </div>
                <hr/>
                @if($gpVisit->gp != 'Not given')
                    <p>
                        GP Name: {{ $gpVisit->gp }}
                    </p>
                @else
                    <p>
                        GP Name: Not Given
                    </p>
                @endif
                @if(isset($gpVisit->medication))
                    <h5 style="font-weight: bold;">
                        Medication
                    </h5>
                    <p>
                      {{ $gpVisit->medication }}  
                    </p>
                @endif
                @if(isset($gpVisit->advice))
                    <h5 style="font-weight: bold;">
                        Advice
                    </h5>
                    <p>
                      {{ $gpVisit->advice }}  
                    </p>
                @endif
            </div>
        @endforeach
    </main>
@endsection