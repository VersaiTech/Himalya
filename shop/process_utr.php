<?php
session_start();
include '../config/config.php';  // Your database connection file

if (isset($_POST['utr_number']) && isset($_POST['amount'])) {
    $member_user_id = $_SESSION['member_user_id'];
    $email_id = $_SESSION['email_id'];
    $utr_number = $_POST['utr_number'];
    $amount = $_POST['amount'];
    $status = 'pending';  // Initial status is pending

    // Get the current date and time
    $date = date('Y-m-d');
    $time = date('H:i:s');

    if ($connection === null || !$connection->ping()) {
        die("Database connection is not properly initialized or not connected.");
    }

    // Insert UTR details into the tbl_pendingpayment
    $query = "INSERT INTO tbl_pendingpayment (member_user_id, email_id, utr_number, amount, status, date, time)
              VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($connection, $query);
    mysqli_stmt_bind_param($stmt, "sssssss", $member_user_id, $email_id, $utr_number, $amount, $status, $date, $time);
    
    if (mysqli_stmt_execute($stmt)) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false]);
    }

    mysqli_stmt_close($stmt);
    mysqli_close($connection);
}
?>
