@extends('layout')
@section('maincontent')
    <main>
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