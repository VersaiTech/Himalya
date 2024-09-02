<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
ob_start();
session_start();

include './config/config.php';
include "./config/function.php";

if (!isset($_SESSION['member_user_id']) || !isset($_SESSION['email_id'])) {
    header('Location: Login');
    exit();
}

$member_user_id = $_SESSION['member_user_id'];
function checkWalletAddress() {
    if (isset($_SESSION['wallet_address'])) {
        return $_SESSION['wallet_address'];
    } else {
        return NULL;
    }
}
$wallet_address = checkWalletAddress();
$email_id = $_SESSION['email_id']; // Replace this with the actual email ID if available

if (!$connection) {
    die('Database connection failed: ' . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check the number of requests already made by the user
    $stmt = $connection->prepare("SELECT COUNT(*) FROM deposit_request WHERE member_user_id = ?");
    $stmt->bind_param("s", $member_user_id);
    $stmt->execute();
    $stmt->bind_result($requestCount);
    $stmt->fetch();
    $stmt->close();

    if ($requestCount >= 2) {
        // Redirect to deposit-by-usdt page with a query parameter to show the alert
        header('Location: deposit-by-usdt.php?alert=true');
        exit();
    }

    if (isset($_POST['packageType']) && isset($_POST['spackage']) && isset($_FILES['screenshot'])) {
        $packageType = $_POST['packageType'];
        $packageAmount = $_POST['spackage'];
        $transaction_id = $_POST['transaction_id'];

        // Check if the transaction ID already exists in the database
        $stmt = $connection->prepare("SELECT COUNT(*) FROM deposit_request WHERE transaction_id = ?");
        $stmt->bind_param("s", $transaction_id);
        $stmt->execute();
        $stmt->bind_result($transactionCount);
        $stmt->fetch();
        $stmt->close();

        if ($transactionCount > 0) {
            echo "Transaction ID already exists. Please use a unique transaction ID.";
            exit();
        }

        // Handle file upload
        $targetDir = "ACApp/uploads/";
        if (!is_dir($targetDir)) {
            mkdir($targetDir, 0777, true);
        }
        $uniqueFileName = uniqid() . "_" . basename($_FILES["screenshot"]["name"]);
        $targetFile = $targetDir . $uniqueFileName;
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

        // Check if image file is a actual image or fake image
        $check = getimagesize($_FILES["screenshot"]["tmp_name"]);
        if ($check !== false) {
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }

        // Check if file already exists
        if (file_exists($targetFile)) {
            echo "Sorry, file already exists.";
            $uploadOk = 0;
        }

        // Check file size
        if ($_FILES["screenshot"]["size"] > 500000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }

        // Allow certain file formats
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
        } else {
            if (move_uploaded_file($_FILES["screenshot"]["tmp_name"], $targetFile)) {
                echo "The file " . basename($_FILES["screenshot"]["name"]) . " has been uploaded.";
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }

        if ($wallet_address === NULL) {
            $wallet_address = ''; // or set a default value
        }
        
        $stmt = $connection->prepare("INSERT INTO deposit_request (package_type, package_amount, payment_screenshot, member_user_id, email_id,wallet_address,transaction_id) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssisss", $packageType, $packageAmount, $targetFile, $member_user_id, $email_id, $wallet_address, $transaction_id);
        
        if ($stmt->execute()) {
            header("Location: deposit-by-usdt?status=success");
        } else {
            echo "Error: " . $stmt->error;
        }
        
        $stmt->close();
    } else {
        echo "Form data is missing.";
    }
}

$connection->close();
?>
