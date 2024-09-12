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

$plan_amt = 0;
$reg_date = date('Y-m-d H:i:s');
$c_date = date('Y-m-d H:i:s');
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

    $zero = '0';
    $zero_point_zero = 0.00;

    // Insert the new member into the tbl_memberreg
    $qry = "INSERT INTO tbl_memberreg (member_name, member_user_id, mobile_number, sponcer_id, sponcer_name, registration_date, topup_amount, status, current_investment, email_id, password)
    VALUES (?,?,?,?,?,?,?,?,?,?,?)";
    $stmt = mysqli_prepare($connection, $qry);
    mysqli_stmt_bind_param(
        $stmt,
        "sssssssssss",
        $member_name,
        $member_user_id,
        $mobile_number,
        $sponcer_id, 
        $sponcer_name,
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

        // Referral Bonus for 3 levels
        $referralBonus = 10;
        giveReferralBonus($connection, $member_user_id, $sponcer_id, $reg_date);
    }

    mysqli_stmt_close($stmt);
}

mysqli_close($connection);


// Function to give referral bonus up to 3 levels
// Function to give referral bonus up to 3 levels with percentage-based calculation
function giveReferralBonusForLevel($connection, $sponsor_id, $new_member_id, $reg_date, $level) {
    if (!empty($sponsor_id)) {
        // Get the latest payment amount for the new member from tbl_payment_history
        $latestPaymentQuery = "SELECT payment_amount FROM tbl_payment_history WHERE member_user_id = ? ORDER BY created_at DESC LIMIT 1";
        $stmt_latestPayment = mysqli_prepare($connection, $latestPaymentQuery);
        mysqli_stmt_bind_param($stmt_latestPayment, "s", $new_member_id);
        mysqli_stmt_execute($stmt_latestPayment);
        mysqli_stmt_bind_result($stmt_latestPayment, $payment_amount);
        mysqli_stmt_fetch($stmt_latestPayment);
        mysqli_stmt_close($stmt_latestPayment);

        if ($payment_amount > 0) {
            // Calculate the referral bonus based on the level
            if ($level == 1) {
                $bonusPercentage = 10; // 10% for level 1
            } elseif ($level == 2) {
                $bonusPercentage = 5; // 5% for level 2
            } elseif ($level == 3) {
                $bonusPercentage = 3; // 3% for level 3
            }

            $referralBonusAmount = ($payment_amount * $bonusPercentage) / 100;

            // Insert into tbl_referrals for the current level
            $insertReferralQuery = "INSERT INTO tbl_referrals (sponsor_user_id, referred_user_id, level, referral_date, referral_bonus_amount) VALUES (?, ?, ?, ?, ?)";
            $stmt_insertReferral = mysqli_prepare($connection, $insertReferralQuery);
            mysqli_stmt_bind_param($stmt_insertReferral, "ssisd", $sponsor_id, $new_member_id, $level, $reg_date, $referralBonusAmount);
            mysqli_stmt_execute($stmt_insertReferral);
            mysqli_stmt_close($stmt_insertReferral);

            // Add the referral bonus to the sponsor for the current level
            $updateReferralBonus = "UPDATE tbl_memberreg SET ref_amount = ref_amount + ? WHERE member_user_id = ?";
            $stmt_updateBonus = mysqli_prepare($connection, $updateReferralBonus);
            mysqli_stmt_bind_param($stmt_updateBonus, "ds", $referralBonusAmount, $sponsor_id);
            mysqli_stmt_execute($stmt_updateBonus);
            mysqli_stmt_close($stmt_updateBonus);
        }
    }
}

function giveReferralBonus($connection, $new_member_id, $sponcer_id, $reg_date) {
    // Level 1 - Direct Sponsor
    giveReferralBonusForLevel($connection, $sponcer_id, $new_member_id, $reg_date, 1);

    // Level 2 - Get the sponsor of the sponsor (if exists)
    $level2SponsorQuery = "SELECT sponcer_id FROM tbl_memberreg WHERE member_user_id = ?";
    $stmt_level2 = mysqli_prepare($connection, $level2SponsorQuery);
    mysqli_stmt_bind_param($stmt_level2, "s", $sponcer_id);
    mysqli_stmt_execute($stmt_level2);
    mysqli_stmt_bind_result($stmt_level2, $level2SponsorId);
    mysqli_stmt_fetch($stmt_level2);
    mysqli_stmt_close($stmt_level2);

    if (!empty($level2SponsorId)) {
        giveReferralBonusForLevel($connection, $level2SponsorId, $new_member_id, $reg_date, 2);

        // Level 3 - Get the sponsor of the sponsor of the sponsor (if exists)
        $level3SponsorQuery = "SELECT sponcer_id FROM tbl_memberreg WHERE member_user_id = ?";
        $stmt_level3 = mysqli_prepare($connection, $level3SponsorQuery);
        mysqli_stmt_bind_param($stmt_level3, "s", $level2SponsorId);
        mysqli_stmt_execute($stmt_level3);
        mysqli_stmt_bind_result($stmt_level3, $level3SponsorId);
        mysqli_stmt_fetch($stmt_level3);
        mysqli_stmt_close($stmt_level3);

        if (!empty($level3SponsorId)) {
            giveReferralBonusForLevel($connection, $level3SponsorId, $new_member_id, $reg_date, 3);
        }
    }
}


?>
