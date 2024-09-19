<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
include "components/phpComponents/phpcomponents.php"; // Ensure this file includes session_start()
include "./config/config.php"; // Ensure the database connection $conn is in this file

// Check if session variables exist
if (!isset($_SESSION['member_user_id']) || !isset($_SESSION['email_id'])) {
    exit();
}

if ($connection === null || !$connection->ping()) {
    die("Database connection is not properly initialized or not connected.");
}

// Get session data
$member_user_id = $_SESSION['member_user_id'];
$email_id = $_SESSION['email_id'];
$member_name = $_SESSION['member_name'];


// $query = "SELECT ref_amount FROM tbl_memberreg WHERE member_user_id = ?";
// $stmt = $connection->prepare($query);
// $stmt->bind_param("s", $member_user_id);
// $stmt->execute();
// $stmt->bind_result($ref_amount);
// $stmt->fetch();
// $stmt->close();

// Assuming $member_user_id is already set and you have a database connection
$query = "SELECT topUp_status FROM tbl_memberreg WHERE member_user_id = ?";
$stmt = mysqli_prepare($connection, $query);
mysqli_stmt_bind_param($stmt, "s", $member_user_id);
mysqli_stmt_execute($stmt);
mysqli_stmt_bind_result($stmt, $topUp_status);
mysqli_stmt_fetch($stmt);
mysqli_stmt_close($stmt);

// Assuming $connection is your active database connection and $member_user_id is set
$query = "SELECT ref_amount FROM tbl_memberreg WHERE member_user_id = ?";

if ($stmt = mysqli_prepare($connection, $query)) {
    mysqli_stmt_bind_param($stmt, "s", $member_user_id);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $ref_amount);
    mysqli_stmt_fetch($stmt);
    mysqli_stmt_close($stmt);
} else {
    // Handle query preparation error
    echo "Failed to prepare the SQL statement: " . mysqli_error($connection);
}

?>



<!DOCTYPE html>
<html dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <meta name="author" content="Hypeople">
    <meta name="description" content="Responsive, Highly Customizable Dashboard Template">

    <?php
    include "components/cssComponents/profile-css.php";
    ?>

    <title>Profile- Himallya RO Services</title>
    <script>
        // Pass PHP variable to JavaScript
        var ref_amount = <?php echo json_encode($ref_amount); ?>;
    </script>

    <script>
        ! function(t, h, e, j, s, n) {
            t.hj = t.hj || function() {
                    (t.hj.q = t.hj.q || []).push(arguments)
                },
                t._hjSettings = {
                    hjid: 2628580,
                    hjsv: 6
                },
                s = h.getElementsByTagName("head")[0],
                (n = h.createElement("script")).async = 1,
                n.src = "https://static.hotjar.com/c/hotjar-" + t._hjSettings.hjid + ".js?sv=" + t._hjSettings.hjsv,
                s.appendChild(n)
        }(window, document)


        function validateAmount() {
            const amountInput = document.getElementById("withdrawAmount");
            const amountValue = parseFloat(amountInput.value);
            const amountError = document.getElementById("amountError");

            if (isNaN(amountValue)) {
                // Show error if the amount is not a valid number
                amountError.textContent = "Invalid Amount";
                amountError.style.display = "block";
                amountInput.style.borderColor = "red";

                setTimeout(() => {
                    amountError.style.display = "none";
                    amountInput.style.borderColor = ""; // Reset border color
                }, 2000);
                return;
            }

            // Step 1: Check if the amount is greater than the available balance
            if (amountValue > ref_amount) {
                amountError.textContent = "Insufficient Balance";
                amountError.style.display = "block";
                amountInput.style.borderColor = "red";

                setTimeout(() => {
                    amountError.style.display = "none";
                    amountInput.style.borderColor = ""; // Reset border color
                }, 2000);
            }
            // Step 2: Check if amount is less than or equal to 1500
            else if (amountValue <= 1500) {
                amountError.textContent = "Amount must be more than 1500";
                amountError.style.display = "block";
                amountInput.style.borderColor = "red";

                setTimeout(() => {
                    amountError.style.display = "none";
                    amountInput.style.borderColor = ""; // Reset border color
                }, 2000);
            }
            // Step 3: If both checks pass, proceed with the withdrawal
            else {
                // amountError.style.display = "none";
                // amountInput.style.borderColor = ""; // Reset border color

                // // Proceed with AJAX request to submit withdrawal
                // const xhr = new XMLHttpRequest();
                // xhr.open("POST", "submit_withdrawal", true);
                // xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

                // xhr.onload = function() {
                //     console.log("Response status:", xhr.status); // Log the status
                //     console.log("Response text:", xhr.responseText); // Log the response text

                //     if (xhr.status === 200) {
                //         const response = JSON.parse(xhr.responseText);
                //         if (response.success) {
                //             alert("Withdrawal Request Submitted. New Balance: " + response.new_balance);
                //             console.log("Response status:", xhr.status); // Log the status
                //             console.log("Response text:", xhr.responseText); 
                //             const modal = document.querySelector("#profileContactEditModal");
                //             const bootstrapModal = bootstrap.Modal.getInstance(modal);
                //             bootstrapModal.hide();
                //             setTimeout(function() {
                //                 window.location.href = "withdraw-history";
                //             }, 500);
                //         } else {
                //             alert("Failed to submit withdrawal request: " + response.message);
                //         }
                //     } else {
                //         alert("Failed to submit withdrawal request, status: " + xhr.status);
                //     }
                // };

                // const requestData = `amount=${encodeURIComponent(amountValue)}`;
                // xhr.send(requestData);

                amountError.style.display = "none";
        amountInput.style.borderColor = ""; // Reset border color

        // Call submitWithdrawal function
        submitWithdrawal(amountValue);
            }
        }

        function submitWithdrawal(amountValue) {
    const requestData = new URLSearchParams();
    requestData.append('amount', amountValue);

    fetch('submit_withdrawal', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: requestData.toString(),
    })
    .then(response => {
        console.log("Response status:", response.status); // Log the status
        return response.json();
    })
    .then(data => {
        console.log("Response data:", data); // Log the JSON response

        if (data.success) {
            alert("Withdrawal Request Submitted. New Balance: " + data.new_balance);
            const modal = document.querySelector("#profileContactEditModal");
            const bootstrapModal = bootstrap.Modal.getInstance(modal);
            bootstrapModal.hide();
            setTimeout(function() {
                window.location.href = "withdraw-history";
            }, 500);
        } else {
            alert("Failed to submit withdrawal request: " + data.message);
        }
    })
    .catch(error => {
        console.error("Error occurred:", error);
        alert("Failed to submit withdrawal request due to a network error.");
    });
}

    </script>
</head>

<body>
    <main class="hp-bg-color-dark-90 d-flex min-vh-100">
        <div class="hp-sidebar hp-bg-color-black-20 hp-bg-color-dark-90 border-end border-black-40 hp-border-color-dark-80">
            <div class="hp-sidebar-container">
                <div class="hp-sidebar-header-menu">
                    <div class="row justify-content-between align-items-end mx-0">
                        <div class="w-auto px-0 hp-sidebar-collapse-button hp-sidebar-visible">
                            <div class="hp-cursor-pointer">
                                <svg width="8" height="15" viewbox="0 0 8 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M3.91102 1.73796L0.868979 4.78L0 3.91102L3.91102 0L7.82204 3.91102L6.95306 4.78L3.91102 1.73796Z" fill="#B2BEC3"></path>
                                    <path d="M3.91125 12.0433L6.95329 9.00125L7.82227 9.87023L3.91125 13.7812L0.000224113 9.87023L0.869203 9.00125L3.91125 12.0433Z" fill="#B2BEC3"></path>
                                </svg>
                            </div>
                        </div>

                        <div class="w-auto px-0">
                            <div class="hp-header-logo d-flex align-items-center">
                                <a href="overview" class="position-relative">


                                    <img class="hp-logo hp-sidebar-visible hp-dark-none" src="app-assets/img/logo/HIMLOGOSMALL.png" alt="logo">
                                    <img class="hp-logo hp-sidebar-visible hp-dark-block" src="app-assets/img/logo/HIMLOGOSMALL.png" alt="logo">
                                    <img class="hp-logo hp-sidebar-hidden hp-dir-none hp-dark-none" src="app-assets/img/logo/HIMLOGO1.png" alt="logo">
                                    <img class="hp-logo hp-sidebar-hidden hp-dir-none hp-dark-block" src="app-assets/img/logo/HIMLOGO1.png" alt="logo">
                                    <img class="hp-logo hp-sidebar-hidden hp-dir-block hp-dark-none" src="app-assets/img/logo/logo-rtl.svg" alt="logo">
                                    <img class="hp-logo hp-sidebar-hidden hp-dir-block hp-dark-block" src="app-assets/img/logo/logo-rtl-dark.svg" alt="logo">
                                </a>

                            </div>
                        </div>

                        <div class="w-auto px-0 hp-sidebar-collapse-button hp-sidebar-hidden">
                            <div class="hp-cursor-pointer mb-4">
                                <svg width="8" height="15" viewbox="0 0 8 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M3.91102 1.73796L0.868979 4.78L0 3.91102L3.91102 0L7.82204 3.91102L6.95306 4.78L3.91102 1.73796Z" fill="#B2BEC3"></path>
                                    <path d="M3.91125 12.0433L6.95329 9.00125L7.82227 9.87023L3.91125 13.7812L0.000224113 9.87023L0.869203 9.00125L3.91125 12.0433Z" fill="#B2BEC3"></path>
                                </svg>
                            </div>
                        </div>
                    </div>

                    <?php
                    include "components/sidebar.php";
                    ?>
                </div>

                <?php
                include "components/sideProfile.php";
                ?>
            </div>
        </div>

        <div class="hp-main-layout">
            <?php
            $title1 = "Overview";
            $title2 = "Withdrawal";
            include "components/header.php";
            ?>

            <div class="offcanvas offcanvas-start hp-mobile-sidebar bg-black-20 hp-bg-dark-90" tabindex="-1" id="mobileMenu" aria-labelledby="mobileMenuLabel" style="width: 256px;">
                <div class="offcanvas-header justify-content-between align-items-center ms-16 me-8 mt-16 p-0">
                    <div class="w-auto px-0">
                        <div class="hp-header-logo d-flex align-items-center">
                            <a href="overview" class="position-relative">


                                <img class="hp-logo hp-sidebar-visible hp-dark-none" src="app-assets/img/logo/HIMLOGOSMALL.png" alt="logo">
                                <img class="hp-logo hp-sidebar-visible hp-dark-block" src="app-assets/img/logo/HIMLOGOSMALL.png" alt="logo">
                                <img class="hp-logo hp-sidebar-hidden hp-dir-none hp-dark-none" src="app-assets/img/logo/HIMLOGO1.png" alt="logo">
                                <img class="hp-logo hp-sidebar-hidden hp-dir-none hp-dark-block" src="app-assets/img/logo/HIMLOGO1.png" alt="logo">
                                <img class="hp-logo hp-sidebar-hidden hp-dir-block hp-dark-none" src="app-assets/img/logo/logo-rtl.svg" alt="logo">
                                <img class="hp-logo hp-sidebar-hidden hp-dir-block hp-dark-block" src="app-assets/img/logo/logo-rtl-dark.svg" alt="logo">
                            </a>

                        </div>
                    </div>

                    <div class="w-auto px-0 hp-sidebar-collapse-button hp-sidebar-hidden" data-bs-dismiss="offcanvas" aria-label="Close">
                        <button type="button" class="btn btn-text btn-icon-only bg-transparent">
                            <i class="ri-close-fill lh-1 hp-text-color-black-80" style="font-size: 24px;"></i>
                        </button>
                    </div>
                </div>

                <div class="hp-sidebar hp-bg-color-black-20 hp-bg-color-dark-90 border-end border-black-40 hp-border-color-dark-80">
                    <div class="hp-sidebar-container">
                        <div class="hp-sidebar-header-menu">
                            <div class="row justify-content-between align-items-end mx-0">
                                <div class="w-auto px-0 hp-sidebar-collapse-button hp-sidebar-visible">
                                    <div class="hp-cursor-pointer">
                                        <svg width="8" height="15" viewbox="0 0 8 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M3.91102 1.73796L0.868979 4.78L0 3.91102L3.91102 0L7.82204 3.91102L6.95306 4.78L3.91102 1.73796Z" fill="#B2BEC3"></path>
                                            <path d="M3.91125 12.0433L6.95329 9.00125L7.82227 9.87023L3.91125 13.7812L0.000224113 9.87023L0.869203 9.00125L3.91125 12.0433Z" fill="#B2BEC3"></path>
                                        </svg>
                                    </div>
                                </div>

                                <div class="w-auto px-0">
                                    <div class="hp-header-logo d-flex align-items-center">
                                        <a href="overview" class="position-relative">


                                            <img class="hp-logo hp-sidebar-visible hp-dark-none" src="app-assets/img/logo/HIMLOGOSMALL.png" alt="logo">
                                            <img class="hp-logo hp-sidebar-visible hp-dark-block" src="app-assets/img/logo/HIMLOGOSMALL.png" alt="logo">
                                            <img class="hp-logo hp-sidebar-hidden hp-dir-none hp-dark-none" src="app-assets/img/logo/HIMLOGO1.png" alt="logo">
                                            <img class="hp-logo hp-sidebar-hidden hp-dir-none hp-dark-block" src="app-assets/img/logo/HIMLOGO1.png" alt="logo">
                                            <img class="hp-logo hp-sidebar-hidden hp-dir-block hp-dark-none" src="app-assets/img/logo/logo-rtl.svg" alt="logo">
                                            <img class="hp-logo hp-sidebar-hidden hp-dir-block hp-dark-block" src="app-assets/img/logo/logo-rtl-dark.svg" alt="logo">
                                        </a>


                                    </div>
                                </div>

                                <div class="w-auto px-0 hp-sidebar-collapse-button hp-sidebar-hidden">
                                    <div class="hp-cursor-pointer mb-4">
                                        <svg width="8" height="15" viewbox="0 0 8 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M3.91102 1.73796L0.868979 4.78L0 3.91102L3.91102 0L7.82204 3.91102L6.95306 4.78L3.91102 1.73796Z" fill="#B2BEC3"></path>
                                            <path d="M3.91125 12.0433L6.95329 9.00125L7.82227 9.87023L3.91125 13.7812L0.000224113 9.87023L0.869203 9.00125L3.91125 12.0433Z" fill="#B2BEC3"></path>
                                        </svg>
                                    </div>
                                </div>
                            </div>

                            <?php
                            include "components/sidebar.php";
                            ?>
                        </div>

                        <?php
                        include "components/sideProfile.php";
                        ?>
                    </div>
                </div>
            </div>

            <div class="hp-main-layout-content">
                <div class="row mb-32 gy-32">

                    <div class="col-12">
                        <div class="row hp-profile-mobile-menu-btn bg-black-0 hp-bg-color-dark-100 rounded py-12 px-8 px-sm-12 mb-16 mx-0">
                            <div class="d-inline-block" data-bs-toggle="offcanvas" data-bs-target="#profileMobileMenu" aria-controls="profileMobileMenu">
                                <button type="button" class="btn btn-text btn-icon-only">
                                    <i class="ri-menu-fill hp-text-color-black-80 hp-text-color-dark-30 lh-1" style="font-size: 24px;"></i>
                                </button>
                            </div>
                        </div>

                        <div class="row bg-black-0 hp-bg-color-dark-100 rounded pe-16 pe-sm-32 mx-0">











                            <div class="col hp-profile-menu py-24" style="flex: 0 0 240px;">
                                <div class="w-100">
                                    <div class="hp-profile-menu-header mt-16 mt-lg-0 text-center">
                                        <!-- <div class="hp-menu-header-btn mb-12 text-end">
                                            <div class="d-inline-block" id="profile-menu-dropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                                <button type="button" class="btn btn-text btn-icon-only">
                                                    <i class="ri-more-2-line text-black-100 hp-text-color-dark-30 lh-1" style="font-size: 24px;"></i>
                                                </button>
                                            </div>

                                            <ul class="dropdown-menu" aria-labelledby="profile-menu-dropdown">
                                                <li>
                                                    <a class="dropdown-item" href="javascript:;">Change Avatar</a>
                                                </li>
                                            </ul>
                                        </div> -->

                                        <div class="d-flex justify-content-center">
                                            <div class="d-inline-block position-relative">
                                                <div class="avatar-item d-flex align-items-center justify-content-center rounded-circle" style="width: 80px; height: 80px;">
                                                    <img src="app-assets/img/memoji/memoji-1.png">
                                                </div>

                                                <!-- <span class="position-absolute translate-middle badge rounded-pill bg-primary text-white border-none">
                                                    12
                                                </span> -->
                                            </div>
                                        </div>

                                        <h3 class="mt-24 mb-4"><?php echo ucwords($member_name); ?></h3>

                                    </div>
                                </div>


                                <div class="hp-profile-menu-footer">
                                    <img src="app-assets/img/pages/profile/menu-img.svg" alt="Profile Image">
                                </div>
                            </div>

                            <div class="hp-profile-mobile-menu offcanvas offcanvas-start" tabindex="-1" id="profileMobileMenu" aria-labelledby="profileMobileMenuLabel">
                                <div class="offcanvas-header">

                                    <div class="d-inline-block" id="profile-menu-dropdown" data-bs-dismiss="offcanvas" aria-label="Close">
                                        <button type="button" class="btn btn-text btn-icon-only">
                                            <i class="ri-close-fill text-black-80 lh-1" style="font-size: 24px;"></i>
                                        </button>
                                    </div>
                                </div>

                                <div class="offcanvas-body p-0">
                                </div>
                            </div>

                            <div class="col ps-16 ps-sm-32 py-10 py-sm-32 overflow-hidden">
                                <div class="row">
                                    <div class="col-12 col-md-8">
                                        <h2>Make Your Withdrawal Request</h2>
                                        <p class="hp-p1-body mb-0">For a successful withdrawal you must have done atleast one payment.<br /> Also ensure that the minimum withdrawal amount is RS. 1500

                                        </p>
                                    </div>

                                    <!-- <div class="divider border-black-40 hp-border-color-dark-80"></div> -->
                                    <div class="divider border-black-40 hp-border-color-dark-80"></div>

                                    <div class="col-12">
                                        <div class="row align-items-center justify-content-between">
                                            <div class="col-12 col-md-6">
                                                <h3>Account Information</h3>
                                            </div>

                                            <!-- <div class="col-12 col-md-6 hp-profile-action-btn text-end">
                                                <button class="btn btn-ghost btn-primary" data-bs-toggle="modal" data-bs-target="#profileContactEditModal">Create Request</button>
                                            </div> -->



                                            <div class="col-12 col-md-6 hp-profile-action-btn text-end">
                                                <?php if ($topUp_status == 1): ?>
                                                    <!-- If topUp_status is 1, show the Create Request button -->
                                                    <button class="btn btn-ghost btn-primary" data-bs-toggle="modal" data-bs-target="#profileContactEditModal">Create Request</button>
                                                <?php else: ?>
                                                    <!-- If topUp_status is 0, show a different modal -->
                                                    <button class="btn btn-ghost btn-primary" data-bs-toggle="modal" data-bs-target="#paymentRequiredModal">Create Request</button>
                                                <?php endif; ?>
                                            </div>

                                            <!-- Modal for "At least one payment is required for withdrawal" -->
                                            <div class="modal fade" id="paymentRequiredModal" tabindex="-1" aria-labelledby="paymentRequiredModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="paymentRequiredModalLabel">Payment Required</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            At least one payment is required for withdrawal.
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-12 hp-profile-content-list mt-8 pb-0 pb-sm-20">
                                                <ul>
                                                    <li class="mt-18">
                                                        <span class="hp-p1-body">Email Address</span>
                                                        <span class="mt-0 mt-sm-4 hp-p1-body text-black-100 hp-text-color-dark-0"><?php echo $email_id; ?></span>
                                                    </li>
                                                    <li class="mt-18">
                                                        <span class="hp-p1-body">Current Account Balance</span>
                                                        <span class="mt-0 mt-sm-4 hp-p1-body text-black-100 hp-text-color-dark-0"><?php echo $ref_amount; ?></span>
                                                    </li>

                                                </ul>
                                            </div>
                                        </div>

                                    </div>



                                    <div class="divider border-black-40 hp-border-color-dark-80"></div>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="modal fade" id="profileContactEditModal" tabindex="-1" aria-labelledby="profileContactEditModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" style="max-width: 416px;">
                        <div class="modal-content">
                            <div class="modal-header py-16">
                                <h5 class="modal-title" id="profileContactEditModalLabel">Withdrawal Request</h5>
                                <button type="button" class="btn-close hp-bg-none d-flex align-items-center justify-content-center" data-bs-dismiss="modal" aria-label="Close">
                                    <i class="ri-close-line hp-text-color-dark-0 lh-1" style="font-size: 24px;"></i>
                                </button>
                            </div>

                            <div class="divider my-0"></div>

                            <div class="modal-body py-48">
                                <form id="withdrawForm">
                                    <div class="row g-24">
                                        <div class="col-12">
                                            <label for="withdrawAmount" class="form-label">Withdraw Amount *</label>
                                            <input type="text" class="form-control" id="withdrawAmount" name="withdrawAmount" />
                                            <!-- Error message -->
                                            <div id="amountError" style="color: red; display: none;">
                                                <small class="text-danger" style="font-size: 14px;">Amount must be greater than 1500</small>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <button type="button" class="btn btn-primary w-100" onclick="validateAmount()">Withdraw</button>
                                        </div>

                                        <div class="col-6">
                                            <div class="btn w-100" data-bs-dismiss="modal">Cancel</div>
                                        </div>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>

            </div>

            <?php
            include "components/footer.php";
            ?>
        </div>
    </main>

    <?php
    include "components/appTheme.php";
    ?>



    <div class="scroll-to-top">
        <button type="button" class="btn btn-primary btn-icon-only rounded-circle hp-primary-shadow">
            <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewbox="0 0 24 24" height="16px" width="16px" xmlns="http://www.w3.org/2000/svg">
                <g>
                    <path fill="none" d="M0 0h24v24H0z"></path>
                    <path d="M13 7.828V20h-2V7.828l-5.364 5.364-1.414-1.414L12 4l7.778 7.778-1.414 1.414L13 7.828z"></path>
                </g>
            </svg>
        </button>
    </div>

    <?php
    include "components/jsComponents/profile-js.php";
    ?>
</body>

</html>