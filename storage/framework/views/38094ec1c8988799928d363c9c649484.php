<div>
<?php if( Session::get('fail') ): ?>
    <div class="alert alert-danger">
        <?php echo e(Session::get('fail')); ?>

        <button class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <?php endif; ?>
    <?php if( Session::get('success') ): ?>
    <div class="alert alert-success">
        <?php echo e(Session::get('success')); ?>

        <button class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <?php endif; ?>
    <?php if( Session::get('info') ): ?>
    <div class="alert alert-info">
        <?php echo e(Session::get('info')); ?>

        <button class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <?php endif; ?>
</div><?php /**PATH C:\xampp\htdocs\Enroll\resources\views/components/alert/form-alert.blade.php ENDPATH**/ ?>