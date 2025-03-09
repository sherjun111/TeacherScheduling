<div>

    <div class="row">
        <div class="col-md-12">
             <div class="pd-20 card-box mb-30">
                    <div class="clearfix">
                        <div class="pull-left">
                            <h4 class="h4 text-blue">Subject List</h4>
                        </div>
                            <div class="pull-right">
                        <a href="{{ route('admin.manage-subjects.add-category') }}" class="btn btn-primary btn-sm" type="button">
                            <i class="fa fa-plus"></i>
                            Add Subject
                        </a>
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
                                    <th>Actions</th>
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
                                <td>
                                    <a href="{{ route('admin.manage-subjects.edit-category',['id'=>$item->id]) }}" class="btn btn-info btn-sm btn-flat mr-1" title="Edit"><i class="fa fa-pencil"></i></a>
                                    <a href="javascript:;" class="btn btn-danger btn-sm btn-flat deleteCategoryBtn" data-id="{{ $item->id }}" title="Delete">    <i class="fa fa-trash"></i></a>
                                </td>
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
                    {{ $categories->links('livewire::simple-bootstrap') }}
                    </div>
            </div>
        </div>        
        </div>
       
    {{-- Because she competes with no one, no one can compete with her. --}}

   