<?php include "components/phpComponents/phpcomponents.php";?>
<!DOCTYPE html>
<html dir="ltr">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />

    <meta name="author" content="Hypeople" />
    <meta
      name="description"
      content="Responsive, Highly Customizable Dashboard Template"
    />

    <!-- Favicon -->
    <?php 
    include "components\cssComponents\client-withdraw-css.php"
    ?>

    <title>Dashboard- Himallya RO Services</title>

    <script>
      !(function (t, h, e, j, s, n) {
        (t.hj =
          t.hj ||
          function () {
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
      <div
        class="hp-sidebar hp-bg-color-black-20 hp-bg-color-dark-90 border-end border-black-40 hp-border-color-dark-80"
      >
        <div class="hp-sidebar-container">
          <div class="hp-sidebar-header-menu">
            <div class="row justify-content-between align-items-end mx-0">
              <div
                class="w-auto px-0 hp-sidebar-collapse-button hp-sidebar-visible"
              >
                <div class="hp-cursor-pointer">
                  <svg
                    width="8"
                    height="15"
                    viewbox="0 0 8 15"
                    fill="none"
                    xmlns="http://www.w3.org/2000/svg"
                  >
                    <path
                      d="M3.91102 1.73796L0.868979 4.78L0 3.91102L3.91102 0L7.82204 3.91102L6.95306 4.78L3.91102 1.73796Z"
                      fill="#B2BEC3"
                    ></path>
                    <path
                      d="M3.91125 12.0433L6.95329 9.00125L7.82227 9.87023L3.91125 13.7812L0.000224113 9.87023L0.869203 9.00125L3.91125 12.0433Z"
                      fill="#B2BEC3"
                    ></path>
                  </svg>
                </div>
              </div>

              <div class="w-auto px-0">
                <div class="hp-header-logo d-flex align-items-center">
                  <a href="overview" class="position-relative">
                    <img
                      class="hp-logo hp-sidebar-visible hp-dark-none"
                      src="app-assets/img/logo/logo-small-dark.png"
                      alt="logo"
                    />
                    <img
                      class="hp-logo hp-sidebar-visible hp-dark-block"
                      src="app-assets/img/logo/logo-small.png"
                      alt="logo"
                    />
                    <img
                      class="hp-logo hp-sidebar-hidden hp-dir-none hp-dark-none"
                      src="app-assets/img/logo/LOGOFORWHITE.png"
                      alt="logo"
                    />
                    <img
                      class="hp-logo hp-sidebar-hidden hp-dir-none hp-dark-block"
                      src="app-assets/img/logo/LOGOFORBLACK.png"
                      alt="logo"
                    />
                    <img
                      class="hp-logo hp-sidebar-hidden hp-dir-block hp-dark-none"
                      src="app-assets/img/logo/logo-rtl.svg"
                      alt="logo"
                    />
                    <img
                      class="hp-logo hp-sidebar-hidden hp-dir-block hp-dark-block"
                      src="app-assets/img/logo/logo-rtl-dark.svg"
                      alt="logo"
                    />
                  </a>
                </div>
              </div>

              <div
                class="w-auto px-0 hp-sidebar-collapse-button hp-sidebar-hidden"
              >
                <div class="hp-cursor-pointer mb-4">
                  <svg
                    width="8"
                    height="15"
                    viewbox="0 0 8 15"
                    fill="none"
                    xmlns="http://www.w3.org/2000/svg"
                  >
                    <path
                      d="M3.91102 1.73796L0.868979 4.78L0 3.91102L3.91102 0L7.82204 3.91102L6.95306 4.78L3.91102 1.73796Z"
                      fill="#B2BEC3"
                    ></path>
                    <path
                      d="M3.91125 12.0433L6.95329 9.00125L7.82227 9.87023L3.91125 13.7812L0.000224113 9.87023L0.869203 9.00125L3.91125 12.0433Z"
                      fill="#B2BEC3"
                    ></path>
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
      $title1="My Payment";
      $title2="Withdrwal";
  include "components/header.php";
  ?>

        <div
          class="offcanvas offcanvas-start hp-mobile-sidebar bg-black-20 hp-bg-dark-90"
          tabindex="-1"
          id="mobileMenu"
          aria-labelledby="mobileMenuLabel"
          style="width: 256px"
        >
          <div
            class="offcanvas-header justify-content-between align-items-center ms-16 me-8 mt-16 p-0"
          >
            <div class="w-auto px-0">
              <div class="hp-header-logo d-flex align-items-center">
                <a href="overview" class="position-relative">
                  <div
                    class="hp-header-logo-icon position-absolute bg-black-20 hp-bg-dark-90 rounded-circle border border-black-0 hp-border-color-dark-90 d-flex align-items-center justify-content-center"
                    style="width: 18px; height: 18px; top: -5px"
                  >
                    <svg
                      class="hp-fill-color-dark-0"
                      width="12"
                      height="12"
                      viewbox="0 0 12 12"
                      fill="none"
                      xmlns="http://www.w3.org/2000/svg"
                    >
                      <path
                        d="M0.709473 0L1.67247 10.8L5.99397 12L10.3267 10.7985L11.2912 0H0.710223H0.709473ZM9.19497 3.5325H4.12647L4.24722 4.88925H9.07497L8.71122 8.95575L5.99397 9.70875L3.28047 8.95575L3.09522 6.87525H4.42497L4.51947 7.93275L5.99472 8.33025L5.99772 8.3295L7.47372 7.93125L7.62672 6.21375H3.03597L2.67897 2.208H9.31422L9.19572 3.5325H9.19497Z"
                        fill="#2D3436"
                      ></path>
                    </svg>
                  </div>

                  <img
                    class="hp-logo hp-sidebar-visible hp-dark-none"
                    src="app-assets/img/logo/logo-small-dark.png"
                    alt="logo"
                  />
                  <img
                    class="hp-logo hp-sidebar-visible hp-dark-block"
                    src="app-assets/img/logo/logo-small.png"
                    alt="logo"
                  />
                  <img
                    class="hp-logo hp-sidebar-hidden hp-dir-none hp-dark-none"
                    src="app-assets/img/logo/LOGOFORWHITE.png"
                    alt="logo"
                  />
                  <img
                    class="hp-logo hp-sidebar-hidden hp-dir-none hp-dark-block"
                    src="app-assets/img/logo/LOGOFORBLACK.png"
                    alt="logo"
                  />
                  <img
                    class="hp-logo hp-sidebar-hidden hp-dir-block hp-dark-none"
                    src="app-assets/img/logo/logo-rtl.svg"
                    alt="logo"
                  />
                  <img
                    class="hp-logo hp-sidebar-hidden hp-dir-block hp-dark-block"
                    src="app-assets/img/logo/logo-rtl-dark.svg"
                    alt="logo"
                  />
                </a>
              </div>
            </div>

            <div
              class="w-auto px-0 hp-sidebar-collapse-button hp-sidebar-hidden"
              data-bs-dismiss="offcanvas"
              aria-label="Close"
            >
              <button
                type="button"
                class="btn btn-text btn-icon-only bg-transparent"
              >
                <i
                  class="ri-close-fill lh-1 hp-text-color-black-80"
                  style="font-size: 24px"
                ></i>
              </button>
            </div>
          </div>

          <div
            class="hp-sidebar hp-bg-color-black-20 hp-bg-color-dark-90 border-end border-black-40 hp-border-color-dark-80"
          >
            <div class="hp-sidebar-container">
              <div class="hp-sidebar-header-menu">
                <div class="row justify-content-between align-items-end mx-0">
                  <div
                    class="w-auto px-0 hp-sidebar-collapse-button hp-sidebar-visible"
                  >
                    <div class="hp-cursor-pointer">
                      <svg
                        width="8"
                        height="15"
                        viewbox="0 0 8 15"
                        fill="none"
                        xmlns="http://www.w3.org/2000/svg"
                      >
                        <path
                          d="M3.91102 1.73796L0.868979 4.78L0 3.91102L3.91102 0L7.82204 3.91102L6.95306 4.78L3.91102 1.73796Z"
                          fill="#B2BEC3"
                        ></path>
                        <path
                          d="M3.91125 12.0433L6.95329 9.00125L7.82227 9.87023L3.91125 13.7812L0.000224113 9.87023L0.869203 9.00125L3.91125 12.0433Z"
                          fill="#B2BEC3"
                        ></path>
                      </svg>
                    </div>
                  </div>

                  <div class="w-auto px-0">
                    <div class="hp-header-logo d-flex align-items-center">
                      <a href="overview" class="position-relative">
                        <div
                          class="hp-header-logo-icon position-absolute bg-black-20 hp-bg-dark-90 rounded-circle border border-black-0 hp-border-color-dark-90 d-flex align-items-center justify-content-center"
                          style="width: 18px; height: 18px; top: -5px"
                        >
                          <svg
                            class="hp-fill-color-dark-0"
                            width="12"
                            height="12"
                            viewbox="0 0 12 12"
                            fill="none"
                            xmlns="http://www.w3.org/2000/svg"
                          >
                            <path
                              d="M0.709473 0L1.67247 10.8L5.99397 12L10.3267 10.7985L11.2912 0H0.710223H0.709473ZM9.19497 3.5325H4.12647L4.24722 4.88925H9.07497L8.71122 8.95575L5.99397 9.70875L3.28047 8.95575L3.09522 6.87525H4.42497L4.51947 7.93275L5.99472 8.33025L5.99772 8.3295L7.47372 7.93125L7.62672 6.21375H3.03597L2.67897 2.208H9.31422L9.19572 3.5325H9.19497Z"
                              fill="#2D3436"
                            ></path>
                          </svg>
                        </div>

                        <img
                          class="hp-logo hp-sidebar-visible hp-dark-none"
                          src="app-assets/img/logo/logo-small-dark.png"
                          alt="logo"
                        />
                        <img
                          class="hp-logo hp-sidebar-visible hp-dark-block"
                          src="app-assets/img/logo/logo-small.png"
                          alt="logo"
                        />
                        <img
                          class="hp-logo hp-sidebar-hidden hp-dir-none hp-dark-none"
                          src="app-assets/img/logo/LOGOFORWHITE.png"
                          alt="logo"
                        />
                        <img
                          class="hp-logo hp-sidebar-hidden hp-dir-none hp-dark-block"
                          src="app-assets/img/logo/LOGOFORBLACK.png"
                          alt="logo"
                        />
                        <img
                          class="hp-logo hp-sidebar-hidden hp-dir-block hp-dark-none"
                          src="app-assets/img/logo/logo-rtl.svg"
                          alt="logo"
                        />
                        <img
                          class="hp-logo hp-sidebar-hidden hp-dir-block hp-dark-block"
                          src="app-assets/img/logo/logo-rtl-dark.svg"
                          alt="logo"
                        />
                      </a>

                      <a
                        href="https://hypeople-studio.gitbook.io/yoda/change-log"
                        target="_blank"
                        class="d-flex"
                      >
                        <span
                          class="hp-sidebar-hidden hp-caption fw-normal hp-text-color-primary-1"
                          ></span
                        >
                      </a>
                    </div>
                  </div>

                  <div
                    class="w-auto px-0 hp-sidebar-collapse-button hp-sidebar-hidden"
                  >
                    <div class="hp-cursor-pointer mb-4">
                      <svg
                        width="8"
                        height="15"
                        viewbox="0 0 8 15"
                        fill="none"
                        xmlns="http://www.w3.org/2000/svg"
                      >
                        <path
                          d="M3.91102 1.73796L0.868979 4.78L0 3.91102L3.91102 0L7.82204 3.91102L6.95306 4.78L3.91102 1.73796Z"
                          fill="#B2BEC3"
                        ></path>
                        <path
                          d="M3.91125 12.0433L6.95329 9.00125L7.82227 9.87023L3.91125 13.7812L0.000224113 9.87023L0.869203 9.00125L3.91125 12.0433Z"
                          fill="#B2BEC3"
                        ></path>
                      </svg>
                    </div>
                  </div>
                </div>

                <?php
  include "components/sidebar.php";
  ?>
              </div>

              <<?php
  include "components/sideProfile.php";
  ?>
            </div>
          </div>
        </div>

        <div class="hp-main-layout-content">
          <div class="row mb-32 gy-32">

            <!-- Withdraw Request -->
            <div class="col-12 col-md-7">
              <div class="card custom-card">
                <div class="card-body">
                  <h3 class="card-title mb-25">Withdraw Request</h3>
                  <h6 class="card-title mb-32">
                    If you want to withdraw from live account then transfer to
                    wallet through transfer link.
                  </h6>
                  <form>
                    <div class="mb-24 mt-15">
                      <label for="mt5group" class="form-label"
                        >LIVE ACCOUNT/ WALLET</label
                      >
                      <select
                        class="form-select"
                        id="mt5group"
                        aria-describedby="mt5groupHelp"
                      >
                        <option value="" selected>Please Select</option>
                        <option value="Orion//Demo">Wallet Amount</option>
                      </select>
                    </div>
                    <div class="mb-24 mt-15">
                      <label for="mt5group" class="form-label">AMOUNT</label>
                      <input type="number" class="form-control" id="amount" />
                    </div>
                    <div class="mb-24">
                      <label for="leverage" class="form-label"
                        >WITHDRAW TYPE</label
                      >
                      <select class="form-select" id="leverage">
                        <option value="" selected>Please Select</option>
                        <option value="100">By Bank</option>
                        <option value="200">By USDT</option>
                      </select>
                    </div>
                    <div class="mb-24">
                      <label for="leverage" class="form-label"
                        >Wallet Address(Optional)</label
                      >
                      <input type="text" class="form-control" id="amount" />
                    </div>
                    <div class="mb-24">
                        <label for="otp" class="form-label">OTP</label>
                        <div class="row d-flex justify-content-between">
                            <div class="col-6">
                                <input type="text" class="form-control" id="otp" placeholder="Enter OTP">
                            </div>
                            <div class="col-auto">
                                <button type="button" class="btn btn-secondary">Verify OTP</button>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end">
                      <button class="pushable">
                        <span class="shadow"></span>
                        <span class="edge"></span>
                        <span class="front">Withdraw Request</span>
                      </button>
                    </div>
                  </form>
                </div>
              </div>
            </div>

            <!-- Withdraw Request -->
            <div class="col-12 col-md-5">
                <div class="card custom-card">
                  <div class="card-body">
                    <h3 class="card-title mb-25">Add Wallet Address</h3>
                    <h6 class="card-title mb-32">
                        USDT &nbsp;&nbsp; 11454q34t43tqgrqgt
                      </h6>
                    <form>
                      <div class="mb-24 mt-15">
                        <label for="mt5group" class="form-label"
                          >WALLET TYPE</label
                        >
                        <select
                          class="form-select"
                          id="mt5group"
                          aria-describedby="mt5groupHelp"
                        >
                          <option value="" selected>Please Select</option>
                          <option value="Orion//Demo">Wallet Type</option>
                        </select>
                      </div>
                      <div class="mb-24 mt-15">
                        <label for="mt5group" class="form-label">WALLET ADDRESS</label>
                        <input type="text" class="form-control" id="amount" />
                      </div>
                      <div class="d-flex justify-content-end">
                        <button class="pushable">
                          <span class="shadow"></span>
                          <span class="edge"></span>
                          <span class="front">Add Wallet Address</span>
                        </button>
                      </div>
                    </form>
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

  

    <div class="scroll-to-top">
      <button
        type="button"
        class="btn btn-primary btn-icon-only rounded-circle hp-primary-shadow"
      >
        <svg
          stroke="currentColor"
          fill="currentColor"
          stroke-width="0"
          viewbox="0 0 24 24"
          height="16px"
          width="16px"
          xmlns="http://www.w3.org/2000/svg"
        >
          <g>
            <path fill="none" d="M0 0h24v24H0z"></path>
            <path
              d="M13 7.828V20h-2V7.828l-5.364 5.364-1.414-1.414L12 4l7.778 7.778-1.414 1.414L13 7.828z"
            ></path>
          </g>
        </svg>
      </button>
    </div>

    <!-- Plugin -->
    <?php
    include "components\jsComponents\client-withdraw-js.php";
    ?>
  </body>
</html>
