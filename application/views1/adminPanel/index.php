<!DOCTYPE html>
<html lang="en" class="h-100">

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
	<title>Stayvers | Admin | LOGIN </title>

	<!-- FAVICONS ICON -->
	<link rel="shortcut icon" type="image/png" href="<?= base_url();?>assets1/img/logo/favicon.png" />
	<link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet">

</head>

<body class="body  h-100"
	style="background-image: url('<?= base_url(); ?>assets1/images/veg-3/home/1.png'); background-size:cover;">
	<div class="container h-100">
		<div class="row h-100 align-items-center justify-contain-center">
			<div class="col-xl-6 mt-3">
				<div class="card">
					<div class="card-body p-0">
						<div class="row m-0">

							<div class="col-xl-12 col-md-3">
								<div class="sign-in-your">


									<div class="text-center my-5">
										<a href=""><img width="200"
												src="<?= base_url();?>assets1/img/logo/logo.png" alt=""></a>
									</div>
									<h4 class="fs-20 font-w800 text-black">
										<?= $title ?>
									</h4>
									<span>Welcome back! </span>
									<br><br>
									<?= form_open((base_url().'loginPage'), array('id' => 'loginForm')) ?>
									<div class="mb-3">
										<label class="mb-1"><strong>Username</strong></label>
										<input type="username" name="uname" class="form-control" value="">
									</div>
									<div class="mb-3">
										<label class="mb-1"><strong>Password</strong></label>
										<input type="password" name="pass" class="form-control" value="">
									</div>
									<div class="row d-flex justify-content-between mt-4 mb-2">

										<div class="mb-3">
											<a href="page-forgot-password.html">Forgot Password?</a>
										</div>
									</div>
									<div class="text-center">
										<button name="login" value="login" type="submit"
											class="btn btn-primary btn-block">Sign Me In</button>
										<?php if ($this->session->flashdata('error')) { ?>
											<div class="alert alert-danger">
												<?php echo $this->session->flashdata('error') ?>
											</div>
										<?php } ?>
									</div>
									<!-- </form> -->
									<?= form_close() ?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>


	<!--**********************************
		Scripts
	***********************************-->
	<!-- Required vendors -->
	<script src="<?php echo base_url(); ?>assets/vendor/global/global.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/dlabnav-init.js'"></script>
</body>

</html>