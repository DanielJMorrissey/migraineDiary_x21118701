@extends('layout')
@section('title')
    <title>
        Migraine Diary - Diary
    </title>
@endsection
@section('maincontent')
    <main>
        {{-- user feedback --}}
        <div class="form-group row d-flex justify-content-center" >
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
                <a href="/addDiary" style="color:#000;">
                    <button class="btn btn-primary">
                        Add Diary Entry 
                    </button>
                </a>
            </div>
        </div>
        {{-- diary entry data is displayed here --}}
        @foreach ($diaries as $diary)
            <div class="container card diaryEntry" style="display:none;box-shadow: 4.0px 8.0px 8.0px hsl(0deg 0% 0% / 0.38);" >
                <div class='row'>
                    <h4 style="font-weight: bold;" class="col-lg-2">
                        Date
                    </h4>
                    <p class="col-lg-2">
                        {{ date('d-m-Y', strtotime($diary->date)) }}
                    </p>
                        {{-- update and delete buttons for crud --}}
                        <a href="updateDiary/{{ $diary->id }}" class="col-lg-2">
                            <button class="btn btn-primary" style="margin-top: 0.1em;">
                                Update
                            </button>
                        </a>
                    
                    
                        <a href="/deleteDiaryEntry/{{ $diary->id }}" class="col-lg-2">
                            <button class="btn btn-primary" style="margin-top: 0.1em;"> 
                                Delete
                            </button>  
                        </a>
                     
                </div>
                {{-- if a trigger was checked in the diary submission, it'll be displayed here, triggers are stored in the database as 1 = true, 0 = false --}}
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
        
        
        
    </main>
@endsection