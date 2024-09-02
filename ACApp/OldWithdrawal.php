<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
	<title>Old Withdraw | Admin Panel</title>

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
							<h5 class="page-title">Old Withdraw</h5>
						</div>
						<div class="col-auto text-right">
							<a class="btn btn-white filter-btn" href="javascript:void(0);" id="filter_search">
								<i class="fas fa-filter"></i>
							</a>
						</div>
					</div>
				</div>
			
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
													<th>Date</th>
                                            		<th>User</th>
													<th>With Amt</th>
													<th></th>

												</tr>
											</thead>
											<tbody>
											    <?php 
											    $cnt=1;$total=0;
											    $str="Select * from onWithdraw ";
											    $res=mysqli_query($connection,$str);
											    while($row=mysqli_fetch_array($res))
											    {
											        $total=$total+$row['withdrawalAmountToken']/1e9;
											    ?>
												<tr>
												  
												    <td><?php echo $cnt++; ?></td>
												    <td><?php echo date("d-M-Y",$row['block_timestamp']); ?></td>
													<td><?php echo $row['_user']; ?></td>
												
													<td><?php echo $row['withdrawalAmountToken']/1e9; ?></td>
													<td><a href="https://bscscan.com/tx/<?php echo $row['transaction_id']; ?>" class="btn btn-success" target="_blank">Show Transaction</a></td>
												
												</tr>
												<?php } ?>
                                            <tr>
                                                <td></td>
                                                <td></td>
                                              
                                                <td><b>Total</b></td>
                                                <td><b><?php echo $total; ?></b></td>
                                                <td></td>
                                            </tr>

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