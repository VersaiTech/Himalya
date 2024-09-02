<?php
ob_start();
session_start();

include './config/config.php';
include './config/function.php';
$member_user_id=$_SESSION['member_user_id'];
$wallet_address=$_SESSION['wallet_address'];
$withdrwalAmt=$_REQUEST['withdrwalAmt'];
if($withdrwalAmt<5)
{
}
$date=date("Y-m-d H:i:s");
$with_referrance=str_shuffle("QWLAKSJHFMCNVB9876544321");
    $strW="Select * from tbl_memberreg where member_user_id='$member_user_id' and pool_wallet>=$withdrwalAmt";

if (!$connection) {
    die('Database connection failed: ' . mysqli_connect_error());
  }


    $resW=mysqli_query($connection,$strW);
    

    
    while($row=mysqli_fetch_array($resW))
    {
        
        $withdrawAmt=$withdrwalAmt;
        
       echo $Int="Insert Into tbl_withdraw(member_user_id,member_name,with_amt,net_amt,with_referrance,with_date,with_type)values('$member_user_id','$wallet_address',$withdrawAmt,$withdrawAmt,'$with_referrance','$date','POOL')";
            mysqli_query($connection,$Int);
            
            $Upw="Update tbl_memberreg set pool_wallet=pool_wallet-$withdrawAmt, 	pool_withdrawal= 	pool_withdrawal+$withdrawAmt where member_user_id='$member_user_id'";
            mysqli_query($connection,$Upw);
            
     }
 
header("Location:../WithdrawHistory.php");
exit();
?>




