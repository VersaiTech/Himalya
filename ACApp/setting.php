<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
	<title>Search User | Admin Panel</title>

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
							<h5 class="page-title">Search User</h5>
    						<span style="color:#ff0080">
    						    <?php 
    						    if($_REQUEST['msg']!='')
    						    {
    						        echo $_REQUEST['msg'];
    						    }
    						    ?>
    						</span>
						</div>
						<div class="col-auto text-right">
							<a class="btn btn-white filter-btn" href="javascript:void(0);" id="filter_search">
								<i class="fas fa-filter"></i>
							</a>
						</div>
					</div>
				</div>
				<form action="#" method="post" >
					<div class="card filter-card">
						<div class="card-body pb-0">
							<div class="row filter-row">
								<div class="col-sm-6 col-md-6">
									<div class="form-group">
										<label>User Id/Wallet Address</label>
									
									    <input class="form-control" type="text" name="member_user_id" id="member_user_id">
									
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
				<!-- /Page Header -->
				<?php if($_REQUEST['member_user_id']!='')
				{
				    $member_user_id=$_REQUEST['member_user_id'];
				    $str="Select * from tbl_memberreg where member_user_id='$member_user_id'";
				    $res=mysqli_query($connection,$str);
				    if(mysqli_num_rows($res)==0)
				    {
				        
				    }else
				    {
				       $row=mysqli_fetch_array($res); 
				       $stop_withdraw=$row['stop_withdraw'];
				       $stop_roi=$row['stop_roi'];
				       $stop_fund_transfer=$row['stop_fund_transfer'];
				?>
                	<div class="row">
						<div class="col-sm-12">
							<div class="card">
								<div class="card-header">
									<h6 class="card-title">Member Information</h6>
								</div>
								<div class="card-body">

									<div class="table-responsive">
										<div class="card filter-card">
						<div class="card-body pb-0">
							<div class="row filter-row">
								<div class="col-sm-6 col-md-3">
									<div class="form-group">
										<label>User Id</label>
										<input class="form-control" type="text" name="member_user_id" id="member_user_id" value="<?php echo $row['member_user_id']; ?>" disable>
									</div>
								</div>
								<div class="col-sm-6 col-md-6">
									<div class="form-group">
										<label>Wallet Address</label>
										<div class="cal-icon">
										<input class="form-control" type="text" name="wallet_address" id="wallet_address" value="<?php echo $row['wallet_address']; ?>" disable>
										</div>
									</div>
								</div>
								<div class="col-sm-6 col-md-3">
									<div class="form-group">
										<label>Registration Date</label>
										<div class="cal-icon">
											<input class="form-control datetimepicker" type="text" value="<?php echo date("d-M-Y",strtotime($row['registration_date'])); ?>">
										</div>
									</div>
								</div>
								<div class="col-sm-6 col-md-3">
									<div class="form-group">
										<label>Investment Amt</label>
										<div class="cal-icon">
										<input class="form-control" type="text" name="topup_amount" id="topup_amount" value="<?php echo $row['topup_amount']; ?>" disable>
										</div>
									</div>
								</div>
									<div class="col-sm-6 col-md-3">
									<div class="form-group">
										<a class="btn btn-primary btn-block" href="../../UserProfile/DashLogin?Uid=<?php echo $row['member_user_id']; ?>" target="_blank" style="padding-top:10px">Dashboard</a>
									</div>
								</div>
							</div>	
							<div class="row filter-row">
								<div class="col-sm-6 col-md-3">
									<div class="form-group">
									    <?php if($stop_withdraw==0) { ?>
										<a class="btn btn-primary btn-rounded" href="Apk/process.php?Page=WithDraw&Action=Stop&member_user_id=<?php echo $row['member_user_id']; ?>" style="width:150px;padding-top:10px">Stop Withdraw</a>
										<?php } else {
										    ?>
										    	<a class="btn btn-info btn-rounded" href="Apk/process.php?Page=WithDraw&Action=Start&member_user_id=<?php echo $row['member_user_id']; ?>" style="width:150px;padding-top:10px">Start Withdraw</a>
										    <?php
										} ?>
									</div>
								</div>
								<div class="col-sm-6 col-md-3">
									<div class="form-group">
									<?php if($stop_roi==0) { ?>
										<a class="btn btn-success btn-rounded" href="Apk/process.php?Page=ROI&Action=Stop&member_user_id=<?php echo $row['member_user_id']; ?>" style="width:150px;padding-top:10px">Stop ROI</a>
										<?php } else { ?>
										<a class="btn btn-success btn-rounded" href="Apk/process.php?Page=ROI&Action=Start&member_user_id=<?php echo $row['member_user_id']; ?>" style="width:150px;padding-top:10px">Start ROI</a>
										<?php } ?>
									</div>
								</div>
									<div class="col-sm-6 col-md-3">
									<div class="form-group">
									    <?php if($stop_fund_transfer==0) { ?>
										<a class="btn btn-warning btn-rounded" href="Apk/process.php?Page=FundTransfer&Action=Stop&member_user_id=<?php echo $row['member_user_id']; ?>" style="width:200px;padding-top:10px">Stop Fund Transfer</a>
										<?php } else { ?>
											<a class="btn btn-warning btn-rounded" href="Apk/process.php?Page=FundTransfer&Action=Start&member_user_id=<?php echo $row['member_user_id']; ?>" style="width:200px;padding-top:10px">Start Fund Transfer</a>
										<?php } ?>
									</div>
								</div>
								
							</div>
						</div>
					</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					
						<div class="row">
						<div class="col-sm-12">
							<div class="card">
								<div class="card-header">
									<h6 class="card-title">Other Details</h6>
								</div>
								<div class="card-body">

									<div class="table-responsive">
										<div class="card filter-card">
						<div class="card-body pb-0">
							<div class="row filter-row">
								<div class="col-sm-6 col-md-3">
									<div class="form-group">
										<label>Direct Member</label>
										<input class="form-control" type="text" name="direct_member" id="direct_member" value="<?php echo $row['direct_member']; ?>" disable>
									</div>
								</div>
								<div class="col-sm-6 col-md-3">
									<div class="form-group">
										<label>Lelf Direct</label>
									
										<input class="form-control" type="text" name="left_direct" id="left_direct" value="<?php echo get_direct($member_user_id,"LEFT");  ?>" disable>
										
									</div>
								</div>
								<div class="col-sm-6 col-md-3">
									<div class="form-group">
										<label>Right Direct</label>
									
											<input class="form-control" type="text" name="right_direct" id="right_direct" value="<?php echo get_direct($member_user_id,"RIGHT");  ?>" disable>
									
										</div>
									</div>
								</div>
							
								
							</div>	
						
						</div>
					</div>
									</div>
								</div>
							</div>
						</div>
						
						<div class="row">
						
						<div class="col-sm-12">
							<div class="card">
								<div class="card-header">
									<h6 class="card-title">Change Wallet Adrress</h6>
								</div>
								<div class="card-body">

									<div class="table-responsive">
										<div class="card filter-card">
						<form name="wallet" id="wallet" method="post" action="Apk/ChangeWallet"> 
						<div class="card-body pb-0">
							<div class="row filter-row">
								<div class="col-sm-6 col-md-6">
									<div class="form-group">
										<label>New Wallet Address</label>
										<input class="form-control" type="text" name="new_wallet" id="new_wallet" value="" required>
									</div>
								</div>
								<div class="col-sm-6 col-md-6">
									<div class="form-group">
										<label>Private Key</label>
									
										<input class="form-control" type="text" name="privatekey" id="privatekey" value="" required>
										<input class="form-control" type="text" name="member_user_id" id="member_user_id" value="<?php echo $row['member_user_id']; ?>" required>
										
									</div>
								</div>
								</div>	
							<div class="row filter-row">
								<div class="col-sm-6 col-md-3">
									<div class="form-group">
									<button type="button" class="btn btn-success btn-rounded"  style="width:150px;padding-top:10px">Change Wallet</button>
										</div>
									</div>
								</div>
							
								
							</div>	
						
						</div>
					</div>
									</div>
								</div>
									</form> 
							</div>
						
						</div>
					</div>
					
					<?php } } ?>
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

<?php 
function get_direct($member_user_id,$position)
{
    global $connection;
    $str="Select * from tbl_memberreg where sponcer_id='$member_user_id' and position='$position' and status=1";
    $res=mysqli_query($connection,$str);
    return $cnt=mysqli_num_rows($res);
}
?>