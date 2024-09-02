

<?php

include 'config/config.php';
include 'config/function.php';

//show php errors
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (!$connection) {
    die('Database connection failed: ' . mysqli_connect_error());
}

$plan_amt = $_POST['plan_amount'];



if (isset($_POST['member_user_id'])) {
    $member_user_id = $_POST['member_user_id'];
    $query = "SELECT * FROM tbl_memberreg WHERE member_user_id = '$member_user_id'";
    $result = mysqli_query($connection, $query);

    if ($result) {
        $row = mysqli_fetch_assoc($result);



        $updateQuery = "UPDATE deposit_request SET verified = 1 WHERE member_user_id = '$member_user_id'";
        mysqli_query($connection, $updateQuery);






        $ref_income = ($plan_amt * 10) / 100;
        $sponcer_id = $row['sponcer_id'];
        $position = $row['position'];


        // check tbl_binary has user_id or not
        $chkUser = "SELECT user_id FROM tbl_binary WHERE user_id = ?";
        $stmt_user = mysqli_prepare($connection, $chkUser);
        mysqli_stmt_bind_param($stmt_user, "s", $member_user_id);
        mysqli_stmt_execute($stmt_user);
        mysqli_stmt_store_result($stmt_user);
        mysqli_stmt_bind_result($stmt_user, $user_id2);
        mysqli_stmt_fetch($stmt_user);
        if ($user_id2) {
            mysqli_stmt_close($stmt_user);
            echo json_encode(['status' => 'success', 'user' => $user_id2]);
            return;
        }
        mysqli_stmt_close($stmt_user);





        // Update the referral income in tbl_memberreg
        $ref_update = "UPDATE tbl_memberreg SET  ref_amount = ref_amount + $ref_income, total_earning = total_earning + $ref_income WHERE member_user_id = '$sponcer_id'";
        mysqli_query($connection, $ref_update) or die(mysqli_error($connection));




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
        $investment_history_query = "INSERT INTO tbl_member_income_dtails (member_user_id, investment_amt, investment_date, income_member_id) VALUES (?, ?, ?, ?)";
        $stmt_history = mysqli_prepare($connection, $investment_history_query);
        mysqli_stmt_bind_param($stmt_history, "sdss", $member_user_id, $plan_amt, $reg_date, $transaction);
        mysqli_stmt_execute($stmt_history);
        mysqli_stmt_close($stmt_history);



        if ($row) {
            echo json_encode(array('success' => true, 'data' => $row));
        } else {
            echo json_encode(array('success' => false, 'message' => 'No data found'));
        }
    } else {
        echo json_encode(array('success' => false, 'message' => 'Error fetching data'));
    }


    mysqli_close($connection);
}
