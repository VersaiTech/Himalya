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

        // Fetch user email and amount
        $query = "SELECT email_id, amount, member_user_id FROM tbl_pendingpayment WHERE id = '$id'";
        $result = mysqli_query($connection, $query);
        if ($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $email_id = $row['email_id'];
            $amount = $row['amount'];
            $member_user_id = $row['member_user_id'];

            // Update the status in the database
            $updateQuery = "UPDATE tbl_pendingpayment SET status = '$status' WHERE id = '$id'";
            if (mysqli_query($connection, $updateQuery)) {
                // Output JavaScript to call the payThroughGateway function
                echo "<script>
                    document.addEventListener('DOMContentLoaded', function() {
                        payThroughGateway('$member_user_id', '$email_id', '$amount');
                    });
                </script>";
            } else {
                echo "<script>window.location.href = 'InvestmentSummaryPending?error=" . mysqli_error($connection) . "';</script>";
            }
        } else {
            echo "<script>window.location.href = 'InvestmentSummaryPending?error=Record not found';</script>";
        }
    } else if ($action === 'deny') {
        $status = 'denied';

        // Update the status in the database
        $query = "UPDATE tbl_pendingpayment SET status = '$status' WHERE id = '$id'";
        if (mysqli_query($connection, $query)) {
            // Redirect back to the pending payments page with success message
            header('Location: InvestmentSummaryPending?error=' . $action);
        } else {
            // Redirect back to the pending payments page with error message
            header('Location: InvestmentSummaryPending?error=' . mysqli_error($connection));
        }
    }
}
?>
<!-- Ensure the script tag is placed after the rest of the DOM -->
<!-- <script>
function payThroughGateway(member_user_id, email_id, amount) {
    console.log("Attempting payment with data:", {
        member_user_id,
        email_id,
        amount
    });

    let formData = new FormData();
    formData.append('member_user_id', member_user_id);
    formData.append('email_id', email_id);
    formData.append('amount', amount);

    fetch('/Himallya-MLM/shop/process?simulate_payment=true', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        console.log("Payment response data:", data);
        if (data.status) {
            alert("Payment processed successfully!");
                // Redirect after payment is successfully processed
                window.location.href = 'InvestmentSummaryPending?success=approve';
        } else {
            alert("Payment failed. Please try again.");
            // Redirect back to show the failure in the UI
            window.location.href = 'InvestmentSummaryPending?error=payment_failed';
        }
    })
    .catch(error => {
        console.error('Error during payment processing:', error);
        alert("Error occurred during payment processing.");
        // Redirect back to show the error in the UI
        window.location.href = 'InvestmentSummaryPending?error=fetch_error';
    });
}
</script> -->

<script>
function payThroughGateway(member_user_id, email_id, amount) {
    console.log("Attempting payment with data:", {
        member_user_id,
        email_id,
        amount
    });

    let formData = new FormData();
    formData.append('member_user_id', member_user_id);
    formData.append('email_id', email_id);
    formData.append('amount', amount);

    fetch('/Himallya-MLM/shop/process?simulate_payment=true', {
        method: 'POST',
        body: formData
    })
    .then(response => {
        console.log("Response status:", response.status);
        console.log("Response headers:", [...response.headers.entries()]);

        if (response.status === 200) {
            return response.text(); // Get raw response text
        } else {
            throw new Error('Unexpected response status');
        }
    })
    .then(text => {
        console.log("Raw response text:", text);
        
        // Extract JSON from the response text
        const jsonStart = text.indexOf('{');
        const jsonEnd = text.lastIndexOf('}') + 1;

        if (jsonStart !== -1 && jsonEnd !== -1) {
            const jsonString = text.substring(jsonStart, jsonEnd);
            try {
                const data = JSON.parse(jsonString); // Parse the extracted JSON
                console.log("Parsed JSON data:", data);

                if (data.status) {
                    window.location.href = 'InvestmentSummaryPending?success=approve';
                } else {
                    window.location.href = 'InvestmentSummaryPending?error=payment_failed';
                }
            } catch (e) {
                console.error('Error parsing JSON:', e);
                alert("Error occurred during payment processing.");
                window.location.href = 'InvestmentSummaryPending?error=json_parse_error';
            }
        } else {
            console.error('No JSON data found in response');
            alert("Error occurred during payment processing.");
            window.location.href = 'InvestmentSummaryPending?error=no_json_data';
        }
    })
    .catch(error => {
        console.error('Error during payment processing:', error);
        alert("Error occurred during payment processing.");
        window.location.href = 'InvestmentSummaryPending?error=fetch_error';
    });
}
</script>



