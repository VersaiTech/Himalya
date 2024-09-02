<?php
session_start();
include './config/config.php';

$email_id = $_REQUEST['email_id'];

if (!$connection) {
    die('Database connection failed: ' . mysqli_connect_error());
}

$str = "SELECT * FROM tbl_memberreg WHERE email_id = '$email_id'";
$result = mysqli_query($connection, $str);

if ($row = mysqli_fetch_assoc($result)) {
    // Assuming passwords are stored hashed in the database
    $_SESSION['view_type'] = "MAIN";
    $_SESSION['member_id'] = $row['member_id'];
    $_SESSION['member_user_id'] = $row['member_user_id'];
    $_SESSION['wallet_address'] = $row['wallet_address'];
    $_SESSION['member_name'] = $row['member_name'];
    echo "Exist";
} else {
    echo "User does not exist";
}
