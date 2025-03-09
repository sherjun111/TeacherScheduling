@extends('back.layout.pages-layout')
@section('pageTittle',isset($pageTittle) ? $pageTittle : 'AddSubject')
@section('content')
<div>
    <div class="row">
        <div class="col-md-12">
             <div class="pd-20 card-box mb-30">
                    <div class="clearfix">
                          <div class="pull-right">
                            <form action="{{ route('student.enroll.edit-product') }}" method="GET" class="form-inline">
                                <select name="year_level" class="form-control mr-2">
                                    <option value="">Select Year Level</option>
                                    <option value="1">1st Year</option>
                                    <option value="2">2nd Year</option>
                                    <option value="3">3rd Year</option>
                                    <option value="4">4th Year</option>
                                </select>
                                <select name="block" class="form-control mr-2">
                                    <option value="">Select Block</option>
                                    <option value="A">Block A</option>
                                    <option value="B">Block B</option>
                                    <option value="C">Block C</option>
                                </select>
                                <select name="day" class="form-control mr-2">
                                    <option value="">Select Day</option>
                                    <option value="MTH">Monday & Thurday</option>
                                    <option value="TF">Tuesday & Friday</option>
                                    <option value="Wednesday">Wednesday</option>                                    
                                    <option value="S">Saturday</option>
                                </select>
                                <input type="time" name="time" class="form-control mr-2">
                                <button type="submit" class="btn btn-primary">Filter</button>
                            </form>
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
                                        @if(
                                            (!request('year_level') || $item->year_level == request('year_level')) &&
                                            (!request('block') || $item->subject_block == request('block')) &&
                                            (!request('day') || $item->subject_day == request('day')) &&
                                            (!request('time') || $item->subject_time >= request('time'))
                                        )
                                            <tr data-index="{{ $item->id }}" data-ordering="{{ $item->booking }}">
                                                <td>{{$item->subject_code}}</td>
                                                <td>{{$item->subject_name}}</td>
                                                <td>{{$item->subject_time}}</td>
                                                <td>{{$item->subject_room}}</td>
                                                <td>{{$item->subject_block}}</td>
                                                <td>{{$item->subject_day}}</td>
                                                <td>{{$item->year_level}}</td>
                                                <td>
                                                 
                                                <button type="sumbit" class="btn btn-info btn-sm btn-flat mr-1 add-subject" 
                                                            data-id="{{ $item->id }}"
                                                            data-code="{{ $item->subject_code }}"
                                                            data-name="{{ $item->subject_name }}"
                                                            data-time="{{ $item->subject_time }}"
                                                            data-room="{{ $item->subject_room }}"
                                                            data-block="{{ $item->subject_block }}"
                                                            data-day="{{ $item->subject_day }}"
                                                            data-year="{{ $item->year_level }}"
                                                            title="Add Subject">
                                                        <i class="fa fa-plus"></i>
                                                    </button>
                                        
                                                </td>
                                            </tr>
                                        @endif
                                    @empty
                                        <tr>
                                            <td colspan="8">
                                                <span class="text-danger">No subjects found!</span>
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                                 </div>
                         </table>
                   
        </div>
        <x-alert.form-alert/>
        <h4 class="h4 text-blue mt-5">Selected Subjects</h4>
       <form action="{{route('student.enroll.save-enrollment')}}" method="POST">
<div class="table-responsive mt-4">
    <table class="table table-borderless table-striped" id="selected-subjects-table">
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
        <tbody id="selected-subjects-body">
            <!-- Selected subjects will be added here dynamically -->
        </tbody>
    </table>
</div>
@csrf
<input type="hidden" id="selected-subjects-input" name="selected_subjects" value="">
<button type="sumbit"id="save-enrollment" class="btn btn-primary mt-3">Save Enrollment</button>
     </div>        
</div>
                                      
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    var selectedSubjects = [];

    // Load previously selected subjects from local storage
    var storedSubjects = localStorage.getItem('selectedSubjects');
    if (storedSubjects) {
        selectedSubjects = JSON.parse(storedSubjects);
        renderSelectedSubjects();
    }

    $('.add-subject').click(function() {
        var button = $(this);
        var subjectId = button.data('id');
        var subjectCode = button.data('code');
        var subjectName = button.data('name');
        var subjectTime = button.data('time');
        var subjectRoom = button.data('room');
        var subjectBlock = button.data('block');
        var subjectDay = button.data('day');
        var subjectYear = button.data('year');

        // Check for conflicts
        var conflict = checkConflict(subjectDay, subjectTime, subjectCode, selectedSubjects);

        if (conflict) {
            alert('Conflict!.. Alert..This subject conflicts either Same. Time or Day & SubjectCode.');
            return;
        }

        // If no conflict, add the subject to the selected subjects array
        var newSubject = {
            id: subjectId,
            code: subjectCode,
            name: subjectName,
            time: subjectTime,
            room: subjectRoom,
            block: subjectBlock,
            day: subjectDay,
            year: subjectYear
        };

        selectedSubjects.push(newSubject);
        renderSelectedSubjects();
        saveSelectedSubjects();
    });

    // Remove subject from selected subjects
    $(document).on('click', '.remove-subject', function() {
        var subjectId = $(this).data('id');
        selectedSubjects = selectedSubjects.filter(function(subject) {
            return subject.id != subjectId;
        });
        renderSelectedSubjects();
        saveSelectedSubjects();
    });
function renderSelectedSubjects() {
    var tbody = $('#selected-subjects-body');
    tbody.empty();
    selectedSubjects.forEach(function(subject) {
        var row = '<tr>' +
            '<td>' + subject.code + '</td>' +
            '<td>' + subject.name + '</td>' +
            '<td>' + subject.time + '</td>' +
            '<td>' + subject.room + '</td>' +
            '<td>' + subject.block + '</td>' +
            '<td>' + subject.day + '</td>' +
            '<td>' + subject.year + '</td>' +
            '<td><button class="btn btn-danger btn-sm remove-subject" data-id="' + subject.id + '">Remove</button></td>' +
            '</tr>';
        tbody.append(row);
    });
    $('#selected-subjects-input').val(JSON.stringify(selectedSubjects));
}
function saveSelectedSubjects() {
        localStorage.setItem('selectedSubjects', JSON.stringify(selectedSubjects));
    }

// Add this new function to save the enrollment
function saveEnrollment() {
    if (selectedSubjects.length === 0) {
        alert('Please select at least one subject before saving.');
        return;
    }

    // Validate and prepare the subjects data
    var validSubjects = selectedSubjects.map(function(subject) {
        return {
            id: subject.id,
            code: subject.code,
            name: subject.name,
            time: subject.time,
            room: subject.room,
            block: subject.block,
            day: subject.day,
            year: parseInt(subject.year) || null // Convert to integer or null if invalid
        };
    });

    $.ajax({
        url: '{{ route("student.enroll.save-enrollment") }}',
        method: 'POST',
        data: {
            subjects: JSON.stringify(validSubjects),
            _token: '{{ csrf_token() }}',
            },
        dataType: 'json',
        success: function(response) {
            alert(response.message);
            // Clear local storage and selected subjects
            localStorage.removeItem('selectedSubjects');
            selectedSubjects = [];
            renderSelectedSubjects();
        },
        error: function(xhr) {
            alert('Error saving enrollment: ' + (xhr.responseJSON ? xhr.responseJSON.message : 'Unknown error'));
        }
    });
}

// Modify the click event for the save button
$('#save-enrollment').click(function(e) {
    e.preventDefault();
    saveEnrollment();
});


    function checkConflict(newDay, newTime, newCode) {
        return selectedSubjects.some(function(subject) {
            return (subject.day === newDay && subject.time === newTime) || subject.code === newCode;
        });
    }

    
});
</script>  
    {{-- Because she competes with no one, no one can compete with her. --}}
@endsection
