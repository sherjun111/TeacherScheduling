@extends('back.layout.auth-layout')
@section('pageTitle',isset($pageTitle) ? $pageTitle : 'Login')
@section('content')
<style>
    /* Add fixed height for error message containers to prevent layout shifts */
    .error-container {
        min-height: 25px;
        margin-bottom: 15px;
    }
    
    /* Ensure consistent spacing in the form */
    .input-group.custom {
        margin-bottom: 5px;
    }
</style>
<div class="login-box bg-white box-shadow border-radius-10" bis_skin_checked="1">
    <div class="login-title" bis_skin_checked="1">
        <h2 class="text-center text-primary">Student Login</h2>
    </div>
    <form action="{{ route('student.login-handler') }}" method="POST">
    @csrf

    <x-alert.form-alert/>

    <div class="input-group custom" bis_skin_checked="1">
            <input type="text" class="form-control form-control-lg" placeholder="Username/Email" name="login_id" value="{{ old('login_id') }}">
            <div class="input-group-append custom" bis_skin_checked="1">
                <span class="input-group-text"><i class="icon-copy dw dw-user1"></i></span>
            </div>
        </div>
        <div class="error-container">
            @error('login_id')
            <div class="d-block text-danger">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="input-group custom" bis_skin_checked="1">
            <input type="password" class="form-control form-control-lg" placeholder="**********" name="password">
            <div class="input-group-append custom" bis_skin_checked="1">
                <span class="input-group-text"><i class="dw dw-padlock1"></i></span>
            </div>
        </div>
        <div class="error-container">
            @error('password')
            <div class="d-block text-danger">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="row pb-30" bis_skin_checked="1">
            <div class="col-6" bis_skin_checked="1">
                <div class="custom-control custom-checkbox" bis_skin_checked="1">
                    <input type="checkbox" class="custom-control-input" id="customCheck1">
                    <label class="custom-control-label" for="customCheck1">Remember</label>
                </div>
            </div>
            <div class="col-6" bis_skin_checked="1">
                <div class="forgot-password" bis_skin_checked="1">
                    <a href="{{ route('student.forgot-password') }}">Forgot Password</a>
                </div>
            </div>
        </div>
        <div class="row" bis_skin_checked="1">
            <div class="col-sm-12" bis_skin_checked="1">
                <div class="input-group mb-0" bis_skin_checked="1">
                    
                    <input class="btn btn-primary btn-lg btn-block" type="submit" value="Sign In">
                    {{-- <a class="btn btn-primary btn-lg btn-block" href="index.html">Sign In</a> --}}
                </div>
                <div class="font-16 weight-600 pt-10 pb-10 text-center" data-color="#707373" style="color: rgb(112, 115, 115);" bis_skin_checked="1">
                    OR
                </div>
                <div class="input-group mb-0" bis_skin_checked="1">
                    <a class="btn btn-outline-primary btn-lg btn-block" href="{{ route('student.register') }}">Register To Create Account</a>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
