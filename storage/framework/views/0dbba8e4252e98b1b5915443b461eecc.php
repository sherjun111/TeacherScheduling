
<!DOCTYPE html>
<html>
	<head>
		<!-- Basic Page Info -->
		<meta charset="utf-8" />
		<title><?php echo $__env->yieldContent('Group5'); ?></title>

		<!-- Site favicon -->
		<link
			rel="apple-touch-icon"
			sizes="180x180"
			href="/back/vendors/images/apple-touch-icon.png"
		/>
		<link
			rel="icon"
			type="image/png"
			sizes="32x32"
			href="/back/vendors/images/favicon-32x32.png"
		/>
		<link
			rel="icon"
			type="image/png"
			sizes="16x16"
			href="/back/vendors/images/favicon-16x16.png"
		/>

		<!-- Mobile Specific Metas -->
		<meta
			name="viewport"
			content="width=device-width, initial-scale=1, maximum-scale=1"
		/>

		<!-- Google Font -->
		<link
			href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
			rel="stylesheet"
		/>
		<!-- CSS -->
		<link rel="stylesheet" type="text/css" href="/back/vendors/styles/core.css" />
		<link
			rel="stylesheet"
			type="text/css"
			href="/back/vendors/styles/icon-font.min.css"
		/>
		<link rel="stylesheet" type="text/css" href="/back/vendors/styles/style.css" />
		<link rel="stylesheet" href="/extra-assets/ijabo/ijabo.min.css">
	    <link rel="stylesheet" href="/extra-assets/ijaboCropTool/ijaboCropTool.min.css">
	    <link rel="stylesheet" href="/extra-assets/jquery-ui-1.13.2/jquery-ui.min.css">
	    <link rel="stylesheet" href="/extra-assets/jquery-ui-1.13.2/jquery-ui.structure.min.css">
	    <link rel="stylesheet" href="/extra-assets/jquery-ui-1.13.2/jquery-ui.theme.min.css">
	    <link rel="stylesheet" href="/extra-assets/summernote/summernote-bs4.min.css">
		<?php echo \Livewire\Mechanisms\FrontendAssets\FrontendAssets::styles(); ?>

        <?php echo $__env->yieldPushContent('stylesheet'); ?>
	</head>
	<body class="login-page">
	<div class="login-header box-shadow">
			
				</div>
				<div class="login-menu">
					<ul>
                    <?php if( !Route::is('admin.*') ): ?>

                    <?php if( Route::is('student.login') ): ?>
                   
                    <?php else: ?>
                  
                    <?php endif; ?>

                    <?php endif; ?>
					</ul>
				</div>
			</div>
		</div>
		<div class="login-wrap d-flex align-items-center flex-wrap justify-content-center">
			<div class="container">
				<div class="row align-items-center">
					<div class="col-md-6 col-lg-7">
						<img src="/back/vendors/images/login.png" alt="" />
					</div>
					<div class="col-md-6 col-lg-5">
						<?php echo $__env->yieldContent('content'); ?>
					</div>
				</div>
			</div>
		</div>

		<!-- js -->
		<script src="/back/vendors/scripts/core.js"></script>
		<script src="/back/vendors/scripts/script.min.js"></script>
		<script src="/back/vendors/scripts/process.js"></script>
		<script src="/back/vendors/scripts/layout-settings.js"></script>
		<script>
			if( navigator.userAgent.indexOf("Firefox") != -1 ){
				history.pushState(null, null, document.URL);
				window.addEventListener('popstate', function(){
					history.pushState(null, null, document.URL);
				});
			}
		</script>
		<script src="/extra-assets/ijabo/ijabo.min.js"></script>
		<script src="/extra-assets/ijaboViewer/ijaboViewer.min.js"></script>
		<script src="/extra-assets/ijaboCropTool/ijaboCropTool.min.js"></script>
		<script src="/extra-assets/jquery-ui-1.13.2/jquery-ui.min.js"></script>
		<script>
			window.addEventListener('showToastr', function(event)
			{
                  toastr.remove();
				  if( event.detail[0].type === 'info' ){ toastr.info(event.detail[0].message); }
				  else if( event.detail[0].type === 'success' ){ toastr.success(event.detail[0].message); }
				  else if( event.detail[0].type === 'error' ){ toastr.error(event.detail[0].message); }
				  else if( event.detail[0].type === 'warning' ){ toastr.warning(event.detail[0].message); }
				  else	{ return false; }
			});
		</script>
		<?php echo \Livewire\Mechanisms\FrontendAssets\FrontendAssets::scripts(); ?>

		<?php echo $__env->yieldPushContent('script'); ?>
	</body>
</html>
<?php /**PATH C:\xampp\htdocs\Enroll\resources\views/back/layout/auth-layout.blade.php ENDPATH**/ ?>