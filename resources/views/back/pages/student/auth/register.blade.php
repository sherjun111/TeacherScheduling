@extends('back.layout.auth-layout')
@section('pageTittle', isset($pageTittle) ? $pageTittle : 'Register')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-30">
            <div class="card border-0 shadow-lg rounded-lg mt-5">
                <div class="card-header bg-gradient-primary-to-secondary text-white">
                    <h1 class="text-center font-weight-light my-4">Create Student Account</h1>
                </div>
                <div class="card-body p-5">
                    <form action="{{ route('student.create') }}" method="POST">
                        @csrf
                        <x-alert.form-alert/>

                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="studentid" placeholder="Enter StudentID#" name="studentid" value="{{ old('studentid') }}">
                                    <label for="studentid">Student ID</label>
                                </div>
                                @error('studentid')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="name" placeholder="Enter full name" name="name" value="{{ old('name') }}">
                                    <label for="name">Full Name</label>
                                </div>
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="username" placeholder="Enter Username" name="username" value="{{ old('username') }}">
                                    <label for="username">Username</label>
                                </div>
                                @error('username')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="form-floating">
                                    <input type="email" class="form-control" id="email" placeholder="Enter email address" name="email" value="{{ old('email') }}">
                                    <label for="email">Email</label>
                                </div>
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <div class="form-floating">
                                    <input type="password" class="form-control" id="password" placeholder="Enter password" name="password">
                                    <label for="password">Password</label>
                                </div>
                                @error('password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="form-floating">
                                    <input type="password" class="form-control" id="confirm_password" placeholder="Retype password" name="confirm_password">
                                    <label for="confirm_password">Confirm Password</label>
                                </div>
                                @error('confirm_password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="address" placeholder="Enter Address" name="address" value="{{ old('address') }}">
                                <label for="address">Address</label>
                            </div>
                            @error('address')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col-md-4 mb-4">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="year" placeholder="Enter Year Level" name="year" value="{{ old('year') }}">
                                    <label for="year">Year Level</label>
                                </div>
                                @error('year')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-4 mb-4">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="course" placeholder="Enter Course" name="course" value="{{ old('course') }}">
                                    <label for="course">Course</label>
                                </div>
                                @error('course')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-4 mb-4">
                                <div class="form-floating">
                                    <input type="number" class="form-control" id="age" placeholder="Enter Your Age" name="age" value="{{ old('age') }}">
                                    <label for="age">Age</label>
                                </div>
                                @error('age')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <div class="form-floating">
                                    <input type="date" class="form-control" id="birthday" name="birthday" value="{{ old('birthday') }}">
                                    <label for="birthday">Birthday</label>
                                </div>
                                @error('birthday')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="form-floating">
                                    <input type="tel" class="form-control" id="phone" placeholder="Enter Contact" name="phone" value="{{ old('phone') }}">
                                    <label for="phone">Contact#</label>
                                </div>
                                @error('phone')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="d-grid mb-4">
                            <button type="submit" class="btn btn-primary btn-lg">Create Account</button>
                        </div>
                    </form>
                </div>
                <div class="card-footer bg-light py-3">
                    <p class="text-center mb-0">Already have an account? <a href="{{ route('student.login') }}" class="text-primary">Sign In</a></p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
    .bg-gradient-primary-to-secondary {
        background: linear-gradient(to right, #4e73df, #36b9cc);
    }
    .form-floating > .form-control:focus ~ label,
    .form-floating > .form-control:not(:placeholder-shown) ~ label {
        color: #4e73df;
    }
    .form-control:focus {
        border-color: #4e73df;
        box-shadow: 0 0 0 0.2rem rgba(78, 115, 223, 0.25);
    }
    .btn-primary {
        background-color: #4e73df;
        border-color: #4e73df;
    }
    .btn-primary:hover {
        background-color: #2e59d9;
        border-color: #2e59d9;
    }
</style>
@endpush