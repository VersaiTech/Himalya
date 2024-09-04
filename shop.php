<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
ob_start();
session_start();

include './config/config.php';
include "./config/function.php";
?>

<!DOCTYPE html>
<html dir="ltr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <meta name="author" content="Hypeople">
  <meta name="description" content="Responsive, Highly Customizable Dashboard Template">

  <?php include "components/cssComponents/overview-css.php"; ?>

  <title>Dashboard- Orion Trade Ai</title>
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
                  <img class="hp-logo hp-sidebar-visible hp-dark-none" src="app-assets/img/logo/logo-small-dark.png" alt="logo">
                  <img class="hp-logo hp-sidebar-visible hp-dark-block" src="app-assets/img/logo/logo-small.png" alt="logo">
                  <img class="hp-logo hp-sidebar-hidden hp-dir-none hp-dark-none" src="app-assets/img/logo/LOGOFORWHITE.png" alt="logo">
                  <img class="hp-logo hp-sidebar-hidden hp-dir-none hp-dark-block" src="app-assets/img/logo/LOGOFORBLACK.png" alt="logo">
                  <img class="hp-logo hp-sidebar-hidden hp-dir-block hp-dark-none" src="app-assets/img/logo/logo-rtl.svg" alt="logo">
                  <img class="hp-logo hp-sidebar-hidden hp-dir-block hp-dark-block" src="app-assets/img/logo/logo-rtl-dark.svg" alt="logo">
                </a>
              </div>
            </div>
          </div>

          <?php include "components/sidebar.php"; ?>
        </div>

        <!-- <?php include "components/sideProfile.php"; ?> -->
      </div>
    </div>

    <div class="hp-main-layout">
      <?php
      $title1 = "Overview";
      $title2 = "Dashboard";
      include "components/header.php";
      ?>

      <div class="hp-main-layout-content">
        <div class="row mb-32 gy-32">
          <div class="col-12">
            <!-- Carousel -->
            <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
              <div class="carousel-inner">
                <div class="carousel-item active">
                  <img src="app-assets/img/slider/51KYO-lerjL._SX1500_.jpg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                  <img src="app-assets/img/slider/61lwJy4B8PL._SX3000_.jpg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                  <img src="app-assets/img/slider/71Ie3JXGfVL._SX3000_.jpg" class="d-block w-100" alt="...">
                </div>
              </div>
              <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
              </button>
              <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
              </button>
            </div>

            <!-- Filter and Sort Section -->
            <div class="row align-items-center justify-content-between g-16 mt-20">
              <div class="col-6">
                <div class="dropdown">
                  <button class="btn btn-secondary dropdown-toggle" type="button" id="filterDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                    Filter
                  </button>
                  <ul class="dropdown-menu" aria-labelledby="filterDropdown">
                    <li><a class="dropdown-item" href="#">Category 1</a></li>
                    <li><a class="dropdown-item" href="#">Category 2</a></li>
                    <li><a class="dropdown-item" href="#">Category 3</a></li>
                  </ul>
                </div>
              </div>
              <div class="col-6">
                <div class="dropdown">
                  <button class="btn btn-secondary dropdown-toggle" type="button" id="sortDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                    Sort
                  </button>
                  <ul class="dropdown-menu" aria-labelledby="sortDropdown">
                    <li><a class="dropdown-item" href="#">Price: Low to High</a></li>
                    <li><a class="dropdown-item" href="#">Price: High to Low</a></li>
                    <li><a class="dropdown-item" href="#">Newest</a></li>
                    <li><a class="dropdown-item" href="#">Oldest</a></li>
                  </ul>
                </div>
              </div>
            </div>

            <!-- Product Cards -->
            <div class="row gy-32">
              <?php
              $name = "Product 1";
              $price = "$64.99";
              $salePrice = "$59.99";
              $img="app-assets/img/product/3d-glasses-1.png";
              include "components/productCard.php";
              ?>
              <?php
        $name = "product 2";
        $price = "$64.99";
        $salePrice = "$59.99";
        $img="app-assets/img/product/ecommerce-product-img-1.png";
        include "components/productCard.php";
        ?>
        <?php
        $name = "product 3 ";
        $price = "$64.99";
        $salePrice = "$59.99";
        $img="app-assets/img/product/ecommerce-product-img-2.png";
        include "components/productCard.php";
        ?>
        <?php
        $name = "Name";
        $price = "$64.99";
        $salePrice = "$59.99";
        $img="app-assets/img/product/ecommerce-product-img-1.png";
        include "components/productCard.php";
        ?><?php
        $name = "Name";
        $price = "$64.99";
        $salePrice = "$59.99";
        $img="app-assets/img/product/ecommerce-product-img-4.png";
        include "components/productCard.php";
        ?>
            </div>
          </div>
        </div>
      </div>

      <?php include "components/footer.php"; ?>
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