<?php 
 include 'config/config.php'; 
 include 'config/function.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
	<title>Admin Login | <?php echo get_company(); ?> </title>

	<!-- Favicons -->
<link rel="shortcut icon" type="image/x-icon" href="/app-assets/favicon/favicon.ico">

	<!-- Fontawesome CSS -->
	<link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">
	<link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">
	
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.min.css">

	<!-- Main CSS -->
	<link rel="stylesheet" href="assets/css/admin.css">

</head>

<body>
	<div class="main-wrapper">
	
		<div class="login-page">
			<div class="login-body container">
				<div class="loginbox">
					<div class="login-right-wrap">
						<div class="account-header">
							<div class="account-logo text-center mb-4">
								<a href="../">
									<img src="../UserProfile/images/logo/logo1.png" alt="" class="img-fluid">
								</a>
							</div>
						</div>
						<div class="login-header">
							<h3>Login <span><?php echo get_company(); ?></span></h3>
							<p class="text-muted">Access to our Admin Panel</p>
						</div>
						<form action="AdminLogin" method="post">
							<div class="form-group">
								<label class="control-label">Username</label>
								<input class="form-control" type="text" placeholder="Enter your username" name="user_name" id="user_name" required>
							</div>
							<div class="form-group mb-4">
								<label class="control-label">Password</label>
								<input class="form-control" type="password" placeholder="Enter your password" name="password" required>
							</div>
							<div class="text-center">
								<button class="btn btn-primary btn-block account-btn" type="submit">Login</button>
							</div>
						</form>

					</div>
				</div>
			</div>
		</div>
	</div>
	
	<!-- jQuery -->
	<script src="assets/js/jquery-3.5.0.min.js"></script>

	<!-- Bootstrap Core JS -->
	<script src="assets/js/popper.min.js"></script>
	<script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>

	<!-- Custom JS -->
	<script src="assets/js/admin.js"></script>

</body>


</html>