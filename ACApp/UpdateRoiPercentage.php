<?php
require_once './config/config.php'; // Adjust the path as needed

header('Content-Type: application/json'); // Ensure the content type is JSON

// Ensure connection is established
if (!$connection) {
    die('Database connection failed: ' . mysqli_connect_error());
  }

// Check if connection is established
if ($connection->connect_error) {
    echo json_encode(['success' => false, 'message' => 'Database connection failed: ' . $connection->connect_error]);
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $newPercentage = $_POST['newPercentage'];
    $newPercentage = floatval($newPercentage);
    if (!empty($newPercentage) && is_numeric($newPercentage)) {
        $sql = "UPDATE admin SET set_roi_percent = ?";

        $stmt = $connection->prepare($sql);
        $stmt->bind_param("d", $newPercentage);

        if ($stmt->execute()) {
            echo json_encode(['success' => true]);
        } else {
            echo json_encode(['success' => false, 'message' => 'Failed to update referral percentage.']);
        }

        $stmt->close();
    } else {
        echo json_encode(['success' => false, 'message' => 'Invalid input.']);
    }
}

$connection->close();
?>
