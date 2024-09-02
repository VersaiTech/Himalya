<?php
session_start();
ob_start();
 include "../config/config.php"; 
 include "../config/function.php"; 
 
 $private_key=get_privatekey();
 $request_from_server=$_SERVER['HTTP_REFERER'];
$this_server=$_SERVER['HTTP_HOST'];
if($request_from_server!=''){
	check_access_url($request_from_server,$this_server);
}

// echo $_SESSION['login_status'];echo "<br>";
// echo $_SESSION['private_key'];echo "<br>";
// echo $_SESSION['admin_name'];echo "<br>";

if($_SESSION['login_status']!='YES' || $_SESSION['private_key']!=$private_key || $_SESSION['private_key']=='' || $_SESSION['admin_name']=='')
{
    echo "Blank";
	header("Location:../AppLogin");
	exit();
}
else
{
   $sys_date=date("Y-m-d H:i:s");
   // print_r($_REQUEST);
    $reference_no=$_REQUEST['reference_no'];
    
    $Delstr="delete from tbl_royality where reference_no='$reference_no' and paid_status=0";
    mysqli_query($connection,$Delstr);
  
} 
header("Location:../SendRoyality");
?>