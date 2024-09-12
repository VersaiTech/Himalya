<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


$servers = [
    [
        "servername" => "localhost",
        "username" => "root", // Replace with your database username
        "password" => "", // Replace with your database password
        "dbname" => "u358688394_aura3"
    ],
    // [
    //     "servername" => "82.180.167.190",
    //     "username" => "u358688394_aura3",
    //     "password" => "umDvTH@4",
    //     "dbname" => "u358688394_aura3"
    // ]
];

// Enable mysqli error reporting
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

$conn = null;
$connected = false;
$error_message = '';

foreach ($servers as $server) {
    try {
        $conn = new mysqli($server['servername'], $server['username'], $server['password'], $server['dbname']);
        if ($conn->connect_error) {
            throw new Exception("Connection failed: " . $conn->connect_error);
        } else {
            // echo "Connected & server Name rn is ".$server['servername'] ;
            $connected = true;
            break;
        }
    } catch (Exception $e) {
        error_log("Connection attempt failed: " . $e->getMessage());
        $error_message = "Connection attempt failed: " . $e->getMessage();
    }
}

if (!$connected) {
    die('Connection could not be made to the SQL Server. Please report this system error at <font color="blue">info@servername.com</font><br>Error: ' . htmlspecialchars($error_message));
}


// Function to sanitize and validate input
function sanitize_input($data, $conn)
{
    $data = htmlspecialchars($data);
    $data = $conn->real_escape_string($data);
    return $data;
}

// Function to generate a unique client transaction ID
function generateUniqueClientTxnID()
{
    $prefix = "TXN_"; // You can customize the prefix
    $uniqueID = uniqid(); // Generate a unique ID
    return $prefix . $uniqueID;
}



    /**
 * Function to give referral bonus for three levels.
 * 
 * @param mysqli $connection
 * @param string $new_member_id
 * @param string $payment_date
 * @param float $amount
 */
function giveReferralBonus($connection, $new_member_id, $payment_date,$amount) {
    // Fetch the sponsor ID from the new member's record
    $fetchSponsorQuery = "SELECT sponcer_id FROM tbl_memberreg WHERE member_user_id = ?";
    $stmt_fetchSponsor = $connection->prepare($fetchSponsorQuery);
    $stmt_fetchSponsor->bind_param("s", $new_member_id);
    $stmt_fetchSponsor->execute();
    $stmt_fetchSponsor->bind_result($sponcer_id);
    $stmt_fetchSponsor->fetch();
    $stmt_fetchSponsor->close();

    if (!empty($sponcer_id)) {
        // Apply referral bonus for 3 levels
        giveReferralBonusForLevel($connection, $sponcer_id, $new_member_id, $payment_date, 1, $amount);

        // Fetch sponsor's sponsor (Level 2)
        $fetchLevel2SponsorQuery = "SELECT sponcer_id FROM tbl_memberreg WHERE member_user_id = ?";
        $stmt_level2 = $connection->prepare($fetchLevel2SponsorQuery);
        $stmt_level2->bind_param("s", $sponcer_id);
        $stmt_level2->execute();
        $stmt_level2->bind_result($level2SponsorId);
        $stmt_level2->fetch();
        $stmt_level2->close();

        if (!empty($level2SponsorId)) {
            giveReferralBonusForLevel($connection, $level2SponsorId, $new_member_id, $payment_date, 2, $amount);

            // Fetch sponsor's sponsor's sponsor (Level 3)
            $fetchLevel3SponsorQuery = "SELECT sponcer_id FROM tbl_memberreg WHERE member_user_id = ?";
            $stmt_level3 = $connection->prepare($fetchLevel3SponsorQuery);
            $stmt_level3->bind_param("s", $level2SponsorId);
            $stmt_level3->execute();
            $stmt_level3->bind_result($level3SponsorId);
            $stmt_level3->fetch();
            $stmt_level3->close();

            if (!empty($level3SponsorId)) {
                giveReferralBonusForLevel($connection, $level3SponsorId, $new_member_id, $payment_date, 3,$amount);
            }
        }
    }
}

/**
 * Function to give referral bonus for a specific level.
 * 
 * @param mysqli $connection
 * @param string $sponsor_id
 * @param string $new_member_id
 * @param string $payment_date
 * @param int $level
 * @param float $amount
 */
function giveReferralBonusForLevel($connection, $sponsor_id, $new_member_id, $payment_date, $level, $amount) {
    // Calculate bonus based on the level percentage
    $bonusAmount = ($level === 1) ? ($amount * 0.10) : (($level === 2) ? ($amount * 0.05) : ($amount * 0.03));

    // Start transaction
    $connection->begin_transaction();

    try {
        // Insert the referral bonus into the referral_bonus table
        $insertReferralBonusQuery = "INSERT INTO referral_bonus(sponcer_id, referred_member_id, bonus_amount, level, created_at) VALUES (?, ?, ?, ?, ?)";
        $stmt_insertReferralBonus = $connection->prepare($insertReferralBonusQuery);
        $stmt_insertReferralBonus->bind_param("ssdss", $sponsor_id, $new_member_id, $bonusAmount, $level, $payment_date);
        $stmt_insertReferralBonus->execute();
        $stmt_insertReferralBonus->close();

        // Update the ref_amount in tble_memberreg for the sponsor_id
        $updateRefAmountQuery = "UPDATE tbl_memberreg SET ref_amount = ref_amount + ? WHERE member_user_id = ?";
        $stmt_updateRefAmount = $connection->prepare($updateRefAmountQuery);
        $stmt_updateRefAmount->bind_param("ds", $bonusAmount, $sponsor_id);
        $stmt_updateRefAmount->execute();
        $stmt_updateRefAmount->close();

        // Commit the transaction
        $connection->commit();
    } catch (Exception $e) {
        // Rollback the transaction if any error occurs
        $connection->rollback();
        throw $e; // Rethrow the exception for debugging purposes
    }
}

$ticketNumber = rand(1000000, 9999999);

// Process form data and initiate UPI payment
if ($_SERVER["REQUEST_METHOD"] == "POST") {


    // Sanitize and validate form data
    $name = sanitize_input($_POST["member_user_id"], $conn);
    $email = sanitize_input($_POST["email_id"], $conn);
    $amount = sanitize_input($_POST["amount"], $conn);
    $paymentStatus = '';
    $mobile = "7654321233";
    $alternatemobile = "7654321243";
    $fathername = "fathername";
    $address = "address";
    $pincode = "344343";

    // Generate a unique client transaction ID
    $client_txn_id = generateUniqueClientTxnID();


    // Store form data in session
    $_SESSION["name"] = $name;
    $_SESSION["fathername"] = $fathername;
    $_SESSION["address"] = $address;
    $_SESSION["pincode"] = $pincode;
    $_SESSION["email"] = $email;
    $_SESSION["alternatemobile"] = $alternatemobile;
    $_SESSION["mobile"] = $mobile;
    $_SESSION["client_txn_id"] = $client_txn_id;
    $_SESSION["ticket_number"] = $ticketNumber;


    date_default_timezone_set('Asia/Kolkata');

    // Get current date and time
    $paymentTime = date("Y-m-d H:i:s");

    // // Prepare and execute SQL query using prepared statements
    // $stmt = $conn->prepare("INSERT INTO user_data (name, fathername, address, pincode, email, mobile, alternatemobile, client_txn_id, ticket_number, payment_time, created_at) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

    // $stmt->bind_param("sssssssssss", $name, $fathername, $address, $pincode, $email, $mobile, $alternatemobile, $client_txn_id, $ticketNumber, $paymentTime, $paymentTime);





    sleep(1);
    // UPI Payment Gateway Integration
    // $apiEndpoint = "https://api.ekqr.in/api/create_order";  
    // $apiKey = "5f9a7e08-3d5c-4e6d-b3c4-0ef89a1c9be0"; 

    if (isset($_GET['simulate_payment']) && $_GET['simulate_payment'] == 'true') {
        // Simulate payment success
        $paymentStatus = 'success';
        $responseData = array('status' => true, 'data' => array('payment_url' => ''));
    } else {
        // Original payment gateway integration code
        $apiEndpoint = "https://api.ekqr.in/api/create_order";
        $apiKey = "5f9a7e08-3d5c-4e6d-b3c4-0ef89a1c9be0";
        // ...
    }

    if ($paymentStatus == 'success') {
       // Trigger payment confirmation webhook
       ?>
       <script>
       console.log('Payment done');
       window.location.href = 'http://localhost/Himallya-MLM/shop/index';
   </script>
   <?php
    // Update topUp_status in tbl_memberreg
    $updateStmt = $conn->prepare("UPDATE tbl_memberreg SET topUp_status = 1 WHERE member_user_id = ?");
    $updateStmt->bind_param("i", $name); // assuming $name is the member_user_id
    $updateStmt->execute();

      // Insert payment record into tbl_payment_history
      $insertStmt = $conn->prepare("INSERT INTO tbl_payment_history (member_user_id, payment_date, payment_amount, payment_status) VALUES (?, ?, ?, ?)");
      $insertStmt->bind_param("isds", $name, $paymentTime, $amount, $paymentStatus);
      $insertStmt->execute();


     // Referral bonus logic here
     giveReferralBonus($conn, $name, $paymentTime, $amount);

     // Close the prepared statements
     $updateStmt->close();
     $insertStmt->close();
     $conn->close();


    
    } else {
    }


    // ************************



    // ***********************

    // Prepare payment request data
    // $paymentData = [
    //     'key' => $apiKey,
    //     'client_txn_id' => $client_txn_id,  
    //     'amount' => "99", 
    //     'p_info' => "Buy Ticket",
    //     'customer_name' => $name,
    //     'customer_email' => $email,
    //     'customer_mobile' => $mobile,
    //     'redirect_url' => 'https://krishnagaushalalottery.com/waiting_for_ticket.php',
    //     'udf1' => 'user defined ',
    //     'udf2' => 'user defined field 2',
    //     'udf3' => 'user defined field 3 '
    // ];

    // Create a HTTP POST request to the UPI payment gateway API
    // $ch = curl_init($apiEndpoint);
    // curl_setopt($ch, CURLOPT_POST, 1);
    // curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($paymentData));
    // curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    // Execute the request and get the response
    // $response = curl_exec($ch);
    // curl_close($ch);

    // Parse the response (response format may vary based on the UPI payment gateway provider)
    // $responseData = json_decode($response, true);

    // Check if the status is true and payment_url is present in the response data
    // if ($responseData && $responseData['status'] && isset($responseData['data']['payment_url'])) {
    //     // Redirect to the payment URL received from the API
    //     header("Location: " . $responseData['data']['payment_url']);
    //     exit();
    // } else {
    //     // Handle error (e.g., log error, display error message to user)
    //     if ($responseData && isset($responseData['msg'])) {
    //         echo "Error occurred while processing payment: " . $responseData['msg'];
    //     } else {
    //         echo "Error occurred while processing payment.";
    //     }
    // }



    // Close the statement and connection
    // $stmt->close();
    // $conn->close();
}
