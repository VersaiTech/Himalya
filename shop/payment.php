<?php
// Start the session
session_start();
if (!isset($_SESSION['member_user_id']) || !isset($_SESSION['email_id'])) {
    exit();
  }
  $member_user_id = $_SESSION['member_user_id'];

?>

<html>
<head>
    <title>Payment Page</title>
</head>
<body>
    <h1>Payment Page</h1>
    <form action="" method="post">
        <label for="member_user_id">Member ID:</label>
        <input type="text" id="member_user_id" name="member_user_id" value="<?php echo $member_user_id; ?>" readonly><br><br>
        <label for="amount">Amount:</label>
        <input type="number" id="amount" name="amount" required><br><br>
        <input type="submit" name="buy_now" value="Buy Now">
    </form>

<?php
// Establish database connection
$servername = "localhost";
$username = "root";
$password = "";
$database = "u358688394_aura3";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// payment processing script
if (isset($_POST['buy_now'])) {
    $member_user_id = $_POST['member_user_id'];
    $amount = $_POST['amount'];

    // Simulate payment processing (e.g., using a dummy payment gateway)
    // For demonstration purposes, we'll assume the payment is always successful
    $payment_successful = true;

    if ($payment_successful) {
        // Update member status to 1
        updateMemberStatus($conn, $member_user_id, 1);
        echo "Payment successful! Member status updated.";
    } else {
        echo "Payment failed. Please try again.";
    }
}

// Function to update member status
function updateMemberStatus($conn, $member_user_id, $status) {
    // Update member status
    $update_query = "UPDATE tbl_memberreg SET topUp_status = ? WHERE member_user_id = ?";
    $stmt = $conn->prepare($update_query);
    $stmt->bind_param("ii", $status, $member_user_id);
    $stmt->execute();
    $stmt->close();
}

// Close database connection
$conn->close();
?>


</body>
</html>