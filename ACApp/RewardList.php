<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
	<title>Reward List | Admin Panel</title>

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
input[type=search]
{
    display: block;
    width: 100%;
    padding: .50rem 1rem;
    font-size: 1rem;
    line-height: 1.25;
    color: #4E5154;
    background-color:#FFF;
    background-clip: padding-box;
    border: 1px solid #BABFC7;
    border-radius: .25rem;
}
input[type=button]
{
 
    background-color:#140dec;

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
							<h5 class="page-title">Reward List</h5>
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
										<label>Select Reward And Month</label>
								 <select name="reward_name" id="reward_name" class="form-control" reqired>
									 <?php
									 $cmonth=date("M-Y");
									 $strB="SELECT DISTINCT(reward_name) as reward_name,b_month FROM tbl_tourRewardBusiness ";
									 $resB=mysqli_query($connection,$strB);
									 while($rowB=mysqli_fetch_array($resB))
									 {
									 ?>
									
									   <option value="<?php echo $rowB['reward_name']; ?>"><?php echo $rowB['reward_name']; ?>(<?php echo $rowB['b_month']; ?>)</option>  
									 
									 <?php } ?>
									 </select>
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
					<?php if($_REQUEST['reward_name']!='')
				{
				    $reward_name=$_REQUEST['reward_name'];
				    ?>
                	<div class="row">
						<div class="col-sm-12">
							<div class="card">
								<div class="card-body">

									<div class="table-responsive">
										<table class="table table-stripped" id="example">
											<thead>
												<tr style="background-color: #ff0080;color:#FFF">
												    <th>#</th>
												    <th>Month</th>
												   
													<th>User Id</th>
													<th>Wallet Address</th>
													<th>Self Investment</th>
                                                    <th>Direct Business</th>
                                                     <th>Reward Name</th>
                                                     <th>Achived Date</th>
												</tr>
											</thead>
											<tbody>
											    <?php 
											    $cnt=1;
											    $str="SELECT * FROM tbl_tourRewardBusiness WHERE reward_name='$reward_name' and achived_status=1";
											    $res=mysqli_query($connection,$str);
											    while($row=mysqli_fetch_array($res))
											    {
											       
											    ?>
												<tr>
												   
										<td><?php echo $cnt++; ?></td>
									
										<td><?php echo $row['b_month']; ?></td>
										
											<td><?php echo $row['member_user_id']; ?></td>
											<td><?php echo $row['member_name']; ?></td>
											<td><?php echo $row['self_investment']; ?></td>
											<td><?php echo $row['direct_business']; ?></td>
												<td><?php echo $row['reward_name']; ?></td>
												<td><?php echo date("d-M-Y",strtotime($row['achived_date'])); ?></td>
												</tr>
												<?php } ?>


											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>
					<?php } ?>
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
    $('#example').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    } );
} );
</script>

</body>


</html>