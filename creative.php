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
      $title1 = "Marketing";
      $title2 = "Creative";
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
      <h3 class="p-24">Thought Stream</h3>
      <div class="hp-main-layout-content d-flex flex-wrap">
      
    <!-- First Row -->
    <div class="row">
    <!-- First Card -->
    <div class="col-12 col-md-6">
        <div class="text-center border p-3">
            <img src="app-assets/img/blog/1.png" alt="Save the Oceans" class="img-fluid mb-3 custom-image">
            <h3 class="mb-2">Why Choose Himalaya RO Systems for Clean Water ?</h3>
            <p>Discuss the benefits of Himalaya RO systems, including advanced filtration technologies, reliability, and cost-effectiveness. Highlight unique features that set them apart from other brands.</p>
            <p class="text-muted">By Himallya RO services</p>
        </div>
    </div>

    <!-- Second Card -->
    <div class="col-12 col-md-6">
        <div class="text-center border p-3">
            <img src="app-assets/img/blog/2.png" alt="Education for All" class="img-fluid mb-3 custom-image">
            <h3 class="mb-2">The Importance of Regular Maintenance for Your Himalaya RO System</h3>
            <p>Explain the need for regular servicing and maintenance of RO systems to ensure optimal performance and longevity. Provide tips on how to maintain the system and when to call for professional help.
            </p>
            <p class="text-muted">By Himallya RO services</p>
        </div>
    </div>

    <!-- Third Card -->
    <div class="col-12 col-md-6">
        <div class="text-center border p-3">
            <img src="app-assets/img/blog/3.png" alt="Tree Planting Drive" class="img-fluid mb-3 custom-image">
            <h3 class="mb-2">How to Troubleshoot Common Issues with Your Himalaya RO System</h3>
            <p>Offer a guide on diagnosing and solving common problems that users might face with their Himalaya RO systems, such as low water flow, unusual tastes, or leaks.</p>
            <p class="text-muted">By Himallya RO services</p>
        </div>
    </div>

    <!-- Fourth Card -->
    <div class="col-12 col-md-6">
        <div class="text-center border p-3">
            <img src="app-assets/img/blog/4.png" alt="Mental Health Awareness" class="img-fluid mb-3 custom-image">
            <h3 class="mb-2">Comparing Himalaya RO Systems: Which Model is Right for You?</h3>
            <p>Compare different models of Himalaya RO systems available in the market. Discuss their features, capacities, and best use cases to help readers choose the right model for their needs.</p>
            <p class="text-muted">By Himallya RO services</p>
        </div>
    </div>

    <!-- Fifth Card -->
    <div class="col-12 col-md-6">
        <div class="text-center border p-3">
            <img src="app-assets/img/blog/5.png" alt="Food Drive for the Homeless" class="img-fluid mb-3 custom-image">
            <h3 class="mb-2">Understanding the Filtration Process: How Himalaya RO Systems Purify Your Water</h3>
            <p>Provide an in-depth explanation of the reverse osmosis process and how Himalaya RO systems effectively remove contaminants from water. Include diagrams or infographics for better understanding.</p>
            <p class="text-muted">By Himallya RO services</p>
        </div>
    </div>

    <!-- Sixth Card -->
    <div class="col-12 col-md-6">
        <div class="text-center border p-3">
            <img src="app-assets/img/blog/6.png" alt="Animal Rescue and Adoption" class="img-fluid mb-3 custom-image">
            <h3 class="mb-2">Customer Stories: Real Experiences with Himalaya RO Services</h3>
            <p>Share testimonials and case studies from customers who have used Himalaya RO systems. Highlight their experiences, satisfaction levels, and how the RO system has improved their water quality.</p>
            <p class="text-muted">By Himallya RO services</p>
        </div>
    </div>
</div>

<style>
  .custom-image {
    width: 500px;
    height: 360px; /* You can adjust the height as needed */
    object-fit: cover; /* Ensures the image fits within the height without distortion */
}
</style>






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