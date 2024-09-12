

<?php
require 'vendor/autoload.php'; // Include the Dompdf autoloader

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

date_default_timezone_set('Asia/Kolkata');


// Establish database connection
$servername = "localhost";
$username = "root";
$password = "";
$database = "u358688394_aura3";


$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Function to sanitize and validate input
function sanitize_input($data, $conn)
{
    $data = htmlspecialchars($data);
    $data = $conn->real_escape_string($data);
    return $data;
}



// Check if an ID is present in the request parameters
if (isset($_GET['id'])) {
    $id = sanitize_input($_GET['id'], $conn);

    // Fetch data from the database using the ID
    $fetchDataQuery = $conn->prepare("SELECT * FROM transaction_data WHERE id = ?");
    $fetchDataQuery->bind_param("s", $id);
    $fetchDataQuery->execute();
    $result = $fetchDataQuery->get_result();
    $data = $result->fetch_assoc();

    if ($data) {
        // Generate PDF
        // $ticketPdfPath = generatePDF($data['ticket_number'], $data['customer_name'], $data['txn_date']);

        // Send email with PDF attachment
        $ticketLink = "https://krishnagaushalalottery.com/waiting_for_ticket.php?client_txn_id={$data['client_txn_id']}&txn_id={$data['order_id']}";
        $to = $data['customer_email'];
        $subject = "Ticket Information for Your Purchase ";
        $message = "Thank you for your purchase! Please find your ticket details attached.\n\nTicket Link: $ticketLink";
        $body = "$message\r\n\r\n";
        $headers = "From: ticket@krishnagaushalalottery.com";

        // Send email with attachment
        $mailResult = mail($to, $subject, $body, $headers);

        if ($mailResult) {
            $response = [
                'status' => 'success'
            ];
            echo json_encode($response);
        } else {
            $response = [
                'status' => 'error',
                'message' => 'Error occurred while sending email with ticket information.'
            ];
            echo json_encode($response);
        }

        die();

        // Delete the generated PDF file after sending the email
        // unlink($ticketPdfPath);
    } else {
        echo "Invalid ID.";
    }

    // Close the fetch data statement
    $fetchDataQuery->close();
} else {

    // Sanitize and validate form data
    $amount = sanitize_input($_POST['amount'], $conn);
    $clientTxnId = sanitize_input($_POST['client_txn_id'], $conn);
    $createdAt = sanitize_input($_POST['createdAt'], $conn);
    $customerEmail = sanitize_input($_POST['customer_email'], $conn);
    $customerMobile = sanitize_input($_POST['customer_mobile'], $conn);
    $customerName = sanitize_input($_POST['customer_name'], $conn);
    $customerVpa = sanitize_input($_POST['customer_vpa'], $conn);
    $orderId = sanitize_input($_POST['id'], $conn);
    $pInfo = sanitize_input($_POST['p_info'], $conn);
    $redirectUrl = sanitize_input($_POST['redirect_url'], $conn);
    $remark = sanitize_input($_POST['remark'], $conn);
    $status = sanitize_input($_POST['status'], $conn);
    $txnDate = sanitize_input($_POST['txnAt'], $conn);
    $udf1 = sanitize_input($_POST['udf1'], $conn);
    $udf2 = sanitize_input($_POST['udf2'], $conn);
    $udf3 = sanitize_input($_POST['udf3'], $conn);
    $upiTxnId = sanitize_input($_POST['upi_txn_id'], $conn);

    
    date_default_timezone_set('Asia/Kolkata');

    // // Get current date and time
    // $paymentTime = date("Y-m-d H:i:s");




    // Prepare and execute SQL query to save POST data into a table
    $stmt = $conn->prepare("INSERT INTO transaction_data (amount, client_txn_id, created_at, customer_email, customer_mobile, customer_name, customer_vpa, order_id, p_info, redirect_url, remark, status, txn_date, udf1, udf2, udf3, upi_txn_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssssssssssssss", $amount, $clientTxnId, $createdAt, $customerEmail, $customerMobile, $customerName, $customerVpa, $orderId, $pInfo, $redirectUrl, $remark, $status, $txnDate, $udf1, $udf2, $udf3, $upiTxnId);


    if ($pInfo === 'Donation') {
        // Update donations_data table if p_info is Donation
        $donationUpdateQuery = $conn->prepare("UPDATE donations_data SET status = ? WHERE client_txn_id = ?");
        $donationUpdateQuery->bind_param("ss", $status, $clientTxnId);
        $donationUpdateQuery->execute();
        echo 'success';
        die();
    } else {
        // Update user_data status to 'success' 
        $updateStatusQuery = $conn->prepare("UPDATE user_data SET status = ? WHERE client_txn_id = ?");
        $updateStatusQuery->bind_param("ss",  $status, $clientTxnId);
    }





    // Fetch ticket number from user_data table using client_txn_id
    $ticketNumberQuery = $conn->prepare("SELECT ticket_number FROM user_data WHERE client_txn_id = ?");
    $ticketNumberQuery->bind_param("s", $clientTxnId);
    $ticketNumberQuery->execute();
    $ticketNumberResult = $ticketNumberQuery->get_result();
    $ticketNumberRow = $ticketNumberResult->fetch_assoc();
    $ticketNumber = $ticketNumberRow['ticket_number'];


    if ($stmt->execute() && $updateStatusQuery->execute()) {
        // Generate PDF
        // $ticketPdfPath = generatePDF($ticketNumber, $customerName, $txnDate);

        // Send email with PDF attachment
        $ticketLink = "https://krishnagaushalalottery.com/waiting_for_ticket.php?client_txn_id=$clientTxnId&txn_id=$orderId";
        $to = $customerEmail;
        $subject = "Ticket Information for Your Purchase ";
        $message = "Thank you for your purchase! Please find your ticket details attached.\n\nTicket Link: $ticketLink";
        $headers = "From: ticket@krishnagaushalalottery.com";


        // Prepare attachment
        // $fileContent = file_get_contents($ticketPdfPath);
        // $attachment = chunk_split(base64_encode($fileContent));
        // $filename = "ticket.pdf";
        $boundary = md5(date('r', time()));

        $headers .= "\r\nMIME-Version: 1.0\r\n";
        $headers .= "Content-Type: multipart/mixed; boundary=\"_1_$boundary\"";

        $body = "--_1_$boundary\r\n";
        $body .= "Content-Type: text/plain; charset=\"utf-8\"\r\n";
        $body .= "Content-Transfer-Encoding: 8bit\r\n\r\n";
        $body .= "$message\r\n\r\n";
        $body .= "--_1_$boundary\r\n";
        // $body .= "Content-Type: application/octet-stream; name=\"$filename\"\r\n";
        $body .= "Content-Transfer-Encoding: base64\r\n";
        $body .= "Content-Disposition: attachment\r\n\r\n";
        // $body .= $attachment . "\r\n";
        $body .= "--_1_$boundary--";

        // Send email with attachment
        $mailResult = mail($to, $subject, $body, $headers);

        // Check if mail was sent successfully
        if ($mailResult) {
            echo "Transaction details saved successfully. An email with ticket information has been sent to your email address.";
        } else {
            echo "Error occurred while sending email with ticket information.";
        }

        // Delete the generated PDF file after sending the email
        // unlink($ticketPdfPath);
    } else {
        // Error occurred while saving transaction details
        echo "Error occurred while saving transaction details: " . $stmt->error;
    }
}
// Close the statements and connection
$stmt->close();
$updateStatusQuery->close();
$conn->close();
?>
