

  <?php
include '../config/config.php'; // Your DB connection

// Check if the required parameters are set
if (isset($_GET['action']) && isset($_GET['id'])) {
    $action = $_GET['action'];
    $id = $_GET['id'];


    if ($connection === null || !$connection->ping()) {
        die("Database connection is not properly initialized or not connected.");
    }  

    if ($action === 'approve') {
        $status = 'approved';


        // ***********
        // Fetch user email and amount (you'll need these to simulate the payment)
        $query = "SELECT email_id, amount FROM tbl_pendingpayment WHERE member_user_id = '$member_user_id'";
        $result = mysqli_query($connection, $query);
        if ($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $email_id = $row['email_id'];
            $amount = $row['amount'];

            // Update the status in the database
            $updateQuery = "UPDATE tbl_pendingpayment SET status = '$status' WHERE member_user_id = '$member_user_id'";
            if (mysqli_query($connection, $updateQuery)) {
                
                // Call the payment processing script using cURL
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, 'process.php?simulate_payment=true');
                curl_setopt($ch, CURLOPT_POST, 1);
                curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query([
                    'member_user_id' => $member_user_id,
                    'email_id' => $email_id,
                    'amount' => $amount,
                ]));
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                $response = curl_exec($ch);
                curl_close($ch);

                // Redirect back to the pending payments page with success message
                header('Location: InvestmentSummaryPending?success=' . $action);
            } else {
                // Redirect back to the pending payments page with error message
                header('Location: InvestmentSummaryPending?error=' . mysqli_error($connection));
            }
        } else {
            // User or payment record not found
            header('Location: InvestmentSummaryPending?error=Record not found');
        }
        // ************
    } else if ($action === 'deny') {
        $status = 'denied';
    }


    // Update the status in the database
    $query = "UPDATE tbl_pendingpayment SET status = '$status' WHERE id = '$id'";
    if (mysqli_query($connection, $query)) {
        // Redirect back to the pending payments page with success message
        header('Location: InvestmentSummaryPending?success=' . $action);
    } else {
        // Redirect back to the pending payments page with error message
        header('Location: InvestmentSummaryPending?error=' . mysqli_error($connection));
    }
}
