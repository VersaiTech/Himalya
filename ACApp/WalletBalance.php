<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
	<title>Wallet Balance List | Admin Panel</title>

	<!-- Favicons -->
<link rel="shortcut icon" type="image/x-icon" href="../UserProfile/images/logo/logo.png">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.min.css">

	<!-- Fontawesome CSS -->
	<link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">
	<link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">
	 
	<!-- Animate CSS -->
	<link rel="stylesheet" href="assets/css/animate.min.css">

	<!-- Main CSS -->
	<link rel="stylesheet" href="assets/css/admin.css">
		<!-- Datatables CSS -->
	<link rel="stylesheet" href="assets/plugins/datatables/datatables.min.css">

</head>

<body>
	<div class="main-wrapper">
	
		<!-- Header -->
	<?php include 'include/header.php'; ?>
		<!-- /Header -->
		
		<!-- Sidebar -->
		<?php include 'include/leftmenu.php'; ?>
		<!-- /Sidebar -->
		
		<div class="page-wrapper">
			<div class="content container-fluid">
			
				<!-- Page Header -->
				<div class="page-header">
					<div class="row">
						<div class="col">
							<h5 class="page-title">Wallet Balance List</h5>
						</div>
						<div class="col-auto text-right">
							<a class="btn btn-white filter-btn" href="javascript:void(0);" id="filter_search">
								<i class="fas fa-filter"></i>
							</a>
						</div>
					</div>
				</div>
				<!--<form action="#" method="post" id="filter_inputs">-->
				<!--	<div class="card filter-card">-->
				<!--		<div class="card-body pb-0">-->
				<!--			<div class="row filter-row">-->
				<!--				<div class="col-sm-6 col-md-3">-->
				<!--					<div class="form-group">-->
				<!--						<label>Service</label>-->
				<!--						<input class="form-control" type="text">-->
				<!--					</div>-->
				<!--				</div>-->
				<!--				<div class="col-sm-6 col-md-3">-->
				<!--					<div class="form-group">-->
				<!--						<label>From Date</label>-->
				<!--						<div class="cal-icon">-->
				<!--							<input class="form-control datetimepicker" type="text">-->
				<!--						</div>-->
				<!--					</div>-->
				<!--				</div>-->
				<!--				<div class="col-sm-6 col-md-3">-->
				<!--					<div class="form-group">-->
				<!--						<label>To Date</label>-->
				<!--						<div class="cal-icon">-->
				<!--							<input class="form-control datetimepicker" type="text">-->
				<!--						</div>-->
				<!--					</div>-->
				<!--				</div>-->
				<!--				<div class="col-sm-6 col-md-3">-->
				<!--					<div class="form-group">-->
				<!--						<button class="btn btn-primary btn-block" type="submit">Submit</button>-->
				<!--					</div>-->
				<!--				</div>-->
				<!--			</div>-->
				<!--		</div>-->
				<!--	</div>-->
				<!--</form>-->
				<!-- /Page Header -->
                	<div class="row">
						<div class="col-sm-12">
							<div class="card">
								<!--<div class="card-header">-->
								<!--	<h6 class="card-title">Active User List</h6>-->
								<!--</div>-->
								<div class="card-body">

									<div class="table-responsive">
										<table class="datatable table table-stripped">
											<thead>
												<tr style="background-color: #ff0080;color:#FFF">
												  
													<th>#</th>
													<th>User Id</th>
													<th>Wallet Address</th>
													<th>Total Income</th>
													<th>Withdrawal Amt</th>
													<th>Wallet Balance</th>
												
												</tr>
											</thead>
											<tbody>
											    <?php 
											    $cnt=1;
											    $str="Select * from tbl_memberreg where wallet_amount>0 order by member_id";
											    $res=mysqli_query($connection,$str);
											    while($row=mysqli_fetch_array($res))
											    {
											    ?>
												<tr>
												    
												    <td><?php echo $cnt++; ?></td>
													<td><?php echo $row['member_user_id']; ?></td>
													<td><?php echo $row['member_name']; ?></td>
													<td><?php echo $row['total_earning']; ?></td>
													<td><?php echo $row['withdrawal_amt']; ?></td>
													<td><?php echo $row['wallet_amount']; ?></td>
												   
												</tr>
												<?php } ?>


											</tbody>
										</table>
									</div>
								</div>
							</div>
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

	<!-- Slimscroll JS -->
	<script src="assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
		<script src="assets/plugins/datatables/jquery.dataTables.min.js"></script>
	<script src="assets/plugins/datatables/datatables.min.js"></script> 

	<!-- Custom JS -->
	<script src="assets/js/admin.js"></script>

</body>

</html>