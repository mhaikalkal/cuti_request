<!DOCTYPE html>
<html lang="en">
<head>
	<title><?= $judul; ?></title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href=""/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>vendor/Login/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>vendor/Login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>vendor/Login/vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>vendor/Login/css/util.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>vendor/Login/css/main.css">
<!--===============================================================================================-->
</head>

<body style="background-color: #666666;">	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">

                <form class="login100-form validate-form" method="post" action="<?= base_url('auth_process'); ?>">
					<span class="login100-form-title p-b-43">
						<!-- <img src="<?= base_url(); ?>assets/Login/images/logo/balcony.png" class="rounded mx-auto d-block float-left" width="75"> -->
						Sistem Informasi Pengajuan Cuti
					</span>

					<?= $this->session->flashdata('login_error'); ?>
					
					<div class="wrap-input100 validate-input" data-validate = "Username is required">
						<input class="input100" type="text" name="username" id="username" autocomplete="off">
						<span class="focus-input100"></span>
						<span class="label-input100">Username</span>
					</div>
					
					
					<div class="wrap-input100 validate-input" data-validate="Password is required">
						<input class="input100" type="password" name="password" id="password">
						<span class="focus-input100"></span>
						<span class="label-input100">Password</span>
					</div>			

					<div class="container-login100-form-btn">
						<input type="submit" class="login100-form-btn" value="login">
					</div>
                </form>

				<div class="login100-more" style="background-image: url('<?= base_url(); ?>vendor/Login/images/ori.jpg');">
				</div>
			</div>
		</div>
	</div>
	
	
<!--===============================================================================================-->
	<script src="<?= base_url(); ?>vendor/Login/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="<?= base_url(); ?>vendor/Login/vendor/bootstrap/js/popper.js"></script>
	<script src="<?= base_url(); ?>vendor/Login//vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="<?= base_url(); ?>vendor/Login/js/main.js"></script>

</body>
</html>