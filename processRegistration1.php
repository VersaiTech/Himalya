<?php
ob_start();
session_start();

include 'config/config.php';
include 'config/function.php';

$sponcer_id = RemoveSpecialChar(trim($_REQUEST['sponsor_id']));
$email_id = RemoveSpecialChar(trim($_REQUEST['email_id']));
$password = RemoveSpecialChar(trim($_REQUEST['password']));
$position = RemoveSpecialChar(trim($_REQUEST['position']));


if ($position == "") {
    echo "Position cannot be empty.";
    exit();
}

// Hash the password
$hashed_password = password_hash($password, PASSWORD_BCRYPT);
// console.log("Hashed is ",$hashed_password);


$plan_amt = 0;
$reg_date = date('Y-m-d H:i:s');
$c_date = date('Y-m-d H:i:s');
$member_user_id = substr(str_shuffle("123456789"), 0, 7);

if (!$connection) {
    die('Database connection failed: '. mysqli_connect_error());
}

// Check if the wallet address already exists
$chkWallet = "SELECT * FROM tbl_memberreg WHERE email_id =?";
$stmt_chk = mysqli_prepare($connection, $chkWallet);
mysqli_stmt_bind_param($stmt_chk, "s", $email_id);
mysqli_stmt_execute($stmt_chk);
mysqli_stmt_store_result($stmt_chk);

if (mysqli_stmt_num_rows($stmt_chk) > 0) {
    // Wallet address already exists
    echo "Wallet Exist";
} else {

    $zero = '0';
    $zero_point_zero = 0.00;
    
    $qry = "INSERT INTO tbl_memberreg (member_user_id, sponcer_id, sponcer_name, registration_date, topup_amount, status, current_investment, email_id, password, position)
    VALUES (?,?,?,?,?,?,?,?,?,?)";
    $stmt = mysqli_prepare($connection, $qry);
    mysqli_stmt_bind_param($stmt, "ssssssssss", $member_user_id, $sponcer_id, $sponcer_id, $reg_date, $plan_amt, $zero, $zero_point_zero, $email_id, $hashed_password, $position);

    if (!mysqli_stmt_execute($stmt)) {
        echo "Error: ". mysqli_stmt_error($stmt);
    } else {
        // Registration successful
        $_SESSION['view_type'] = "MAIN";
        $_SESSION['member_user_id'] = $member_user_id;
        $_SESSION['position'] = $position;
        $_SESSION['email_id'] = $email_id;
        $_SESSION['password'] = $password;

        echo json_encode(array('status' => 'success'));
    }

    mysqli_stmt_close($stmt);
}

mysqli_close($connection);
?>