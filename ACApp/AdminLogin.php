<?php
session_start();
ob_start();
include "config/config.php";
include "config/function.php";
// $request_from_server=$_SERVER['HTTP_REFERER'];
// $this_server=$_SERVER['HTTP_HOST'];
// if($request_from_server!=''){
// 	check_access_url($request_from_server,$this_server);
// }

if (isset($_POST)) {
	$a = 0;
	$user_name = text_input($_REQUEST['user_name']);
	$password = text_input($_REQUEST['password']);
	echo $str = "Select * from admin";
	
	// Ensure connection is established
	if (!$connection) {
		die('Database connection failed: ' . mysqli_connect_error());
	}

	$result = mysqli_query($connection, $str);
	while ($row = mysqli_fetch_array($result)) {
		$admin_name = $row['admin_name'];
		$admin_pass = $row['admin_pass'];
		if ($admin_name == $user_name && $admin_pass == $password) {
			$a = $a + 1;
			$_SESSION['userid'] = $row['admin_id'];
			$_SESSION['admin_name'] = $row['admin_name'];
			$_SESSION['login_status'] = $row['login_status'];
			$_SESSION['private_key'] = $row['private_key'];
			header("location:Home");
		}
	}
	if ($a == 0) {
		header("location:AppLogin?msg=User Name or Password Is Wrong");
		exit();
	}
}
