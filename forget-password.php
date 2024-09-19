<?php

include 'config/config.php';
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Autoload PHPMailer using Composer
require 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Check if email exists in tbl_memberreg
if (isset($_POST['recoverEmail'])) {
    $email = $_POST['recoverEmail'];
    $qry = "SELECT email_id FROM tbl_memberreg WHERE email_id = '$email'";
    $stmt = mysqli_prepare($connection, $qry);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_store_result($stmt);
    mysqli_stmt_bind_result($stmt, $email_id);
    mysqli_stmt_fetch($stmt);



    if (!$email_id) {
        echo "Error: Email address not found.";
    } else {
        // Generate OTP
        $otp = rand(100000, 999999);

        // Store OTP in database
        $stmt = "SELECT * FROM otps WHERE email_id = ?";
        $stmt = mysqli_prepare($connection, $stmt);
        mysqli_stmt_bind_param($stmt, "s", $email_id);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);
        $numRows = mysqli_stmt_num_rows($stmt);
        
        if ($numRows > 0) {
            // Replace existing OTP
            $stmt = "UPDATE otps SET otp = ?, expires_at = NOW() + INTERVAL 10 MINUTE WHERE email_id = ?";
            $stmt = mysqli_prepare($connection, $stmt);
            mysqli_stmt_bind_param($stmt, "ss", $otp, $email_id);
            mysqli_stmt_execute($stmt);
        } else {
            // Create new OTP
            $stmt = "INSERT INTO otps (email_id, otp, expires_at) VALUES (?, ?, NOW() + INTERVAL 10 MINUTE)";
            $stmt = mysqli_prepare($connection, $stmt);
            mysqli_stmt_bind_param($stmt, "ss", $email_id, $otp);
            mysqli_stmt_execute($stmt);
        }


        // Send OTP to email address

       
        $mail = new PHPMailer(true);
        
        try {
            //Server settings
            $mail->SMTPDebug = 0;                      
            $mail->isSMTP();                           
            $mail->Host       = 'smtp.hostinger.com';  
            $mail->SMTPAuth   = true;                  
            $mail->Username   = 'testing@oriontradeai.com'; 
            $mail->Password   = ';D6~o/7Qc71=';            
            $mail->SMTPSecure = 'tls';                 
            $mail->Port       = 587;                  
        
            //Recipients
            $mail->setFrom('testing@oriontradeai.com', 'Himallya RO Services');
            $mail->addAddress($email, 'User Name');    
        
            // Content
            $mail->isHTML(true);                      
            $mail->Subject = 'Password Reset OTP';
            $mail->Body    = "Your OTP for password reset is: $otp";
            $mail->AltBody = "Your OTP for password reset is: $otp"; 
        
            // Send the email
            if ($mail->send()) {
                echo "OTP sent successfully! Check your email.";
            } else {
                echo "Failed to send OTP. Please try again.";
            }
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }
}


// Verify OTP and update password
if (isset($_POST['otp']) && isset($_POST['new_password']) && isset($_POST['confirm_password'])) {
    $otp = $_POST['otp'];
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];
    $email_id = $_POST['email_id']; // Added this line

    // Get email ID from OTP
    $stmt = "SELECT email_id FROM otps WHERE otp = ? AND expires_at > NOW()";
    $stmt = mysqli_prepare($connection, $stmt);
    mysqli_stmt_bind_param($stmt, "s", $otp);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_store_result($stmt);
    mysqli_stmt_bind_result($stmt, $email_id_check);
    mysqli_stmt_fetch($stmt);
    // $stmt->execute([$otp]);
    // $email_id_check = $stmt->fetchColumn();

    if ($email_id_check == $email_id) {
        // Verify new password and confirm password
        if ($new_password === $confirm_password) {
            $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
            $stmt = "UPDATE tbl_memberreg SET password = ? WHERE email_id = ?";
            $stmt = mysqli_prepare($connection, $stmt);
            mysqli_stmt_bind_param($stmt, "ss", $hashed_password, $email_id);
            mysqli_stmt_execute($stmt);


            // $stmt->execute([$hashed_password, $email_id]);

            // Delete OTP from database
            $stmt = "DELETE FROM otps WHERE email_id = ?";
            $stmt = mysqli_prepare($connection, $stmt);
            mysqli_stmt_bind_param($stmt, "s", $email_id);
            mysqli_stmt_execute($stmt);

            // $stmt->execute([$email_id]);

            echo "Password reset successfully!";
        } else {
            echo "Passwords do not match.";
        }
    } else {
        echo "Invalid OTP or OTP has expired.";
    }
}

?>