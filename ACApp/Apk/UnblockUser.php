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
  
    $member_user_id=text_input($_REQUEST['Uid']);
    $up="Update tbl_memberreg set isblock=0 where member_user_id='$member_user_id'";
         $msg="Successfully Unblock  ".$member_user_id;
 
     mysqli_query($connection,$up);
}
echo $msg;
header("Location:../SearchUser?msg=$msg");
?>