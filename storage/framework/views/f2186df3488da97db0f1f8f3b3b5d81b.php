
<?php $__env->startSection('pageTittle',isset($pageTittle) ? $pageTittle : 'AddSubject'); ?>
<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-md-12">
        <div class="pd-20 card-box mb-30">
            <div class="clearfix">
                <div class="pull-left">
                    <h4 class="text-dark">Edit Subject</h4>
                </div>
                <div class="pull-right">
                    <a href="<?php echo e(route('admin.manage-subjects.cats-subcats-list')); ?>" class="btn btn-primary btn-sm">
                     <i class="ion-arrow-left-a"></i> Back to Subject list
                    </a>
                </div>
            </div>
            <hr>
            <form action="<?php echo e(route('admin.manage-subjects.update-category')); ?>" method="POST" enctype="multipart/form-data" class="mt-3">
                    <input type="hidden" name="category_id" value="<?php echo e(Request('id')); ?>">
                    <?php echo csrf_field(); ?>
                <?php if(Session::get('success')): ?>
                    <div class="alert alert-success">
                        <strong><i class="dw dw-checked"></i></strong>
                        <?php echo Session::get('success'); ?>

                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php endif; ?>
                <?php if(Session::get('fail')): ?>
                <div class="alert alert-danger">
                    <strong><i class="dw dw-checked"></i></strong>
                    <?php echo Session::get('fail'); ?>

                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php endif; ?>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="">Subject Code</label>
                        <input type="text" class="form-control" name="subject_code" placeholder="Enter Subject_Code" value="<?php echo e($category->subject_code); ?>">
                        <?php $__errorArgs = ['subject_code'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> 
                            <span class="text-danger ml-2">
                                <?php echo e($message); ?>

                            </span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> 
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="">Subject Name</label>
                        <input type="text" class="form-control" name="subject_name" placeholder="Enter Subject_name" value="<?php echo e($category->subject_name); ?>">
                        <?php $__errorArgs = ['subject_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> 
                            <span class="text-danger ml-2">
                                <?php echo e($message); ?>

                            </span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> 
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="">Time</label>
                        <input type="text" class="form-control" name="subject_time" placeholder="Enter Subject_time" value="<?php echo e($category->subject_time); ?>">
                        <?php $__errorArgs = ['subject_time'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> 
                            <span class="text-danger ml-2">
                                <?php echo e($message); ?>

                            </span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> 
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="">Room</label>
                        <input type="text" class="form-control" name="subject_room" placeholder="Enter Room" value="<?php echo e($category->subject_room); ?>">
                        <?php $__errorArgs = ['subject_room'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> 
                            <span class="text-danger ml-2">
                                <?php echo e($message); ?>

                            </span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> 
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="">Block</label>
                        <input type="text" class="form-control" name="subject_block" placeholder="Enter Block" value="<?php echo e($category->subject_block); ?>">
                        <?php $__errorArgs = ['subject_block'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> 
                            <span class="text-danger ml-2">
                                <?php echo e($message); ?>

                            </span>
                         <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> 
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="">Days</label>
                        <input type="text" class="form-control" name="subject_day" placeholder="Enter day" value="<?php echo e($category->subject_day); ?>">
                       <?php $__errorArgs = ['subject_day'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span class="text-danger ml-2">
                                <?php echo e($message); ?>

                            </span>
                       <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> 
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
                        <?php $__errorArgs = ['year_level'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span class="text-danger ml-2">
                                <?php echo e($message); ?>

                            </span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> 
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">SAVE CHANGE</button>
            </form>
        </div>
    </div>
  </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('back.layout.pages-layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Enroll\resources\views/back/pages/admin/edit-category.blade.php ENDPATH**/ ?>