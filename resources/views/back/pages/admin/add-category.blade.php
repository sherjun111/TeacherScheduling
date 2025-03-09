@extends('back.layout.pages-layout')
@section('pageTittle',isset($pageTittle) ? $pageTittle : 'AddSubject')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="pd-20 card-box mb-30">
            <div class="clearfix">
                <div class="pull-left">
                    <h4 class="text-dark">Add Subject</h4>
                </div>
                <div class="pull-right">
                    <a href="{{ route('admin.manage-subjects.cats-subcats-list') }}" class="btn btn-primary btn-sm">
                     <i class="ion-arrow-left-a"></i> Back to Subject list
                    </a>
                </div>
            </div>
            <hr>
            <form action="{{ route('admin.manage-subjects.store-category') }}" method="POST" enctype="multipart/form-data" class="mt-3">
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
                        <input type="text" class="form-control" name="subject_code" placeholder="Enter Subject_Code" value="{{ old('subject_code') }}">
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
                        <input type="text" class="form-control" name="subject_name" placeholder="Enter Subject_name" value="{{ old('subject_name') }}">
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
                        <input type="text" class="form-control" name="subject_time" placeholder="Enter Subject_time" value="{{ old('subject_time') }}">
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
                        <input type="text" class="form-control" name="subject_room" placeholder="Enter Room" value="{{ old('subject_room') }}">
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
        <select class="form-control" name="subject_block">
            <option value="">Select Block</option>
            <option value="A">A</option>
            <option value="B">B</option>
            <option value="C">C</option>
            <option value="D">D</option>
            <option value="E">E</option>
        </select>
        @error('subject_block')
            <span class="text-danger ml-2">
                {{ $message }}
            </span>
        @enderror 
    </div>
</div>
<div class="col-md-2">
    <div class="form-group">
        <label for="">DAYS</label>
        <select class="form-control" name="subject_day">
            <option value="">Select Days</option>
            <option value="MTH">Monday and Thursday</option>
            <option value="TF">Tuesday and Friday</option>
            <option value="W">Wednesday</option>
            <option value="S">Saturday</option>
        </select>
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
            <button type="submit" class="btn btn-primary">CREATE</button>
            </form>
        </div>
    </div>
  </div>
  
  <div class="table-responsive mt-4">
                            <table class="table table-borderless table-striped">
                            <thead class="bg-secondary text-blue">
                                <tr>
                                    <th>Subject Code</th>
                                    <th>Description</th>
                                    <th>Time</th>
                                    <th>Room</th>
                                    <th>Block</th>
                                    <th>Days</th>
                                    <th>Year Level</th>
                                   
                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0" id="sortable_categories">
                                @forelse ($categories as $item)
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

                    <div class="d-flex justify-content-center mt-4">
                    {{ $categories->links('pagination::simple-bootstrap-5') }}
                    </div>
            </div>
        </div>        
      

@endsection
@push('scripts')
    <script>
    $('table tbody#sortable_categories').sortable({
            cursor:"move",
            update:function(event,ui){
                $(this).children().each(function(index){
                   if( $(this).attr("data-ordering") != (index+1) ){
                      $(this).attr("data-ordering",(index+1)).addClass("updated");
                   }
                });
                var positions = [];
                $(".updated").each(function(){
                   positions.push([$(this).attr("data-index"),$(this).attr("data-ordering")]);
                   $(this).removeClass("updated");
                });
                // alert(positions);
                Livewire.dispatch("updateCategoriesOrdering",[positions]);
            }
        });

  $(document).on('click','.deleteCategoryBtn', function(e){
            e.preventDefault();
            var category_id = $(this).data('id');
            swal.fire({
                title:'Are you sure?',
                html:'You want to delete this category',
                showCloseButton:true,
                showCancelButton:true,
                cancelButtonText:'Cancel',
                confirmButtonText:'Yes, Delete',
                cancelButtonColor:'#d33',
                confirmButtonColor:'#3085d6',
                width:300,
                allowOutsideClick:false
            }).then(function(result){
                if(result.value){
                    Livewire.dispatch('deleteCategory',[category_id]);
                }
            });
        });
    </script>
@endpush
