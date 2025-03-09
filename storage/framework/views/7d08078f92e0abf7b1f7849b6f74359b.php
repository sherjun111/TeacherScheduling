<div>

<!--[if BLOCK]><![endif]--><?php if(Auth::guard('admin')->check() ): ?>
			<div class="user-info-dropdown">
					<div class="dropdown">
						<a
							class="dropdown-toggle"
							href="#"
							role="button"
							data-toggle="dropdown"
						>
							<span class="user-icon">
								<img src="<?php echo e($admin->picture); ?>" alt="" />
							</span>
							<span class="user-name"><?php echo e($admin->name); ?></span>
						</a>
						<div
							class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list"
						>
							<a class="dropdown-item" href="<?php echo e(route('admin.profile')); ?>"
								><i class="dw dw-user1"></i> Profile</a
							>
							<a class="dropdown-item" href="<?php echo e(route('admin.settings')); ?>"
								><i class="dw dw-settings2"></i> Setting</a
							>
							<a class="dropdown-item" href="faq.html"
								><i class="dw dw-help"></i> Help</a
							>
							<a class="dropdown-item" href="<?php echo e(route('admin.logout_handler')); ?>"
							onclick="event.preventDefault();document.getElementById('adminLogoutForm').submit();"><i class="dw dw-logout"></i> Log Out</a>
							<form action="<?php echo e(route('admin.logout_handler')); ?>" id="adminLogoutForm" method="POST"><?php echo csrf_field(); ?></form>
						</div>
					</div>
				</div>
				
			<?php elseif(Auth::guard('student')->check() ): ?>
			<div class="user-info-dropdown">
					<div class="dropdown">
						<a
							class="dropdown-toggle"
							href="#"
							role="button"
							data-toggle="dropdown"
						>
							<span class="user-icon">
								<img src="<?php echo e($student->picture); ?>" alt="" />
							</span>
							<span class="user-name"><?php echo e($student->name); ?></span>
						</a>
						<div
							class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list"
						>
							<a class="dropdown-item" href="<?php echo e(route('student.profile')); ?>"
								><i class="dw dw-user1"></i> Profile</a
							>
							<a class="dropdown-item" href="profile.html"
								><i class="dw dw-settings2"></i> Setting</a
							>
							<a class="dropdown-item" href="faq.html"
								><i class="dw dw-help"></i> Help</a
							>
							<a class="dropdown-item" href="<?php echo e(route('student.logout')); ?>" onclick="event.preventDefault();document.getElementById('studentLogoutForm').submit();"
								><i class="dw dw-logout"></i> Log Out</a
							>
							<form action="<?php echo e(route('student.logout')); ?>" id="studentLogoutForm" method="POST"><?php echo csrf_field(); ?></form>
						</div>
					</div>
				</div>
				
			<?php endif; ?><!--[if ENDBLOCK]><![endif]-->

				
</div>
<?php /**PATH C:\xampp\htdocs\Enroll\resources\views/livewire/admin-student-header-profile-info.blade.php ENDPATH**/ ?>