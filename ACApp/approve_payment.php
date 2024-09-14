<?php
include '../config/config.php'; // Your DB connection

// Check if the required parameters are set
if (isset($_POST['action']) && isset($_POST['id'])) {
    $action = $_POST['action'];
    $id = $_POST['id'];

    if ($connection === null || !$connection->ping()) {
        echo json_encode(['status' => false, 'message' => 'Database connection is not properly initialized or not connected.']);
        exit;
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
                echo json_encode([
                    'status' => true,
                    'action' => 'approve',
                    'member_user_id' => $member_user_id,
                    'email_id' => $email_id,
                    'amount' => $amount
                ]);
            } else {
                echo json_encode(['status' => false, 'message' => mysqli_error($connection)]);
            }
        } else {
            echo json_encode(['status' => false, 'message' => 'Record not found']);
        }
    } else if ($action === 'deny') {
        $status = 'denied';

        // Update the status in the database
        $query = "UPDATE tbl_pendingpayment SET status = '$status' WHERE id = '$id'";
        if (mysqli_query($connection, $query)) {
            echo json_encode(['status' => true, 'action' => 'deny']);
        } else {
            echo json_encode(['status' => false, 'message' => mysqli_error($connection)]);
        }
    }
} else {
    echo json_encode(['status' => false, 'message' => 'Invalid request']);
}
?>
<script>
function handleAction(action, id) {
    fetch('process_request', {
        method: 'POST',
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
        body: new URLSearchParams({ action: action, id: id })
    })
    .then(response => response.json())
    .then(data => {
        if (data.status) {
            if (action === 'approve') {
                payThroughGateway(data.member_user_id, data.email_id, data.amount);
            } else {
                window.location.href = 'InvestmentSummaryPending?success=' + action;
            }
        } else {
            alert("Error: " + data.message);
            window.location.href = 'InvestmentSummaryPending?error=' + encodeURIComponent(data.message);
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert("An error occurred.");
    });
}

function payThroughGateway(member_user_id, email_id, amount) {
    let formData = new FormData();
    formData.append('member_user_id', member_user_id);
    formData.append('email_id', email_id);
    formData.append('amount', amount);

    fetch('process?simulate_payment=true', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.status) {
            alert("Payment processed successfully!");
            if (data.data.payment_url) {
                window.location.href = data.data.payment_url;
            } else {
                window.location.href = 'InvestmentSummaryPending?success=approve';
            }
        } else {
            alert("Payment failed. Please try again.");
        }
    })
    .catch(error => {
        console.error('Error during payment processing:', error);
        alert("Error occurred during payment processing.");
    });
}
</script>
