
<?php $__env->startSection('pageTitle', isset($pageTitle) ? $pageTitle : 'Page title here'); ?>
<?php $__env->startSection('content'); ?>
<div class="page-header">
    <div class="row">
        <div class="col-md-6 col-sm-12">
            <div class="title">
                <h4 class="h4 text-blue">Your Schedule!..</h4>
            </div>
            <nav aria-label="breadcrumb" role="navigation">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="<?php echo e(route('student.home')); ?>">Home</a>
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
                                <?php $__empty_1 = true; $__currentLoopData = $enrolls; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <tr data-index="<?php echo e($item->id); ?>" data-ordering="<?php echo e($item->booking); ?>">
                                <td><?php echo e($item->subject_code); ?></td>
                                <td><?php echo e($item->subject_name); ?></td>
                                <td><?php echo e($item->subject_time); ?></td>
                                <td><?php echo e($item->subject_room); ?></td>
                                <td><?php echo e($item->subject_block); ?></td>
                                <td><?php echo e($item->subject_day); ?></td>
                                <td><?php echo e($item->year_level); ?></td>
                              
                            </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <tr>
                                    <td colspan="4">
                                        <span class="text-danger">No category found!</span>
                                    </td>
                                </tr>
                                <?php endif; ?>
                            
                        </table>
                        </div>

                    <div class="d-block mt-2">
                   
                    </div>
            </div>
        </div>        
        </div>
<?php $__env->stopSection(); ?>

        

<?php echo $__env->make('back.layout.pages-layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Enroll\resources\views/back/pages/student/add-product.blade.php ENDPATH**/ ?>