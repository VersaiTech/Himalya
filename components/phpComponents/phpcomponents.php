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




if (trim($_SERVER['SERVER_NAME']) === 'himallyaro.com') {
    $baseURL = 'https://himallyaro.com';
} else {
    // Assuming url() is a custom function that gives the current URL
    $baseURL = url() . '/Himallya-MLM';
}

// Construct the final URL
if (empty($_SESSION['member_name'])) {
    $referralURL = 'Login?err=Please Invest First';
} else {
    $referralURL = $baseURL . '/auth-register-metamask-1.php?UplineId=' . $_SESSION['member_user_id'] . '&RandomId=' . substr($_SESSION['member_name'], 0, 10);
}

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
$reg_date = $row['registration_date'];
$formatted_date = date('Y-m-d', strtotime($reg_date));
$member_status = $row['member_status'];
$member_id = $row['member_id'];
$sponcer_id = isset($row['sponcer_id']) ? $row['sponcer_id'] : null;
$ref_amount = $row['ref_amount'];
$matching_income = isset($low['matching_income']) ? $low['matching_income'] : null;
$capping_limit = isset($low['capping_limit']) ? $low['capping_limit'] : null;
$current_investment = $row['current_investment'];
$total_earning = $row['total_earning'];
$direct_member = $row['direct_member'];
$wallet_amount = $row['wallet_amount'];
$withdrawal_amt = $row['withdrawal_amt'];
$topup_amount = $row['topup_amount'];
$direct_business = $row['direct_business'];
$investment_busd = $row['investment_busd'];
$roi_rate = $row['roi_rate'];
$qulifid_direct = $row['qulifid_direct'];
$team_business = $row['team_business'];
$old_roi = $row['old_roi'];

// Fetch total referrals
$get_total_ref = "SELECT count(*) FROM tbl_binary WHERE referrer_id = ?";
$stmt_total_ref = $connection->prepare($get_total_ref);
$stmt_total_ref->bind_param("s", $member_user_id);
$stmt_total_ref->execute();
$stmt_total_ref->bind_result($total_ref);
$stmt_total_ref->fetch();
$stmt_total_ref->close();

// Fetch sponsor's mobile number
if (!is_null($sponcer_id)) {
    $sql = "SELECT mobile_number FROM tbl_memberreg WHERE member_user_id = ?";
    $stmt = $connection->prepare($sql);

    // Check if the query was prepared successfully
    if ($stmt) {
        $stmt->bind_param("s", $member_user_id);
        $stmt->execute();
        $stmt->bind_result($mobile_number);
        $stmt->fetch();
        $stmt->close();
    } else {
        echo "Error preparing statement: " . $connection->error;
    }
} else {
    $mobile_number = "Sponsor ID not found.";
}
