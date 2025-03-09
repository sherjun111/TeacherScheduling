@extends('back.layout.pages-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Page title here')
@section('content')
<div class="page-header">
    <div class="row">
        <div class="col-md-6 col-sm-12">
            <div class="title">
                <h4 class="h4 text-blue">Your Schedule!..</h4>
            </div>
            <nav aria-label="breadcrumb" role="navigation">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ route('student.home') }}">Home</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        Subject
                    </li>
                </ol>
            </nav>
        </div>

        <div class="row">
        <div class="col-md-12">
             <div class="pd-20 card-box mb-30">
                    <div class="clearfix">
                                
                    </div> 
                        <div class="table-responsive mt-4">
                            <table class="table table-borderless table-striped">
                            <thead class="bg-secondary text-blue">
                                <tr>
                                    <th>Subject_Code</th>
                                    <th>Description</th>
                                    <th>Time</th>
                                    <th>Room</th>
                                    <th>Block</th>
                                    <th>Days</th>
                                    <th>Year_Level </th>
                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0" id="sortable_categories">
                                @forelse ($enrolls as $item)
                                <tr data-index="{{ $item->id }}" data-ordering="{{ $item->booking }}">
                                <td>{{$item->subject_code}}</td>
                                <td>{{$item->subject_name}}</td>
                                <td>{{$item->subject_time}}</td>
                                <td>{{$item->subject_room}}</td>
                                <td>{{$item->subject_block}}</td>
                                <td>{{$item->subject_day}}</td>
                                <td>{{$item->year_level}}</td>
                              
                            </tr>
                                @empty
                                <tr>
                                    <td colspan="4">
                                        <span class="text-danger">No category found!</span>
                                    </td>
                                </tr>
                                @endforelse
                            
                        </table>
                        </div>

                    <div class="d-block mt-2">
                   
                    </div>
            </div>
        </div>        
        </div>
@endsection

        
