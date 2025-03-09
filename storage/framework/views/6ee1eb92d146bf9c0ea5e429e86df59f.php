
<?php $__env->startSection('pageTitle',isset($pageTitle) ? $pageTitle : 'Login'); ?>
<?php $__env->startSection('content'); ?>
<style>
    /* Add fixed height for error message containers to prevent layout shifts */
    .error-container {
        min-height: 25px;
        margin-bottom: 15px;
    }
    
    /* Ensure consistent spacing in the form */
    .input-group.custom {
        margin-bottom: 5px;
    }
</style>
<div class="login-box bg-white box-shadow border-radius-10" bis_skin_checked="1">
    <div class="login-title" bis_skin_checked="1">
        <h2 class="text-center text-primary">Student Login</h2>
    </div>
    <form action="<?php echo e(route('student.login-handler')); ?>" method="POST">
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

    <div class="input-group custom" bis_skin_checked="1">
            <input type="text" class="form-control form-control-lg" placeholder="Username/Email" name="login_id" value="<?php echo e(old('login_id')); ?>">
            <div class="input-group-append custom" bis_skin_checked="1">
                <span class="input-group-text"><i class="icon-copy dw dw-user1"></i></span>
            </div>
        </div>
        <div class="error-container">
            <?php $__errorArgs = ['login_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <div class="d-block text-danger">
                <?php echo e($message); ?>

            </div>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>
        <div class="input-group custom" bis_skin_checked="1">
            <input type="password" class="form-control form-control-lg" placeholder="**********" name="password">
            <div class="input-group-append custom" bis_skin_checked="1">
                <span class="input-group-text"><i class="dw dw-padlock1"></i></span>
            </div>
        </div>
        <div class="error-container">
            <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <div class="d-block text-danger">
                <?php echo e($message); ?>

            </div>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>
        <div class="row pb-30" bis_skin_checked="1">
            <div class="col-6" bis_skin_checked="1">
                <div class="custom-control custom-checkbox" bis_skin_checked="1">
                    <input type="checkbox" class="custom-control-input" id="customCheck1">
                    <label class="custom-control-label" for="customCheck1">Remember</label>
                </div>
            </div>
            <div class="col-6" bis_skin_checked="1">
                <div class="forgot-password" bis_skin_checked="1">
                    <a href="<?php echo e(route('student.forgot-password')); ?>">Forgot Password</a>
                </div>
            </div>
        </div>
        <div class="row" bis_skin_checked="1">
            <div class="col-sm-12" bis_skin_checked="1">
                <div class="input-group mb-0" bis_skin_checked="1">
                    
                    <input class="btn btn-primary btn-lg btn-block" type="submit" value="Sign In">
                    
                </div>
                <div class="font-16 weight-600 pt-10 pb-10 text-center" data-color="#707373" style="color: rgb(112, 115, 115);" bis_skin_checked="1">
                    OR
                </div>
                <div class="input-group mb-0" bis_skin_checked="1">
                    <a class="btn btn-outline-primary btn-lg btn-block" href="<?php echo e(route('student.register')); ?>">Register To Create Account</a>
                </div>
            </div>
        </div>
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('back.layout.auth-layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Enroll\resources\views/back/pages/student/auth/login.blade.php ENDPATH**/ ?>