<?php
ob_start();
session_start();
//print_r($_REQUEST); die;

include './config/config.php';
include './config/function.php';
$member_user_id=$_SESSION['member_user_id'];
$wallet_address=$_SESSION['wallet_address'];
$withdrwalAmt=$_POST['withdrwalAmt'];
if($withdrwalAmt<5)
{
    //header("Location:../Withdraw")
}

$crdate=date('Y-m-d');
$sql="SELECT * FROM `tbl_withdraw` WHERE member_user_id='$member_user_id' and `with_date` LIKE '%$crdate%'";

// Ensure connection is established
if (!$connection) {
    die('Database connection failed: ' . mysqli_connect_error());
  }

$qq=mysqli_query($connection,$sql);
$rrr=mysqli_num_rows($qq);
if($rrr >0)
{
    $msg='User can withdraw only once in a day...';
     header("Location:../Withdraw?msg=$msg");
     exit();
}

$date=date("Y-m-d H:i:s");
$with_referrance=str_shuffle("QWLAKSJHFMCNVB9876544321");
    $strW="Select * from tbl_memberreg where member_user_id='$member_user_id' and wallet_amount>=$withdrwalAmt";
    $resW=mysqli_query($connection,$strW);
    while($row=mysqli_fetch_array($resW))
    {
        $withdrawAmt=$withdrwalAmt;
        
       echo $Int="Insert Into tbl_withdraw(member_user_id,member_name,with_amt,net_amt,with_referrance,with_date,with_type)values('$member_user_id','$wallet_address',$withdrawAmt,$withdrawAmt,'$with_referrance','$date','INCOME')";
            mysqli_query($connection,$Int) ;
            
            $Upw="Update tbl_memberreg set wallet_amount=wallet_amount-$withdrawAmt,withdrawal_amt=withdrawal_amt+$withdrawAmt where member_user_id='$member_user_id'";
            mysqli_query($connection,$Upw) ;
     }
 
header("Location:../WithdrawHistory.php");
exit();
?>




