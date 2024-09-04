<?php
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}
// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (!isset($_SESSION['member_user_id']) || !isset($_SESSION['email_id'])) {
        // Session not active, redirect to login
        header('Location: /Himallya-MLM/login');
        exit();
    } else {
        // Session is active, proceed to payment
        $product_id = $_POST['product_id'] ?? ''; // Default to empty string if not set
        if ($product_id) {
            header('Location: /Himallya-MLM/payment?product_id=' . urlencode($product_id));
            exit();
        } else {
            // Handle missing product_id scenario
            echo 'Product ID is missing.';
        }
    }
} else {
    // Handle non-POST requests
    echo 'Invalid request method.';
}
?>
