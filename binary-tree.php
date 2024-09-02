<?php include "components/phpComponents/phpcomponents.php"; ?>
<!DOCTYPE html>
<html dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <meta name="author" content="Hypeople">
    <meta name="description" content="Responsive, Highly Customizable Dashboard Template">

    <?php
    include "components/cssComponents/withdraw-history-css.php";
    ?>

    <style>
        .hp-main-layout-contentt {
            position: relative;
            margin: 0;
            -webkit-box-flex: 1;
            -ms-flex: 1 0 100%;
            flex: 1 0 100%;
            max-width: 200%;
            width: 200%;
            height: 100%;
            min-height: 100vh;
            overflow: auto;
        }

        .hp-main-layoutt{
            display: flex;
            flex-direction: column;
            width: 200%;
            height: 100%;
            margin-bottom: 15vw;
        }
        .hp-main-layout {
  max-width: calc(100%);
  -webkit-box-flex: 0;
      -ms-flex: 0 0 calc(100% - 1px);
          flex: 0 0 calc(100% - 1px);
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-orient: vertical;
  -webkit-box-direction: normal;
      -ms-flex-direction: column;
          flex-direction: column;
  -webkit-box-pack: justify;
      -ms-flex-pack: justify;
          justify-content: space-between;
  margin: 0 auto;
}
    </style>
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
    <main class="hp-bg-color-dark-90 d-flex min-vh-100 min-vw-100">
        <div class="hp-main-layout">
            <?php
            $title1 = "Overview";
            $title2 = "My Binary Tree";
            include "components/header.php";
            ?>
 <div class="offcanvas offcanvas-start hp-mobile-sidebar bg-black-20 hp-bg-dark-90" tabindex="-1" id="mobileMenu" aria-labelledby="mobileMenuLabel" style="width: 256px;">
                <div class="offcanvas-header justify-content-between align-items-center ms-16 me-8 mt-16 p-0">
                    <div class="w-auto px-0">
                        <div class="hp-header-logo d-flex align-items-center">
                            <a href="overview" class="position-relative">
                                <div class="hp-header-logo-icon position-absolute bg-black-20 hp-bg-dark-90 rounded-circle border border-black-0 hp-border-color-dark-90 d-flex align-items-center justify-content-center" style="width: 18px; height: 18px; top: -5px;">
                                    <svg class="hp-fill-color-dark-0" width="12" height="12" viewbox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M0.709473 0L1.67247 10.8L5.99397 12L10.3267 10.7985L11.2912 0H0.710223H0.709473ZM9.19497 3.5325H4.12647L4.24722 4.88925H9.07497L8.71122 8.95575L5.99397 9.70875L3.28047 8.95575L3.09522 6.87525H4.42497L4.51947 7.93275L5.99472 8.33025L5.99772 8.3295L7.47372 7.93125L7.62672 6.21375H3.03597L2.67897 2.208H9.31422L9.19572 3.5325H9.19497Z" fill="#2D3436"></path>
                                    </svg>
                                </div>

                                <img class="hp-logo hp-sidebar-visible hp-dark-none" src="app-assets/img/logo/logo-small-dark.png" alt="logo">
                                <img class="hp-logo hp-sidebar-visible hp-dark-block" src="app-assets/img/logo/logo-small.png" alt="logo">
                                <img class="hp-logo hp-sidebar-hidden hp-dir-none hp-dark-none" src="app-assets/img/logo/LOGOFORWHITE.png" alt="logo">
                                <img class="hp-logo hp-sidebar-hidden hp-dir-none hp-dark-block" src="app-assets/img/logo/LOGOFORBLACK.png" alt="logo">
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
                                            <div class="hp-header-logo-icon position-absolute bg-black-20 hp-bg-dark-90 rounded-circle border border-black-0 hp-border-color-dark-90 d-flex align-items-center justify-content-center" style="width: 18px; height: 18px; top: -5px;">
                                                <svg class="hp-fill-color-dark-0" width="12" height="12" viewbox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M0.709473 0L1.67247 10.8L5.99397 12L10.3267 10.7985L11.2912 0H0.710223H0.709473ZM9.19497 3.5325H4.12647L4.24722 4.88925H9.07497L8.71122 8.95575L5.99397 9.70875L3.28047 8.95575L3.09522 6.87525H4.42497L4.51947 7.93275L5.99472 8.33025L5.99772 8.3295L7.47372 7.93125L7.62672 6.21375H3.03597L2.67897 2.208H9.31422L9.19572 3.5325H9.19497Z" fill="#2D3436"></path>
                                                </svg>
                                            </div>

                                            <img class="hp-logo hp-sidebar-visible hp-dark-none" src="app-assets/img/logo/logo-small-dark.png" alt="logo">
                                            <img class="hp-logo hp-sidebar-visible hp-dark-block" src="app-assets/img/logo/logo-small.png" alt="logo">
                                            <img class="hp-logo hp-sidebar-hidden hp-dir-none hp-dark-none" src="app-assets/img/logo/LOGOFORWHITE.png" alt="logo">
                                            <img class="hp-logo hp-sidebar-hidden hp-dir-none hp-dark-block" src="app-assets/img/logo/LOGOFORBLACK.png" alt="logo">
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


            <div class="hp-main-layout-contentt">
                <div class="row mb-32 gy-32">
                    <div class="col-12">
                        <!-- custom form -->
                        <div class="card custom-card" style="max-width: 200%; width:200%">
                            <div class="card-body" style="max-width: 200%; width:200%">
                                <div class=" flex-wrap mb-3">
                                    <a href="overview" class="btn btn-primary">
                                        <i class="fas fa-arrow-left"></i> Back to Overview
                                    </a>
                                </div>

                                <div class="mb-24"></div>

                                <?php include "components/binary-tree.php"; ?>
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
    include "components/jsComponents/client-withdraw-js.php"
    ?>
</body>

</html>