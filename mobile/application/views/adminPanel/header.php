<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="keywords" content="" />
	<meta name="author" content="" />
	<meta name="robots" content="" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="GetSkills  : GetSkills Online Learning Admin Bootstrap 5 Template" />
	<meta property="og:title" content="GetSkills  : GetSkills Online Learning  Admin Bootstrap 5 Template" />
	<meta property="og:description" content="GetSkills  : GetSkills Online Learning  Admin Bootstrap 5 Template" />
	<meta property="og:image" content="social-image.html" />
	<meta name="format-detection" content="telephone=no">

	<!-- PAGE TITLE HERE -->
	<title>Stayvers | Admin</title>

	<!-- FAVICONS ICON -->
	<link rel="shortcut icon" type="image/png" href="<?= base_url()?>assets_ifda/img/favicon180.png"/>
	<link href="<?= base_url(); ?>assets/vendor/jquery-nice-select/css/nice-select.css" rel="stylesheet">
	<link href="<?= base_url(); ?>assets/vendor/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css"
		rel="stylesheet">
	<link href="<?= base_url(); ?>assets/vendor/datatables/css/jquery.dataTables.min.css" rel="stylesheet">
	<link href="<?= base_url()?>assets_ifda/css/imgareaselect.css" rel="stylesheet">

	<!-- Style css -->
	<link href="<?= base_url(); ?>assets/css/style.css" rel="stylesheet">
	<!-- Select 2 -->
	<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

</head>

<body>

	<!--*******************
Preloader start
********************-->
	<div id="preloader">
		<div class="lds-ripple">
			<div></div>
			<div></div>
		</div>
	</div>
	<!--*******************


<!--**********************************
Main wrapper start
***********************************-->
	<div id="main-wrapper">

		<!--**********************************
Nav header start
***********************************-->
		<div class="nav-header">

			<div class="nav-control">
				<div class="hamburger">
					<span class="line"></span><span class="line"></span><span class="line"></span>
				</div>
			</div>
		</div>
		<!--**********************************
Nav header end
***********************************-->

		<!--**********************************
Chat box start
***********************************-->

		<!--**********************************
Chat box End
***********************************-->




		<!--**********************************
Header start
***********************************-->
		<div class="header">
			<div class="header-content">
				<nav class="navbar navbar-expand">
					<div class="collapse navbar-collapse justify-content-between">
						<div class="header-left">

							<div class="dashboard_bar">
								<img width="100" src="<?= base_url()?>assets_ifda/img/logo.png"
									alt="">
							</div>
						</div>
						<div class="navbar-nav header-right">
							<div class="nav-item d-flex align-items-center">
								<div class="input-group search-area">
									<span class="input-group-text"><a href="javascript:void(0)"><svg width="24"
												height="24" viewBox="0 0 32 32" fill="none"
												xmlns="http://www.w3.org/2000/svg">
												<path
													d="M27.414 24.586L22.337 19.509C23.386 17.928 24 16.035 24 14C24 8.486 19.514 4 14 4C8.486 4 4 8.486 4 14C4 19.514 8.486 24 14 24C16.035 24 17.928 23.386 19.509 22.337L24.586 27.414C25.366 28.195 26.634 28.195 27.414 27.414C28.195 26.633 28.195 25.367 27.414 24.586ZM7 14C7 10.14 10.14 7 14 7C17.86 7 21 10.14 21 14C21 17.86 17.86 21 14 21C10.14 21 7 17.86 7 14Z"
													fill="var(--secondary)" />
											</svg>
										</a></span>
									<input type="text" class="form-control" placeholder="Search here...">
								</div>
							</div>
							<div class="dlab-side-menu">
								<div class="search-coundry d-flex align-items-center">
									<img src="<?= base_url(); ?>assets/images/United.png" alt="">
									<select class="default-select dashboard-select image-select">
										<option data-display="Eng">Eng</option>
										<option value="2">Af</option>
										<option value="2">Al</option>
									</select>
								</div>

								<ul>
									<li class="nav-item dropdown header-profile">
										<a class="nav-link" href="javascript:void(0);" role="button"
											data-bs-toggle="dropdown">
											<img src="<?= base_url(); ?>assets/images/profile/pic1.jpg" width="20"
												alt="" />
										</a>
										<div class="dropdown-menu dropdown-menu-end">
											<a href="" class="dropdown-item ai-icon">
												<svg id="icon-user2" xmlns="http://www.w3.org/2000/svg"
													class="text-primary" width="18" height="18" viewBox="0 0 24 24"
													fill="none" stroke="currentColor" stroke-width="2"
													stroke-linecap="round" stroke-linejoin="round">
													<path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
													<circle cx="12" cy="7" r="4"></circle>
												</svg>
												<span class="ms-2">
													<?php echo $role ?>
												</span>
											</a>
											<a href="" class="dropdown-item ai-icon">
												<svg id="icon-inbox1" xmlns="http://www.w3.org/2000/svg"
													class="text-success" width="18" height="18" viewBox="0 0 24 24"
													fill="none" stroke="currentColor" stroke-width="2"
													stroke-linecap="round" stroke-linejoin="round">
													<path
														d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z">
													</path>
													<polyline points="22,6 12,13 2,6"></polyline>
												</svg>
												<span class="ms-2">Email</span>
											</a>
											<a href="<?= base_url().'login_register/logout'; ?>" class="dropdown-item ai-icon">
												<svg xmlns="http://www.w3.org/2000/svg" class="text-danger" width="18"
													height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor"
													stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
													<path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
													<polyline points="16 17 21 12 16 7"></polyline>
													<line x1="21" y1="12" x2="9" y2="12"></line>
												</svg>
												<span class="ms-2">Logout </span>
											</a>
										</div>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</nav>
			</div>
		</div>

		<!--**********************************