@extends('layout')
@section('title')
    <title>
        Migraine Diary - Register
    </title>
@endsection
@section('maincontent')
    <main class="signup-form">
        <div class="cotainer">
            <div class="row justify-content-center">
                <div class="col-md-4">
                    <div id="registerCard" class="card">
                        <h3 class="card-header text-center">Register User</h3>
                        <div class="card-body">
                            <form action="{{ route('register.compute') }}" method="POST">
                                @csrf
                                <div class="form-group mb-3">
                                    <input type="text" placeholder="Username" id="username" class="form-control" name="username"
                                        required autofocus>
                                    @if ($errors->has('username'))
                                    <span class="text-danger">{{ $errors->first('username') }}</span>
                                    @endif
                                    <span class="text-danger" id="usernameError"></span>
                                </div>
                                <div class="form-group mb-3">
                                    <input type="password" placeholder="Password" id="password" class="form-control"
                                        name="password" required>
                                    @if ($errors->has('password'))
                                    <span class="text-danger">{{ $errors->first('password') }}</span>
                                    @endif
                                    <span class="text-danger" id="passwordError"></span>
                                </div>
                                <div class="form-group mb-3">
                                    <input type="password" placeholder="Retype Password" id="password1" class="form-control"
                                        name="password1" required>
                                    @if (session('notMatching'))
                                    <span class="text-danger">{{ session('notMatching') }}</span>
                                    @endif
                                    <span class="text-danger" id="password1Error"></span>
                                </div>
                                <div class="d-grid mx-auto">
                                    <button id="submit" type="submit" class="btn btn-dark btn-block">Sign up</button>
                                </div>
                            </form>
                            <p>
                                Password Rules:
                                <ul>
                                    <li>Must be minimum 7 characters</li>
                                    <li>Must contain at least one lowercase letter</li>
                                    <li>Must contain at least one uppercase letter</li>
                                    <li>Must contain at least one number</li>
                                    <li>Spaces and special characters are optional</li>
                                </ul>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection