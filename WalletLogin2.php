<?php
session_start();
include './config/config.php';

$email_id = $_REQUEST['email_id'];
$password = $_REQUEST['password'];

if (!$connection) {
    die('Database connection failed: ' . mysqli_connect_error());
}

$str = "SELECT * FROM tbl_memberreg WHERE email_id = '$email_id' AND isblock = 0";
$result = mysqli_query($connection, $str);

if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_array($result);

    if (password_verify($password, $row['password'])) {
        $_SESSION['view_type'] = "MAIN";
        $_SESSION['member_id'] = $row['member_id'];
        $_SESSION['member_user_id'] = $row['member_user_id'];
        $_SESSION['member_name'] = $row['member_name'];
        $_SESSION['email_id'] = $row['email_id'];
        echo "Exist";
    } else {
        echo "Incorrect password";
    }
} else {
    echo "User does not exist";
}
?>
