<?php include "components/phpComponents/phpcomponents.php"; // Retrieve the current session's member user ID
$member_user_id = $_SESSION['member_user_id'];
function checkWalletAddress() {
  if (isset($_SESSION['wallet_address'])) {
      return $_SESSION['wallet_address'];
  } else {
      return NULL;
  }
}
$wallet_address = checkWalletAddress();
?>



<!DOCTYPE html>
<html dir="ltr">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />

  <meta name="author" content="Hypeople" />
  <meta name="description" content="Responsive, Highly Customizable Dashboard Template" />
  <!-- SweetAlert2 CSS -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
	<!-- SweetAlert2 JS -->
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


  <?php
  include "components/cssComponents/deposit1-css.php"
  ?>

  <title>Dashboard- Himallya RO Services</title>
  <style>
    .snackbar {
      visibility: hidden;
      /* Hidden by default. Visible when the class 'show' is added */
      min-width: 250px;
      /* Set a default minimum width */
      background-color: #4CAF50;
      /* Green background color */
      color: #fff;
      /* White text color */
      text-align: center;
      /* Centered text */
      border-radius: 8px;
      /* Rounded borders */
      padding: 16px;
      /* Some padding */
      position: fixed;
      /* Fixed position */
      z-index: 1000;
      /* Sit on top of other elements */
      left: 85%;
      /* Center the snackbar */
      bottom: 30px;
      /* 30px from the bottom */
      transform: translateX(-50%);
      /* Center it horizontally */
      box-shadow: 0px 3px 6px rgba(0, 0, 0, 0.16);
      /* Add a slight shadow for better look */
      font-size: 16px;
      /* Adjust font size */
      transition: all 0.3s ease-in-out;
      /* Smooth transition */
    }

    .snackbar.show {
      visibility: visible;
      /* Show the snackbar when the 'show' class is added */
      animation: fadein 0.5s, fadeout 0.5s 2.5s;
      /* Animation */
    }

    @keyframes fadein {
      from {
        bottom: 0;
        opacity: 0;
      }

      /* Starting position */
      to {
        bottom: 30px;
        opacity: 1;
      }
    }

    @keyframes fadeout {
      from {
        bottom: 30px;
        opacity: 1;
      }

      /* Starting position */
      to {
        bottom: 0;
        opacity: 0;
      }

      /* Ending position */
    }

    #snackbar {
      visibility: hidden;
      min-width: 250px;
      margin-left: -125px;
      background-color: #333;
      color: #fff;
      text-align: center;
      border-radius: 2px;
      padding: 16px;
      position: fixed;
      z-index: 1;
      left: 50%;
      bottom: 30px;
      font-size: 17px;
    }

    #snackbar.show {
      visibility: visible;
      -webkit-animation: fadein 0.5s, fadeout 0.5s 2.5s;
      animation: fadein 0.5s, fadeout 0.5s 2.5s;
    }

    @-webkit-keyframes fadein {
      from {
        bottom: 0;
        opacity: 0;
      }

      to {
        bottom: 30px;
        opacity: 1;
      }
    }

    @keyframes fadein {
      from {
        bottom: 0;
        opacity: 0;
      }

      to {
        bottom: 30px;
        opacity: 1;
      }
    }

    @-webkit-keyframes fadeout {
      from {
        bottom: 30px;
        opacity: 1;
      }

      to {
        bottom: 0;
        opacity: 0;
      }
    }

    @keyframes fadeout {
      from {
        bottom: 30px;
        opacity: 1;
      }

      to {
        bottom: 0;
        opacity: 0;
      }
    }
  </style>
  </style>

  <script>
    !(function(t, h, e, j, s, n) {
      (t.hj =
        t.hj ||
        function() {
          (t.hj.q = t.hj.q || []).push(arguments);
        }),
      (t._hjSettings = {
        hjid: 2628580,
        hjsv: 6,
      }),
      (s = h.getElementsByTagName("head")[0]),
      ((n = h.createElement("script")).async = 1),
      (n.src =
        "https://static.hotjar.com/c/hotjar-" +
        t._hjSettings.hjid +
        ".js?sv=" +
        t._hjSettings.hjsv),
      s.appendChild(n);
    })(window, document);
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
                  <img class="hp-logo hp-sidebar-visible hp-dark-none" src="app-assets/img/logo/logo-small-dark.png" alt="logo" />
                  <img class="hp-logo hp-sidebar-visible hp-dark-block" src="app-assets/img/logo/logo-small.png" alt="logo" />
                  <img class="hp-logo hp-sidebar-hidden hp-dir-none hp-dark-none" src="app-assets/img/logo/LOGOFORWHITE.png" alt="logo" />
                  <img class="hp-logo hp-sidebar-hidden hp-dir-none hp-dark-block" src="app-assets/img/logo/LOGOFORBLACK.png" alt="logo" />
                  <img class="hp-logo hp-sidebar-hidden hp-dir-block hp-dark-none" src="app-assets/img/logo/logo-rtl.svg" alt="logo" />
                  <img class="hp-logo hp-sidebar-hidden hp-dir-block hp-dark-block" src="app-assets/img/logo/logo-rtl-dark.svg" alt="logo" />
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
          include "components/sidebar.php"
          ?>
        </div>

        <?php
        include "components/sideProfile.php"
        ?>
      </div>
    </div>

    <div class="hp-main-layout">
      <?php
      $title1 = "My Payments";
      $title2 = "Deposit By USDT";
      include "components/header.php";
      ?>

      <div class="offcanvas offcanvas-start hp-mobile-sidebar bg-black-20 hp-bg-dark-90" tabindex="-1" id="mobileMenu" aria-labelledby="mobileMenuLabel" style="width: 256px">
        <div class="offcanvas-header justify-content-between align-items-center ms-16 me-8 mt-16 p-0">
          <div class="w-auto px-0">
            <div class="hp-header-logo d-flex align-items-center">
              <a href="overview" class="position-relative">
                <div class="hp-header-logo-icon position-absolute bg-black-20 hp-bg-dark-90 rounded-circle border border-black-0 hp-border-color-dark-90 d-flex align-items-center justify-content-center" style="width: 18px; height: 18px; top: -5px">
                  <svg class="hp-fill-color-dark-0" width="12" height="12" viewbox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M0.709473 0L1.67247 10.8L5.99397 12L10.3267 10.7985L11.2912 0H0.710223H0.709473ZM9.19497 3.5325H4.12647L4.24722 4.88925H9.07497L8.71122 8.95575L5.99397 9.70875L3.28047 8.95575L3.09522 6.87525H4.42497L4.51947 7.93275L5.99472 8.33025L5.99772 8.3295L7.47372 7.93125L7.62672 6.21375H3.03597L2.67897 2.208H9.31422L9.19572 3.5325H9.19497Z" fill="#2D3436"></path>
                  </svg>
                </div>

                <img class="hp-logo hp-sidebar-visible hp-dark-none" src="app-assets/img/logo/logo-small-dark.png" alt="logo" />
                <img class="hp-logo hp-sidebar-visible hp-dark-block" src="app-assets/img/logo/logo-small.png" alt="logo" />
                <img class="hp-logo hp-sidebar-hidden hp-dir-none hp-dark-none" src="app-assets/img/logo/LOGOFORWHITE.png" alt="logo" />
                <img class="hp-logo hp-sidebar-hidden hp-dir-none hp-dark-block" src="app-assets/img/logo/LOGOFORBLACK.png" alt="logo" />
                <img class="hp-logo hp-sidebar-hidden hp-dir-block hp-dark-none" src="app-assets/img/logo/logo-rtl.svg" alt="logo" />
                <img class="hp-logo hp-sidebar-hidden hp-dir-block hp-dark-block" src="app-assets/img/logo/logo-rtl-dark.svg" alt="logo" />
              </a>
            </div>
          </div>

          <div class="w-auto px-0 hp-sidebar-collapse-button hp-sidebar-hidden" data-bs-dismiss="offcanvas" aria-label="Close">
            <button type="button" class="btn btn-text btn-icon-only bg-transparent">
              <i class="ri-close-fill lh-1 hp-text-color-black-80" style="font-size: 24px"></i>
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
                      <div class="hp-header-logo-icon position-absolute bg-black-20 hp-bg-dark-90 rounded-circle border border-black-0 hp-border-color-dark-90 d-flex align-items-center justify-content-center" style="width: 18px; height: 18px; top: -5px">
                        <svg class="hp-fill-color-dark-0" width="12" height="12" viewbox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <path d="M0.709473 0L1.67247 10.8L5.99397 12L10.3267 10.7985L11.2912 0H0.710223H0.709473ZM9.19497 3.5325H4.12647L4.24722 4.88925H9.07497L8.71122 8.95575L5.99397 9.70875L3.28047 8.95575L3.09522 6.87525H4.42497L4.51947 7.93275L5.99472 8.33025L5.99772 8.3295L7.47372 7.93125L7.62672 6.21375H3.03597L2.67897 2.208H9.31422L9.19572 3.5325H9.19497Z" fill="#2D3436"></path>
                        </svg>
                      </div>

                      <img class="hp-logo hp-sidebar-visible hp-dark-none" src="app-assets/img/logo/logo-small-dark.png" alt="logo" />
                      <img class="hp-logo hp-sidebar-visible hp-dark-block" src="app-assets/img/logo/logo-small.png" alt="logo" />
                      <img class="hp-logo hp-sidebar-hidden hp-dir-none hp-dark-none" src="app-assets/img/logo/LOGOFORWHITE.png" alt="logo" />
                      <img class="hp-logo hp-sidebar-hidden hp-dir-none hp-dark-block" src="app-assets/img/logo/LOGOFORBLACK.png" alt="logo" />
                      <img class="hp-logo hp-sidebar-hidden hp-dir-block hp-dark-none" src="app-assets/img/logo/logo-rtl.svg" alt="logo" />
                      <img class="hp-logo hp-sidebar-hidden hp-dir-block hp-dark-block" src="app-assets/img/logo/logo-rtl-dark.svg" alt="logo" />
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
              include "components/sidebar.php"
              ?>
            </div>

            <?php
            include "components/sideprofile.php"
            ?>
          </div>
        </div>
      </div>

      <div class="hp-main-layout-content">

        <div class="row mb-32 gy-32">
          <!-- custom form -->
          <div class="col-12 col-md-6">
            <div class="card custom-card h-90">
              <div class="card-body">
                <h3 class="card-title mb-32" style="text-align: center">
                  Upload Reciept
                </h3>
                <form id="depositForm" action="deposit-handler" method="post" enctype="multipart/form-data">
                  <div class="mb-24 mt-15">
                    <label for="packageType" class="form-label">SELECT PACKAGE TYPE</label>
                    <select class="form-select" id="packageType" name="packageType" onchange="updatePackageOptions()">
                      <option selected>Package Type</option>
                      <option value="basic">Basic Package (ROI 3-9%)</option>
                      <option value="premium">Premium Package (ROI 3-12%)</option>
                    </select>
                  </div>
                  <div class="mb-24 mt-15">
                    <label for="spackage" class="form-label">Package (USDT)</label>
                    <select class="form-select" id="spackage" name="spackage">
                      <option selected>Select Package</option>
                    </select>
                  </div>
                  <div class="mb-24 mt-15">
                    <label for="screenshot" class="form-label">UPLOAD SCREENSHOT</label>
                    <input type="file" class="form-control" id="screenshot" name="screenshot" accept="image/*" required />
                  </div>

                  <div class="mb-24 mt-15">
                    <label for="transaction_id" class="form-label">TRANSACTION ID</label>
                    <input type="text" class="form-control" id="transaction_id" name="transaction_id" />
                  </div>

                  <div class="d-flex justify-content-end">
                    <button type="submit" class="pushable" id="submitbutton">
                      <span class="shadow"></span>
                      <span class="edge"></span>
                      <span class="front">Send Request</span>
                    </button>
                  </div>
                </form>

                <div id="responseMessage"></div>



              </div>
            </div>
          </div>


          <!-- Qr Card-->
          <div class="col-12 col-md-6">
            <div class="card custom-card h-90">
              <div class="card-body">
                <h6 class="card-title mb-5" style="text-align: left">
                  Wallet Address
                </h6>
                <div class="d-flex align-items-center mb-32" style="background-color: #f8f9fa; border: 1px solid #dee2e6; border-radius: 5px; padding: 10px;">
                  <div class="wallet-address" style="font-family: monospace; color: rgb(0, 0, 0); margin-right: 10px;">
                    <p id="walletLink"><?php echo $wallet_address ?></p>
                  </div>
                  <button id="copyButton" class="btn btn-sm" style="margin-left: auto;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-copy" viewBox="0 0 16 16">
                      <path fill-rule="evenodd" d="M4 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2zm2-1a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1zM2 5a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1v-1h1v1a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h1v1z" />
                    </svg>
                  </button>
                </div>
                <div class="qr-code-container" style="text-align: center; margin-top: 20px;">
                  <img src="./assets/usdt.png" alt="Sample QR Code" style="max-width: 100%; max-height: 100%;">
                </div>
              </div>
            </div>
          </div>
          <div class="toast-container">
            <div id="copyToast" class="toast toast-custom" role="alert" aria-live="assertive" aria-atomic="true" data-delay="3000">
              <div class="toast-body">
                Referral link copied to clipboard!
              </div>
            </div>
          </div>
          <!-- Snackbar element
    <div id="snackbar">Deposit successful!</div> -->


          <script>
            document.getElementById('submitbutton').addEventListener('onClick', function(e) {
              e.preventDefault(); // Prevent the default form submission

              var formData = new FormData(this); // Create a FormData object with the form data

              // Send the form data using AJAX
              var xhr = new XMLHttpRequest();
              xhr.open('POST', 'deposit-handler', true);

              xhr.onload = function() {
                if (xhr.status === 200) {
                  // Success: handle the response
                  var response = JSON.parse(xhr.responseText);
                   console.log(response);
                  if (response.status === 'success') {
                    document.getElementById('responseMessage').innerHTML = '<div class="alert alert-success">Deposit successful!</div>';
                    // Optionally, reset the form
                    document.getElementById('depositForm').reset();
                  } else {
                    document.getElementById('responseMessage').innerHTML = '<div class="alert alert-danger">' + response.message + '</div>';
                  }
                } else {
                  // Error: log the error
                  console.error('Error: ' + xhr.statusText);
                  document.getElementById('responseMessage').innerHTML = '<div class="alert alert-danger">An error occurred while processing the request.</div>';
                }
              };

              xhr.onerror = function() {
                console.error('Request failed.');
                document.getElementById('responseMessage').innerHTML = '<div class="alert alert-danger">An error occurred while processing the request.</div>';
              };

              xhr.send(formData); // Send the form data
            });
          </script>


          <script>
           
            if (window.location.search.includes("status=success")) {
              alert("Deposit Successful!");
            }

            document.getElementById('copyButton').addEventListener('click', function() {
              var walletLink = document.getElementById('walletLink').innerText;
              var tempInput = document.createElement('input');
              tempInput.value = walletLink;
              document.body.appendChild(tempInput);
              tempInput.select();
              document.execCommand('copy');
              document.body.removeChild(tempInput);

              $('#copyToast').toast('show');


              // document.getElementById('copyButton').addEventListener('click', function() {
              //     var referralLink = document.getElementById('referralLink').innerText;
              //     var tempInput = document.createElement('input');
              //     tempInput.value = referralLink;
              //     document.body.appendChild(tempInput);
              //     tempInput.select();
              //     document.execCommand('copy');
              //     document.body.removeChild(tempInput);

              //     $('#copyToast').toast('show');
            });
          </script>

          <script>
            function updatePackageOptions() {
              var packageType = document.getElementById('packageType').value;
              var spackage = document.getElementById('spackage');

              // Clear existing options
              spackage.innerHTML = '<option selected>Select Package</option>';

              // Define package options
              var options = [];

              if (packageType === 'basic') {
                options = [100, 250, 500, 1000];
              } else if (packageType === 'premium') {
                options = [3000, 5000, 10000];
              }

              // Add new options
              for (var i = 0; i < options.length; i++) {
                var option = document.createElement('option');
                option.value = options[i];
                option.text = options[i] + ' USDT';
                spackage.appendChild(option);
              }
            }
          </script>

          <?php
          include "components/footer.php"
          ?>
          </script>
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
  include "components/jsComponents/deposit1-js.php"
  ?>


</body>

</html>