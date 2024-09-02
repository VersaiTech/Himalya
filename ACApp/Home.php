<?php
// Show PHP errors
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

date_default_timezone_set("Asia/Kolkata");
include "config/config.php";
$str = "SELECT * FROM admin";

// Ensure connection is established
if (!$connection) {
    die('Database connection failed: ' . mysqli_connect_error());
}

$res = mysqli_query($connection, $str);
// echo $res;
$row = mysqli_fetch_array($res);
$referralpercentage = $row['set_ref_percent'];
$roipercentage = $row['set_roi_percent'];
// $AdminWallet=$row['admin_wallet']
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>Home | Admin Panel</title>

    <!-- Favicons -->
    <link rel="shortcut icon" type="image/x-icon" href="../UserProfile/images/logo/logo.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.min.css">

    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">

    <!-- Animate CSS -->
    <link rel="stylesheet" href="assets/css/animate.min.css">

    <!-- Main CSS -->
    <link rel="stylesheet" href="assets/css/admin.css">
</head>

<body>
    <div class="main-wrapper">

        <!-- Header -->
        <?php include 'include/header.php'; ?>
        <!-- /Header -->

        <!-- Sidebar -->
        <?php include 'include/leftmenu.php'; ?>
        <!-- /Sidebar -->

        <div class="page-wrapper">
            <div class="content container-fluid">

                <!-- Page Header -->
                <div class="page-header">
                    <div class="row">
                        <div class="col-12">
                            <h3 class="page-title">Welcome Admin!</h3>
                        </div>
                    </div>
                </div>
                <!-- /Page Header -->
                <?php
                $str = "Select lastreward_paid from tbl_setting";
                $lastreward_paid = get_value($str);
                ?>

                <div class="row">
                    <?php
                    $str = "Select count(*) as cnt from tbl_memberreg";
                    $TotalUser = get_value($str);
                    ?>
                    <div class="col-xl-4 col-sm-6 col-12">
                        <a href="AllUserList" style="color:#333">

                            <div class="card">
                                <div class="card-body">
                                    <div class="dash-widget-header">
                                        <span class="dash-widget-icon bg-primary">
                                            <i class="far fa-user"></i>
                                        </span>
                                        <div class="dash-widget-info">
                                            <h3><?php echo $TotalUser; ?></h3>
                                            <h6 class="text-muted">Total Users</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>

                    <!-- Other dashboard widgets and data ... -->

                    <?php
                    $str = "Select count(*) as cnt from tbl_memberreg where status=1 and isblock!=1";
                    $ActiveUser = get_value($str);
                    ?>
                    <div class="col-xl-4 col-sm-6 col-12">
                        <a href="ActiveUserList" style="color:#333">
                            <div class="card">
                                <div class="card-body">
                                    <div class="dash-widget-header">
                                        <span class="dash-widget-icon bg-primary">
                                            <i class="fas fa-user-shield"></i>
                                        </span>
                                        <div class="dash-widget-info">
                                            <h3><?php echo $ActiveUser; ?></h3>
                                            <h6 class="text-muted">Active User</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>

                    <?php
                    $str = "Select count(*) as cnt from tbl_memberreg where status=0 or isblock=1";
                    $BlockedUser = get_value($str);
                    ?>
                    <div class="col-xl-4 col-sm-6 col-12">
                        <a href="BlockedUserList" style="color:#333">
                            <div class="card">
                                <div class="card-body">
                                    <div class="dash-widget-header">
                                        <span class="dash-widget-icon bg-primary">
                                            <i class="fas fa-qrcode"></i>
                                        </span>
                                        <div class="dash-widget-info">
                                            <h3><?php echo $BlockedUser; ?></h3>
                                            <h6 class="text-muted">Inactive User</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>



                    <?php
                    $str = "Select IFNULL(sum(current_investment),0) as current_investment from tbl_memberreg";
                    $current_investment = get_value($str);
                    ?>
                    <div class="col-xl-4 col-sm-6 col-12">
                        <a href="InvestmentSummary" style="color:#333" target="_blank">
                            <div class="card">
                                <div class="card-body">
                                    <div class="dash-widget-header">
                                        <span class="dash-widget-icon bg-primary">
                                            <i class="fas fa-qrcode"></i>
                                        </span>
                                        <div class="dash-widget-info">
                                            <h3><?php echo $current_investment; ?> $</h3>
                                            <h6 class="text-muted">Total Investment USD</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>


                    <?php
                    $str = "Select IFNULL(sum(topup_amount),0) as topup_amount from tbl_memberreg";
                    $topup_amount = get_value($str);
                    ?>
                    <div class="col-xl-4 col-sm-6 col-12">
                        <a href="UserPackage" style="color:#333" target="_blank">
                            <div class="card">
                                <div class="card-body">
                                    <div class="dash-widget-header">
                                        <span class="dash-widget-icon bg-primary">
                                            <i class="fas fa-user-shield"></i>
                                        </span>
                                        <div class="dash-widget-info">
                                            <h3><?php echo $topup_amount; ?></h3>
                                            <h6 class="text-muted">Total Packages Buy</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>

                    <?php
                    $PendingWithdraw = 0;
                    $str = "Select IFNULL(sum(net_amt),0) as net_amt from tbl_income_withdrawal where status=0";
                    $PendingWithdraw = get_value($str);
                    ?>
                    <div class="col-xl-4 col-sm-6 col-12">
                        <a href="PendingWithdrawRequest" style="color:#333" target="_blank">
                            <div class="card">
                                <div class="card-body">
                                    <div class="dash-widget-header">
                                        <span class="dash-widget-icon bg-primary">
                                            <i class="far fa-credit-card"></i>
                                        </span>
                                        <div class="dash-widget-info">
                                            <h3>$ <?php echo $PendingWithdraw; ?></h3>
                                            <h6 class="text-muted">Pending Withdraw Request</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <?php
                    $PendingWithdraw = 0;
                    $str = "Select IFNULL(sum(net_amt),0) as net_amt from tbl_income_withdrawal where status=0";
                    $PendingWithdraw = get_value($str);
                    ?>
                    <div class="col-xl-4 col-sm-6 col-12">
                        <a href="PendingWithdrawRequest" style="color:#333" target="_blank">
                            <div class="card">
                                <div class="card-body">
                                    <div class="dash-widget-header">
                                        <span class="dash-widget-icon bg-primary">
                                            <i class="far fa-credit-card"></i>
                                        </span>
                                        <div class="dash-widget-info">
                                            <h3>$ <?php echo $PendingWithdraw; ?></h3>
                                            <h6 class="text-muted">Rejected Withdraw </h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>

                    <?php
                    $TotalWithdraw = 0;
                    $str = "Select IFNULL(sum(net_amt),0) as net_amt from tbl_income_withdrawal where status=1";
                    $TotalWithdraw = get_value($str);
                    ?>
                    <div class="col-xl-4 col-sm-6 col-12">
                        <a href="WithdrawSummary" style="color:#333" target="_blank">
                            <div class="card">
                                <div class="card-body">
                                    <div class="dash-widget-header">
                                        <span class="dash-widget-icon bg-primary">
                                            <i class="fas fa-cube"></i>
                                        </span>
                                        <div class="dash-widget-info">
                                            <h3>$ <?php echo $TotalWithdraw; ?></h3>
                                            <h6 class="text-muted">Approve Withdrawal</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <?php
                    $Totalref = 0;
                    $str = "Select IFNULL(sum(ref_amount),0) as ref_amount from tbl_memberreg where status=1";
                    $Totalref = get_value($str);
                    ?>
                    <div class="col-xl-4 col-sm-6 col-12">
                        <a href="TotalReferral" style="color:#333" target="_blank">
                            <div class="card">
                                <div class="card-body">
                                    <div class="dash-widget-header">
                                        <span class="dash-widget-icon bg-primary">
                                            <i class="fas fa-cube"></i>
                                        </span>
                                        <div class="dash-widget-info">
                                            <h3>$ <?php echo $Totalref; ?></h3>
                                            <h6 class="text-muted">Total Referral Amount </h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <?php
                    $TotalMatching = 0;
                    $str = "Select IFNULL(sum(matching_income),0) as matching_income from tbl_binary ";
                    $TotalMatching = get_value($str);
                    ?>
                    <div class="col-xl-4 col-sm-6 col-12">
                        <a href="WithdrawSummary" style="color:#333" target="_blank">
                            <div class="card">
                                <div class="card-body">
                                    <div class="dash-widget-header">
                                        <span class="dash-widget-icon bg-primary">
                                            <i class="fas fa-cube"></i>
                                        </span>
                                        <div class="dash-widget-info">
                                            <h3>$ <?php echo $TotalMatching; ?></h3>
                                            <h6 class="text-muted">Matching Income</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>

                    <!-- ROI PERCENTAGE -->
                    <div class="col-xl-4 col-sm-12 col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="dash-widget-header">
                                    <span class="dash-widget-icon bg-primary">
                                        <i class="far fa-user"></i>
                                    </span>
                                    <div class="dash-widget-info">
                                        <h3 id="currentRoiAmount"><?php echo $roipercentage  . "%"; ?></h3>
                                        <h6 class="text-muted">Current ROI Percentage</h6>

                                        <!-- New input and update button -->
                                        <div class="input-group mt-3 ml-2">
                                            <input type="number" class="form-control" id="newRoiPercentage" placeholder="Enter new percentage">
                                            <div class="input-group-append">
                                                <button type="button" class="btn btn-primary" id="updateRoiButton">Update</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                      <!-- Referral System  Start-->
                      <div class="col-xl-4 col-sm-12 col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="dash-widget-header">
                                    <span class="dash-widget-icon bg-primary">
                                        <i class="far fa-user"></i>
                                    </span>
                                    <div class="dash-widget-info">
                                        <h3 id="currentReferralAmount"><?php echo $referralpercentage * 100 . "%"; ?></h3>
                                        <h6 class="text-muted">Current Referral Percentage</h6>

                                        <!-- New input and update button -->
                                        <div class="input-group mt-3 ml-2">
                                            <input type="number" step="0.01" class="form-control" id="newReferralPercentage" placeholder="Enter new percentage">
                                            <div class="input-group-append">
                                                <button type="button" class="btn btn-primary" id="updateButton">Update</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Referral System  End-->
                    <!-- <div class="col-xl-4 col-sm-6 col-12">
                        <a href="UserPackage" style="color:#333" target="_blank">
                            <div class="card">
                                <div class="card-body">
                                    <div class="dash-widget-header">
                                        <span class="dash-widget-icon bg-primary">
                                            <i class="fas fa-user-shield"></i>
                                        </span>
                                        <div class="dash-widget-info">
                                            <h3><?php echo $AdminWallet; ?></h3>
                                            <h6 class="text-muted">Admin Wallet</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div> -->

                </div>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="assets/js/jquery-3.5.0.min.js"></script>

    <!-- Bootstrap Core JS -->
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>

    <!-- Slimscroll JS -->
    <script src="assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <!-- Custom JS -->
    <script src="assets/js/admin.js"></script>
    <script>
        $(document).ready(function() {
            // Toggle submenu on click
            $('.submenu > a').click(function(e) {
                e.preventDefault(); // Prevent default behavior of <a> tag
                var $submenu = $(this).next('ul');
                var $menuArrow = $(this).find('.menu-arrow');

                if ($submenu.is(':visible')) {
                    $submenu.slideUp(300);
                    $menuArrow.removeClass('open');
                } else {
                    // Close other open submenus
                    $('.submenu > ul').slideUp(300);
                    $('.menu-arrow').removeClass('open');

                    $submenu.slideDown(300);
                    $menuArrow.addClass('open');
                }
            });

            // Update referral percentage
            $('#updateButton').click(function() {
                const newPercentage = $('#newReferralPercentage').val();
                if (newPercentage) {
                    console.log('Updating referral percentage to: ' + newPercentage + '%');

                    // AJAX call to the server to update the referral percentage
                    $.ajax({
                        url: 'updateReferralPercentage',
                        type: 'POST',
                        data: {
                            newPercentage: newPercentage
                        },
                        success: function(response) {
                            console.log('Server response:', response); // Log the raw response
                            if (response.success) {
                                $('#currentReferralAmount').text(newPercentage + '%');
                            } else {
                                alert('Failed to update referral percentage: ' + response.message);
                            }
                        },
                        error: function(xhr, status, error) {
                            console.error('AJAX Error:', error);
                            console.error('Response Text:', xhr.responseText); // Log the response text
                            alert('Error communicating with the server. Response: ' + xhr.responseText);
                        }
                    });
                } else {
                    alert('Please enter a valid percentage');
                }
            });

            // Update roi percentage
            $('#updateRoiButton').click(function() {
                const newPercentage = $('#newRoiPercentage').val();
                if (newPercentage) {
                    console.log('Updating roi percentage to: ' + newPercentage + '%');

                    // AJAX call to the server to update the referral percentage
                    $.ajax({
                        url: 'updateRoiPercentage',
                        type: 'POST',
                        data: {
                            newPercentage: newPercentage
                        },
                        success: function(response) {
                            console.log('Server response:', response); // Log the raw response
                            if (response.success) {
                                $('#currentRoiAmount').text(newPercentage + '%');
                            } else {
                                alert('Failed to update referral percentage: ' + response.message);
                            }
                        },
                        error: function(xhr, status, error) {
                            console.error('AJAX Error:', error);
                            console.error('Response Text:', xhr.responseText); // Log the response text
                            alert('Error communicating with the server. Response: ' + xhr.responseText);
                        }
                    });
                } else {
                    alert('Please enter a valid percentage');
                }
            });
        });
    </script>
</body>

</html>