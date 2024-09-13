<?php
include '../config/config.php'; // Ensure this file connects to your database

// Validate and sanitize inputs
$action = isset($_GET['action']) ? $_GET['action'] : null;
$id = isset($_GET['id']) ? intval($_GET['id'])  : null;

if (!$action || !$id) {
    die("Invalid request: missing action or id.");
}

// Use UPDATE for both approve and deny actions to avoid deleting any records
if ($action === 'approve') {
    $query = "UPDATE withdrawal_requests SET status = 'success' WHERE id = ?";
} elseif ($action === 'deny') {
    $query = "UPDATE withdrawal_requests SET status = 'denied' WHERE id = ?";
}
else {
    die("Invalid action.");
}

// Ensure the database connection is active
if ($connection === null || !$connection->ping()) {
    die("Database connection is not properly initialized or not connected.");
}

// Prepare and bind the parameter (id) for the prepared statement
$stmt = $connection->prepare($query);

if (!$stmt) {
    die("Failed to prepare the SQL statement: " . $connection->error);
}

$stmt->bind_param("i", $id);

// Execute the query
if ($stmt->execute()) {
    // Redirect back to the all withdrawals page (ensure you use the correct page name)
    header("Location: all-withdrawals"); // Update with your actual page URL
    exit();
} else {
    die("Database operation failed: " . $stmt->error);
}

// Close the statement and connection
$stmt->close();
$connection->close();
?>
