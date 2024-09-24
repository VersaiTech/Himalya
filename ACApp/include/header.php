<?php
session_start();
ob_start();
 include "config/config.php"; 
 include "config/function.php"; 
 
 $private_key=get_privatekey();
//  $request_from_server=$_SERVER['HTTP_REFERER'];
$this_server=$_SERVER['HTTP_HOST'];
// if($request_from_server!=''){
// 	check_access_url($request_from_server,$this_server);
// }

// echo $_SESSION['login_status'];echo "<br>";
// echo $_SESSION['private_key'];echo "<br>";
// echo $_SESSION['admin_name'];echo "<br>";

if($_SESSION['login_status']!='YES' || $_SESSION['private_key']!=$private_key || $_SESSION['private_key']=='' || $_SESSION['admin_name']=='')
{
    echo "Blank";
	header("Location:https://himallyaro.com/ACApp/AppLogin");
	exit();
}
// test
?>
	<div class="header">
			<div class="header-left"> 
				<a href="Home" class="logo logo-small">
					<!--<img src="../UserProfile/images/logo/logo.png" alt="Logo" width="30" height="30">-->
				</a>
			</div>
			<a href="javascript:void(0);" id="toggle_btn">
				<i class="fas fa-align-left"></i>
			</a>
			<a class="mobile_btn" id="mobile_btn" href="javascript:void(0);">
				<i class="fas fa-align-left"></i>
			</a>
			
			<ul class="nav user-menu">
				<li class="nav-item dropdown">
					<a href="javascript:void(0)" class="dropdown-toggle user-link  nav-link" data-toggle="dropdown">
						<span class="user-img">
							<!-- <img  src="..\app-assets\img\logo\HIMLOGOSMALL.png" width="30" alt="Admin"> -->
						</span>
					</a>
					<div class="dropdown-menu dropdown-menu-right">
					
						<a class="dropdown-item" href="Logout">Logout</a>
					</div>
				</li>
			
				
			</ul>
		</div>