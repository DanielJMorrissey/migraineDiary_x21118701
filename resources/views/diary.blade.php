@extends('layout')
@section('title')
    <title>
        Migraine Diary - Diary
    </title>
@endsection
@section('maincontent')
    <main>
        <div class="form-group row d-flex justify-content-center" >
            <div class="offset-4 col-8" style="width:80%;margin:0em auto;text-align:center;" >
                <button class="btn btn-primary">
                    <a href="/addDiary" style="color:#000;">Add Diary Entry</a> 
                </button>
            </div>
        </div>
        @foreach ($diaries as $diary)
            <div class="container" style="border: 0.3em solid #000;margin:1em auto;width:40%;">
                <div class='row'>
                    <h4 style="font-weight: bold;" class="col-2">
                        Date
                    </h4>
                    <p class="col-2">
                        {{ date('d-m-Y', strtotime($diary->date)) }}
                    </p>
                    
                        <a href="updateDiary/{{ $diary->id }}" class="col-2">
                            <button >
                                Update
                            </button>
                        </a>
                    
                    
                        <a href="#" class="col-2">
                            <button> 
                                Delete
                            </button>  
                        </a>
                     
                </div>
                
                <hr />
                @if($diary->stress == 1)
                    <p>
                        You were feeling stressed.
                    </p>
                @endif
                @if($diary->low_water_intake == 1)
                    <p>
                        You were dehydrated.
                    </p>
                @endif
                @if($diary->chocolate == 1)
                    <p>
                        You had chocolate.
                    </p>
                @endif
                @if($diary->cheese == 1)
                    <p>
                        You had cheese.
                    </p>
                @endif
                @if($diary->yeast_goods == 1)
                    <p>
                        You had yeast products.
                    </p>
                @endif
                @if($diary->yoghurt == 1)
                    <p>
                        You had yoghurt.
                    </p>
                @endif
                @if($diary->fruit == 1)
                    <p>
                        You had citrus fruits.
                    </p>
                @endif
                @if($diary->nuts == 1)
                    <p>
                        You had nuts.
                    </p>
                @endif
                @if($diary->olives == 1)
                    <p>
                        You had olives.
                    </p>
                @endif
                @if($diary->tomato == 1)
                    <p>
                        You had tomatoes.
                    </p>
                @endif
                @if($diary->soy == 1)
                    <p>
                        You had soy.
                    </p>
                @endif
                @if($diary->vinegar == 1)
                    <p>
                        You had vinegar
                    </p>
                @endif
                @if(isset($diary->medication) or isset($diary->comment))
                    <hr/>
                @endif
                @if(isset($diary->medication))
                    <h5 style="font-weight: bold;">
                        Medication
                    </h5>
                    <p>
                      {{ $diary->medication }}  
                    </p>
                @endif
                @if(isset($diary->comment))
                    <h5 style="font-weight: bold;">
                        Comments
                    </h5>
                    <p>
                      {{ $diary->comment }}  
                    </p>
                @endif
            </div>
        @endforeach
        <p>
            Welcome {{ auth()->user()->username }}!
        </p>
        <p>
            Welcome user with id {{ auth()->user()->id }}!
        </p>
        @if (session('success'))
            <small>
                {{ session('success') }}
            </small>
        @elseif (session('successReg'))
            <small>
                {{ session('successReg') }}
            </small>
        @endif
        <p style="margin:1em;">
            Success. 
        </p>
        
        
    </main>
@endsection