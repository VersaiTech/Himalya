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
	</style>
	<style>
		select.form-control {
			display: block;
			width: 100%;
			height: calc(2.25rem + 2px);
			padding: 0.375rem 0.75rem;
			font-size: 1rem;
			font-weight: 400;
			line-height: 1.5;
			color: #495057;
			background-color: #fff;
			background-clip: padding-box;
			border: 1px solid #ced4da;
			border-radius: 0.25rem;
			transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
		}

		/* Ensure select field is visible on focus */
		select.form-control:focus {
			color: #495057;
			background-color: #fff;
			border-color: #80bdff;
			outline: 0;
			box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
		}



		/* Modal Content */
		.modal-body input.form-control {
			color: #000;
			background-color: #fff;
			border: 1px solid #ced4da;
		}

		.modal-content {
			background-color: #f5f5f5;
			color: #fff;
			border: 1px solid #444;
			border-radius: 0.5rem;
			/* Rounded corners */
		}

		/* Modal Header */
		.modal-header {
			border-bottom: 1px solid #444;
			background-color: #ff0080;
			color: #fff;
		}

		/* Modal Title */
		.modal-title {
			font-weight: 600;
			font-size: 1.25rem;
			/* Font size for the title */
		}

		/* Close Button */
		.modal-header .close {
			color: #fff;
			opacity: 0.5;
		}

		.modal-header .close:hover {
			opacity: 1;
		}

		/* Modal Body */
		.modal-body {
			padding: 1.5rem;
			/* Padding inside the modal body */
		}

		/* Form Labels */
		.form-label {
			color: #333333;
			font-weight: 500;
			/* Slightly bolder font */
		}

		/* Form Controls */
		.form-control,
		.form-select {
			/* background-color: #3a3a3a; */
			color: #fff;
			border: 1px solid #555;
			border-radius: 0.375rem;
			/* Rounded corners for inputs */
			padding: 0.75rem 1rem;
			/* Padding inside the form controls */
		}

		.form-control::placeholder,
		.form-select {
			color: #2d3436;
			/* Placeholder color */
		}

		.form-select option {
			background-color: #2a2a2a;
			/* Option background color */
			color: #fff;
			/* Option text color */
		}





		/* Form Margin */
		.mt-16 {
			margin-top: 1rem;
			/* Margin-top */
		}

		.mt-sm-32 {
			margin-top: 2rem;
			/* Margin-top for small screens */
		}

		.mb-8 {
			margin-bottom: 0.5rem;
			/* Margin-bottom */
		}

		.mb-16 {
			margin-bottom: 1rem;
			/* Margin-bottom */
		}
	</style>


</head>

<body>
<div class="main-wrapper">
        <!-- Header -->
        <?php include 'include/header.php'; ?>
        <!-- Sidebar -->
        <?php include 'include/leftmenu.php'; ?>

        <div class="page-wrapper">
            <div class="content container-fluid">
                <!-- Page Header -->
                <div class="page-header">
                    <div class="row align-items-center">
                        <div class="col">
                            <h5 class="page-title">Approved Withdrawal Requests</h5>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped" id="example">
                                        <thead>
                                            <tr style="background-color: #ff0080;color:#FFF">
                                                <th>User Id</th>
                                                <th>Amount</th>
                                                <th>Date</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            // Fetch only approved requests
                                            $str = "SELECT * FROM withdrawal_requests WHERE status = 'success' ORDER BY request_date DESC";
                                            $res = mysqli_query($connection, $str);

                                            if (!$res) {
                                                die("Query Failed: " . mysqli_error($connection));
                                            }

                                            while ($row = mysqli_fetch_array($res)) {
                                            ?>
                                                <tr>
                                                    <td><?php echo $row['member_user_id']; ?></td>
                                                    <td><?php echo $row['amount']; ?></td>
                                                    <td><?php echo date("d-M-Y", strtotime($row['request_date'])); ?></td>
                                                    <td style="color:green;"><?php echo $row['status']; ?></td>
                                                </tr>
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
		$(document).ready(function() {
			$('#example').DataTable({
				dom: 'Bfrtip',
				buttons: [
					'copy', 'csv', 'excel', 'pdf', 'print'
				]
			});
		});

		$('#registrationButton').click(function() {
			const sponcer_id = $('#sponcer_id').val();
			const packageType = $('#packageType').val();
			const spackage = $('#spackage').val();
			const position = $('#position').val();
			const walletAddress = $('#walletAddress').val();
			const hashcode = Math.random().toString(36).substring(7);

			if (sponcer_id && packageType && spackage && position && walletAddress) {
				$.ajax({
					url: 'addUser',
					type: 'POST',
					data: {
						sponcer_id: sponcer_id,
						packageType: packageType,
						spackage: spackage,
						position: position,
						walletAddress: walletAddress,
						hashcode: hashcode
					},
					success: function(response) {
						console.log('Server response:', response); // Log the raw response
						if (response.success) {
							alert('User added successfully');
						} else {
							alert('Failed to add user: ' + response.message);
						}
					},
					error: function(xhr, status, error) {
						console.error('AJAX Error:', error);
						console.error('Response Text:', xhr.responseText); // Log the response text
						alert('Error communicating with the server. Response: ' + xhr.responseText);
					}
				});
			} else {
				alert('Please fill in all the fields');
			}
		});
	</script>
	<script>
		$(document).ready(function() {
			// Handle button click for top-up
			$('.topUpButton').click(function(event) {
				event.preventDefault();

				var userId = $(this).data('user-id');
				var amount = $('#topUpAmount' + userId).val();

				console.log('Member User ID:', userId);
				console.log('Amount:', amount);

				$.ajax({
					url: 'topUpUser', // Ensure this matches the actual path to your PHP script
					type: 'POST',
					data: {
						member_user_id: userId, // Ensure the field name matches what PHP expects
						amount: amount
					},
					success: function(response) {
						console.log('Server response:', response);
						if (response.success) {
							alert('User topped up successfully');
							$('#topUpModal' + userId).modal('hide'); // Hide the modal after success
							setTimeout(function() {
								window.location.href = 'ActiveUserList'; // Redirect to ActiveUserList.php
							}, 500); // Optional delay before redirecting
						} else {
							alert('Failed to top up user: ' + response.message);
						}
					},
					error: function(xhr, status, error) {
						console.error('AJAX Error:', error);
						console.error('Response Text:', xhr.responseText);
						alert('Error communicating with the server. Response: ' + xhr.responseText);
					}
				});
			});
		});
	</script>

	<script>
		function updatePackageOptions() {
			var packageType = document.getElementById('packageType').value;
			var spackage = document.getElementById('spackage');

			// Clear existing options
			spackage.innerHTML = '<option selected>Select Package</option>';

			// Define package options
			var options = [];

			if (packageType === 'basic') {
				options = [100, 250, 500, 1000];
			} else if (packageType === 'premium') {
				options = [3000, 5000, 10000];
			}

			// Add new options
			for (var i = 0; i < options.length; i++) {
				var option = document.createElement('option');
				option.value = options[i];
				option.text = options[i] + ' USDT';
				spackage.appendChild(option);
			}
		}
	</script>
</body>

</html>