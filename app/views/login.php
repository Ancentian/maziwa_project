<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <meta name="description" content="Smarthr - Bootstrap Admin Template">
		<meta name="keywords" content="admin, estimates, bootstrap, business, corporate, creative, management, minimal, modern, accounts, invoice, html5, responsive, CRM, Projects">
        <meta name="author" content="Dreamguys - Bootstrap Admin Template">
        <meta name="robots" content="noindex, nofollow">
        <title>Login | Maziwa</title>
		
		<!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url(); ?>res/assets/img/favicon.png">
		
		<!-- Bootstrap CSS -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>res/assets/css/bootstrap.min.css">
		
		<!-- Fontawesome CSS -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>res/assets/css/font-awesome.min.css">
		
		<!-- Main CSS -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>res/assets/css/style.css">
    </head>
    <body class="account-page">
	
		<!-- Main Wrapper -->
        <div class="main-wrapper">
			<div class="account-content">
				<div class="container">
				
					<!-- Account Logo -->
					<div class="account-logo">
						<a href="#"><img src="<?php echo base_url(); ?>res/assets/img/logo.png" height="60" width="60" alt="Maziwa Project"></a>
					</div>
					<!-- /Account Logo -->
					
					<div class="account-box">
						<div class="account-wrapper">
							<h3 class="account-title">Login</h3>
							<p class="account-subtitle">Access to our dashboard</p>
							<?php if ($this->session->flashdata('success-msg')) { ?>
                                <div class="alert alert-success"><?php echo $this->session->flashdata('success-msg'); ?></div>
                            <?php } ?>
                            <?php if ($this->session->flashdata('error-msg')) { ?>
                                <div class="alert alert-danger"><?php echo $this->session->flashdata('error-msg'); ?></div>
                            <?php } ?>
							
							<!-- Account Form -->
							<form action="<?php echo base_url('auth/login_post'); ?>" method="post">
								<div class="form-group">
									<label>Email Address</label>
									<input class="form-control" name="email" type="text" required>
								</div>
								<div class="form-group">
									<div class="row">
										<div class="col">
											<label>Password</label>
										</div>
										<div class="col-auto">
											<a class="text-muted" href="<?php echo base_url('auth/forgot_password')?>">
												Forgot password?
											</a>
										</div>
									</div>
									<input class="form-control" name="password" type="password" required>
								</div>
								<div class="form-group text-center">
									<button class="btn btn-primary account-btn" type="submit">Login</button>
								</div>
								<div class="account-footer">
									<p hidden>Don't have an account yet? <a href="register.html">Register</a></p>
								</div>
							</form>
							<!-- /Account Form -->
							
						</div>
					</div>
				</div>
			</div>
        </div>
		<!-- /Main Wrapper -->
		
		<!-- jQuery -->
        <script src="<?php echo base_url(); ?>res/assets/js/jquery-3.5.1.min.js"></script>
		
		<!-- Bootstrap Core JS -->
        <script src="<?php echo base_url(); ?>res/assets/js/popper.min.js"></script>
        <script src="<?php echo base_url(); ?>res/assets/js/bootstrap.min.js"></script>
		
		<!-- Custom JS -->
		<script src="<?php echo base_url(); ?>res/assets/js/app.js"></script>
		
    </body>
</html>