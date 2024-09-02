<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
ob_start();
session_start();

include "./config/config.php"; // Ensure this path is correct

if (!isset($_SESSION['member_user_id']) || !isset($_SESSION['wallet_address'])) {
    die('Session variables not set.');
}

$member_user_id = $_SESSION['member_user_id'];
$wallet_address = $_SESSION['wallet_address'];

if (!$connection) {
    die('Database connection failed: ' . mysqli_connect_error());
}

// Fetch sponcer_id and topup_amount from tbl_memberreg based on member_user_id
$sponcer_id_query = "SELECT sponcer_id, topup_amount, ref_status, topUp_status FROM tbl_memberreg WHERE member_user_id = ?";
$stmt = $connection->prepare($sponcer_id_query);
$stmt->bind_param("s", $member_user_id);

if ($stmt->execute()) {
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $sponcer_id = $row['sponcer_id'];
        $topup_amount = $row['topup_amount'];
        $ref_status = $row['ref_status'];
        $topUp_status = $row['topUp_status'];
    } else {
        die('No sponsor found for the given member_user_id.');
    }
} else {
    die('Error fetching sponsor id: ' . $stmt->error);
}

$stmt->close();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $network = $_POST['network'];
    $login_id = $_POST['login_id'];
    $amount = $_POST['amount'];
    $screenshot = $_FILES['screenshot'];

    // Check if file was uploaded without errors
    if ($screenshot['error'] == 0) {
        // Set the target directory
        $target_dir = "assets/";
        $target_file = $target_dir . basename($screenshot["name"]);

        // Move the uploaded file to the target directory
        if (move_uploaded_file($screenshot["tmp_name"], $target_file)) {
            // Check if the deposited amount matches the topup_amount in tbl_memberreg only if ref_status and topUp_status are 0
            if (($ref_status == 0 && $topUp_status == 0 && $amount == $topup_amount) || ($ref_status == 1 && $topUp_status == 1)) {
                // Prepare the SQL query
                $query = "INSERT INTO deposit_testing (member_user_id, wallet_address, sponcer_id, network, login_id, amount, screenshot) VALUES (?, ?, ?, ?, ?, ?, ?)";
                $stmt = $connection->prepare($query);
                $stmt->bind_param("issssis", $member_user_id, $wallet_address, $sponcer_id, $network, $login_id, $amount, $target_file);

                // Execute the query
                if ($stmt->execute()) {
                    // Get the sponcer_id from the deposit_testing table
                    $deposit_id = $stmt->insert_id;
                    $deposit_query = "SELECT sponcer_id FROM deposit_testing WHERE id = ?";
                    $deposit_stmt = $connection->prepare($deposit_query);
                    $deposit_stmt->bind_param("i", $deposit_id);

                    if ($deposit_stmt->execute()) {
                        $deposit_result = $deposit_stmt->get_result();
                        if ($deposit_result->num_rows > 0) {
                            $deposit_row = $deposit_result->fetch_assoc();
                            $sponcer_id_from_deposit = $deposit_row['sponcer_id'];

                            // Calculate the referral bonus percentage
                            $select_query = "SELECT set_ref_percent FROM admin";
                            $select_stmt = $connection->prepare($select_query);
                            $select_stmt->execute();
                            $select_result = $select_stmt->get_result();
                            $select_row = $select_result->fetch_assoc();
                            $referral_bonus_percent = $select_row['set_ref_percent'];
                            $referral_bonus = $amount * $referral_bonus_percent;

                            if ($ref_status == 0 && $topUp_status == 0) {
                                // Update ref_status to 1 and topUp_status to 1 for the current member_user_id
                                $update_ref_status_query = "UPDATE tbl_memberreg SET ref_status = 1, topUp_status = 1 WHERE member_user_id = ?";
                                $update_ref_status_stmt = $connection->prepare($update_ref_status_query);
                                $update_ref_status_stmt->bind_param("s", $member_user_id);

                                if ($update_ref_status_stmt->execute()) {
                                    // Update the wallet_amount and ref_amount in tbl_memberreg for the sponcer
                                    $update_wallet_query = "UPDATE tbl_memberreg SET wallet_amount = wallet_amount + ?, ref_amount = ref_amount + ?, total_earning =ref_amount + ? WHERE member_user_id = ?";
                                    $update_stmt = $connection->prepare($update_wallet_query);
                                    $update_stmt->bind_param("dds", $referral_bonus, $referral_bonus, $sponcer_id_from_deposit);

                                    if ($update_stmt->execute()) {
                                        // Redirect after successful insert and update
                                        header("Location: deposit-by-usdt?status=success");
                                        exit();
                                    } else {
                                        echo "Error updating wallet amount and ref_amount: " . $update_stmt->error;
                                    }

                                    $update_stmt->close();
                                } else {
                                    echo "Error updating ref_status and topUp_status: " . $update_ref_status_stmt->error;
                                }

                                $update_ref_status_stmt->close();
                            } else {
                                // If ref_status and topUp_status are 1, add amount to wallet_amount
                                $update_wallet_query = "UPDATE tbl_memberreg SET wallet_amount = wallet_amount + ? WHERE member_user_id = ?";
                                $update_wallet_stmt = $connection->prepare($update_wallet_query);
                                $update_wallet_stmt->bind_param("ds", $amount, $member_user_id);

                                if ($update_wallet_stmt->execute()) {
                                    header("Location: deposit-by-usdt");
                                    exit();
                                } else {
                                    echo "Error updating wallet_amount: " . $update_wallet_stmt->error;
                                }

                                $update_wallet_stmt->close();
                            }
                        } else {
                            echo "Error fetching sponcer_id from deposit_testing.";
                        }
                    } else {
                        echo "Error fetching deposit record: " . $deposit_stmt->error;
                    }

                    $deposit_stmt->close();
                } else {
                    echo "Error: " . $stmt->error;
                }

                // Close the statement and connection
                $stmt->close();
                $connection->close();
            } else {
                echo "Deposited amount does not match the topup_amount in tbl_memberreg.";
            }
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    } else {
        echo "Error: " . $screenshot['error'];
    }
} else {
    echo "Invalid request method.";
}
?>