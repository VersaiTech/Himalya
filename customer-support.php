<?php include "components/phpComponents/phpcomponents.php"; ?>
<!DOCTYPE html>
<html dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <meta name="author" content="Hypeople">
    <meta name="description" content="Responsive, Highly Customizable Dashboard Template">

    <!-- Favicon -->
    <?php
    include "components/cssComponents/customer-support-css.php"
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
            $title1 = "Support";
            $title2 = "Ticket";
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
                        <div class="hp-bg-black-bg py-32 py-sm-64 px-24 px-sm-48 px-md-80 position-relative overflow-hidden hp-page-content" style="border-radius: 32px;">
                            <svg width="358" height="336" fill="none" xmlns="http://www.w3.org/2000/svg" class="position-absolute hp-rtl-scale-x-n1" style="bottom: 0px; right: 0px;">
                                <path d="M730.404 135.471 369.675-6.641l88.802 164.001-243.179-98.8 246.364 263.281-329.128-126.619 114.698 166.726-241.68-62.446" stroke="url(#a)" stroke-width="40" stroke-linejoin="bevel"></path>
                                <defs>
                                    <lineargradient id="a" x1="315.467" y1="6.875" x2="397.957" y2="337.724" gradientunits="userSpaceOnUse">
                                        <stop stop-color="#fff"></stop>
                                        <stop offset="1" stop-color="#fff" stop-opacity="0"></stop>
                                    </lineargradient>
                                </defs>
                            </svg>

                            <div class="row">
                                <div class="col-sm-6 col-12">
                                    <div class="row">
                                        <div class="col-12">
                                            <h1 class="mb-0 hp-text-color-black-0"> Customer Support </h1>
                                        </div>

                                        <div class="col-12">
                                            <ol class="breadcrumb mt-24">
                                                <li class="breadcrumb-item breadcrumb-link">
                                                    <a href="/"> Home </a>
                                                </li>


                                                <li class="breadcrumb-item">
                                                    <a href="javascript:;">
                                                        <span class="hp-text-color-black-0"> Customer Support </span>
                                                    </a>
                                                </li>




                                            </ol>
                                        </div>


                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="row g-32">






                            <div class="col-12 col-xl-4">
                                <div class="card hp-card-6">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-12 text-center">
                                                <img src="app-assets/img/customer-service.png" style="max-width: 200px;" alt="Buy Pro Account to explore Premium Features" class="hp-dark-none">
                                                <img src="app-assets/img/customer-service.png" style="max-width: 200px;" alt="Buy Pro Account to explore Premium Features" class="hp-dark-block mx-auto">

                                                <h4 class="my-24 me-4 fw-bold">Send a Whatsapp Message  or Call to our team</h4>
                                                <h6 class="my-24 me-4 fw-bold">+917610750147</h6>


                                                <a href="https://wa.me/917610750146" target="_blank" class="btn btn-primary">
                                                    <span>Message NOW</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-xl-4">
                                <div class="card hp-card-6">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-12 text-center">
                                                <img src="app-assets/img/whatsapp.png" style="max-width: 200px;" alt="Buy Pro Account to explore Premium Features" class="hp-dark-none">
                                                <img src="app-assets/img/whatsapp.png" style="max-width: 200px;" alt="Buy Pro Account to explore Premium Features" class="hp-dark-block mx-auto">

                                                <h4 class="my-24 me-4 fw-bold">Send a Whatsapp Message to Your Sponsorer</h4>
                                                <h6 class="my-24 me-4 fw-bold">+917610750147</h6>

                                                <a href="https://wa.me/917610750146" target="_blank" class="btn btn-primary">
                                                    <span>Message NOW</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                          



                            <div class="col-12 col-xl-4">
                                <div class="card hp-card-6">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-12 text-center">
                                                <img src="app-assets/img/mail.png" alt="Upgrade Account" style="max-width: 200px;" class="hp-dark-none">
                                                <img src="app-assets/img/mail.png" style="max-width: 200px;" alt="Upgrade Account" class="hp-dark-block mx-auto">

                                                <form class="mt-36" action="https://mail.google.com/mail/u/0/#inbox?compose=new" method="get" target="_blank">
                                                    <input type="hidden" name="to" value="support@himallaya.com">
                                                    <div class="mb-16">
                                                        <label for="subscribeEmail" class="w-100 text-start form-label">
                                                            <span class="text-danger me-8">*</span>Email: support@himallaya.com
                                                        </label>
                                                    </div>
                                                    <button type="submit" class="btn btn-primary"  >Send Email</button>
                                                </form>
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

    <!-- Plugin -->
    <?php
    include  "components/jsComponents/customer-support-js.php"
    ?>
</body>

</html>