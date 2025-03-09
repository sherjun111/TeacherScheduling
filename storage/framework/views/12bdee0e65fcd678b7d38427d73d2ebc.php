<?php $__env->startSection('pageTittle',isset($pageTittle) ? $pageTittle : 'Profile'); ?>
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
											<a href="<?php echo e(route('admin.home')); ?>">Home</a>
										</li>
										<li class="breadcrumb-item active" aria-current="page">
											Profile
										</li>
									</ol>
								</nav>
							</div>
						</div>
					</div>
                    <div class="row">
						<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 mb-30">
							<div class="pd-20 card-box height-100-p">
								<div class="profile-photo">
                                <a href="javascript:;" onclick="event.preventDefault();document.getElementById('adminProfilePictureFile').click();" class="edit-avatar"><i class="fa fa-pencil"></i></a>
                                    <img src="<?php echo e($admin->picture); ?>" alt="" class="avatar-photo" id="adminProfilePicture">
                                    <input type="file" name="adminProfilePictureFile" id="adminProfilePictureFile" class="d-none" style="opacity:0">

								</div>
								<h5 class="text-center h5 mb-0" id="adminProfileName"><?php echo e($admin->name); ?></h5>
                                <p class="text-center text-muted font-14" id="adminProfileEmail">
                                    <?php echo e($admin->email); ?>

                                </p>

							</div>
						</div>
						<div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 mb-30">
							<div class="card-box height-100-p overflow-hidden">
                            <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('admin-profile-tabs');

$__html = app('livewire')->mount($__name, $__params, 'lw-907499497-0', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
							</div>
						</div>
					</div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('scripts'); ?>
    <script>
        window.addEventListener('updateAdminInfo', function(event){
            $('#adminProfileName').html(event.detail[0].adminName);
            $('#adminProfileEmail').html(event.detail[0].adminEmail);
        });

        $('input[type="file"][name="adminProfilePictureFile"][id="adminProfilePictureFile"]').ijaboCropTool({
          preview : '#adminProfilePicture',
          setRatio:1,
          allowedExtensions: ['jpg', 'jpeg','png'],
          buttonsText:['CROP','QUIT'],
          buttonsColor:['#30bf7d','#ee5155', -15],
          processUrl:'<?php echo e(route("admin.change-profile-picture")); ?>',
          withCSRF:['_token','<?php echo e(csrf_token()); ?>'],
          onSuccess:function(message, element, status){
            Livewire.dispatch('updateAdminStudentHeaderInfo');
             toastr.success(message);
          },
          onError:function(message, element, status){
            toastr.error(message);
          }
       });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('back.layout.pages-layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Enroll\resources\views/back/pages/admin/profile.blade.php ENDPATH**/ ?>