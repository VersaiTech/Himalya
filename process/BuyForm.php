<?php
ob_start();
session_start();
//print_r($_REQUEST); die;

include './config/config.php';
include './config/function.php';
$member_user_id=$_SESSION['member_user_id'];
$wallet_address=$_SESSION['wallet_address'];
$plan_amt=RemoveSpecialChar(trim($_REQUEST['plan_amt']));
$transaction=RemoveSpecialChar(trim($_REQUEST['hashcode']));
$deposit_type=$_REQUEST['deposit_type'];

$strchk="Select * from tbl_memberreg where member_user_id='$member_user_id'";
if (!$connection) {
    die('Database connection failed: ' . mysqli_connect_error());
  }
  
$reschk=mysqli_query($connection,$strchk);
$rowchk=mysqli_fetch_array($reschk);
$balance_stacking=$rowchk['balance_stacking'];

    $date=date("Y-m-d H:i:s");
    $strC="Select * from tbl_reinvest where hash_cod='$transaction'";
    $resc=mysqli_query($connection,$strC);
    if(mysqli_num_rows($resc)==0)
    {
        $InsRec="Insert Into tbl_reinvest(member_user_id,member_name, 	invest_package,hash_code,invest_type,tr_date)values('$member_user_id','$wallet_address','$plan_amt','$transaction','STAKING','$date')";
        $res=mysqli_query($connection,$InsRec) or die(mysqli_error($connection));
        
     
        
        echo "Transaction Success. Please Wait For Confirmation";
    }
    else
    {
        echo "Somewent Wrnong";
    }

?>




