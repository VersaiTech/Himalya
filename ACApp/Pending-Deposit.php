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
	<script src="https://code.jquery.com/jquery-3.3.1.js" type="text/javascript"></script>
	<link rel="stylesheet" href="assets/css/animate.min.css">
	<!-- SweetAlert2 CSS -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
	<!-- SweetAlert2 JS -->
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>



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





				<div class="row">
					<div class="col-sm-12">
						<div class="card">
							<div class="card-body">
								<div class="table-responsive">
									<table class="table table-stripped" id="example">
										<thead>
											<tr style="background-color: #ff0080; color:#FFF">
												<th>#</th>
												<th>Action</th>
												<th>User Id</th>
												<th>Email ID</th>
												<th>Package Type</th>
												<th>Package Amount</th>
												<th>Screen Shot</th>
												<th>Wallet Address</th>
												<th>Verified</th>
												<th>Verified Time</th>
											</tr>
										</thead>
										<tbody>
											<?php
											$cnt = 1;
											$str = "SELECT * FROM deposit_request WHERE verified=0 ORDER BY id";
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
															<button type="button" class="btn bg-success" data-toggle="modal" data-target="#approveModal" data-member-id="<?php echo $row['member_user_id']; ?>" data-plan-amount="<?php echo $row['package_amount']; ?>">Approve</button>

															<button type="button" class="btn bg-danger ml-15" data-toggle="modal" data-target="#topUpModal<?php echo $row['member_user_id']; ?>" style=" margin-left: 10px;">
																Reject
															</button>
														</div>
													</td>
													<td><?php echo $row['member_user_id']; ?></td>
													<td><?php echo $row['email_id']; ?></td>


													<td><?php echo $row['package_type']; ?></td>
													<td><?php echo $row['package_amount']; ?></td>
													<td>
														<!-- Add a modal to display the screenshot -->
														<div class="modal fade" id="screenshotModal<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="screenshotModalLabel" aria-hidden="true">
															<div class="modal-dialog" role="document">
																<div class="modal-content">
																	<div class="modal-header">
																		<h5 class="modal-title" id="screenshotModalLabel">Screenshot</h5>
																		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																			<span aria-hidden="true">&times;</span>
																		</button>
																	</div>
																	<div class="modal-body">
																		<!-- Display the screenshot here -->
																		<img src="uploads/<?php echo basename($row['payment_screenshot']); ?>" alt="Screenshot" class="img-fluid">
																	</div>
																</div>
															</div>
														</div>

														<!-- Add a button to show the screenshot modal -->
														<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#screenshotModal<?php echo $row['id']; ?>">Show Screenshot</button>
													</td>
													<td><?php echo $row['wallet_address']; ?></td>
													<td><?php echo $row['verified']; ?></td>
													<td><?php echo $row['verified_time']; ?></td>
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



	<div class="modal fade" id="approveModal" tabindex="-1" role="dialog" aria-labelledby="approveModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title " id="approveModalLabel">Approve Request</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<p>Are you sure you want to approve this request?</p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
					<button type="button" class="btn bg-success" id="approve-btn" data-member-id="">Approve</button>
				</div>
			</div>
		</div>
	</div>

	<!-- Add this script to your JavaScript code -->
	<script>
		$(document).ready(function() {
			$('button[data-toggle="modal"]').on('click', function() {
				var memberId = $(this).data('member-id');
				var planAmount = $(this).data('plan-amount'); // Get the plan amount from the button
				$('#approve-btn').data('member-id', memberId);
				$('#approve-btn').data('plan-amount', planAmount); // Store the plan amount in the approve button
			});

			$('#approve-btn').on('click', function() {
				var memberId = $(this).data('member-id');
				var planAmount = $(this).data('plan-amount'); // Get the plan amount from the approve button
				RequestApprove(memberId, planAmount);
			});
		});

		function RequestApprove(member_user_id, plan_amount) {
			$.ajax({
				url: 'processTree',
				type: 'POST',
				data: {
					member_user_id: member_user_id,
					action: 'ApproveRequest',
					plan_amount: plan_amount
				},
				success: function(response) {
					Swal.close();
					console.log('Server response:', response);
                                            var responseObj = {};
                                            try {
                                                responseObj = JSON.parse(response);
                                                console.log("Now the response obj is ",responseObj);
                                            } catch (error) {
                                                console.log(error);
                                            }
					if (responseObj.success == true) {
						Swal.fire({
							title: 'Success!',
							text: 'User Approved Successfuly.',
							icon: 'success',
							timer: 2000,
							timerProgressBar: true,
							showConfirmButton: false
						}).then(() => {
							window.location.href = 'Pending-Deposit';
						});
					} else {
						Swal.fire({
							title: 'Error!',
							text: "User Approval Denied.",
							icon: 'error',
							timer: 2000,
							timerProgressBar: true,
							showConfirmButton: false
						});
					}
				},
				error: function(xhr, status, error) {
					console.error('AJAX Error:', error);
					console.error('Response Text:', xhr.responseText);
				}
			});
		}


		// 	function RequestApprove(member_user_id, plan_amount) {
		// $.ajax({
		//     url: 'processTree',
		//     type: 'POST',
		//     data: {
		//         member_user_id: member_user_id,
		//         action: 'ApproveRequest',
		//         plan_amount: plan_amount
		//     },
		//     success: function(response) {
		//         console.log('Server response:', response);
		//         if (response.success) {
		//             alert('Request approved successfully');

		//             // Log the investment details
		//             $.ajax({
		// 				url: 'logTopUp',
		//                 type: 'POST',
		//                 data: {
		//                     member_user_id: member_user_id,
		//                     amount: plan_amount
		//                 },
		//                 success: function(logResponse) {
		//                     console.log('Log response:', logResponse);
		//                     if (logResponse.success) {
		//                         alert('Investment details logged successfully');
		//                     } else {
		//                         alert('Failed to log investment details: ' + logResponse.message);
		//                     }
		//                 },
		//                 error: function(logXhr, logStatus, logError) {
		//                     console.error('Log AJAX Error:', logError);
		//                     console.error('Log Response Text:', logXhr.responseText);
		//                 }
		//             });

		//             window.location.href = 'Pending-Deposit';
		//         } else {
		//             alert('Failed to approve request: ' + response.message);
		//         }
		//     },
		//     error: function(xhr, status, error) {
		//         console.error('AJAX Error:', error);
		//         console.error('Response Text:', xhr.responseText);
		//     }
		// });
		// }
	</script>

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