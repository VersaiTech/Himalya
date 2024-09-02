<?php
require_once './config/config.php'; // Adjust the path as needed
require_once './config/function.php'; // Ensure this file contains the RemoveSpecialChar function

header('Content-Type: application/json'); // Ensure the content type is JSON

// Ensure connection is established
if (!$connection) {
    echo json_encode(['success' => false, 'message' => 'Database connection failed: ' . mysqli_connect_error()]);
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $wallet_address = RemoveSpecialChar(trim($_POST['walletAddress']));
    $sponcer_id = RemoveSpecialChar(trim($_POST['sponcer_id']));
    $position = RemoveSpecialChar(trim($_POST['position']));
    $plan_amt = (float) RemoveSpecialChar(trim($_POST['spackage']));
    $transaction = isset($_POST['hashcode']) ? RemoveSpecialChar(trim($_POST['hashcode'])) : '';

    if (empty($wallet_address) || empty($sponcer_id) || empty($position) || empty($plan_amt) || empty($transaction)) {
        echo json_encode(['success' => false, 'message' => 'All fields are required.']);
        exit();
    }

    $reg_date = date('Y-m-d H:i:s');
    $c_date = date('Y-m-d H:i:s');
    $member_user_id = substr(str_shuffle("123456789"), 0, 7);

    // Check if the wallet address already exists
    $chkWallet = "SELECT * FROM tbl_memberreg WHERE member_name = ?";
    $stmt_chk = mysqli_prepare($connection, $chkWallet);
    mysqli_stmt_bind_param($stmt_chk, "s", $wallet_address);
    mysqli_stmt_execute($stmt_chk);
    mysqli_stmt_store_result($stmt_chk);

    if (mysqli_stmt_num_rows($stmt_chk) > 0) {
        echo json_encode(['success' => false, 'message' => 'Wallet already exists.']);
    } else {
        $sponcer_name = get_associate_name($sponcer_id);

        $qry = "INSERT INTO tbl_memberreg (member_user_id, member_name, wallet_address, sponcer_id, sponcer_name, registration_date, topup_amount, status, hash_code, investment_busd, current_investment, lastSale)
                VALUES (?, ?, ?, ?, ?, ?, ?, 0, ?, ?, ?, ?)";
        $stmt = mysqli_prepare($connection, $qry);
        mysqli_stmt_bind_param($stmt, "sssssssssss", $member_user_id, $wallet_address, $wallet_address, $sponcer_id, $sponcer_name, $reg_date, $plan_amt, $transaction, $plan_amt, $plan_amt, $reg_date);

        if (mysqli_stmt_execute($stmt)) {
            // Update wallet amounts for the sponsor
            $update_wallet_query = "UPDATE tbl_memberreg SET wallet_amount = wallet_amount + ?, ref_amount = ref_amount + ?, total_earning = total_earning + ? WHERE member_user_id = ?";
            $update_amount = $plan_amt * 0.1;
            $stmt_update_wallet = mysqli_prepare($connection, $update_wallet_query);
            mysqli_stmt_bind_param($stmt_update_wallet, "ddds", $update_amount, $update_amount, $update_amount, $sponcer_id);
            mysqli_stmt_execute($stmt_update_wallet);

            // Assign session variables upon successful registration
            session_start();
            $_SESSION['view_type'] = "MAIN";
            $_SESSION['member_user_id'] = $member_user_id;
            $_SESSION['wallet_address'] = $wallet_address;
            $_SESSION['member_name'] = $wallet_address;
            $_SESSION['member_hex_address'] = $wallet_address;
            $_SESSION['position'] = $position;

            // Recursive functions to find the next available position
            function find_next_zero_position($connection, $referrer_id2, $position)
            {
                usleep(200000);
                $chkPosition = $position == "left" ? "SELECT lower_id_left FROM tbl_binary WHERE user_id = ? AND position = ?" : "SELECT lower_id_right FROM tbl_binary WHERE user_id = ? AND position = ?";
                $stmt_pos = mysqli_prepare($connection, $chkPosition);
                mysqli_stmt_bind_param($stmt_pos, "ss", $referrer_id2, $position);
                mysqli_stmt_execute($stmt_pos);
                mysqli_stmt_bind_result($stmt_pos, $lower_id);
                mysqli_stmt_fetch($stmt_pos);
                mysqli_stmt_close($stmt_pos);

                return $lower_id == 0 ? $referrer_id2 : find_next_zero_position($connection, $lower_id, $position);
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
VALUES (?, ?, ?, '300', ?, '0', ?, 0, 0, ?)";
            $stmt_binary = mysqli_prepare($connection, $sqlqr2);
            mysqli_stmt_bind_param($stmt_binary, "ssssss", $member_user_id, $sponcer_id, $position, $new_user_level, $final_upper_id, $plan_amt);
            mysqli_stmt_execute($stmt_binary);
            mysqli_stmt_close($stmt_binary);


            // Update the sponsor's row with the new user's ID in the appropriate position
            $updateSponsor = $position === 'left' ? "UPDATE tbl_binary SET lower_id_left = ? WHERE user_id = ?" : "UPDATE tbl_binary SET lower_id_right = ? WHERE user_id = ?";
            $stmt_update_sponsor = mysqli_prepare($connection, $updateSponsor);
            mysqli_stmt_bind_param($stmt_update_sponsor, "ss", $member_user_id, $final_upper_id);
            mysqli_stmt_execute($stmt_update_sponsor);
            mysqli_stmt_close($stmt_update_sponsor);

            echo json_encode(['success' => true, 'final_upper_id' => $final_upper_id]);
        } else {
            echo json_encode(['success' => false, 'message' => mysqli_stmt_error($stmt)]);
        }

        mysqli_stmt_close($stmt);
    }

    mysqli_stmt_close($stmt_chk);
}

$connection->close();
?>
