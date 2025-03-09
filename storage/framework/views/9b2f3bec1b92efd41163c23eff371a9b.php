
<?php $__env->startSection('pageTitle', isset($pageTitle) ? $pageTitle : 'Profile'); ?>
<?php $__env->startSection('content'); ?>

<div class="page-header">
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="title">
                <h4>Profile</h4>
            </div>
            <nav aria-label="breadcrumb" role="navigation">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="<?php echo e(route('student.home')); ?>">Home</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        Profile
                    </li>
                </ol>
            </nav>
        </div>
    </div>
</div>

<?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('student.student-profile');

$__html = app('livewire')->mount($__name, $__params, 'lw-1120607665-0', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>

<?php $__env->stopSection(); ?>
<?php $__env->startPush('scripts'); ?>
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
<?php $__env->stopPush(); ?>

<?php echo $__env->make('back.layout.pages-layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Enroll\resources\views/back/pages/student/profile.blade.php ENDPATH**/ ?>