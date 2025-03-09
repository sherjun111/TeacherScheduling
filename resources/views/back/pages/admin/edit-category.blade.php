@extends('back.layout.pages-layout')
@section('pageTittle',isset($pageTittle) ? $pageTittle : 'AddSubject')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="pd-20 card-box mb-30">
            <div class="clearfix">
                <div class="pull-left">
                    <h4 class="text-dark">Edit Subject</h4>
                </div>
                <div class="pull-right">
                    <a href="{{ route('admin.manage-subjects.cats-subcats-list') }}" class="btn btn-primary btn-sm">
                     <i class="ion-arrow-left-a"></i> Back to Subject list
                    </a>
                </div>
            </div>
            <hr>
            <form action="{{ route('admin.manage-subjects.update-category') }}" method="POST" enctype="multipart/form-data" class="mt-3">
                    <input type="hidden" name="category_id" value="{{ Request('id') }}">
                    @csrf
                @if (Session::get('success'))
                    <div class="alert alert-success">
                        <strong><i class="dw dw-checked"></i></strong>
                        {!! Session::get('success') !!}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                @if (Session::get('fail'))
                <div class="alert alert-danger">
                    <strong><i class="dw dw-checked"></i></strong>
                    {!! Session::get('fail') !!}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="">Subject Code</label>
                        <input type="text" class="form-control" name="subject_code" placeholder="Enter Subject_Code" value="{{ $category->subject_code }}">
                        @error('subject_code') 
                            <span class="text-danger ml-2">
                                {{ $message }}
                            </span>
                        @enderror 
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="">Subject Name</label>
                        <input type="text" class="form-control" name="subject_name" placeholder="Enter Subject_name" value="{{ $category->subject_name }}">
                        @error('subject_name') 
                            <span class="text-danger ml-2">
                                {{ $message }}
                            </span>
                        @enderror 
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="">Time</label>
                        <input type="text" class="form-control" name="subject_time" placeholder="Enter Subject_time" value="{{ $category->subject_time }}">
                        @error('subject_time') 
                            <span class="text-danger ml-2">
                                {{ $message }}
                            </span>
                        @enderror 
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="">Room</label>
                        <input type="text" class="form-control" name="subject_room" placeholder="Enter Room" value="{{ $category->subject_room }}">
                        @error('subject_room') 
                            <span class="text-danger ml-2">
                                {{ $message }}
                            </span>
                        @enderror 
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="">Block</label>
                        <input type="text" class="form-control" name="subject_block" placeholder="Enter Block" value="{{ $category->subject_block }}">
                        @error('subject_block') 
                            <span class="text-danger ml-2">
                                {{ $message }}
                            </span>
                         @enderror 
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="">Days</label>
                        <input type="text" class="form-control" name="subject_day" placeholder="Enter day" value="{{ $category->subject_day }}">
                       @error('subject_day')
                            <span class="text-danger ml-2">
                                {{ $message }}
                            </span>
                       @enderror 
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="">Year Level</label>
                        <select class="form-control" name="year_level">
                            <option value="">Select Year Level</option>
                            <option value="1">1st Year</option>
                            <option value="2">2nd Year</option>
                            <option value="3">3rd Year</option>
                            <option value="4">4th Year</option>
                        </select>
                        @error('year_level')
                            <span class="text-danger ml-2">
                                {{ $message }}
                            </span>
                        @enderror 
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">SAVE CHANGE</button>
            </form>
        </div>
    </div>
  </div>

@endsection
