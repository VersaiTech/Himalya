<?php

date_default_timezone_set("Asia/Kolkata");

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
ob_start();
session_start();

include './config.php';
include "./function.php";

if (!isset($_SESSION['member_user_id']) || !isset($_SESSION['wallet_address'])) {
  die('Session variables not set.');
}

$member_user_id = $_SESSION['member_user_id'];
$wallet_address = $_SESSION['wallet_address'];

// Ensure connection is established
if (!$connection) {
  die('Database connection failed: ' . mysqli_connect_error());
}


$roi_date=date("Y-m-d");

$Up="Update deposit_testing set status=1 where status=0";
mysqli_query($connection,$Up);

echo $cmd="select * from deposit_testing where status=1 and reinvest_status=0 and deposit_type='FORM' order by record_no limit 0,5";
$qrt=mysqli_query($connection,$cmd);
while($rty=mysqli_fetch_array($qrt))
{
    $record_no=$rty['record_no'];
    $member_user_id=$rty['member_user_id'];
    $investment=$rty['investment'];
     $transaction_id=$rty['transaction_id'];
     $invest_type=$rty['deposit_type'];
     $member_name=$rty['member_name'];
     $CoinValue=$rty['CoinValue'];
     
    $date=date("Y-m-d");
    $Inst="Insert Into tbl_reinvest(member_user_id,member_name, 	invest_package,hash_code,tr_date,coin_staking,invest_type)values('$member_user_id','$member_name',$investment,'$transaction_id','$date',$CoinValue,'$invest_type')";
    mysqli_query($connection,$Inst) or die(mysqli_error($connection));
     
    $strStatus="Update deposit_testing set reinvest_status=1 where record_no=$record_no";
    mysqli_query($connection,$strStatus) or die(mysqli_error($connection));
 
}

?>