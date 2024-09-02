<?php
ob_start();
session_start();

include 'config/config.php';
include 'config/function.php';

$wallet_address = RemoveSpecialChar(trim($_REQUEST['wallet_address']));
$sponcer_id = RemoveSpecialChar(trim($_REQUEST['sponsor_id']));
$position = RemoveSpecialChar(trim($_REQUEST['position']));
if ($position == "") {
    echo "Position cannot be empty.";
    exit();
}
$plan_amt = (float) RemoveSpecialChar(trim($_REQUEST['plan_amt']));
$transaction = RemoveSpecialChar(trim($_REQUEST['hashcode']));

$reg_date = date('Y-m-d H:i:s');
$c_date = date('Y-m-d H:i:s');

$member_user_id = substr(str_shuffle("123456789"), 0, 7);

if (!$connection) {
    die('Database connection failed: ' . mysqli_connect_error());
}

// Check if the wallet address already exists
$chkWallet = "SELECT * FROM tbl_memberreg WHERE member_name = ?";
$stmt_chk = mysqli_prepare($connection, $chkWallet);
mysqli_stmt_bind_param($stmt_chk, "s", $wallet_address);
mysqli_stmt_execute($stmt_chk);
mysqli_stmt_store_result($stmt_chk);

if (mysqli_stmt_num_rows($stmt_chk) > 0) {
    // Wallet address already exists
    echo "Wallet Exist";
} else {
    // Wallet address does not exist, proceed with registration
    $sponcer_name = get_associate_name($sponcer_id);

    $qry = "INSERT INTO tbl_memberreg (member_user_id, member_name, wallet_address, sponcer_id, sponcer_name, registration_date, topup_amount, status, hash_code, investment_busd, current_investment, lastSale)
            VALUES (?, ?, ?, ?, ?, ?, ?, 1, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($connection, $qry);
    mysqli_stmt_bind_param($stmt, "sssssssssss", $member_user_id, $wallet_address, $wallet_address, $sponcer_id, $sponcer_name, $reg_date, $plan_amt, $transaction, $plan_amt, $plan_amt, $reg_date);
    mysqli_stmt_execute($stmt);
    
    $update_wallet_query = "UPDATE tbl_memberreg SET wallet_amount = wallet_amount + %f, ref_amount = ref_amount + %f, total_earning = total_earning + %f WHERE member_user_id = '%s'";
    $update_wallet_stmt = mysqli_prepare($connection, sprintf($update_wallet_query, ($plan_amt * 0.1), ($plan_amt * 0.1), ($plan_amt * 0.1), $sponcer_id));
    mysqli_stmt_execute($update_wallet_stmt);
    
    
    
    mysqli_stmt_execute($update_wallet_stmt);
    mysqli_stmt_close($update_wallet_stmt);

    if (mysqli_stmt_error($stmt)) {
        echo "Error: " . mysqli_stmt_error($stmt);
    } else {
        // Registration successful
        $_SESSION['view_type'] = "MAIN";
        $_SESSION['member_user_id'] = $member_user_id;
        $_SESSION['wallet_address'] = $wallet_address;
        $_SESSION['member_name'] = $wallet_address;
        $_SESSION['member_hex_address'] = $wallet_address;
        $_SESSION['position'] = $position;



        function find_next_zero_position($connection, $referrer_id2, $position)
        {

            // echo "id ", $referrer_id2 , " position ", $position . "<br>";

            usleep(200000);

            if ($position == "left") {


                $chkPosition3 = "SELECT lower_id_left FROM tbl_binary WHERE user_id = ? AND position = ?";

                $stmt_pos = mysqli_prepare($connection, $chkPosition3);
                mysqli_stmt_bind_param($stmt_pos, "ss", $referrer_id2, $position);
                mysqli_stmt_execute($stmt_pos);
                mysqli_stmt_bind_result($stmt_pos, $lower_id);
                mysqli_stmt_fetch($stmt_pos);
                mysqli_stmt_close($stmt_pos);
                // echo "turn", $lower_id;
                if ($lower_id == 0) {
                    return $referrer_id2;
                } else {
                    return find_next_zero_position($connection, $lower_id, $position);
                }
            } else if ($position == "right") {
                $chkPosition4 = "SELECT lower_id_right FROM tbl_binary WHERE user_id = ? AND position = ?";

                $stmt_pos = mysqli_prepare($connection, $chkPosition4);
                mysqli_stmt_bind_param($stmt_pos, "ss", $referrer_id2, $position);
                mysqli_stmt_execute($stmt_pos);
                mysqli_stmt_bind_result($stmt_pos, $lower_id);
                mysqli_stmt_fetch($stmt_pos);
                mysqli_stmt_close($stmt_pos);
                if ($lower_id == 0) {
                    return $referrer_id2;
                } else {
                    return find_next_zero_position($connection, $lower_id, $position);
                }
            }
        }


        function find_next_available_position($connection, $referrer_id2, $position)
        {

            // echo "turn " . $position . " " . $referrer_id2 . "<br>";

            $chkPosition = "";

            if ($position == "left") {
                $chkPosition = "SELECT user_id, lower_id_left FROM tbl_binary WHERE upper_id = ? AND position = ?";
            } else if ($position == "right") {
                $chkPosition = "SELECT user_id, lower_id_right FROM tbl_binary WHERE upper_id = ? AND position = ?";
            }


            $stmt_pos = mysqli_prepare($connection, $chkPosition);

            mysqli_stmt_bind_param($stmt_pos, "ss", $referrer_id2, $position);

            mysqli_stmt_execute($stmt_pos);

            mysqli_stmt_store_result($stmt_pos);
            mysqli_stmt_bind_result($stmt_pos, $user_id,  $lower_id2);
            mysqli_stmt_fetch($stmt_pos);

            if ($lower_id2 === 0) {
                // echo "inside 0 ";
                return $user_id;
            } else if ($lower_id2 > 0) {
                // echo "inside > 0 ";
                return find_next_zero_position($connection, $lower_id2, $position);
            } else {
                // echo "referrer_id2 ", $referrer_id2;
                return $referrer_id2;
            }

            // if (mysqli_stmt_num_rows($stmt_pos) > 0) {
            //     return find_next_available_position($connection, $referrer_id2, $position);
            // } else {
            //     return $referrer_id2;
            // }
        }

        $final_upper_id = find_next_available_position($connection, $sponcer_id, $position);

        // Retrieve the level of the final upper ID
        $getLevel = "SELECT level FROM tbl_binary WHERE user_id = ?";
        $stmt_level = mysqli_prepare($connection, $getLevel);
        mysqli_stmt_bind_param($stmt_level, "s", $final_upper_id);
        mysqli_stmt_execute($stmt_level);
        mysqli_stmt_bind_result($stmt_level, $level);
        mysqli_stmt_fetch($stmt_level);
        mysqli_stmt_close($stmt_level);

        $new_user_level = $level + 1;

        // Insert into tbl_binary with the final referrer ID and the new user level
        $sqlqr2 = "INSERT INTO tbl_binary (user_id, referrer_id, position, capping_limit, level, matching_income, upper_id, lower_id_left, lower_id_right, topup_amount) 
                   VALUES ('$member_user_id', '$sponcer_id', '$position', '300', '$new_user_level', '0', '$final_upper_id', 0, 0, '$plan_amt');";

        mysqli_query($connection, $sqlqr2);

        // Update the sponsor's row with the new user's ID in the appropriate position
        if ($position === 'left') {
            $updateSponsor = "UPDATE tbl_binary SET lower_id_left = ? WHERE user_id = ?";
        } else {
            $updateSponsor = "UPDATE tbl_binary SET lower_id_right = ? WHERE user_id = ?";
        }
        $stmt_update = mysqli_prepare($connection, $updateSponsor);
        mysqli_stmt_bind_param($stmt_update, "ss", $member_user_id, $final_upper_id);
        mysqli_stmt_execute($stmt_update);
        mysqli_stmt_close($stmt_update);


        //   Insert top-up history
          $investment_history_query = "INSERT INTO tbl_member_income_dtails (member_user_id, investment_amt, transaction_date, transaction_id) VALUES (?, ?, ?, ?)";
          $stmt_history = mysqli_prepare($connection, $investment_history_query);
          mysqli_stmt_bind_param($stmt_history, "sdss", $member_user_id, $plan_amt, $reg_date, $transaction);
          mysqli_stmt_execute($stmt_history);
          mysqli_stmt_close($stmt_history);

        echo json_encode(array('status' => 'success', 'final_upper_id' => $final_upper_id));
    }

    mysqli_stmt_close($stmt);
}

mysqli_close($connection);
