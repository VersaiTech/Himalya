<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
	<title>Pending Request | Admin Panel</title>

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
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.5.6/css/buttons.dataTables.min.css">
	<style>
		input[type=search] {
			display: block;
			width: 100%;
			padding: .50rem 1rem;
			font-size: 1rem;
			line-height: 1.25;
			color: #4E5154;
			background-color: #FFF;
			background-clip: padding-box;
			border: 1px solid #BABFC7;
			border-radius: .25rem;
		}

		input[type=button] {
			background-color: #140dec;
		}

		.modal-body input.form-control {
			color: #000;
			background-color: #fff;
			border: 1px solid #ced4da;
		}
	</style>
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
					<div class="row align-items-center">
						<div class="col">
							<h5 class="page-title">Pending Request</h5>
						</div>
					</div>
				</div>

				<!-- Modal Content Start -->
				<div class="modal fade" id="approveModal" tabindex="-1" role="dialog" aria-labelledby="approveModalLabel" aria-hidden="true">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="approveModalLabel">Approve Request</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								<p>Are you sure you want to approve this request?</p>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
								<button type="button" class="btn btn-primary" onclick="RequestApprove()" >Approve</button>
							</div>
						</div>
					</div>
				</div>
				<!-- Modal Content End -->

				<div class="row">
					<div class="col-sm-12">
						<div class="card">
							<div class="card-body">
								<div class="table-responsive">
									<table class="table table-stripped" id="example">
										<thead>
											<tr style="background-color: #ff0080; color:#FFF">
												<th>#</th>
												<th>Status</th>
												<th>User Id</th>
												<th>Wallet Address</th>
												<th>Package Type</th>
												<th>Package Amount</th>
												<th>Screen Shot</th>
											</tr>
										</thead>
										<tbody>
											<?php
											$cnt = 1;
											$str = "SELECT * FROM tbl_memberreg WHERE status=1 AND isblock=0 ORDER BY member_id";
											$res = mysqli_query($connection, $str);

											if (!$res) {
												die("Query Failed: " . mysqli_error($connection));
											}

											while ($row = mysqli_fetch_array($res)) {
											?>
												<tr>
												<td><?php echo $cnt++; ?></td>

													<td>
														<div class="btn-group">
															<button type="button" class="btn bg-success" data-toggle="modal">Approved</button>
															
															
														</div>
													</td>
													<td><?php echo $row['member_user_id']; ?></td>
													<td><?php echo $row['member_name']; ?></td>
													<td><?php echo $row['sponcer_id']; ?></td>
													<td><?php echo $row['wallet_amount']; ?></td>
													<td><?php echo $row['topup_amount']; ?></td>
												</tr>

												<?php
												include "../ACApp/include/Rejectreason.php"
												?>
											<?php
											}
											?>
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
	<script src="https://code.jquery.com/jquery-3.3.1.js" type="text/javascript"></script>
	<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js" type="text/javascript"></script>
	<script src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js" type="text/javascript"></script>
	<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.flash.min.js" type="text/javascript"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js" type="text/javascript"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js" type="text/javascript"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js" type="text/javascript"></script>
	<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js" type="text/javascript"></script>
	<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js" type="text/javascript"></script>

	<script>
		function RequestApprove() {
			alert("Request Approved Successfully");
		}

	</script>

</body>

</html>
