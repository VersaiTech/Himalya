<?php include "components/phpComponents/phpcomponents.php"; ?>
<!DOCTYPE html>
<html dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <meta name="author" content="Hypeople">
    <meta name="description" content="Responsive, Highly Customizable Dashboard Template">

    <?php include "components/cssComponents/withdraw-history-css.php"; ?>

    <style>
    .tree ul {
        padding-top: 20px;
        position: relative;
        transition: all 0.5s;
    }

    .tree li {
        float: left;
        text-align: center;
        list-style-type: none;
        position: relative;
        padding: 20px 5px 0 5px;
        transition: all 0.5s;
    }

    .tree li::before, .tree li::after {
        content: '';
        position: absolute;
        top: 0;
        right: 50%;
        border-top: 2px solid #ccc;
        width: 50%;
        height: 20px;
    }

    .tree li::after {
        right: auto;
        left: 50%;
        border-left: 2px solid #ccc;
    }

    .tree li:only-child::after, .tree li:only-child::before {
        display: none;
    }

    .tree li:only-child {
        padding-top: 0;
    }

    .tree li:first-child::before, .tree li:last-child::after {
        border: 0 none;
    }

    .tree li:last-child::before {
        border-right: 2px solid #ccc;
        border-radius: 0 5px 0 0;
    }

    .tree li:first-child::after {
        border-radius: 5px 0 0 0;
    }

    .tree li > ul::before {
        content: '';
        position: absolute;
        top: 0;
        left: 50%;
        border-left: 2px solid #ccc;
        width: 0;
        height: 20px;
    }

    .tree li a {
        border: 2px solid #ccc;
        padding: 5px 10px;
        text-decoration: none;
        color: #666;
        font-family: arial, verdana, tahoma;
        font-size: 11px;
        display: inline-block;
        border-radius: 5px;
        transition: all 0.5s;
    }

    .tree li a:hover, .tree li a:hover + ul li a {
        background: #c8e4f8;
        color: #000;
        border: 2px solid #94a0b4;
    }

    .tree li a:hover + ul li::after, .tree li a:hover + ul li::before, .tree li a:hover + ul::before {
        border-color: #94a0b4;
    }
</style>



    <title>Dashboard - Himallya RO Services</title>

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

            <!-- Sidebar -->
            <div class="offcanvas offcanvas-start hp-mobile-sidebar bg-black-20 hp-bg-dark-90" tabindex="-1" id="mobileMenu" aria-labelledby="mobileMenuLabel" style="width: 256px;">
                <?php include "components/sidebar.php"; ?>
                <?php include "components/sideProfile.php"; ?>
            </div>

            <!-- Main Content -->
            <div class="hp-main-layout-contentt">
                <div class="row mb-32 gy-32">
                    <div class="col-12">
                        <div class="card custom-card">
                            <div class="card-body">
                                <div class="flex-wrap mb-3">
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

            <!-- Footer -->
            <?php include "components/footer.php"; ?>
        </div>
    </main>

    <?php include "components/appTheme.php"; ?>

    <a href="https://themeforest.net/item/yoda-react-admin-template-react-hooks-redux-toolkit-ant-design/33791048" target="_blank" class="hp-buy-now-btn position-fixed"></a>

    <div class="scroll-to-top">
        <button type="button" class="btn btn-primary btn-icon-only rounded-circle hp-primary-shadow">
            <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" height="16px" width="16px" xmlns="http://www.w3.org/2000/svg">
                <g>
                    <path fill="none" d="M0 0h24v24H0z"></path>
                    <path d="M13 7.828V20h-2V7.828l-5.364 5.364-1.414-1.414L12 4l7.778 7.778-1.414 1.414L13 7.828z"></path>
                </g>
            </svg>
        </button>
    </div>

    <?php include "components/jsComponents/client-withdraw-js.php"; ?>

    
</body>

</html>
