<?php
include "components/phpComponents/phpcomponents.php"; // Ensure this file includes session_start()
include "./config/config.php"; // Ensure the database connection $conn is in this file

// Check if session variables exist
if (!isset($_SESSION['member_user_id'])) {
    echo json_encode(['success' => false, 'message' => 'User not logged in']);
    exit();
}

if ($connection === null || !$connection->ping()) {
    die("Database connection is not properly initialized or not connected.");
}

$member_user_id = $_SESSION['member_user_id'];
$amount = $_POST['amount'] ?? 0;

// Validate the amount
if (!is_numeric($amount) || $amount <= 1500) {
    echo json_encode(['success' => false, 'message' => 'Invalid amount']);
    exit();
}

// Insert the request into the database
$query = "INSERT INTO withdrawal_requests (member_user_id, amount) VALUES (?, ?)";
$stmt = $connection->prepare($query);
$stmt->bind_param("sd", $member_user_id, $amount);

if ($stmt->execute()) {
    echo json_encode(['success' => true]);
} else {
    echo json_encode(['success' => false, 'message' => 'Database error']);
}

$stmt->close();
$connection->close();
?>
