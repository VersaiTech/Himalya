<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
	<title>Pending Payments | Admin Panel</title>

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

		/* Snackbar styles */
		#snackbar {
			visibility: hidden;
			min-width: 250px;
			margin-left: -125px;
			background-color: #333;
			color: #fff;
			text-align: center;
			border-radius: 2px;
			padding: 16px;
			position: fixed;
			z-index: 1;
			left: 50%;
			bottom: 30px;
			font-size: 17px;
		}

		#snackbar.show {
			visibility: visible;
			animation: fadein 0.5s, fadeout 0.5s 2.5s;
		}

		@keyframes fadein {
			from {
				bottom: 0;
				opacity: 0;
			}

			to {
				bottom: 30px;
				opacity: 1;
			}
		}

		@keyframes fadeout {
			from {
				bottom: 30px;
				opacity: 1;
			}

			to {
				bottom: 0;
				opacity: 0;
			}
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
					<div class="row">
						<div class="col">
							<h5 class="page-title">Pending Payments</h5>
							<!-- Snackbar container -->
							<div id="snackbar"></div>
						</div>
						<div class="col-auto text-right">
							<a class="btn btn-white filter-btn" href="javascript:void(0);" id="filter_search">
								<i class="fas fa-filter"></i>
							</a>
						</div>
					</div>
				</div>
				<form action="#" method="post">
					<div class="card filter-card">
						<div class="card-body pb-0">
							<div class="row filter-row">
								<div class="col-sm-6 col-md-3">
									<div class="form-group">
										<label>From Date</label>
										<input type="date" name="fromdate" id="fromdate" class="form-control" required>
									</div>
								</div>
								<div class="col-sm-6 col-md-3">
									<div class="form-group">
										<label>To Date</label>
										<input type="date" name="todate" id="todate" class="form-control" required>
									</div>
								</div>

								<div class="col-sm-6 col-md-3">
									<div class="form-group">
										<button class="btn btn-primary btn-block" type="submit">Submit</button>
									</div>
								</div>
							</div>
						</div>
					</div>
				</form>
				<?php
				// if($_REQUEST['fromdate']!='' && $_REQUEST['todate']!='')
				// {
				//     $fromdate=date("Y-m-d 00:00:00",strtotime($_REQUEST['fromdate']));
				//     $todate=date("Y-m-d 23:59:59",strtotime($_REQUEST['todate']));

				?>
				<div class="row">
					<div class="col-sm-12">
						<div class="card">
							<div class="card-body">

								<div class="table-responsive">
									<table class="table table-stripped" id="example">
										<thead>
											<tr style="background-color: #ff0080;color:#FFF">
												<th></th>
												<th>Date</th>
												<th>ID</th>
												<th>User Id</th>
												<th>Email Id</th>
												<th>Amount</th>
												<th>UTR Number</th>
												<th>Status</th>
												<th>Time</th>
											</tr>
										</thead>
										<tbody>
											<?php
											$cnt = 1;
											$str = "SELECT * FROM tbl_pendingpayment ORDER BY date";
											$res = mysqli_query($connection, $str);

											if (!$res) {
												die("Query Failed: " . mysqli_error($connection));
											}

											while ($row = mysqli_fetch_array($res)) {
											?>

												<tr>

													<td>
														<div class="btn-group">
															<button type="button" class="btn btn-primary">Action</button>
															<button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
																<span class="sr-only">Toggle Dropdown</span>
															</button>
															<!-- <button type="button" class="btn btn-primary ml-15" data-toggle="modal" data-target="#topUpModal<?php echo $row['member_user_id']; ?>" style="
    margin-left: 10px;
">
																Top Up
															</button> -->
															<div class="dropdown-menu">
																<?php if ($row['status'] === 'pending') : ?>
																	<a class="dropdown-item" href="approve_payment?action=approve&id=<?php echo $row['id']; ?>">Approve</a>
																	<a class="dropdown-item" href="approve_payment?action=deny&id=<?php echo $row['id']; ?>">Deny</a>
																<?php else : ?>
																	<a class="dropdown-item disabled" href="#" tabindex="-1" aria-disabled="true">Approve</a>
																	<a class="dropdown-item disabled" href="#" tabindex="-1" aria-disabled="true">Deny</a>
																<?php endif; ?>
															</div>

														</div>
													</td>
													</td>
													</td>
													</td>
													</td>
													<td> <?php
															if (!empty($row['date'])) {
																echo date("d-M-Y", strtotime($row['date']));
															} else {
																echo "Date not available"; // Handle cases where 'created_at' is missing or null
															}
															?></td>
													<td><?php echo $row['id']; ?></td>
													<td><?php echo $row['member_user_id']; ?></td>
													<td><?php echo $row['email_id']; ?></td>
													<td><?php echo $row['amount']; ?></td>
													<td><?php echo $row['utr_number']; ?></td>
													<td><?php echo $row['status']; ?></td>
												</tr>
											<?php } ?>
											<tr>
											</tr>

										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
				<?php //} 
				?>
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
		$(document).ready(function() {
			$('#example').DataTable({
				dom: 'Bfrtip',
				buttons: [
					'copy', 'csv', 'excel', 'pdf', 'print'
				]
			});
		});

		// Function to get query parameters
		function getQueryParameter(name) {
			const urlParams = new URLSearchParams(window.location.search);
			return urlParams.get(name);
		}

		// Function to show the snackbar with a message
		function showSnackbar(message, isSuccess) {
			const snackbar = document.getElementById("snackbar");
			snackbar.innerHTML = message;
			snackbar.style.backgroundColor = isSuccess ? "#4CAF50" : "#f44336"; // Green for success, red for error
			snackbar.className = "show";

			// Hide the snackbar after 3 seconds
			setTimeout(function() {
				snackbar.className = snackbar.className.replace("show", "");
			}, 3000);
		}

		// Check for query parameters and show the appropriate snackbar
		const success = getQueryParameter('success');
		const error = getQueryParameter('error');

		if (success) {
			showSnackbar("Payment processed successfully!", true);
		} else if (error) {
			showSnackbar("Payment failed. Please try again.", false);
		}
	</script>

</body>


</html>