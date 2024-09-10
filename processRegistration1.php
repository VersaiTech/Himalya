<?php
ob_start();
session_start();

include 'config/config.php';
include 'config/function.php';

$sponcer_id = RemoveSpecialChar(trim($_REQUEST['sponsor_id']));
$email_id = RemoveSpecialChar(trim($_REQUEST['email_id']));
$password = RemoveSpecialChar(trim($_REQUEST['password']));
$member_name = RemoveSpecialChar(trim($_REQUEST['member_name']));
$mobile_number = RemoveSpecialChar(trim($_REQUEST['mobile_number']));


// if ($position == "") {
//     echo "Position cannot be empty.";
//     exit();
// }

// Hash the password
$hashed_password = password_hash($password, PASSWORD_BCRYPT);

$plan_amt = 0;
$reg_date = date('Y-m-d H:i:s');
$c_date = date('Y-m-d H:i:s');
$member_user_id = substr(str_shuffle("123456789"), 0, 7);

if (!$connection) {
    die('Database connection failed: ' . mysqli_connect_error());
}

// Check if the email address already exists
$chkWallet = "SELECT * FROM tbl_memberreg WHERE email_id =?";
$stmt_chk = mysqli_prepare($connection, $chkWallet);
mysqli_stmt_bind_param($stmt_chk, "s", $email_id);
mysqli_stmt_execute($stmt_chk);
mysqli_stmt_store_result($stmt_chk);

if (mysqli_stmt_num_rows($stmt_chk) > 0) {
    // Email address already exists
    echo "Email Exist";
} else {

    // Fetch sponsor's name
    $sponcer_name = '';
    $fetchSponsorQuery = "SELECT member_name FROM tbl_memberreg WHERE member_user_id = ?";
    $stmt_fetchSponsor = mysqli_prepare($connection, $fetchSponsorQuery);
    mysqli_stmt_bind_param($stmt_fetchSponsor, "s", $sponcer_id);
    mysqli_stmt_execute($stmt_fetchSponsor);
    mysqli_stmt_bind_result($stmt_fetchSponsor, $sponcer_name);
    mysqli_stmt_fetch($stmt_fetchSponsor);
    mysqli_stmt_close($stmt_fetchSponsor);

    // Check if sponsor exists
    if (empty($sponcer_name)) {
        echo "Invalid Sponsor ID";
        exit();
    }

    $zero = '0';
    $zero_point_zero = 0.00;

    // Insert the new member into the tbl_memberreg
    $qry = "INSERT INTO tbl_memberreg (member_name, member_user_id,mobile_number, sponcer_id, sponcer_name, registration_date, topup_amount, status, current_investment, email_id, password)
    VALUES (?,?,?,?,?,?,?,?,?,?,?)";
    $stmt = mysqli_prepare($connection, $qry);
    mysqli_stmt_bind_param(
        $stmt,
        "sssssssssss",
        $member_name,
        $member_user_id,
        $mobile_number,
        $sponcer_id, 
        $sponcer_name, // Insert the sponsor's name
        $reg_date,
        $plan_amt,
        $zero,
        $zero_point_zero,
        $email_id,
        $hashed_password
    );
    if (!mysqli_stmt_execute($stmt)) {
        echo "Error: " . mysqli_stmt_error($stmt);
    } else {
        // Registration successful
        $_SESSION['view_type'] = "MAIN";
        $_SESSION['member_user_id'] = $member_user_id;
        $_SESSION['email_id'] = $email_id;
        $_SESSION['password'] = $password;
        $_SESSION['member_name'] = $member_name;

        echo json_encode(array('status' => 'success'));
    }

    mysqli_stmt_close($stmt);
}

mysqli_close($connection);
?>
