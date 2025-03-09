@extends('back.layout.auth-layout')
@section('pageTittle',isset($pageTittle) ? $pageTittle : 'Login')
@section('content')
<div class="login-box bg-white box-shadow border-radius-10" bis_skin_checked="1">
							<div class="login-title" bis_skin_checked="1">
								<h2 class="text-center text-primary">Login</h2>
							</div>
							<form action="{{ route('admin.login_handler') }}" method="POST">
							@csrf
							@if (Session::get('fail'))
            <div class="alert alert-danger">
                {{ Session::get('fail') }}

                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        @if (Session::get('success'))
        <div class="alert alert-success">
            {{ Session::get('success') }}

            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
	<div class="input-group custom" bis_skin_checked="1">
    <select name="role" class="form-control form-control-lg">
        <option value="">Select Role</option>
        <option value="admin">Admin</option>
        <option value="teacher">Teacher</option>
    </select>
    <div class="input-group-append custom" bis_skin_checked="1">
        <span class="input-group-text"><i class="icon-copy dw dw-user-2"></i></span>
    </div>
</div>
@error('role')
<div class="d-block text-danger" style="margin-top: -25px;margin-bottom:15px;">
    {{ $message }}
</div>
@enderror
								<div class="input-group custom" bis_skin_checked="1">
									<input type="text" class="form-control form-control-lg" placeholder="Username/Email" name="login_id" value="{{ old('login_id') }}">
									<div class="input-group-append custom" bis_skin_checked="1">
										<span class="input-group-text"><i class="icon-copy dw dw-user1"></i></span>
									</div>
								</div>
								@error('login_id')
            	<div class="d-block text-danger" style="margin-top: -25px;margin-bottom:15px;">
                				{{ $message }}
            	</div>
       							 @enderror
								<div class="input-group custom" bis_skin_checked="1">
									<input type="password" class="form-control form-control-lg" placeholder="**********" name="password">
									<div class="input-group-append custom" bis_skin_checked="1">
										<span class="input-group-text"><i class="dw dw-padlock1"></i></span>
									</div>
								</div>
								@error('password')
							<div class="d-block text-danger" style="margin-top: -25px;margin-bottom:15px;">
								{{ $message }}
							</div>
								@enderror
								<div class="row pb-30" bis_skin_checked="1">
									<div class="col-6" bis_skin_checked="1">
										<div class="custom-control custom-checkbox" bis_skin_checked="1">
											<input type="checkbox" class="custom-control-input" id="customCheck1">
											<label class="custom-control-label" for="customCheck1">Remember</label>
										</div>
									</div>
									<div class="col-6" bis_skin_checked="1">
										<div class="forgot-password" bis_skin_checked="1">
											<a href="{{ route('admin.forgot-password') }}">Forgot Password</a>
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
											<a class="btn btn-outline-primary btn-lg btn-block" href="register.html">Register To Create Account</a>
										</div>
									</div>
								</div>
							</form>
						</div>
@endsection
