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
    $Page=text_input($_REQUEST['Page']);
    $Action=text_input($_REQUEST['Action']);
    $member_user_id=text_input($_REQUEST['member_user_id']);
     if($Page=="WithDraw" && $Action=="Stop")
     {
         $up="Update tbl_memberreg set stop_withdraw=1 where member_user_id='$member_user_id'";
         $msg="Withdraw Stop Success Of ".$member_user_id;
     }
     else if($Page=="WithDraw" && $Action=="Start")
     {
         $up="Update tbl_memberreg set stop_withdraw=0 where member_user_id='$member_user_id'";
         $msg="Withdraw Start Success Of ".$member_user_id;
     }
     else if($Page=="ROI" && $Action=="Stop")
     {
         $up="Update tbl_memberreg set stop_roi=1 where member_user_id='$member_user_id'";
         $msg="ROI Stop Success Of ".$member_user_id;
     }
     else if($Page=="ROI" && $Action=="Start")
     {
         $up="Update tbl_memberreg set stop_roi=0 where member_user_id='$member_user_id'";
         $msg="ROI Start Success Of ".$member_user_id;
     }
     else if($Page=="FundTransfer" && $Action=="Stop")
     {
         $up="Update tbl_memberreg set stop_fund_transfer=1 where member_user_id='$member_user_id'";
         $msg="Fund Transfer Stop Success Of ".$member_user_id;
     }
     else if($Page=="FundTransfer" && $Action=="Start")
     {
         $up="Update tbl_memberreg set stop_fund_transfer=0 where member_user_id='$member_user_id'";
         $msg="Fund Transfer Start Success Of ".$member_user_id;
     }
     mysqli_query($connection,$up);
}
echo $msg;
header("Location:../SearchUser?msg=$msg");
?>