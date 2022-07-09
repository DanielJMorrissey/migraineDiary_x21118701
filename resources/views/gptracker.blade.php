@extends('layout')
@section('title')
    <title>
        Migraine Diary - GP Tracker
    </title>
@endsection
@section('maincontent')
    <main>
        <div class="form-group row d-flex justify-content-center" >
            <div class="offset-4 col-8" style="width:80%;margin:0em auto;text-align:center;" >
                <a href="/addGPVisit" style="color:#000;">
                    <button class="btn btn-primary">
                        Add GP Visit 
                    </button>
                </a>
            </div>
        </div>
        @foreach ($gpVisits as $gpVisit)
            <div class="container" style="border: 0.3em solid #000;margin:1em auto;width:40%;">
                <div class='row'>
                    <h4 style="font-weight: bold;" class="col-2">
                        Date
                    </h4>
                    <p class="col-2">
                        {{ date('d-m-Y', strtotime($gpVisit->date)) }}
                    </p>
                    
                        <a href="/updateGPVisit/{{ $gpVisit->id }}" class="col-2">
                            <button >
                                Update
                            </button>
                        </a>
                    
                    
                        <a href="/deleteGPVisit/{{ $gpVisit->id }}" class="col-2">
                            <button> 
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