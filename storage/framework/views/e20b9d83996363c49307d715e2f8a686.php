<?php $__env->startSection('pageTitle',isset($pageTitle) ? $pageTitle : 'Forgot Password'); ?>
<?php $__env->startSection('content'); ?>
<div class="login-box bg-white box-shadow border-radius-10">
    <div class="login-title">
        <h2 class="text-center text-primary">Forgot Password</h2>
    </div>
    <h6 class="mb-20">
        Enter your email address to reset your password
    </h6>
    <form action="<?php echo e(route('student.send-password-reset-link')); ?>" method="POST">
    <?php echo csrf_field(); ?>
    <?php if (isset($component)) { $__componentOriginalec1e920844a655da23f15e0530a06cad = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalec1e920844a655da23f15e0530a06cad = $attributes; } ?>
<?php $component = App\View\Components\Alert\FormAlert::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('alert.form-alert'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Alert\FormAlert::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalec1e920844a655da23f15e0530a06cad)): ?>
<?php $attributes = $__attributesOriginalec1e920844a655da23f15e0530a06cad; ?>
<?php unset($__attributesOriginalec1e920844a655da23f15e0530a06cad); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalec1e920844a655da23f15e0530a06cad)): ?>
<?php $component = $__componentOriginalec1e920844a655da23f15e0530a06cad; ?>
<?php unset($__componentOriginalec1e920844a655da23f15e0530a06cad); ?>
<?php endif; ?>
    <div class="input-group custom">
        <input type="text" class="form-control form-control-lg" placeholder="Email" name="email" value="<?php echo e(old('email')); ?>">
        <div class="input-group-append custom">
            <span class="input-group-text"><i class="fa fa-envelope-o" aria-hidden="true"></i></span>
        </div>
    </div>
    <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
        <span class="text-danger d-block" style="margin-top: -25px;margin-bottom:5px;"><?php echo e($message); ?></span>
    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
    <div class="row align-items-center">
        <div class="col-5">
            <div class="input-group mb-0">
                <input class="btn btn-primary btn-lg btn-block" type="submit" value="Submit">
            </div>
        </div>
        <div class="col-2">
            <div class="font-16 weight-600 text-center" data-color="#707373" style="color: rgb(112, 115, 115);">
                OR
            </div>
        </div>
        <div class="col-5">
            <div class="input-group mb-0">
                <a class="btn btn-outline-primary btn-lg btn-block" href="<?php echo e(route('student.login')); ?>">Login</a>
            </div>
        </div>
    </div>
</form>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('back.layout.auth-layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Enroll\resources\views/back/pages/student/auth/forgot.blade.php ENDPATH**/ ?>