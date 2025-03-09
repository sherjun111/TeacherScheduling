
<?php $__env->startSection('pageTittle',isset($pageTittle) ? $pageTittle : 'Login'); ?>
<?php $__env->startSection('content'); ?>
<div class="login-box bg-white box-shadow border-radius-10" bis_skin_checked="1">
							<div class="login-title" bis_skin_checked="1">
								<h2 class="text-center text-primary">Login</h2>
							</div>
							<form action="<?php echo e(route('admin.login_handler')); ?>" method="POST">
							<?php echo csrf_field(); ?>
							<?php if(Session::get('fail')): ?>
            <div class="alert alert-danger">
                <?php echo e(Session::get('fail')); ?>


                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php endif; ?>
        <?php if(Session::get('success')): ?>
        <div class="alert alert-success">
            <?php echo e(Session::get('success')); ?>


            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif; ?>
								<div class="input-group custom" bis_skin_checked="1">
									<input type="text" class="form-control form-control-lg" placeholder="Username/Email" name="login_id" value="<?php echo e(old('login_id')); ?>">
									<div class="input-group-append custom" bis_skin_checked="1">
										<span class="input-group-text"><i class="icon-copy dw dw-user1"></i></span>
									</div>
								</div>
								<?php $__errorArgs = ['login_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            	<div class="d-block text-danger" style="margin-top: -25px;margin-bottom:15px;">
                				<?php echo e($message); ?>

            	</div>
       							 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
								<div class="input-group custom" bis_skin_checked="1">
									<input type="password" class="form-control form-control-lg" placeholder="**********" name="password">
									<div class="input-group-append custom" bis_skin_checked="1">
										<span class="input-group-text"><i class="dw dw-padlock1"></i></span>
									</div>
								</div>
								<?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
							<div class="d-block text-danger" style="margin-top: -25px;margin-bottom:15px;">
								<?php echo e($message); ?>

							</div>
								<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
								<div class="row pb-30" bis_skin_checked="1">
									<div class="col-6" bis_skin_checked="1">
										<div class="custom-control custom-checkbox" bis_skin_checked="1">
											<input type="checkbox" class="custom-control-input" id="customCheck1">
											<label class="custom-control-label" for="customCheck1">Remember</label>
										</div>
									</div>
									<div class="col-6" bis_skin_checked="1">
										<div class="forgot-password" bis_skin_checked="1">
											<a href="<?php echo e(route('admin.forgot-password')); ?>">Forgot Password</a>
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
											<a class="btn btn-outline-primary btn-lg btn-block" href="register.html">Register To Create Account</a>
										</div>
									</div>
								</div>
							</form>
						</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('back.layout.auth-layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Enroll\resources\views/back/pages/admin/auth/login.blade.php ENDPATH**/ ?>