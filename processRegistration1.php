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

// Hash the password
$hashed_password = password_hash($password, PASSWORD_BCRYPT);

$reg_date = date('Y-m-d H:i:s');
$member_user_id = substr(str_shuffle("123456789"), 0, 7);

if (!$connection) {
    die('Database connection failed: ' . mysqli_connect_error());
}

// Check if the email address already exists
$chkWallet = "SELECT * FROM tbl_memberreg WHERE email_id = ?";
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

    // Insert the new member into the tbl_memberreg
    $qry = "INSERT INTO tbl_memberreg (member_name, member_user_id, mobile_number, sponcer_id, sponcer_name, registration_date, email_id, password)
    VALUES (?,?,?,?,?,?,?,?)";
    $stmt = mysqli_prepare($connection, $qry);
    mysqli_stmt_bind_param(
        $stmt,
        "ssssssss",
        $member_name,
        $member_user_id,
        $mobile_number,
        $sponcer_id, 
        $sponcer_name,
        $reg_date,
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
        $_SESSION['mobile_number'] = $mobile_number;

        echo json_encode(array('status' => 'success'));

        // Insert the referral hierarchy (up to 3 levels)
        insertReferralHierarchy($connection, $member_user_id, $sponcer_id, $reg_date);
    }

    mysqli_stmt_close($stmt);
}

mysqli_close($connection);

// Function to insert referral hierarchy into tbl_referrals
function insertReferralHierarchy($connection, $new_member_id, $sponcer_id, $reg_date) {
    // Level 1 - Direct Sponsor
    insertReferralForLevel($connection, $sponcer_id, $new_member_id, $reg_date, 1);

    // Level 2 - Get the sponsor of the sponsor (if exists)
    $level2SponsorQuery = "SELECT sponcer_id FROM tbl_memberreg WHERE member_user_id = ?";
    $stmt_level2 = mysqli_prepare($connection, $level2SponsorQuery);
    mysqli_stmt_bind_param($stmt_level2, "s", $sponcer_id);
    mysqli_stmt_execute($stmt_level2);
    mysqli_stmt_bind_result($stmt_level2, $level2SponsorId);
    mysqli_stmt_fetch($stmt_level2);
    mysqli_stmt_close($stmt_level2);

    if (!empty($level2SponsorId)) {
        insertReferralForLevel($connection, $level2SponsorId, $new_member_id, $reg_date, 2);

        // Level 3 - Get the sponsor of the sponsor's sponsor (if exists)
        $level3SponsorQuery = "SELECT sponcer_id FROM tbl_memberreg WHERE member_user_id = ?";
        $stmt_level3 = mysqli_prepare($connection, $level3SponsorQuery);
        mysqli_stmt_bind_param($stmt_level3, "s", $level2SponsorId);
        mysqli_stmt_execute($stmt_level3);
        mysqli_stmt_bind_result($stmt_level3, $level3SponsorId);
        mysqli_stmt_fetch($stmt_level3);
        mysqli_stmt_close($stmt_level3);

        if (!empty($level3SponsorId)) {
            insertReferralForLevel($connection, $level3SponsorId, $new_member_id, $reg_date, 3);
        }
    }
}

function insertReferralForLevel($connection, $sponsor_id, $new_member_id, $reg_date, $level) {
    if (!empty($sponsor_id)) {
        // Fetch the sponsor's name
        $sponsor_name = '';
        $sponsorNameQuery = "SELECT member_name FROM tbl_memberreg WHERE member_user_id = ?";
        $stmt_sponsorName = mysqli_prepare($connection, $sponsorNameQuery);
        mysqli_stmt_bind_param($stmt_sponsorName, "s", $sponsor_id);
        mysqli_stmt_execute($stmt_sponsorName);
        mysqli_stmt_bind_result($stmt_sponsorName, $sponsor_name);
        mysqli_stmt_fetch($stmt_sponsorName);
        mysqli_stmt_close($stmt_sponsorName);

         // Fetch the referred member's name from the session
         $referred_member_name = $_SESSION['member_name'];

          // Insert into tbl_referrals with sponsor and referred member names
        $insertReferralQuery = "INSERT INTO tbl_referrals (sponsor_user_id, sponsor_name, referred_user_id, referred_member_name, level, referral_date) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt_insertReferral = mysqli_prepare($connection, $insertReferralQuery);
        mysqli_stmt_bind_param($stmt_insertReferral, "ssssss", $sponsor_id, $sponsor_name, $new_member_id, $referred_member_name, $level, $reg_date);
        mysqli_stmt_execute($stmt_insertReferral);
        mysqli_stmt_close($stmt_insertReferral);
    }
}
?>
