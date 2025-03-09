
<!DOCTYPE html>
<html>
	<head>
		<!-- Basic Page Info -->
		<meta charset="utf-8" />
		<title><?php echo $__env->yieldContent('pageTitle'); ?></title>
		<!-- Site favicon -->
		<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
			<link
			rel="icon"
			type="image/png"
			sizes="16x16"
			href="/images/site/<?php echo e(get_settings()->site_favicon); ?>"
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


		<script>
			(function (w, d, s, l, i) {
				w[l] = w[l] || [];
				w[l].push({ "gtm.start": new Date().getTime(), event: "gtm.js" });
				var f = d.getElementsByTagName(s)[0],
					j = d.createElement(s),
					dl = l != "dataLayer" ? "&l=" + l : "";
				j.async = true;
				j.src = "https://www.googletagmanager.com/gtm.js?id=" + i + dl;
				f.parentNode.insertBefore(j, f);
			})(window, document, "script", "dataLayer", "GTM-NXZMQSS");
		</script>
		<!-- End Google Tag Manager -->
       <link rel="stylesheet" href="/extra-assets/ijabo/ijabo.min.css">
	   <link rel="stylesheet" href="/extra-assets/ijaboCropTool/ijaboCropTool.min.css">
	   <link rel="stylesheet" href="/extra-assets/jquery-ui-1.13.2/jquery-ui.min.css">
	   <link rel="stylesheet" href="/extra-assets/jquery-ui-1.13.2/jquery-ui.structure.min.css">
	   <link rel="stylesheet" href="/extra-assets/jquery-ui-1.13.2/jquery-ui.theme.min.css">
	   <link rel="stylesheet" href="/extra-assets/summernote/summernote-bs4.min.css">
	   <style>
		.swal2-popup{
			font-size: 0.78em;
		}
	   </style>
       <link href="/vendors/sawastacks/kropify/css/kropify.min.css" rel="stylesheet">
	   <?php echo \Livewire\Mechanisms\FrontendAssets\FrontendAssets::styles(); ?>

        <?php echo $__env->yieldPushContent('stylesheets'); ?>
	</head>
	<body>
		

		<div class="header">
			<div class="header-left">
				<div class="menu-icon bi bi-list"></div>
				<div
					class="search-toggle-icon bi bi-search"
					data-toggle="header_search"
				></div>
				<div class="header-search">
					<form>
						<div class="form-group mb-0">
							
							<h1> Welcome!.. </h1>
							<div class="dropdown">
								
								<div class="dropdown-menu dropdown-menu-right">
									<div class="form-group row">
										<label class="col-sm-12 col-md-2 col-form-label"
											>From</label
										>
										<div class="col-sm-12 col-md-10">
											<input
												class="form-control form-control-sm form-control-line"
												type="text"
											/>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-12 col-md-2 col-form-label">To</label>
										<div class="col-sm-12 col-md-10">
											<input
												class="form-control form-control-sm form-control-line"
												type="text"
											/>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-12 col-md-2 col-form-label"
											>Subject</label
										>
										<div class="col-sm-12 col-md-10">
											<input
												class="form-control form-control-sm form-control-line"
												type="text"
											/>
										</div>
									</div>
									<div class="text-right">
										<button class="btn btn-primary">Search</button>
									</div>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
			<div class="header-right">
				<div class="dashboard-setting user-notification">
					<div class="dropdown">
						<a
							class="dropdown-toggle no-arrow"
							href="javascript:;"
							data-toggle="right-sidebar"
						>
							<i class="dw dw-settings2"></i>
						</a>
					</div>
				</div>
				<div class="user-notification">
					<div class="dropdown">
						<a
							class="dropdown-toggle no-arrow"
							href="#"
							role="button"
							data-toggle="dropdown"
						>
							<i class="icon-copy dw dw-notification"></i>
							<span class="badge notification-active"></span>
						</a>
						<div class="dropdown-menu dropdown-menu-right">
							<div class="notification-list mx-h-350 customscroll">
								<ul>
								<li>
										<a href="#">
											<img src="/back/vendors/images/img.jpg" alt="" />
											<h3></h3>
											<p>
												New Subject Added : 
											</p>
										</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>

				
					<?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('admin-student-header-profile-info');

$__html = app('livewire')->mount($__name, $__params, 'lw-2643929807-0', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>




				<div class="github-link">
					<a href="https://github.com/sherjun111" target="_blank"
						><img src="/back/vendors/images/github.svg" alt=""
					/></a>
				</div>
			</div>
		</div>

		<div class="right-sidebar">
			<div class="sidebar-title">
				<h3 class="weight-600 font-16 text-blue">
					Layout Settings
					<span class="btn-block font-weight-400 font-12"
						>User Interface Settings</span
					>
				</h3>
				<div class="close-sidebar" data-toggle="right-sidebar-close">
					<i class="icon-copy ion-close-round"></i>
				</div>
			</div>
			<div class="right-sidebar-body customscroll">
				<div class="right-sidebar-body-content">
					<h4 class="weight-600 font-18 pb-10">Header Background</h4>
					<div class="sidebar-btn-group pb-30 mb-10">
						<a
							href="javascript:void(0);"
							class="btn btn-outline-primary header-white active"
							>White</a
						>
						<a
							href="javascript:void(0);"
							class="btn btn-outline-primary header-dark"
							>Dark</a
						>
					</div>

					<h4 class="weight-600 font-18 pb-10">Sidebar Background</h4>
					<div class="sidebar-btn-group pb-30 mb-10">
						<a
							href="javascript:void(0);"
							class="btn btn-outline-primary sidebar-light"
							>White</a
						>
						<a
							href="javascript:void(0);"
							class="btn btn-outline-primary sidebar-dark active"
							>Dark</a
						>
					</div>

					<h4 class="weight-600 font-18 pb-10">Menu Dropdown Icon</h4>
					<div class="sidebar-radio-group pb-10 mb-10">
						<div class="custom-control custom-radio custom-control-inline">
							<input
								type="radio"
								id="sidebaricon-1"
								name="menu-dropdown-icon"
								class="custom-control-input"
								value="icon-style-1"
								checked=""
							/>
							<label class="custom-control-label" for="sidebaricon-1"
								><i class="fa fa-angle-down"></i
							></label>
						</div>
						<div class="custom-control custom-radio custom-control-inline">
							<input
								type="radio"
								id="sidebaricon-2"
								name="menu-dropdown-icon"
								class="custom-control-input"
								value="icon-style-2"
							/>
							<label class="custom-control-label" for="sidebaricon-2"
								><i class="ion-plus-round"></i
							></label>
						</div>
						<div class="custom-control custom-radio custom-control-inline">
							<input
								type="radio"
								id="sidebaricon-3"
								name="menu-dropdown-icon"
								class="custom-control-input"
								value="icon-style-3"
							/>
							<label class="custom-control-label" for="sidebaricon-3"
								><i class="fa fa-angle-double-right"></i
							></label>
						</div>
					</div>

					<h4 class="weight-600 font-18 pb-10">Menu List Icon</h4>
					<div class="sidebar-radio-group pb-30 mb-10">
						<div class="custom-control custom-radio custom-control-inline">
							<input
								type="radio"
								id="sidebariconlist-1"
								name="menu-list-icon"
								class="custom-control-input"
								value="icon-list-style-1"
								checked=""
							/>
							<label class="custom-control-label" for="sidebariconlist-1"
								><i class="ion-minus-round"></i
							></label>
						</div>
						<div class="custom-control custom-radio custom-control-inline">
							<input
								type="radio"
								id="sidebariconlist-2"
								name="menu-list-icon"
								class="custom-control-input"
								value="icon-list-style-2"
							/>
							<label class="custom-control-label" for="sidebariconlist-2"
								><i class="fa fa-circle-o" aria-hidden="true"></i
							></label>
						</div>
						<div class="custom-control custom-radio custom-control-inline">
							<input
								type="radio"
								id="sidebariconlist-3"
								name="menu-list-icon"
								class="custom-control-input"
								value="icon-list-style-3"
							/>
							<label class="custom-control-label" for="sidebariconlist-3"
								><i class="dw dw-check"></i
							></label>
						</div>
						<div class="custom-control custom-radio custom-control-inline">
							<input
								type="radio"
								id="sidebariconlist-4"
								name="menu-list-icon"
								class="custom-control-input"
								value="icon-list-style-4"
								checked=""
							/>
							<label class="custom-control-label" for="sidebariconlist-4"
								><i class="icon-copy dw dw-next-2"></i
							></label>
						</div>
						<div class="custom-control custom-radio custom-control-inline">
							<input
								type="radio"
								id="sidebariconlist-5"
								name="menu-list-icon"
								class="custom-control-input"
								value="icon-list-style-5"
							/>
							<label class="custom-control-label" for="sidebariconlist-5"
								><i class="dw dw-fast-forward-1"></i
							></label>
						</div>
						<div class="custom-control custom-radio custom-control-inline">
							<input
								type="radio"
								id="sidebariconlist-6"
								name="menu-list-icon"
								class="custom-control-input"
								value="icon-list-style-6"
							/>
							<label class="custom-control-label" for="sidebariconlist-6"
								><i class="dw dw-next"></i
							></label>
						</div>
					</div>

					<div class="reset-options pt-30 text-center">
						<button class="btn btn-danger" id="reset-settings">
							Reset Settings
						</button>
					</div>
				</div>
			</div>
		</div>

		<div class="left-side-bar">
			<div class="brand-logo">
				<a href="/">
					<img src="/images/site/<?php echo e(get_settings()->site_logo); ?>" alt="" class="dark-logo" />
					<img
						src="/images/site/<?php echo e(get_settings()->site_logo); ?>"
						alt=""
						class="light-logo"
					/>
				</a>
				<div class="close-sidebar" data-toggle="left-sidebar-close">
					<i class="ion-close-round"></i>
				</div>
			</div>
			<div class="menu-block customscroll">
				<div class="sidebar-menu">
					<ul id="accordion-menu">

						<?php if( Route::is('admin.*') ): ?>
						<li>
							<a href="<?php echo e(route('admin.home')); ?>" class="dropdown-toggle no-arrow <?php echo e(Route::is('admin.home') ? 'active' : ''); ?>">
								<span class="micon fa fa-home"></span
								><span class="mtext">Home</span>
							</a>
						</li>

						<li class="dropdown">
							<a href="<?php echo e(route('admin.manage-subjects.cats-subcats-list')); ?>" class="dropdown-toggle no-arrow <?php echo e(Route::is('admin.manages-subjects.*') ? 'active' : ''); ?>" class="dropdown-toggle">
								<span class="micon fa fa-book"></span
								><span class="mtext">Subject</span>
							</a>							
						</li>
						<li class="dropdown">
							<a href="javascript:;" class="dropdown-toggle">
								<span class="micon fa fa-book"></span
								><span class="mtext">Dashboard</span>
							</a>
							<ul class="submenu">
								<li><a href="<?php echo e(route('admin.manage-subjects.view-student')); ?>">Student</a></li>
								<li><a href="#">Teacher</a></li>
							</ul>
						</li>
						<li>
							<div class="dropdown-divider"></div>
						</li>
						<li>
							<div class="sidebar-small-cap">Settings</div>
						</li>

						<li>
							<a
								href="<?php echo e(route('admin.profile')); ?>"

								class="dropdown-toggle no-arrow <?php echo e(Route::is('admin.profile') ? 'active' : ''); ?>"
							>
								<span class="micon fa fa-user"></span>
								<span class="mtext"
									>Profile
									</span>
							</a>
						</li>
						<li>
							<a
								href="<?php echo e(route('admin.settings')); ?>"

								class="dropdown-toggle no-arrow <?php echo e(Route::is('admin.settings') ? 'active' : ''); ?>"
							>
								<span class="micon icon-copy fi-widget"></span>
								<span class="mtext"
									>Settings
									</span>
							</a>
						</li>
						<?php else: ?>
						<li>
							<a href="<?php echo e(route('student.home')); ?>" class="dropdown-toggle no-arrow ">
								<span class="micon fa fa-home"></span
								><span class="mtext">Home</span>
							</a>
						</li>


						<li>
							<a href="<?php echo e(route('student.enroll.add-product')); ?>" class="dropdown-toggle no-arrow">
								<span class="micon bi bi-receipt-cutoff"></span
								><span class="mtext">Dashboard</span>
							</a>
						</li>

						<li class="dropdown">
							<a href="javascript:;" class="dropdown-toggle <?php echo e(Route::is('student.enroll.*') ? 'active' : ''); ?>" class="dropdown-toggle ">
								<span class="micon fa fa-book"></span><span class="mtext">Subject View</span>
							</a>
							<ul class="submenu">
								<li><a href="<?php echo e(route('student.enroll.all-products')); ?>" class="<?php echo e(Route::is('student.enroll.all-products') ? 'active' : ''); ?>" class="">Teacher</a></li>
								<li><a href="<?php echo e(route('student.enroll.edit-product')); ?>" class="<?php echo e(Route::is('student.enroll.add-product') ? 'active' : ''); ?>" class="">Enroll</a></li>
							</ul>
						</li>

						<li>
							<div class="dropdown-divider"></div>
						</li>
						<li>
							<div class="sidebar-small-cap">Settings</div>
						</li>

						<li>
						<a
								href="<?php echo e(route('student.profile')); ?>"

								class="dropdown-toggle no-arrow <?php echo e(Route::is('student.profile') ? 'active' : ''); ?>"
							>
								<span class="micon fa fa-user"></span>
								<span class="mtext"
									>Profile
									</span>
							</a>
						</li>
	
						<?php endif; ?>



					</ul>
				</div>
			</div>
		</div>
		<div class="mobile-menu-overlay"></div>

		<div class="main-container">
			<div class="pd-ltr-20 xs-pd-20-10">
				<div class="min-height-200px">

					<div>
                        <?php echo $__env->yieldContent('content'); ?>
                    </div>
				</div>
				<div class="footer-wrap pd-20 mb-20 card-box">
					Presented by:
					<a href="www.facebook.com/sherjun" target="_blank"
						>Group-5</a
					>
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
		<script src="/extra-assets/summernote/summernote-bs4.min.js"></script>
        <script>
			$(document).ready(function(){
                $('.summernote').summernote({
					height:200
				});
			});
		</script>
		<script>
			window.addEventListener('showToastr', function(event){
                  toastr.remove();
				  if( event.detail[0].type === 'info' ){ toastr.info(event.detail[0].message); }
				  else if( event.detail[0].type === 'success' ){ toastr.success(event.detail[0].message); }
				  else if( event.detail[0].type === 'error' ){ toastr.error(event.detail[0].message); }
				  else if( event.detail[0].type === 'warning' ){ toastr.warning(event.detail[0].message); }
				  else{ return false; }
			});
		</script>
		<script src="/vendors/sawastacks/kropify/js/kropify.min.js"></script>
		<?php echo \Livewire\Mechanisms\FrontendAssets\FrontendAssets::scripts(); ?>

	    <?php echo $__env->yieldPushContent('scripts'); ?>

	</body>
	</html>
<?php /**PATH C:\xampp\htdocs\Enroll\resources\views/back/layout/pages-layout.blade.php ENDPATH**/ ?>