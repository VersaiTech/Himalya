<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
ob_start();
session_start();

$email_id = $_SESSION['email_id'];
include './config/config.php';

function checkWalletAddress() {
    return isset($_SESSION['wallet_address']) ? $_SESSION['wallet_address'] : null;
}
$wallet_address = checkWalletAddress();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $member_user_id = $_POST['member_user_id'];
    $investment_amt = $_POST['amount'];
    $investment_date = date("Y-m-d H:i:s"); // Current date and time

    // Insert top-up history
    $investment_history_query = "INSERT INTO tbl_investment_history(member_user_id, email_id, wallet_address, investment_amount, retopup_amount, investment_date) VALUES (?, ?, ?, ?, 0, ?)"; // Set retopup_amount to 0 if not provided
    $stmt_history = $connection->prepare($investment_history_query);

    // Adjust the binding types and values
    $wallet_address_type = is_null($wallet_address) ? MYSQLI_TYPE_NULL : 's';

    $stmt_history->bind_param("sssss", $member_user_id, $email_id, $wallet_address, $investment_amt, $investment_date);

    if ($stmt_history->execute()) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'message' => $stmt_history->error]);
    }

    $stmt_history->close();
    $connection->close();
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid request method']);
}
