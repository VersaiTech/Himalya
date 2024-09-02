<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
	<title>Assign Daily Task | Admin Panel</title>

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
				
					<div class="row">
						<div class="col-lg-12">
							<div class="card">
								<div class="card-header">
									<h4 class="card-title">Assign Daily Task</h4>
								</div>
								<div class="card-body">
									<form action="Apk/processAssignDailyTask" method="post">
								
								        <div class="form-group row">
											<label class="col-form-label col-md-2">Task Type</label>
											<div class="col-md-10">
												<select name="task_type" id="task_type" class="form-control" required>
												    <option value="VIDEO">VIDEO</option>
												    <option value="FACEBOOK FOLLOWUP">FACEBOOK FOLLOWUP</option>
												    <option value="DOWNLOAD APP">DOWNLOAD APP</option>
												</select>
											</div>
										</div>
										<div class="form-group row">
											<label class="col-form-label col-md-2">Task Subject</label>
											<div class="col-md-10">
												<input type="text" name="task_subject" id="task_subject" class="form-control" required>
										
											</div>
										</div>
								    	<div class="form-group row">
											<label class="col-form-label col-md-2">Assign Task</label>
											<div class="col-md-10">
												<textarea rows="5" cols="5" class="form-control" placeholder="Enter text here" name="assigntask" id="assigntask"></textarea>
											</div>
										</div>
										<div class="form-group mb-0 row">
											<label class="col-form-label col-md-2">Token</label>
											<div class="col-md-4">
												<div class="input-group">
													<div class="input-group-prepend">
														<span class="input-group-text">Abic</span>
													</div>
													<input class="form-control" type="text" name="token_qty" id="token_qty" required onkeydown="return ( event.ctrlKey || event.altKey || (47<event.keyCode &amp;&amp; event.keyCode<58 &amp;&amp; event.shiftKey==false) || (95<event.keyCode &amp;&amp; event.keyCode<106) || (event.keyCode==8) || (event.keyCode==9) || (event.keyCode>34 &amp;&amp; event.keyCode<40) || (event.keyCode==46) )">
												
												</div>
											</div>
												<label class="col-form-label col-md-2">Task Date</label>
											<div class="col-md-4">
												<div class="input-group">
													<div class="input-group-prepend">
												
													</div>
													<input class="form-control" type="date" name="task_date" id="task_date" required >
												
												</div>
											</div>
												<input class="form-control" type="hidden" name="task_id" id="task_id" required value="<?php
												echo str_shuffle("0123456789qwrtypiASDFGHJKLMNBVCXZ");
												?>">
										</div>
												
									<div class="form-group mb-0 row">
										    	<div class="col-md-3"></div>		
												<div class="col-md-3">
												<div class="input-group">
											
													<div class="input-group-prepend">
													
													</div>
														
												</div>
											</div>
										</div>
									<button class="btn btn-primary" type="submit" style="margin:10px 0 0 146px">Submit</button>
								
									</form>
								</div>
							
							</div>
						</div>
				    	</div>
				
				    <div class="row">
						<div class="col-sm-12">
							<div class="card">
								<div class="card-header">
									<h4 class="card-title">Active Daily Task</h4>
								
								</div>
								<div class="card-body">

									<div class="table-responsive">
										<table class="datatable table table-stripped">
											<thead>
												<tr>
													<th>#</th>
													<th>Task Date</th>
													<th>Token</th>
													<th>Task Description</th>
													<th>Task Type</th>
													<th>Task Subject</th>
													<!--<th>Start date</th>-->
												</tr>
											</thead>
											<tbody>
											    <?php
											    $cnt=1;
											     $chk="Select * from tbl_assign_daily_task where status=0";
                                        $reschk=mysqli_query($connection,$chk);
                                        while($row=mysqli_fetch_array($reschk))
                                        {
											    ?>
												<tr>
													<td><?php echo $cnt++ ?></td>
													<td><?php echo date("d-M-Y",strtotime($row['task_date'])); ?></td>
													<td><?php echo $row['token_qty'] ?></td>
													<td><?php echo $row['task_name'] ?></td>
													<td><?php echo $row['task_type'] ?></td>
													<td><?php echo $row['task_subject'] ?></td>
													<td></td>
									
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


<!-- Mirrored from truelysell-admin.dreamguystech.com/template/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 19 Jun 2021 18:03:25 GMT -->
</html>