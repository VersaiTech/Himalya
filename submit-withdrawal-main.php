<?php
session_start();
include "./config/config.php"; // Database connection

header('Content-Type: application/json');
ob_start();

// Check if session variables and POST data are set
if (!isset($_SESSION['member_user_id']) || !isset($_POST['amount'])) {
    echo json_encode(['success' => false, 'message' => 'Invalid session or missing data']);
    ob_flush(); flush(); // Flush the output
    exit();
}

if ($connection === null || !$connection->ping()) {
    die("Database connection is not properly initialized or not connected.");
}

$member_user_id = $_SESSION['member_user_id'];
$withdraw_amount = floatval($_POST['amount']);

// Step 1: Fetch current balance (ref_amount) from the database
$query = "SELECT ref_amount FROM tbl_memberreg WHERE member_user_id = ?";
$stmt = mysqli_prepare($connection, $query);
mysqli_stmt_bind_param($stmt, "s", $member_user_id);
mysqli_stmt_execute($stmt);
mysqli_stmt_bind_result($stmt, $current_balance);
mysqli_stmt_fetch($stmt);
mysqli_stmt_close($stmt);


// If the current balance is not fetched or is null, set new_balance to 0
if ($current_balance === null || !is_numeric($current_balance)) {
    echo json_encode(['success' => false, 'new_balance' => 0, 'message' => 'Failed to fetch current balance']);
    exit();
}

// Check if the user has enough balance
if ($withdraw_amount > $current_balance) {
    echo json_encode(['success' => false, 'message' => 'Insufficient balance']);
    exit();
}

// Step 2: Deduct the requested amount from the balance
$new_balance = $current_balance - $withdraw_amount;

// Log the new balance for debugging purposes
error_log("New balance after withdrawal: " . $new_balance);

// Step 3: Update the user's balance in the database
$update_query = "UPDATE tbl_memberreg SET ref_amount = ? WHERE member_user_id = ?";
$update_stmt = mysqli_prepare($connection, $update_query);
mysqli_stmt_bind_param($update_stmt, "ds", $new_balance, $member_user_id);
$update_success = mysqli_stmt_execute($update_stmt);
mysqli_stmt_close($update_stmt);

// Check if the update was successful
if ($update_success) {
    // Step 4: Return a success response with the new balance
    echo json_encode(['success' => true, 'new_balance' => $new_balance]);
} else {
    $error_message = mysqli_error($connection);
    echo json_encode(['success' => false, 'message' => 'Failed to update balance', 'error' => $error_message]);
}

ob_flush(); flush(); // Ensure output is sent to the client

mysqli_stmt_close($update_stmt);
?>
