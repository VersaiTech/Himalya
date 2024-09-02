<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();

require_once './config/config.php'; // Adjust the path as needed
require_once './config/function.php'; // Ensure this file contains the RemoveSpecialChar function

header('Content-Type: application/json'); // Ensure the content type is JSON

// Ensure connection is established
if (!$connection) {
    echo json_encode(['success' => false, 'message' => 'Database connection failed: ' . mysqli_connect_error()]);
    exit();
}

function checkWalletAddress() {
    return isset($_SESSION['wallet_address']) ? $_SESSION['wallet_address'] : null;
}

$wallet_address = checkWalletAddress();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $member_user_id = isset($_POST['member_user_id']) ? trim($_POST['member_user_id']) : '';
    $amount = isset($_POST['amount']) ? (float) trim($_POST['amount']) : 0;
    $email_id = isset($_SESSION['email_id']) ? $_SESSION['email_id'] : '';
    $investment_date = date("Y-m-d H:i:s"); // Current date and time

    if (empty($member_user_id) || empty($amount) || empty($email_id)) {
        echo json_encode(['success' => false, 'message' => 'All fields are required.']);
        exit();
    }

    // Begin transaction
    mysqli_begin_transaction($connection);

    try {
        // Update tbl_memberreg with the top-up amount to the current_investment field
        $update_query = "UPDATE tbl_memberreg SET current_investment = current_investment + ? WHERE member_user_id = ?";
        $stmt = mysqli_prepare($connection, $update_query);
        mysqli_stmt_bind_param($stmt, "ds", $amount, $member_user_id);

        if (!mysqli_stmt_execute($stmt)) {
            throw new Exception('Failed to update tbl_memberreg.');
        }

        mysqli_stmt_close($stmt);

        // Insert top-up history
        $investment_history_query = "INSERT INTO tbl_investment_history (member_user_id, email_id, wallet_address, retopup_amount, investment_date) VALUES (?, ?, ?, ?, ?)";
        $stmt_history = mysqli_prepare($connection, $investment_history_query);

        if ($wallet_address === null) {
            $stmt_history->bind_param("sssss", $member_user_id, $email_id, $wallet_address, $amount, $investment_date);
        } else {
            $stmt_history->bind_param("sssss", $member_user_id, $email_id, $wallet_address, $amount, $investment_date);
        }

        if (!mysqli_stmt_execute($stmt_history)) {
            throw new Exception('Failed to insert into tbl_investment_history.');
        }

        mysqli_stmt_close($stmt_history);

        // Commit transaction
        mysqli_commit($connection);

        echo json_encode(['success' => true, 'message' => 'User top-up successful.', 'redirect' => 'ActiveUserList']);
    } catch (Exception $e) {
        // Rollback transaction
        mysqli_rollback($connection);
        echo json_encode(['success' => false, 'message' => $e->getMessage()]);
    }

    $connection->close();
}
?>
