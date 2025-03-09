<div>

    <div class="row">
        <div class="col-md-12">
             <div class="pd-20 card-box mb-30">
                    <div class="clearfix">
                        <div class="pull-left">
                            <h4 class="h4 text-blue">Subject List</h4>
                        </div>
                            <div class="pull-right">
                        <a href="<?php echo e(route('admin.manage-subjects.add-category')); ?>" class="btn btn-primary btn-sm" type="button">
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
                                    <th>Subject name</th>
                                    <th>Time</th>
                                    <th>Room</th>
                                    <th>Block</th>
                                    <th>Days</th>
                                    <th>Year Level</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0" id="sortable_categories">
                                <!--[if BLOCK]><![endif]--><?php $__empty_1 = true; $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <tr data-index="<?php echo e($item->id); ?>" data-ordering="<?php echo e($item->booking); ?>">
                                <td><?php echo e($item->subject_code); ?></td>
                                <td><?php echo e($item->subject_name); ?></td>
                                <td><?php echo e($item->subject_time); ?></td>
                                <td><?php echo e($item->subject_room); ?></td>
                                <td><?php echo e($item->subject_block); ?></td>
                                <td><?php echo e($item->subject_day); ?></td>
                                <td><?php echo e($item->year_level); ?></td>
                                <td>
                                    <a href="<?php echo e(route('admin.manage-subjects.edit-category',['id'=>$item->id])); ?>" class="btn btn-info btn-sm btn-flat mr-1" title="Edit"><i class="fa fa-pencil"></i></a>
                                    <a href="javascript:;" class="btn btn-danger btn-sm btn-flat deleteCategoryBtn" data-id="<?php echo e($item->id); ?>" title="Delete">    <i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <tr>
                                    <td colspan="4">
                                        <span class="text-danger">No category found!</span>
                                    </td>
                                </tr>
                                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                            
                        </table>
                        </div>

                    <div class="d-block mt-2">
                    <?php echo e($categories->links('livewire::simple-bootstrap')); ?>

                    </div>
            </div>
        </div>        
        </div>
       
    

   <?php /**PATH C:\xampp\htdocs\Enroll\resources\views/livewire/admin-subject-list.blade.php ENDPATH**/ ?>