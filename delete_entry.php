<?php
// Include your database connection
include "config/config.php";

if (!$connection) {
    die('Database connection failed: ' . mysqli_connect_error());
}

if(isset($_POST['member_user_id']) && isset($_POST['transaction_id'])) {
    $memberUserId = $_POST['member_user_id'];
    $transactionId = $_POST['transaction_id'];

    // Prepare the SQL statement to delete the entry
    $sql = "DELETE FROM deposit_request WHERE member_user_id = ? AND transaction_id = ?";
    $stmt = $connection->prepare($sql);
    if ($stmt) {
        $stmt->bind_param("ii", $memberUserId, $transactionId);

        if ($stmt->execute()) {
            echo 'success';
        } else {
            echo 'error: ' . $stmt->error;
        }

        $stmt->close();
    } else {
        echo 'error: ' . $connection->error;
    }

    $connection->close();
} else {
    echo 'error: Missing parameters';
}
?>
