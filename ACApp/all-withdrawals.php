<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
	<title>All Withdrawals | Admin Panel</title>

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
							<h5 class="page-title">All Withdrawals List</h5>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-sm-12">
						<div class="card">
							<div class="card-body">

								<div class="table-responsive">
									<table class="table table-stripped" id="example">
										<thead>
											<tr style="background-color: #ff0080;color:#FFF">
												<th></th>
												<th>User Id</th>
												<th>Amount</th>
												<th>Date</th>
												<th>Status</th>
											</tr>
										</thead>
										<tbody>
											<?php
											$cnt = 1;
											$str = "SELECT * FROM withdrawal_requests ORDER BY request_date";
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

															<div class="dropdown-menu">
																<?php if ($row['status'] === 'pending') : ?>
																	<a class="dropdown-item" href="approve_or_deny?action=approve&id=<?php echo $row['id']; ?>">Approve</a>
																	<a class="dropdown-item" href="approve_or_deny?action=deny&id=<?php echo $row['id']; ?>">Deny</a>
																<?php else : ?>
																	<a class="dropdown-item disabled" href="#" tabindex="-1" aria-disabled="true">Approve</a>
																	<a class="dropdown-item disabled" href="#" tabindex="-1" aria-disabled="true">Deny</a>
																<?php endif; ?>
															</div>

														</div>
													</td>
													<td><?php echo $row['member_user_id']; ?></td>
													<td><?php echo $row['amount']; ?></td>
													<td><?php echo date("d-M-Y", strtotime($row['request_date'])); ?></td>
													<td style="background-color: <?php
																					$status = $row['status'];
																					if ($status === 'pending') {
																						echo "#ffff00";
																					} 
																					elseif ($status === 'success') {
																						echo "#00ff00";
																					} 
																					elseif ($status === 'deny') {
																						echo "#00ff00";
																					} 
																					else {
																						echo "#ff0000";
																					}
																					?>;"><?php
																	$status = $row['status'];
																	if ($status === 'pending') {
																		echo "Pending";
																	} elseif ($status === 'success') {
																		echo "Approved";
																	} elseif ($status === 'deny') {
																		echo "Denied";
																	} else {
																		echo "Worng";
																	}
																	?></td>
												</tr>

												<!-- Modal for Top Up -->
												<?php
												include "../ACApp/include/topUpModal.php"
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



</body>

</html>