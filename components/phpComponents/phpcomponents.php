<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
ob_start();
session_start();

include './config/config.php';
include "./config/function.php";



if (!isset($_SESSION['member_user_id']) || !isset($_SESSION['email_id'])) {
  header('Location: Login');
  exit();
}

$member_user_id = $_SESSION['member_user_id'];

// Ensure connection is established
if (!$connection) {
  die('Database connection failed: ' . mysqli_connect_error());
}


// Determine the base URL based on the server name
if ($server['servername'] == '82.180.167.190') {
  $baseURL = 'https://app.oriontradeai.com';
} else {
  $baseURL = url() . '/Himallya-MLM';
}

// Construct the final URL
if (empty($_SESSION['member_name'])) {
    $referralURL = 'Login?err=Please Invest First';
} else {
    $referralURL = $baseURL . '/auth-register-metamask-1.php?UplineId=' . $_SESSION['member_user_id'] . '&RandomId=' . substr($_SESSION['member_name'], 0, 10);
}


// Check if the user is blocked
$str = "SELECT * FROM tbl_memberreg WHERE member_user_id='$member_user_id' AND isblock=0";
$ddr = "SELECT * FROM tbl_binary WHERE user_id = '$member_user_id'";
$res = mysqli_query($connection, $str);
$dss = mysqli_query($connection, $ddr);


if (mysqli_num_rows($res) == 0) {
  header("Location:login");
  exit();
}

$row = mysqli_fetch_array($res);
$low = mysqli_fetch_array($dss);
$status = $row['status'];
$reg_date=$row['registration_date'];
$formatted_date = date('Y-m-d ', strtotime($reg_date));
$member_status = $row['member_status'];
$member_id = $row['member_id'];
// $sponcer_id = $row['sponcer_id'];
$sponcer_id = isset($row['sponcer_id']) ? $row['sponcer_id'] : null;
$ref_amount = $row['ref_amount'];
$matching_income = isset($low['matching_income']) ? $low['matching_income'] : null;
$capping_limit = isset($low['capping_limit']) ? $low['capping_limit'] : null;
// $lower_id_left = $low['lower_id_left'];
// $lower_id_right = $low['lower_id_right'];
// $matching_income =$low['matching_income'];
$current_investment	=$row['current_investment'];
$total_earning =$row['total_earning'];
// $capping_limit = $low['capping_limit'];
// $promoter_id = $row['promoter_id'];
$direct_member = $row['direct_member'];
// $member_full_name = $row['mmeber_full_name'];
$wallet_amount = $row['wallet_amount'];
$withdrawal_amt = $row['withdrawal_amt'];
$topup_amount = $row['topup_amount'];
// $team_business=$row['team_business'];
$direct_business = $row['direct_business'];
$direct_member = $row['direct_member'];
$investment_busd = $row['investment_busd'];
$roi_rate = $row['roi_rate'];
$qulifid_direct = $row['qulifid_direct'];
$team_business = $row['team_business'];
$wallet_amount=$row['wallet_amount'];
$current_investment=$row['current_investment'];
// $team_business_aura = $row['team_business_aura'];
// $direct_business_aura = $row['direct_business_aura'];
$total_earning = $row['total_earning'];
$current_investment = $row['current_investment'];
// $pool_wallet = $row['pool_wallet'];
// $pool_withdrawal = $row['pool_withdrawal'];
// $magic_wallet = $row['magic_wallet'];
// $magic_withdrawal = $row['magic_withdrawal'];
$old_roi = $row['old_roi'];
//  $kyc_status=$row['kyc_status'];

// $strD="Select member_user_id from tbl_memberreg where sponcer_id='$member_user_id'";
// $resD=mysqli_query($connection,$strD);
//  $direct_member=mysqli_num_rows($resD);

//  if($kyc_status==0)
//  {
//      header("Location:AddKyc");
//      exit();
//  }



$get_total_ref = "SELECT count(*) FROM tbl_binary WHERE referrer_id = ?";
$stmt_total_ref = $connection->prepare($get_total_ref);
$stmt_total_ref->bind_param("s", $member_user_id );
$stmt_total_ref->execute();
$stmt_total_ref->bind_result($total_ref);
$stmt_total_ref->fetch();
$stmt_total_ref->close();

?>


