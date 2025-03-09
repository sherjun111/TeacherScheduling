@extends('back.layout.pages-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Profile')
@section('content')

<div class="page-header">
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="title">
                <h4>Profile</h4>
            </div>
            <nav aria-label="breadcrumb" role="navigation">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ route('student.home') }}">Home</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        Profile
                    </li>
                </ol>
            </nav>
        </div>
    </div>
</div>

@livewire('student.student-profile')

@endsection
@push('scripts')
<script>
    $('input[type="file"][id="studentProfilePictureFile"]').kropify({
        preview: 'img#studentProfilePicture',        
        aspectRatio: 1,
        cancelButtonText: 'Cancel',
        resetButtonText: 'Reset',
        cropButtonText: 'Crop & Update',
        processURL: '#studentProfilePicture',
        maxSize: 2097152, // 2MB
        showLoader: true,
        animationClass: 'headShake',
        fileName: 'studentProfilePictureFile',
        success: function(data) {
            if (data.status == 1) {
                toastr.success(data.msg);
                // Update the profile picture on the page
                $('img#studentProfilePicture').attr('src', data.picture_url);
                // Dispatch Livewire events to update other parts of the page
                Livewire.dispatch('updateAdminStudentHeaderInfo');
                Livewire.dispatch('updateStudentProfilePage');
            } else {
                toastr.error(data.msg);
            }
        },
        errors: function(error, text) {
            console.error('Error:', text);
            toastr.error('An error occurred while updating the profile picture.');
        },
    });
</script>
@endpush
