<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
	<title>Send Royality | Admin Panel</title>

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
							<h5 class="page-title">Send Royality</h5>
    					
						</div>
					
					</div>
				</div>
				<?php
			    $fdate=date("Y-m-01",strtotime('- 1 Month')); 
				$pdate=date('Y-m-d', strtotime($fdate."+ 1 Month"));
                $todate=date('Y-m-d', strtotime($pdate."- 1 Day"));
                
                $month=date('M-Y', strtotime($todate));
                
                $strTYr="SELECT IFNULL(sum(invest_package),0) as invest_package FROM tbl_reinvest where status=1 and tr_date between '$fdate' and '$todate'";
                $turnover=get_value($strTYr);
				$turnover=$turnover*1/100;
				
				$str="Select member_user_id from tbl_memberreg where status=1 and team_business>=1000000 ";
			    $res=mysqli_query($connection,$str);
			    $cnt=mysqli_num_rows($res);
			    
			    $royalityincome=$turnover/$cnt;
				?>
				<form action="Apk/SendRoyality" method="post" id="frm">
				  
					<div class="card filter-card">
						<div class="card-body pb-0">
						      <h6>Turnover From <?php echo date("d-M-Y",strtotime($fdate)); ?> To <?php echo date("d-M-Y",strtotime($todate)); ?></h6>
						      <hr>
						      <br>
							<div class="row filter-row">
							    	<div class="col-sm-6 col-md-3">
									<div class="form-group">
										<label>Royality Month</label>
									    <input class="form-control" type="text" name="royality_month" id="royality_month" value="<?php echo $month; ?>" style="background-color:#fff" readonly>
								
									</div>
								</div>
								<div class="col-sm-6 col-md-3">
									<div class="form-group">
										<label>Royality Date</label>
									
									    <input class="form-control" type="date" name="royality_date" id="royality_date" required>
									<input type="hidden" name="referrenceNo" id="referrenceNo" value="<?php echo str_shuffle("987654321QWERYUOPLKJHGFDSAZXCVBNM"); ?>" >
									</div>
								</div>
								<div class="col-sm-6 col-md-3">
									<div class="form-group">
										<label>Turnover(1%)</label>
									
									    <input class="form-control" type="text" name="turnover" id="turnover" style="background-color:#fff" value="<?php echo $turnover; ?>">
									
									</div>
								</div>
								<div class="col-sm-6 col-md-3">
									<div class="form-group">
										<label>Royality Achiver</label>
									
									    <input class="form-control" type="text" name="royality_achiver" id="royality_achiver" readonly style="background-color:#fff" value="<?php echo $cnt; ?>">
									
									</div>
								</div>
								<div class="col-sm-6 col-md-3">
									<div class="form-group">
										<label>Royality Income</label>
									    <input class="form-control" type="text" name="royality_income" id="royality_income" value="<?php echo $royalityincome; ?>">
									
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
													<th>Date</th>
													<th>Turnover</th>
													<th>Achiver</th>
                                                	<th>Royality Income</th>
                                                	<th></th>
												</tr>
											</thead>
											<tbody>
											    <?php 
											    $cnt=1;
											    $str="Select * from tbl_royality order by record_no desc";
											    $res=mysqli_query($connection,$str);
											    while($row=mysqli_fetch_array($res))
											    {
											    ?>
												<tr>
												   
												    <td><?php echo $cnt++; ?></td>	<td><?php echo $row['royality_month']; ?></td>
													<td><?php echo date("d-M-Y",strtotime($row['royality_date'])); ?></td>
													<td><?php echo $row['turnover_business']; ?></td>
													<td><?php echo $row['total_achivers']; ?></td>
													<td><?php echo $row['royality_amt']; ?></td>
									
										<td><?php if($row['paid_status']==0) { ?>
										<a href="Apk/DeleteRoyality?reference_no=<?php echo $row['reference_no']; ?>"  class="btn btn-warning" onClick="return confirm('Sure To Want Delete Royality');">Delete</a>
										<?php } else { ?>
											<a href="#"  class="btn btn-success" >Paid Success</a>
										<?php } ?>
										</td>
												</tr>
												<?php } ?>


											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>
	</div></div></div>	

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