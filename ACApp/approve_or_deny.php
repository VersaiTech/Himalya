<?php
include '../config/config.php'; // Make sure this file connects to your database

$action = $_GET['action'];
$id = $_GET['id'];

if ($action === 'approve') {
    $query = "UPDATE withdrawal_requests SET status = 'success' WHERE id = ?";
} elseif ($action === 'deny') {
    $query = "DELETE FROM withdrawal_requests WHERE id = ?";
} else {
    die("Invalid action");
}

if ($connection === null || !$connection->ping()) {
    die("Database connection is not properly initialized or not connected.");
}
$stmt = $connection->prepare($query);

if ($action === 'approve') {
    $stmt->bind_param("i", $id);
} elseif ($action === 'deny') {
    $stmt->bind_param("i", $id);
}

if ($stmt->execute()) {
    header("Location: all-withdrawals"); // Replace with the actual page URL
    exit();
} else {
    die("Database operation failed: " . $stmt->error);
}

$stmt->close();
$connection->close();
?>
