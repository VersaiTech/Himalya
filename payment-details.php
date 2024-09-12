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


  <title>Dashboard- Orion Trade Ai</title>

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
      $title1 = "Payments";
      $title2 = "Payments Details";
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

              <!-- Referral -->
            <div class="row g-32">
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
                          <p class="hp-p1-body mb-0 hp-text-color-black-100 hp-text-color-dark-0">Payment Details</p>
                          <h4 class="mb-8 fw-bold" id="referralLink" style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 100%;">
                            Check Out Your Payment Details Here</h4>
                        </div>
                      </div>
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
              <!-- BALANCe CARD -->
              <div class="col-12 col-xl-6 col-md-6">
                <div class="card hp-card-2">
                  <div class="card-body px-16">
                    <div class="row justify-content-between mb-8">
                      <div class="col">
                        <div class="d-flex align-items-center">
                          <h5 class="me-8 mb-0"></h5>
                        </div>
                      </div>
                    </div>

                    <div class="row align-items-center g-16">
                      <div class="col-8">
                        <p class="hp-p1-body mb-0 hp-text-color-black-100 hp-text-color-dark-0">
                          <b style="font-size: 16px;">Total Transactions Amount</b>
                         
                        </p>

                        <h2 class="my-4"><?php echo $current_investment; ?></h2>
                        <div class="d-flex align-items-center">
                          <!-- <p class="mb-0 hp-badge-text text-success">10%</p> -->
                        </div>

                      </div>

                      <div class="col-4">
                        <div id="statistics-traffic"></div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>


              <!-- BALANC CARD -->
              <div class="col-12 col-xl-6 col-md-6">
                <div class="card hp-card-2">
                  <div class="card-body px-16">
                    <div class="row justify-content-between mb-8">
                      <div class="col">
                        <div class="d-flex align-items-center">
                          <h5 class="me-8 mb-0"></h5>
                        </div>
                      </div>
                    </div>

                    <div class="row align-items-center g-16">
                      <div class="col-8">
                        <p class="hp-p1-body mb-0 hp-text-color-black-100 hp-text-color-dark-0">
                          <b style="font-size: 16px;">Total number of Transactions</b>
                         
                        </p>

                        <h2 class="my-4"><?php echo $current_investment; ?></h2>
                        <div class="d-flex align-items-center">
                          <!-- <p class="mb-0 hp-badge-text text-success">10%</p> -->
                        </div>

                      </div>

                      <div class="col-4">
                        <div id="statistics-traffic1"></div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>




            
          </div>


          <!-- General -->
          <div class="col-12">
            <div class="row align-items-center justify-content-between g-24">
              <!-- Referral -->
            <div class="row g-6">
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
                          <!-- <p class="hp-p1-body mb-0 hp-text-color-black-100 hp-text-color-dark-0">Payment Details</p> -->
                          <h4 class="mb-8 fw-bold" id="referralLink" style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 100%;">
                          You can setup or change your Payout details form <a href="payout-details">here</a></h4>
                        </div>
                      </div>
                    </div>
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
</body>

</html>