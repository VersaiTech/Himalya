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

$ticketNumber = rand(1000000, 9999999);

// Process form data and initiate UPI payment
if ($_SERVER["REQUEST_METHOD"] == "POST") {


    // Sanitize and validate form data
    $name = sanitize_input($_POST["user_id"], $conn);
    $email = sanitize_input($_POST["email_id"], $conn);
    $amount = sanitize_input($_POST["amount"], $conn);
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
    $apiEndpoint = "https://api.ekqr.in/api/create_order";  // API endpoint for creating order
    $apiKey = "5f9a7e08-3d5c-4e6d-b3c4-0ef89a1c9be0";  // Replace with your API key

    // Prepare payment request data
    $paymentData = [
        'key' => $apiKey,
        'client_txn_id' => $client_txn_id,  // Use the generated client_txn_id
        'amount' => "99",  // Amount to be paid
        'p_info' => "Buy Ticket",
        'customer_name' => $name,
        'customer_email' => $email,
        'customer_mobile' => $mobile,
        'redirect_url' => 'https://krishnagaushalalottery.com/waiting_for_ticket.php',
        'udf1' => 'user defined ',
        'udf2' => 'user defined field 2',
        'udf3' => 'user defined field 3 '
    ];

    // Create a HTTP POST request to the UPI payment gateway API
    $ch = curl_init($apiEndpoint);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($paymentData));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    // Execute the request and get the response
    $response = curl_exec($ch);
    curl_close($ch);

    // Parse the response (response format may vary based on the UPI payment gateway provider)
    $responseData = json_decode($response, true);

    // Check if the status is true and payment_url is present in the response data
    if ($responseData && $responseData['status'] && isset($responseData['data']['payment_url'])) {
        // Redirect to the payment URL received from the API
        header("Location: " . $responseData['data']['payment_url']);
        exit();
    } else {
        // Handle error (e.g., log error, display error message to user)
        if ($responseData && isset($responseData['msg'])) {
            echo "Error occurred while processing payment: " . $responseData['msg'];
        } else {
            echo "Error occurred while processing payment.";
        }
    }



    // Close the statement and connection
    // $stmt->close();
    $conn->close();
}
