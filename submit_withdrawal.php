<?php
// session_start();
include "components/phpComponents/phpcomponents.php"; // Ensure this file includes session_start()
include "./config/config.php"; // Ensure the database connection $connection is in this file

header('Content-Type: application/json');

// Check if session variables and POST data are set
if (!isset($_SESSION['member_user_id']) || !isset($_POST['amount'])) {
    echo json_encode(['success' => false, 'message' => 'Invalid session or missing data']);
    exit();
}

if ($connection === null || !$connection->ping()) {
    echo json_encode(['success' => false, 'message' => 'Database connection issue']);
    exit();
}

$member_user_id = $_SESSION['member_user_id'];
$withdraw_amount = floatval($_POST['amount']);

// Validate the amount
if (!is_numeric($withdraw_amount) || $withdraw_amount <= 1500) {
    echo json_encode(['success' => false, 'message' => 'Invalid amount']);
    exit();
}

// Step 1: Fetch current balance (ref_amount) from the database
$query = "SELECT ref_amount FROM tbl_memberreg WHERE member_user_id = ?";
$stmt = mysqli_prepare($connection, $query);
mysqli_stmt_bind_param($stmt, "s", $member_user_id);
mysqli_stmt_execute($stmt);
mysqli_stmt_bind_result($stmt, $current_balance);
mysqli_stmt_fetch($stmt);
mysqli_stmt_close($stmt);

// If the current balance is not fetched or is null
if ($current_balance === null || !is_numeric($current_balance)) {
    echo json_encode(['success' => false, 'message' => 'Failed to fetch current balance']);
    exit();
}

// Check if the user has enough balance
if ($withdraw_amount > $current_balance) {
    echo json_encode(['success' => false, 'message' => 'Insufficient balance']);
    exit();
}

// Step 2: Deduct the requested amount from the balance
$new_balance = $current_balance - $withdraw_amount;

// Step 3: Update the user's balance in the database
$update_query = "UPDATE tbl_memberreg SET ref_amount = ? WHERE member_user_id = ?";
$update_stmt = mysqli_prepare($connection, $update_query);
mysqli_stmt_bind_param($update_stmt, "ds", $new_balance, $member_user_id);
$update_success = mysqli_stmt_execute($update_stmt);
mysqli_stmt_close($update_stmt);

if ($update_success) {
    // Step 4: Insert the withdrawal request into the database
    $insert_query = "INSERT INTO withdrawal_requests (member_user_id, amount) VALUES (?, ?)";
    $insert_stmt = $connection->prepare($insert_query);
    $insert_stmt->bind_param("sd", $member_user_id, $withdraw_amount);

    if ($insert_stmt->execute()) {
        echo json_encode(['success' => true, 'new_balance' => $new_balance]);
    } else {
        echo json_encode(['success' => false, 'message' => 'Failed to insert withdrawal request']);
    }

    $insert_stmt->close();
} else {
    echo json_encode(['success' => false, 'message' => 'Failed to update balance']);
}

$connection->close();
?>
