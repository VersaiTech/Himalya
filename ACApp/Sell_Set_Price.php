<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
	<title>Sell Price Setting | Admin Panel</title>

	<!-- Favicons -->
<link rel="shortcut icon" type="image/x-icon" href="assets/img/logo.png">

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
							<h5 class="page-title">Sell Set Price</h5>
    						<span style="color:#ff0080">
    						  
    						</span>
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
								<div class="card-header">
									<h6 class="card-title">Setting</h6>
								</div>
								<div class="card-body">

									<div class="table-responsive">
										<div class="card filter-card">
						<div class="card-body pb-0">
							<div class="row filter-row">
								<div class="col-sm-6 col-md-3">
									<div class="form-group">
										<label>Current Orion Price</label>
										<input class="form-control" type="text" name="auraPrice" id="auraPrice" value="0" >
									</div>
								</div>
								<!--<div class="col-sm-6 col-md-3">-->
								<!--	<div class="form-group">-->
								<!--		<label>Gaura Value</label>-->
								<!--		<input class="form-control" type="text" name="gauraVal" id="gauraVal" value="0" >-->
								<!--	</div>-->
								<!--</div>-->
								
									<div class="col-sm-6 col-md-3">
									<div class="form-group">
										<button class="btn btn-primary btn-block" onClick="SetAuraRate()" style="padding-top:10px">Change Price</button>
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
	   <script src="https://cdnjs.cloudflare.com/ajax/libs/web3/1.6.1-rc.2/web3.min.js"></script>
     <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="../Exchange/contract.js"></script>
<script>


setTimeout(function(){
      
       window.contract.methods.token_price().call().then((d) => {
          window.AuraPrice=(d);
          $("#auraPrice").val((window.AuraPrice));
      })
      .catch((e) => e);
    
      
},5000);


function SetAuraRate()
{
   
   
    if(window.ethereum)
    {
        try{
        window.ethereum
            .request({
              method: "eth_requestAccounts"
            })
            .then(async function(address) {
               window.userAddress = address[0];
        var current_price_set=(parseFloat($("#auraPrice").val())).toString();
              window.contract.methods.Price_setting(current_price_set).send({from: window.userAddress,value:0}).then((d) => {
            swal("Aura Price Change Successgully");
            window.location.reload();
              }).catch((e) => e);
              
            });
            
        } catch (error) {
          if (error.code === 4001) {}
          console.log(error);
        }
        
    }
   
   
    else
    {
      $.Notification.autoHideNotify('error', 'top right', 'Metamask Required.');   
    }
}



 function toFixed(x) {
    if (Math.abs(x) < 1.0) {
      var e = parseInt(x.toString().split("e-")[1]);
      if (e) {
        x *= Math.pow(10, e - 1);
        x = "0." + new Array(e).join("0") + x.toString().substring(2);
      }
    } else {
      var e = parseInt(x.toString().split("+")[1]);
      if (e > 20) {
        e -= 20;
        x /= Math.pow(10, e);
        x += new Array(e + 1).join("0");
      }
    }
    return String(x);
  }


</script>
</body>

</html>

