<?php include "components/phpComponents/phpcomponents.php"; ?>
<?php include "components/phpComponents/treecalculation.php"; ?>


<!DOCTYPE html>
<html dir="ltr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <meta name="author" content="Hypeople">
  <meta name="description" content="Responsive, Highly Customizable Dashboard Template">

  <?php
  include "components/cssComponents/overview-css.php"
  ?>


  <title>Dashboard- Himallya RO Services</title>

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
      $title2 = "Dashboard";
      include "components/header.php";
      ?>


      <div class="offcanvas offcanvas-start hp-mobile-sidebar bg-black-20 hp-bg-dark-90" tabindex="-1" id="mobileMenu" aria-labelledby="mobileMenuLabel" style="width: 256px;">
        <div class="offcanvas-header justify-content-between align-items-center ms-16 me-8 mt-16 p-0">
          <div class="w-auto px-0">
            <div class="hp-header-logo d-flex align-items-center">
              <a href="overview" class="position-relative">
                <!--<div class="hp-header-logo-icon position-absolute bg-black-20 hp-bg-dark-90 rounded-circle border border-black-0 hp-border-color-dark-90 d-flex align-items-center justify-content-center" style="width: 18px; height: 18px; top: -5px;">
                  <svg class="hp-fill-color-dark-0" width="12" height="12" viewbox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M0.709473 0L1.67247 10.8L5.99397 12L10.3267 10.7985L11.2912 0H0.710223H0.709473ZM9.19497 3.5325H4.12647L4.24722 4.88925H9.07497L8.71122 8.95575L5.99397 9.70875L3.28047 8.95575L3.09522 6.87525H4.42497L4.51947 7.93275L5.99472 8.33025L5.99772 8.3295L7.47372 7.93125L7.62672 6.21375H3.03597L2.67897 2.208H9.31422L9.19572 3.5325H9.19497Z" fill="#2D3436"></path>
                  </svg>
                </div>-->

                <img class="hp-logo-side hp-sidebar-visible hp-dark-none" src="app-assets/img/logo/HIMLOGOSMALL.png" alt="logo">
                <img class="hp-logo-side hp-sidebar-visible hp-dark-block" src="app-assets/img/logo/HIMLOGOSMALL.png" alt="logo">
                <img class="hp-logo-side hp-sidebar-hidden hp-dir-none hp-dark-none" src="app-assets/img/logo/HIMLOGO1.png" alt="logo">
                <img class="hp-logo-side hp-sidebar-hidden hp-dir-none hp-dark-block" src="app-assets/img/logo/HIMLOGO1.png" alt="logo">
                <img class="hp-logo-side hp-sidebar-hidden hp-dir-block hp-dark-none" src="app-assets/img/logo/logo-rtl.svg" alt="logo">
                <img class="hp-logo-side hp-sidebar-hidden hp-dir-block hp-dark-block" src="app-assets/img/logo/logo-rtl-dark.svg" alt="logo">
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
                      <div class="hp-header-logo-icon position-absolute bg-black-20 hp-bg-dark-90 rounded-circle border border-black-0 hp-border-color-dark-90 d-flex align-items-center justify-content-center" style="width: 18px; height: 18px; top: -5px;">
                        <svg class="hp-fill-color-dark-0" width="12" height="12" viewbox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <path d="M0.709473 0L1.67247 10.8L5.99397 12L10.3267 10.7985L11.2912 0H0.710223H0.709473ZM9.19497 3.5325H4.12647L4.24722 4.88925H9.07497L8.71122 8.95575L5.99397 9.70875L3.28047 8.95575L3.09522 6.87525H4.42497L4.51947 7.93275L5.99472 8.33025L5.99772 8.3295L7.47372 7.93125L7.62672 6.21375H3.03597L2.67897 2.208H9.31422L9.19572 3.5325H9.19497Z" fill="#2D3436"></path>
                        </svg>
                      </div>

                      <img class="hp-logo-side hp-sidebar-visible hp-dark-none" src="app-assets/img/logo/HIMLOGOSMALL.png" alt="logo">
                      <img class="hp-logo-side hp-sidebar-visible hp-dark-block" src="app-assets/img/logo/HIMLOGOSMALL.png" alt="logo">
                      <img class="hp-logo-side hp-sidebar-hidden hp-dir-none hp-dark-none" src="app-assets/img/logo/HIMLOGO1.png" alt="logo">
                      <img class="hp-logo-side hp-sidebar-hidden hp-dir-none hp-dark-block" src="app-assets/img/logo/HIMLOGO1.png" alt="logo">
                      <img class="hp-logo-side hp-sidebar-hidden hp-dir-block hp-dark-none" src="app-assets/img/logo/logo-rtl.svg" alt="logo">
                      <img class="hp-logo-side hp-sidebar-hidden hp-dir-block hp-dark-block" src="app-assets/img/logo/logo-rtl-dark.svg" alt="logo">
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
            <div class="row align-items-center justify-content-between g-24">
              <div class="col-12 col-md-6">
                <h3>Welcome back, <?php echo $member_name ?> 👋</h3>
                <div class="dropdown-containerr" style="margin-bottom: 3vh;">
                  <select class="styled-dropdownn" id="referralId">
                    <!-- <option value="status1" disabled selected>Account Number</option> -->
                    <option value="status2" >Your Referral ID: <?php echo $member_user_id; ?></option>
                  </select>

                </div>
                <div class="row g-32 mt-20">
                  <div class="col-12 " style="font-size: 14px;">
                    Affiliate Join Date: <?php echo date("d-m-Y H:i A", strtotime($row['registration_date'])); ?>
                  </div>
                </div>
              </div>

              <div class="col-12 col-xl-6">
                <div class="card hp-card-2" onclick="window.location.href='referral-income';" style="cursor: pointer;">
                  <div class="card-body px-16">
                    <div class="row justify-content-between mb-8">
                      <div class="col">
                        <div class="d-flex align-items-center">
                          <h5 class="me-8 mb-0">Account Balance</h5>
                        </div>
                      </div>
                    </div>

                    <div class="row align-items-center g-16">
                      <div class="col-6" >
                        <p class="hp-p1-body mb-0 hp-text-color-black-100 hp-text-color-dark-0">
                          <b style="font-size: 16px;"> Referral Bonus Earnings</b>
                          <i class="ri-arrow-right-up-line text-success" style="font-size: 16px;"></i>
                        </p>

                        <h2 class="my-4"><?php echo $ref_amount; ?></h2>
                        <div class="d-flex align-items-center">
                          <!-- <p class="mb-0 hp-badge-text text-success">10%</p> -->
                        </div>

                      </div>

                      <div class="col-6">
                        <div id="statistics-traffic"></div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>


          <div class="col-12">
            <!-- LIVE , DEMO ACCOUNT , DEMO BALANCE -->
            <div class="row g-32 " style="
                        margin-bottom: 12px;
                    ">
              <div class="col-12 col-sm-6 col-xl-4">
                <div class="card hp-card-1">
                  <div class="card-body p-16">
                    <div class="row align-items-center flex-shrink-1 w-100 mx-0">
                      <div style="width: 106px;" class="px-0">
                        <div class="h-100 bg-primary-4 hp-bg-color-dark-90 d-flex align-items-center justify-content-center rounded-4">
                          <!-- <div id="statistics-order"></div> -->
                          <img src="assets/connections.png" alt="">
                        </div>
                      </div>

                      <?php
                      $str = "SELECT COUNT(*) as totalREF FROM tbl_referrals where sponsor_user_id='$member_user_id' and level=1";
                      $res = mysqli_query($connection, $str);
                      $row = mysqli_fetch_array($res);
                      ?>
                      <div class="col pe-0">
                        <h3 class="mb-0 fw-semibold"><?php echo $row['totalREF']; ?></h3>
                        <p class="hp-p1-body mb-0 hp-text-color-black-100 hp-text-color-dark-0">
                          <b style="font-size: 18px;">Total Referrals</b>
                        </p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <?php
// Query for counting paid referrals (topUp_status = 1)
$paid_query = "
    SELECT COUNT(*) as total 
    FROM tbl_referrals r 
    LEFT JOIN tbl_memberreg m ON r.referred_user_id = m.member_user_id 
    WHERE r.sponsor_user_id='$member_user_id' AND r.level=1 AND m.topUp_status = 1
";
$paid_res = mysqli_query($connection, $paid_query);
$paid_row = mysqli_fetch_array($paid_res);

// Query for counting unpaid referrals (topUp_status = 0)
$unpaid_query = "
    SELECT COUNT(*) as total 
    FROM tbl_referrals r 
    LEFT JOIN tbl_memberreg m ON r.referred_user_id = m.member_user_id 
    WHERE r.sponsor_user_id='$member_user_id' AND r.level=1 AND m.topUp_status = 0
";
$unpaid_res = mysqli_query($connection, $unpaid_query);
$unpaid_row = mysqli_fetch_array($unpaid_res);
?>


              <div class="col-12 col-sm-6 col-xl-4">
                <div class="card hp-card-1">
                  <div class="card-body p-16">
                    <div class="row align-items-center flex-shrink-1 w-100 mx-0">
                      <div style="width: 146px;margin-top: 1vw;" class="px-0">
                        <div class="h-100 bg-primary-4 hp-bg-color-dark-90 d-flex align-items-center justify-content-center rounded-4">
                          <!-- <div id="statistics-order"></div> -->
                          <img src="assets/refer-2.png" alt="">
                        </div>
                      </div>
                      <div class="col pe-0">
                        <h3 class="mb-0 fw-semibold"><?php echo $paid_row['total']; ?></h3>
                        <p class="hp-p1-body mb-0 hp-text-color-black-100 hp-text-color-dark-0">
                          <b style="font-size: 18px;">Paid Referrals</b>
                        </p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-12 col-sm-6 col-xl-4">
                <div class="card hp-card-1">
                  <div class="card-body p-16">
                    <div class="row align-items-center flex-shrink-1 w-100 mx-0">
                      <div style="width: 136px;margin-top:1vw;" class="px-0">
                        <div class="h-100 bg-primary-4 hp-bg-color-dark-90 d-flex align-items-center justify-content-center rounded-4">
                          <!-- <div id="statistics-order"></div> -->
                          <img src="assets/refer-3.png" alt="">
                        </div>
                      </div>
                      <div class="col pe-0">
                        <h3 class="mb-0 fw-semibold"><?php echo $unpaid_row['total']; ?></h3>
                        <p class="hp-p1-body mb-0 hp-text-color-black-100 hp-text-color-dark-0">
                          <b style="font-size: 18px;">Unpaid Referrals</b>
                        </p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-12 col-sm-6 col-xl-6" onclick="window.location.href='withdraw-request';" style="cursor: pointer;">
                <div class="card hp-card-1">
                  <div class="card-body p-16">
                    <div class="row align-items-center flex-shrink-1 w-100 mx-0">
                      <div style="width: 106px;" class="px-0">
                        <div class="h-100 bg-warning-4 hp-bg-color-dark-90 d-flex align-items-center justify-content-center rounded-4">

                          <img src="assets/take-profit.png" alt="notdispatch">
                        </div>
                      </div>

                      <div class="col pe-0">
                        <h3 class="mb-0 fw-semibold"><?php echo $matching_income; ?></h3>
                        <p class="hp-p1-body mb-0 hp-text-color-black-100 hp-text-color-dark-0">
                          <b style="font-size: 18px; font-weight:600">Withdraw Request</b>
                        </p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>


              <!-- <div class="col-12 col-sm-6 col-xl-4">
                <div class="card hp-card-1">
                  <div class="card-body p-16">
                    <div class="row align-items-center flex-shrink-1 w-100 mx-0">
                      <div style="width: 106px;" class="px-0">
                        <div class="h-100 bg-success-4 hp-bg-color-dark-90 d-flex align-items-center justify-content-center rounded-4">
                          
                          <img src="assets/speedometer.png" alt="">
                        </div>
                      </div>

                      <div class="col pe-0">
                        <h3 class="mb-0 fw-semibold"><?php echo $capping_limit ? $capping_limit : '0.00'; ?></h3>
                        <p class="hp-p1-body mb-0 hp-text-color-black-100 hp-text-color-dark-0">
                          <b style="font-size: 18px;">Unpaid Referrals</b>
                        </p>
                      </div>
                    </div>
                  </div>
                </div>
              </div> -->
            </div>



           


            <!-- Payments made -->
            <?php
    $str = "SELECT SUM(payment_amount) as totalPay FROM tbl_payment_history WHERE member_user_id='$member_user_id'";
    $res = mysqli_query($connection, $str);
    $rowPay = mysqli_fetch_array($res);
     // If the total is NULL or 0, set a custom message
    $totalPayments = ($rowPay['totalPay'] == NULL || $rowPay['totalPay'] == 0) ? 'No payments made' : $rowPay['totalPay'];
?>

            <div class="row g-32 mb-32 mt-10">
              <div class="col-12 col-md-12 col-xl-12">
                <div class="card" style="height: auto;">
                  <div class="card-body">
                    <h4 class="card-title text-center mb-4">Summary for This Month</h4>
                    <table class="table table-bordered table-striped">
                      <tbody>
                        <tr>
                          <th scope="row">Total Earnings From Referrals</th>
                          <td><?php echo $ref_amount;?> INR</td>
                        </tr>
                        <tr>
                          <th scope="row">Total Referrals</th>
                          <td><?php echo $row['totalREF']; ?></td>
                        </tr>
                        <tr>
                          <th scope="row">Unpaid Referrals</th>
                          <td><?php echo $unpaid_row['total']; ?></td>
                        </tr>
                        <tr>
                          <th scope="row">Paid Referrals</th>
                          <td><?php echo $paid_row['total']; ?></td>
                        </tr>
                        <tr>
                          <th scope="row">Payments Made</th>
                          <td><?php echo $totalPayments; ?></td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>

              <div class="col-12 col-md-3" onclick="window.location.href='binary-tree'">
                <a href="binary-tree" class="d-block">
                  <div class="hp-select-box-item">
                    <input type="radio" hidden="" id="select-box-boxed-user-item-4-2" name="select-box-item">
                    <label for="select-box-boxed-user-item-4-2" class="d-block hp-cursor-pointer m-0">
                      <div class="card">
                        <div class="card-body">
                          <div class="row text-center mb-8">
                            <div class="col-12 my-12">
                              <span class="avatar-item d-flex align-items-center justify-content-center rounded-circle mx-auto" style="width: 48px; height: 48px;">
                                <img src="assets/realtree.png" alt="Tree Image">
                              </span>
                            </div>
                            <div class="col-12">
                              <span class="h4 d-block">Network Tree</span>
                            </div>
                            <div class="col-12">
                              <span class="hp-p1-body text-black-80 hp-text-color-dark-30 d-block">Referrals</span>
                            </div>
                          </div>
                        </div>
                      </div>
                    </label>
                  </div>
                </a>
              </div>

              <div class="col-12 col-md-3" onclick="window.location.href='payment-history'">
                <div class="hp-select-box-item">
                  <input type="radio" hidden="" id="select-box-boxed-user-item-4-2" name="select-box-item">
                  <label for="select-box-boxed-user-item-4-2" class="d-block hp-cursor-pointer">
                    <div class="card">
                      <div class="card-body">
                        <div class="row text-center mb-8">
                          <div class="col-12 my-12">
                            <span class="avatar-item d-flex align-items-center justify-content-center rounded-circle mx-auto" style="width: 48px; height: 48px;">
                              <img src="assets/usdt.png">
                            </span>
                          </div>
                          <div class="col-12">
                            <span class="h4 d-block">Payments</span>
                          </div>
                          <div class="col-12">
                            <span class="hp-p1-body text-black-80 hp-text-color-dark-30 d-block">Transactions</span>
                          </div>
                        </div>
                      </div>
                    </div>
                  </label>
                </div>
              </div>
              
              <div class="col-12 col-md-6">
                <div class="hp-select-box-item">
                  <input type="radio" hidden="" id="select-box-boxed-user-item-4-2" name="select-box-item">
                  <label for="select-box-boxed-user-item-4-2" class="d-block hp-cursor-pointer">
                    <div class="card">
                      <div class="card-body">
                        <div class="row text-center mb-8">
                          <div class="col-12 my-12">
                            <span class="avatar-item d-flex align-items-center justify-content-center  mx-auto" style="width: 48px; height: 48px;">
                              <img src="assets/id.png">
                            </span>
                          </div>
                          <div class="col-12">
                            <span class="h4 d-block" id="referralLink"><?php echo $member_user_id; ?></span>
                          </div>
                          <div class="col-12">
                            <span class="hp-p1-body text-black-80 hp-text-color-dark-30 d-block">
                              Your Referral ID
                              <button type="button" class="btn btn-text hp-bg-dark-85" id="copyButton">
                                <i class="ri-file-copy-line"></i>
                              </button>
                            </span>
                          </div>
                          </span>
                        </div>
                      </div>
                    </div>
                </div>
                </label>
              </div>
            </div>

          </div>


















          <!-- ACTUAL REVENUE & PIE CHART -->
          <div class="row g-32">
            <!-- <div class="col-12 col-xl-8">
                <div class="row g-32">
                  <div class="col-12">
                    <div class="card hp-card-6 hp-chart-text-color">
                      <div class="card-body">
                        <div class="row justify-content-between mb-16">
                          <div class="col-6">
                            <h4 class="me-8"><b>Revenue</b></h4>
                          </div>
                        </div>
                        <div id="analytics-revenue-chart"></div>
                      </div>
                    </div>
                  </div>

                </div>
              </div> -->

            <!-- <div class="col-12 col-xl-4">
                <div class="row g-32">
                  <div class="col-12">
                    <div class="card hp-card-6">
                      <div class="card-body">
                        <div class="row">
                          <div class="col-12">
                            <h5 class="mb-32"><b>Earnings</b></h5>
                          </div>

                          <div class="col-12">
                            <div id="earnings-donut-card" class="hp-donut-chart"></div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div> -->

            <div class="card hp-card-1 hp-upgradePlanCardOne hp-upgradePlanCardOne-bg">
              <div class="card-body">
                <div class="position-absolute h-100" style="top: 0px; right: 0px;">
                  <svg class="hp-dark-none" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-100 h-100">
                    <path d="m394.94 86.299-177.9-100.66 34.328 92.136L131.659 8.35l109.303 155.528L78.423 73.626l47.648 95.459L4.478 118.751" stroke="url(#UpgradePlanCardOneLight-1)" stroke-width="20" stroke-linejoin="bevel"></path>
                    <defs>
                      <lineargradient id="UpgradePlanCardOneLight-1" x1="187.747" y1="-11.283" x2="206.538" y2="167.497" gradientunits="userSpaceOnUse">
                        <stop></stop>
                        <stop offset="0.737" stop-opacity="0"></stop>
                      </lineargradient>
                    </defs>
                  </svg>

                  <svg class="hp-dark-block" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-100 h-100">
                    <path d="m394.94 86.299-177.9-100.66 34.328 92.136L131.659 8.35l109.303 155.528L78.423 73.626l47.648 95.459L4.478 118.751" stroke="url(#UpgradePlanCardOneDark-2)" stroke-width="20" stroke-linejoin="bevel"></path>
                    <defs>
                      <lineargradient id="UpgradePlanCardOneDark-2" x1="187.747" y1="-11.283" x2="206.538" y2="167.497" gradientunits="userSpaceOnUse">
                        <stop stop-color="#fff"></stop>
                        <stop offset="0.737" stop-color="#fff" stop-opacity="0"></stop>
                      </lineargradient>
                    </defs>
                  </svg>
                </div>


                <div class="row mt-8 align-items-center position-relative">
                  <div class="mb-4 col-12">
                    <div class="row align-items-center justify-content-between">
                      <div class="flex-shrink-1 col">
                        <p class="hp-p1-body mb-0 hp-text-color-black-100 hp-text-color-dark-0">Referral Link</p>
                        <h4 class="mb-8 fw-bold" id="referralLinks" style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 100%;">
                          <?php echo $referralURL; ?></h4>
                      </div>
                      <div class="hp-flex-none w-auto col">
                        <button type="button" id="copyButtons" class="btn float-right mt-16 mt-sm-0 border-0 hp-hover-bg-black-100 hp-bg-black-bg hp-text-color-black-0 hp-hover-bg-dark-10 hp-bg-dark-0 hp-text-color-dark-100 btn-secondary">
                          <span>Copy Link</span>
                        </button>
                      </div>
                    </div>
                  </div>
                </div>


                <div class="toast-container">
                  <div id="copyToast" class="toast toast-custom" role="alert" aria-live="assertive" aria-atomic="true" data-delay="3000">
                    <div class="toast-body">
                      Your Referral Id : <?php echo $member_user_id; ?> copied to clipboard
                    </div>
                  </div>
                </div>

              </div>
            </div>


          </div>
        </div>
      </div>
      <?php
      include "components/footer.php";
      ?>
    </div>


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
  include "components/jsComponents/overview-js.php"
  ?>


  <script>
    document.getElementById('copyButton').addEventListener('click', function() {
      var referralLink = document.getElementById('referralLink').innerText;
      var tempInput = document.createElement('input');
      tempInput.value = referralLink;
      document.body.appendChild(tempInput);
      tempInput.select();
      document.execCommand('copy');
      document.body.removeChild(tempInput);

      $('#copyToast').toast('show');
    });
  </script>
  <script>
    document.getElementById('copyButtons').addEventListener('click', function() {
      var referralLink = document.getElementById('referralLinks').innerText;
      var tempInput = document.createElement('input');
      tempInput.value = referralLink;
      document.body.appendChild(tempInput);
      tempInput.select();
      document.execCommand('copy');
      document.body.removeChild(tempInput);

      $('#copyToast').toast('show');
    });
  </script>
</body>

</html>