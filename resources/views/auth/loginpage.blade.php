@extends('layout')
{{-- 
    Some code was aided by Laravel docs (available at: https://laravel.com/docs/9.x/authorization) and positronX.io. Available at: https://www.positronx.io/laravel-custom-authentication-login-and-registration-tutorial/      
--}}

@section('title')
    <title>
        Migraine Diary - Log In
    </title>
@endsection
@section('maincontent')
    <main class="login-form">
        <div class="cotainer">
            <div class="row justify-content-center">
                <div class="col-md-4">
                    <div id="loginCard" class="card">
                        <h3 class="card-header text-center">Log In</h3>
                        <div class="card-body">
                            {{-- user feedback --}}
                            @if(session('failed'))
                                <small class="text-danger">
                                    {{ session('failed') }}
                                </small>
                            @elseif(session('noAccess'))
                                <small class="text-danger">
                                    {{ session('noAccess') }}
                                </small>
                            @elseif(session('loggedOut'))
                                <small class="text-success">
                                    {{ session('loggedOut') }}
                                </small>    
                            @endif
                            {{-- log in form that asks for username and password --}}
                            <form method="POST" action="{{ route('customLogin') }}">
                                @csrf
                                <div class="form-group mb-3">
                                    <input type="text" placeholder="Username" id="username" class="form-control" name="username" required autofocus>
                                    @if ($errors->has('username'))
                                    <span class="text-danger">{{ $errors->first('username') }}</span>
                                    @endif
                                    <span class="text-danger" id="usernameError"></span>
                                </div>
                                <div class="form-group mb-3">
                                    <input type="password" placeholder="Password" id="password" class="form-control" name="password" required>
                                    @if ($errors->has('password'))
                                    <span class="text-danger">{{ $errors->first('password') }}</span>
                                    @endif
                                    <span class="text-danger" id="passwordError"></span>
                                </div>
                                <div class="d-grid mx-auto">
                                    <button id="submit" type="submit" class="btn btn-dark btn-block">Signin</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </main>
@endsection