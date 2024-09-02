<?php
ob_start();
session_start();
//print_r($_REQUEST); die;

include './config/config.php';
include './config/function.php';
$member_user_id=$_SESSION['member_user_id'];
$wallet_address=$_SESSION['wallet_address'];
$member_name=RemoveSpecialChar(strtoupper(trim($_REQUEST['member_name'])));
$contact_no=RemoveSpecialChar(trim($_REQUEST['contact_no']));
$email_id=test_input(strtolower($_REQUEST['email_id']));

$strC="Update tbl_memberreg set contact_no='$contact_no',email_id='$email_id',mmeber_full_name='$member_name',kyc_status=1 where member_user_id='$member_user_id' and kyc_status=0";

if (!$connection) {
    die('Database connection failed: ' . mysqli_connect_error());
  }
  
$res=mysqli_query($connection,$strC) or die(mysqli_error($connection));

header("Location:../AddKyc");
exit();

?>




