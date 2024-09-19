<?php 
include "components/phpComponents/phpcomponents.php";
include "./config/config.php"; // Ensure the database connection $conn is in this file

// Check if session variables exist
if (!isset($_SESSION['member_user_id']) || !isset($_SESSION['email_id'])) {
    exit();
}

if ($connection === null || !$connection->ping()) {
    die("Database connection is not properly initialized or not connected.");
}

$member_user_id = $_SESSION['member_user_id'];
$email_id = $_SESSION['email_id'];
$member_name = $_SESSION['member_name'];


// Fetch existing bank details
$query = "SELECT account_holder_name, bank_name, ifsc_code, account_number, upi_id
          FROM tbl_bankdetails 
          WHERE member_user_id = ?";
$stmt = mysqli_prepare($connection, $query);
mysqli_stmt_bind_param($stmt, "s", $member_user_id);
mysqli_stmt_execute($stmt);
mysqli_stmt_bind_result($stmt, $account_holder_name, $bank_name, $ifsc_code, $account_number, $upi_id);
mysqli_stmt_fetch($stmt);
mysqli_stmt_close($stmt);

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $new_account_holder_name = $_POST['account_holder_name'];
    $new_bank_name = $_POST['bank_name'];
    $new_ifsc_code = $_POST['ifsc_code'];
    $new_account_number = $_POST['account_number'];
    $upi_id = $_POST['upi_id'];

    // Check if record exists
    $query = "SELECT COUNT(*) FROM tbl_bankdetails WHERE member_user_id = ?";
    $stmt = mysqli_prepare($connection, $query);
    mysqli_stmt_bind_param($stmt, "s", $member_user_id);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $count);
    mysqli_stmt_fetch($stmt);
    mysqli_stmt_close($stmt);

    if ($count > 0) {
        // Update existing record
        $query = "UPDATE tbl_bankdetails 
                  SET account_holder_name = ?, bank_name = ?, ifsc_code = ?, account_number = ? , upi_id=?
                  WHERE member_user_id = ?";
        $stmt = mysqli_prepare($connection, $query);
        mysqli_stmt_bind_param($stmt, "ssssss", $new_account_holder_name, $new_bank_name, $new_ifsc_code, $new_account_number,$upi_id, $member_user_id);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    } else {
        // Insert new record
        $query = "INSERT INTO tbl_bankdetails (member_user_id, account_holder_name, bank_name, ifsc_code, account_number, upi_id) 
                  VALUES (?, ?, ?, ?, ? ,?)";
        $stmt = mysqli_prepare($connection, $query);
        mysqli_stmt_bind_param($stmt, "ssssss", $member_user_id, $new_account_holder_name, $new_bank_name, $new_ifsc_code, $new_account_number,$upi_id);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }

    echo json_encode(['success' => true]); // Return success response
    exit();
}

// Fetching from database and ensuring that variables are never null
$account_holder_name = $account_holder_name ?? '';
$bank_name = $bank_name ?? '';
$ifsc_code = $ifsc_code ?? '';
$account_number = $account_number ?? '';
$upi_id = $upi_id ?? '';
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
    include "components/cssComponents/profile-notf-css.php"
    ?>

    <title>Profile- Himallya RO Services</title>

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
    </script>

     <script>
        function submitForm() {
            const form = document.getElementById('bankDetailsForm');
            const formData = new FormData(form);

            fetch('profile-notifications', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert('Bank details updated successfully');
                     // Close the modal
            const modal = document.querySelector("#profileContactEditModal");
            const bootstrapModal = bootstrap.Modal.getInstance(modal);
            bootstrapModal.hide();

            // Refresh the page after a short delay
            setTimeout(() => {
                location.reload();
            }, 500); // Adjust the delay as needed
                } else {
                    alert('Failed to update bank details');
                }
            })
            .catch(error => {
                console.error('Error:', error);
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
            $title1="Profile";
            $title2="Bank Details";
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

                            <a href="https://hypeople-studio.gitbook.io/yoda/change-log" target="_blank" class="d-flex">
                                <span class="hp-sidebar-hidden hp-caption fw-normal hp-text-color-primary-1"></span>
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
                                        <a href="https://hypeople-studio.gitbook.io/yoda/change-log" target="_blank" class="d-flex">
                                            <span class="hp-sidebar-hidden hp-caption fw-normal hp-text-color-primary-1"></span>
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
                        <div class="row justify-content-between gy-32">
                           

                        </div>
                    </div>

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
                                        <div class="hp-menu-header-btn mb-12 text-end">
                                            
                                        </div>

                                        <div class="d-flex justify-content-center">
                                            <div class="d-inline-block position-relative">
                                                <div class="avatar-item d-flex align-items-center justify-content-center rounded-circle" style="width: 80px; height: 80px;">
                                                    <img src="app-assets/img/memoji/memoji-1.png">
                                                </div>

                                               
                                            </div>
                                        </div>

                                        <h3 class="mt-24 mb-4"><?php echo ucwords($member_name); ?></h3>
                                    </div>
                                </div>

                                <div class="hp-profile-menu-body w-100 text-start mt-48 mt-lg-0">
                                    <ul class="me-n1 mx-lg-n12">
                                        <li class="mt-4 mb-16">
                                            <a href="profile-information" class="position-relative text-black-80 hp-text-color-dark-30 hp-hover-text-color-primary-1 hp-hover-text-color-dark-0 py-12 px-24 d-flex align-items-center">
                                                <i class="iconly-Curved-User me-16"></i>
                                                <span>Personal Information</span>

                                                <span class="hp-menu-item-line position-absolute opacity-0 h-100 top-0 end-0 bg-primary hp-bg-dark-0" style="width: 2px;"></span>
                                            </a>
                                        </li>

                                        <li class="mt-4 mb-16">
                                            <a href="profile-notifications" class="active position-relative text-black-80 hp-text-color-dark-30 hp-hover-text-color-primary-1 hp-hover-text-color-dark-0 py-12 px-24 d-flex align-items-center">
                                                <i class="iconly-Curved-Notification me-16"></i>
                                                <span>Bank Details</span>

                                                <span class="hp-menu-item-line position-absolute opacity-0 h-100 top-0 end-0 bg-primary hp-bg-dark-0" style="width: 2px;"></span>
                                            </a>
                                        </li>

                                       


                                        <li class="mt-4 mb-16">
                                            <a href="profile-password" class="position-relative text-black-80 hp-text-color-dark-30 hp-hover-text-color-primary-1 hp-hover-text-color-dark-0 py-12 px-24 d-flex align-items-center">
                                                <i class="iconly-Curved-Password me-16"></i>
                                                <span>Password Change</span>

                                                <span class="hp-menu-item-line position-absolute opacity-0 h-100 top-0 end-0 bg-primary hp-bg-dark-0" style="width: 2px;"></span>
                                            </a>
                                        </li>

                                    </ul>
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











                                    <div class="col hp-profile-menu py-24" style="flex: 0 0 240px;">
                                        <div class="w-100">
                                            <div class="hp-profile-menu-header mt-16 mt-lg-0 text-center">
                                                <div class="hp-menu-header-btn mb-12 text-end">
                                                   
                                                </div>

                                                <div class="d-flex justify-content-center">
                                                    <div class="d-inline-block position-relative">
                                                        <div class="avatar-item d-flex align-items-center justify-content-center rounded-circle" style="width: 80px; height: 80px;">
                                                            <img src="app-assets/img/memoji/memoji-1.png">
                                                        </div>

                                                       
                                                    </div>

                                                </div>
                                                
                                                <h3 class="mt-24 mb-4"><?php echo ucwords($member_name);?></h3>
                                            </div>
                                        </div>

                                        <div class="hp-profile-menu-body w-100 text-start mt-48 mt-lg-0">
                                            <ul class="me-n1 mx-lg-n12">
                                                <li class="mt-4 mb-16">
                                                    <a href="profile-information" class="position-relative text-black-80 hp-text-color-dark-30 hp-hover-text-color-primary-1 hp-hover-text-color-dark-0 py-12 px-24 d-flex align-items-center">
                                                        <i class="iconly-Curved-User me-16"></i>
                                                        <span>Personal Information</span>

                                                        <span class="hp-menu-item-line position-absolute opacity-0 h-100 top-0 end-0 bg-primary hp-bg-dark-0" style="width: 2px;"></span>
                                                    </a>
                                                </li>

                                                <li class="mt-4 mb-16">
                                                    <a href="profile-notifications" class="active position-relative text-black-80 hp-text-color-dark-30 hp-hover-text-color-primary-1 hp-hover-text-color-dark-0 py-12 px-24 d-flex align-items-center">
                                                        <i class="iconly-Curved-Notification me-16"></i>
                                                        <span>Bank Details</span>

                                                        <span class="hp-menu-item-line position-absolute opacity-0 h-100 top-0 end-0 bg-primary hp-bg-dark-0" style="width: 2px;"></span>
                                                    </a>
                                                </li>

                                                <li class="mt-4 mb-16">
                                                    <a href="profile-activity" class="position-relative text-black-80 hp-text-color-dark-30 hp-hover-text-color-primary-1 hp-hover-text-color-dark-0 py-12 px-24 d-flex align-items-center">
                                                        <i class="iconly-Curved-Activity me-16"></i>
                                                        <span>Update Address</span>

                                                        <span class="hp-menu-item-line position-absolute opacity-0 h-100 top-0 end-0 bg-primary hp-bg-dark-0" style="width: 2px;"></span>
                                                    </a>
                                                </li>

                                               

                                                <li class="mt-4 mb-16">
                                                    <a href="profile-password" class="position-relative text-black-80 hp-text-color-dark-30 hp-hover-text-color-primary-1 hp-hover-text-color-dark-0 py-12 px-24 d-flex align-items-center">
                                                        <i class="iconly-Curved-Password me-16"></i>
                                                        <span>Password Change</span>

                                                        <span class="hp-menu-item-line position-absolute opacity-0 h-100 top-0 end-0 bg-primary hp-bg-dark-0" style="width: 2px;"></span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>

                                        <div class="hp-profile-menu-footer">
                                            <img src="app-assets/img/pages/profile/menu-img.svg" alt="Profile Image">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col ps-16 ps-sm-32 py-24 py-sm-32 overflow-hidden">
                                <div class="row">
                                    <div class="col-12">
                                        <h2>Update Your Bank Details</h2>
                                        <p class="hp-p1-body mb-0">Keep your bank information current to ensure smooth transactions. Visit your account settings to update your bank details securely.

                                        </p>
                                    </div>

                                    <div class="divider border-black-40 hp-border-color-dark-80"></div>

                                    <div class="col-12">
                                        <div class="row align-items-center justify-content-between">
                                            <div class="col-12 col-md-6">
                                                <h3>Bank Details</h3>
                                            </div>

                                            <div class="col-12 col-md-6 hp-profile-action-btn text-end">
                                                <button class="btn btn-ghost btn-primary" data-bs-toggle="modal" data-bs-target="#profileContactEditModal">Edit</button>
                                            </div>

                                            <div class="col-12 hp-profile-content-list mt-8 pb-0 pb-sm-20">
                                                <ul>
                                                    <li>
                                                        <span class="hp-p1-body">ACCOUNT HOLDER'S NAME:*</span>
                                                        <span class="mt-0 mt-sm-4 hp-p1-body text-black-100 hp-text-color-dark-0"><?php echo $account_holder_name?></span>
                                                    </li>
                                                    <li class="mt-18">
                                                        <span class="hp-p1-body">BANK NAME:*</span>
                                                        <span class="mt-0 mt-sm-4 hp-p1-body text-black-100 hp-text-color-dark-0"><?php echo $bank_name?></span>
                                                    </li>
                                                    <li class="mt-18">
                                                        <span class="hp-p1-body">IFSC CODE</span>
                                                        <span class="mt-0 mt-sm-4 hp-p1-body text-black-100 hp-text-color-dark-0"><?php echo $ifsc_code?></span>
                                                    </li>
                                                    <li class="mt-18">
                                                        <span class="hp-p1-body">ACCOUNT NUMBER</span>
                                                        <span class="mt-0 mt-sm-4 hp-p1-body text-black-100 hp-text-color-dark-0"><?php echo $account_number?></span>
                                                    </li>
                                                    <li class="mt-18">
                                                        <span class="hp-p1-body">UPI ID</span>
                                                        <span class="mt-0 mt-sm-4 hp-p1-body text-black-100 hp-text-color-dark-0"><?php echo $upi_id?></span>
                                                    </li>
                                                  
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="profileContactEditModal" tabindex="-1" aria-labelledby="profileContactEditModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" style="max-width: 416px;">
                    <div class="modal-content">
                        <div class="modal-header py-16">
                            <h5 class="modal-title" id="profileContactEditModalLabel">Edit Bank Details</h5>
                            <button type="button" class="btn-close hp-bg-none d-flex align-items-center justify-content-center" data-bs-dismiss="modal" aria-label="Close">
                                <i class="ri-close-line hp-text-color-dark-0 lh-1" style="font-size: 24px;"></i>
                            </button>
                        </div>

                        <div class="divider my-0"></div>

                        <div class="modal-body py-48">
                            <form id="bankDetailsForm">
                            <div class="row g-24">
                <div class="col-12">
                    <label for="accountHolderName" class="form-label">ACCOUNT HOLDER'S NAME</label>
                    <input type="text" class="form-control" id="accountHolderName" name="account_holder_name" value="<?php echo htmlspecialchars($account_holder_name, ENT_QUOTES, 'UTF-8'); ?>">
                </div>
                <div class="col-12">
                    <label for="bankName" class="form-label">BANK NAME</label>
                    <input type="text" class="form-control" id="bankName" name="bank_name" value="<?php echo htmlspecialchars($bank_name, ENT_QUOTES, 'UTF-8'); ?>">
                </div>
                <div class="col-12">
                    <label for="ifscCode" class="form-label">IFSC CODE</label>
                    <input type="text" class="form-control" id="ifscCode" name="ifsc_code" value="<?php echo htmlspecialchars($ifsc_code, ENT_QUOTES, 'UTF-8'); ?>">
                </div>
                <div class="col-12">
                    <label for="accountNumber" class="form-label">Account Number</label>
                    <input type="text" class="form-control" id="accountNumber" name="account_number" value="<?php echo htmlspecialchars($account_number, ENT_QUOTES, 'UTF-8'); ?>">
                </div>
                <div class="col-12">
                    <label for="accountNumber" class="form-label">UPI Id</label>
                    <input type="text" class="form-control" id="upiid" name="upi_id" value="<?php echo htmlspecialchars($upi_id, ENT_QUOTES, 'UTF-8'); ?>">
                </div>
                <div class="col-6">
                    <button type="button" class="btn btn-primary w-100" onclick="submitForm()">Update</button>
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

            <?php
            include "components/footer.php";
            ?> 
        </div>
    </main>

    <?php
            include "components/appTheme.php";
            ?> 

    <a href="https://themeforest.net/item/yoda-react-admin-template-react-hooks-redux-toolkit-ant-design/33791048" target="_blank" class="hp-buy-now-btn position-fixed">
        
    </a>

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
    include "components/jsComponents/profile-notf-js.php"
    ?>
</body>

</html>