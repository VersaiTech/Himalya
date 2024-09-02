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
    $record_no=$_REQUEST['record_no'];
    
    $str="Select * from tbl_income_withdrawal where record_no=$record_no";
    $res=mysqli_query($connection,$str);
    while($row=mysqli_fetch_array($res))
    {
        $with_amt=$row['with_amt'];
        $member_user_id=$row['member_user_id'];
        
         $Delup="Delete From tbl_income_withdrawal where record_no=$record_no";
         
        mysqli_query($connection,$Delup) or die(mysqli_error($connection));
        
        $up="Update tbl_memberreg set wallet_amount=wallet_amount+$with_amt,withdrawal_amt=withdrawal_amt-$with_amt where member_user_id='$member_user_id'";
        mysqli_query($connection,$up) or die(mysqli_error($connection));
    }
} 
header("Location:../PendingWithdrawRequest");
?>