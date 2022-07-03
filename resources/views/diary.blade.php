@extends('layout')
@section('maincontent')
    <main>
        @foreach ($diaries as $diary)
            <div class="container">
                <h4>
                    Date
                </h4>
                <p>
                    {{ $diary->date }}
                </p>
                <p>
                    @if($diary->stress == 1)
                        stressed
                    @endif
                </p>
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
        <button>
           <a href="/addDiary">Add Diary Entry</a> 
        </button>
        
    </main>
@endsection