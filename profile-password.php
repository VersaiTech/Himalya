<?php include "components/phpComponents/phpcomponents.php"; ?>
<!DOCTYPE html>
<html dir="ltr">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />

  <meta name="author" content="Hypeople" />
  <meta
    name="description"
    content="Responsive, Highly Customizable Dashboard Template" />

  <?php
  include "components/cssComponents/profile-password-css.php"
  ?>

  <title>Profile- Orion Trade Ai</title>

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
    <div
      class="hp-sidebar hp-bg-color-black-20 hp-bg-color-dark-90 border-end border-black-40 hp-border-color-dark-80">
      <div class="hp-sidebar-container">
        <div class="hp-sidebar-header-menu">
          <div class="row justify-content-between align-items-end mx-0">
            <div
              class="w-auto px-0 hp-sidebar-collapse-button hp-sidebar-visible">
              <div class="hp-cursor-pointer">
                <svg
                  width="8"
                  height="15"
                  viewbox="0 0 8 15"
                  fill="none"
                  xmlns="http://www.w3.org/2000/svg">
                  <path
                    d="M3.91102 1.73796L0.868979 4.78L0 3.91102L3.91102 0L7.82204 3.91102L6.95306 4.78L3.91102 1.73796Z"
                    fill="#B2BEC3"></path>
                  <path
                    d="M3.91125 12.0433L6.95329 9.00125L7.82227 9.87023L3.91125 13.7812L0.000224113 9.87023L0.869203 9.00125L3.91125 12.0433Z"
                    fill="#B2BEC3"></path>
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

            <div
              class="w-auto px-0 hp-sidebar-collapse-button hp-sidebar-hidden">
              <div class="hp-cursor-pointer mb-4">
                <svg
                  width="8"
                  height="15"
                  viewbox="0 0 8 15"
                  fill="none"
                  xmlns="http://www.w3.org/2000/svg">
                  <path
                    d="M3.91102 1.73796L0.868979 4.78L0 3.91102L3.91102 0L7.82204 3.91102L6.95306 4.78L3.91102 1.73796Z"
                    fill="#B2BEC3"></path>
                  <path
                    d="M3.91125 12.0433L6.95329 9.00125L7.82227 9.87023L3.91125 13.7812L0.000224113 9.87023L0.869203 9.00125L3.91125 12.0433Z"
                    fill="#B2BEC3"></path>
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
      $title1 = "Profile";
      $title2 = "Change Password";
      include "components/header.php";
      ?>

      <div
        class="offcanvas offcanvas-start hp-mobile-sidebar bg-black-20 hp-bg-dark-90"
        tabindex="-1"
        id="mobileMenu"
        aria-labelledby="mobileMenuLabel"
        style="width: 256px">
        <div
          class="offcanvas-header justify-content-between align-items-center ms-16 me-8 mt-16 p-0">
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

              <a
                href="https://hypeople-studio.gitbook.io/yoda/change-log"
                target="_blank"
                class="d-flex">
                <span
                  class="hp-sidebar-hidden hp-caption fw-normal hp-text-color-primary-1"></span>
              </a>
            </div>
          </div>

          <div
            class="w-auto px-0 hp-sidebar-collapse-button hp-sidebar-hidden"
            data-bs-dismiss="offcanvas"
            aria-label="Close">
            <button
              type="button"
              class="btn btn-text btn-icon-only bg-transparent">
              <i
                class="ri-close-fill lh-1 hp-text-color-black-80"
                style="font-size: 24px"></i>
            </button>
          </div>
        </div>

        <div
          class="hp-sidebar hp-bg-color-black-20 hp-bg-color-dark-90 border-end border-black-40 hp-border-color-dark-80">
          <div class="hp-sidebar-container">
            <div class="hp-sidebar-header-menu">
              <div class="row justify-content-between align-items-end mx-0">
               

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

                    <a
                      href="https://hypeople-studio.gitbook.io/yoda/change-log"
                      target="_blank"
                      class="d-flex">
                      <span
                        class="hp-sidebar-hidden hp-caption fw-normal hp-text-color-primary-1"></span>
                    </a>
                  </div>
                </div>

                <div
                  class="w-auto px-0 hp-sidebar-collapse-button hp-sidebar-hidden">
                  <div class="hp-cursor-pointer mb-4">
                    <svg
                      width="8"
                      height="15"
                      viewbox="0 0 8 15"
                      fill="none"
                      xmlns="http://www.w3.org/2000/svg">
                      <path
                        d="M3.91102 1.73796L0.868979 4.78L0 3.91102L3.91102 0L7.82204 3.91102L6.95306 4.78L3.91102 1.73796Z"
                        fill="#B2BEC3"></path>
                      <path
                        d="M3.91125 12.0433L6.95329 9.00125L7.82227 9.87023L3.91125 13.7812L0.000224113 9.87023L0.869203 9.00125L3.91125 12.0433Z"
                        fill="#B2BEC3"></path>
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
            <div
              class="row hp-profile-mobile-menu-btn bg-black-0 hp-bg-color-dark-100 rounded py-12 px-8 px-sm-12 mb-16 mx-0">
              <div
                class="d-inline-block"
                data-bs-toggle="offcanvas"
                data-bs-target="#profileMobileMenu"
                aria-controls="profileMobileMenu">
                <button type="button" class="btn btn-text btn-icon-only">
                  <i
                    class="ri-menu-fill hp-text-color-black-80 hp-text-color-dark-30 lh-1"
                    style="font-size: 24px"></i>
                </button>
              </div>
            </div>

            <div
              class="row bg-black-0 hp-bg-color-dark-100 rounded pe-16 pe-sm-32 mx-0">
              <div class="col hp-profile-menu py-24" style="flex: 0 0 240px">
                <div class="w-100">
                  <div
                    class="hp-profile-menu-header mt-16 mt-lg-0 text-center">


                    <div class="d-flex justify-content-center">
                      <div class="d-inline-block position-relative">
                        <div
                          class="avatar-item d-flex align-items-center justify-content-center rounded-circle"
                          style="width: 80px; height: 80px">
                          <img src="app-assets/img/memoji/memoji-1.png" />
                        </div>


                      </div>
                    </div>

                    <h3 class="mt-24 mb-4">Dolores Bianca</h3>


                  </div>
                </div>

                <div
                  class="hp-profile-menu-body w-100 text-start mt-48 mt-lg-0">
                  <ul class="me-n1 mx-lg-n12">
                    <li class="mt-4 mb-16">
                      <a
                        href="profile-information"
                        class="position-relative text-black-80 hp-text-color-dark-30 hp-hover-text-color-primary-1 hp-hover-text-color-dark-0 py-12 px-24 d-flex align-items-center">
                        <i class="iconly-Curved-User me-16"></i>
                        <span>Personal Information</span>

                        <span
                          class="hp-menu-item-line position-absolute opacity-0 h-100 top-0 end-0 bg-primary hp-bg-dark-0"
                          style="width: 2px"></span>
                      </a>
                    </li>

                    <li class="mt-4 mb-16">
                      <a
                        href="profile-notifications"
                        class="position-relative text-black-80 hp-text-color-dark-30 hp-hover-text-color-primary-1 hp-hover-text-color-dark-0 py-12 px-24 d-flex align-items-center">
                        <i class="iconly-Curved-Notification me-16"></i>
                        <span>Bank Details</span>

                        <span
                          class="hp-menu-item-line position-absolute opacity-0 h-100 top-0 end-0 bg-primary hp-bg-dark-0"
                          style="width: 2px"></span>
                      </a>
                    </li>


                    <li class="mt-4 mb-16">
                      <a
                        href="profile-password"
                        class="active position-relative text-black-80 hp-text-color-dark-30 hp-hover-text-color-primary-1 hp-hover-text-color-dark-0 py-12 px-24 d-flex align-items-center">
                        <i class="iconly-Curved-Password me-16"></i>
                        <span>Password Change</span>

                        <span
                          class="hp-menu-item-line position-absolute opacity-0 h-100 top-0 end-0 bg-primary hp-bg-dark-0"
                          style="width: 2px"></span>
                      </a>
                    </li>
                  </ul>
                </div>

                <div class="hp-profile-menu-footer">
                  <img
                    src="app-assets/img/pages/profile/menu-img.svg"
                    alt="Profile Image" />
                </div>
              </div>

              <div
                class="hp-profile-mobile-menu offcanvas offcanvas-start"
                tabindex="-1"
                id="profileMobileMenu"
                aria-labelledby="profileMobileMenuLabel">
                <div class="offcanvas-header">

                  <div
                    class="d-inline-block"
                    id="profile-menu-dropdown"
                    data-bs-dismiss="offcanvas"
                    aria-label="Close">
                    <button type="button" class="btn btn-text btn-icon-only">
                      <i
                        class="ri-close-fill text-black-80 lh-1"
                        style="font-size: 24px"></i>
                    </button>
                  </div>
                </div>

                <div class="offcanvas-body p-0">
                  <div
                    class="col hp-profile-menu py-24"
                    style="flex: 0 0 240px">
                    <div class="w-100">
                      <div
                        class="hp-profile-menu-header mt-16 mt-lg-0 text-center">
                        <div class="hp-menu-header-btn mb-12 text-end">
                          <div
                            class="d-inline-block"
                            id="profile-menu-dropdown"
                            data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <button
                              type="button"
                              class="btn btn-text btn-icon-only">
                              <i
                                class="ri-more-2-line text-black-100 hp-text-color-dark-30 lh-1"
                                style="font-size: 24px"></i>
                            </button>
                          </div>

                          <ul
                            class="dropdown-menu"
                            aria-labelledby="profile-menu-dropdown">
                            <li>
                              <a class="dropdown-item" href="javascript:;">Change Avatar</a>
                            </li>
                          </ul>
                        </div>

                        <div class="d-flex justify-content-center">
                          <div class="d-inline-block position-relative">
                            <div
                              class="avatar-item d-flex align-items-center justify-content-center rounded-circle"
                              style="width: 80px; height: 80px">
                              <img src="app-assets/img/memoji/memoji-1.png" />
                            </div>


                          </div>
                        </div>

                        <h3 class="mt-24 mb-4">Dolores Bianca</h3>

                      </div>
                    </div>

                    <div
                      class="hp-profile-menu-body w-100 text-start mt-48 mt-lg-0">
                      <ul class="me-n1 mx-lg-n12">
                        <li class="mt-4 mb-16">
                          <a
                            href="profile-information"
                            class="position-relative text-black-80 hp-text-color-dark-30 hp-hover-text-color-primary-1 hp-hover-text-color-dark-0 py-12 px-24 d-flex align-items-center">
                            <i class="iconly-Curved-User me-16"></i>
                            <span>Personal Information</span>

                            <span
                              class="hp-menu-item-line position-absolute opacity-0 h-100 top-0 end-0 bg-primary hp-bg-dark-0"
                              style="width: 2px"></span>
                          </a>
                        </li>

                        <li class="mt-4 mb-16">
                          <a
                            href="profile-notifications"
                            class="position-relative text-black-80 hp-text-color-dark-30 hp-hover-text-color-primary-1 hp-hover-text-color-dark-0 py-12 px-24 d-flex align-items-center">
                            <i class="iconly-Curved-Notification me-16"></i>
                            <span>Bank Details</span>

                            <span
                              class="hp-menu-item-line position-absolute opacity-0 h-100 top-0 end-0 bg-primary hp-bg-dark-0"
                              style="width: 2px"></span>
                          </a>
                        </li>

                        <li class="mt-4 mb-16">
                          <a
                            href="profile-activity"
                            class="position-relative text-black-80 hp-text-color-dark-30 hp-hover-text-color-primary-1 hp-hover-text-color-dark-0 py-12 px-24 d-flex align-items-center">
                            <i class="iconly-Curved-Activity me-16"></i>
                            <span>Update Address</span>
                            <span
                              class="hp-menu-item-line position-absolute opacity-0 h-100 top-0 end-0 bg-primary hp-bg-dark-0"
                              style="width: 2px"></span>
                          </a>
                        </li>

                        <li class="mt-4 mb-16">
                          <a
                            href="profile-password"
                            class="active position-relative text-black-80 hp-text-color-dark-30 hp-hover-text-color-primary-1 hp-hover-text-color-dark-0 py-12 px-24 d-flex align-items-center">
                            <i class="iconly-Curved-Password me-16"></i>
                            <span>Password Change</span>

                            <span
                              class="hp-menu-item-line position-absolute opacity-0 h-100 top-0 end-0 bg-primary hp-bg-dark-0"
                              style="width: 2px"></span>
                          </a>
                        </li>
                      </ul>
                    </div>

                    <div class="hp-profile-menu-footer">
                      <img
                        src="app-assets/img/pages/profile/menu-img.svg"
                        alt="Profile Image" />
                    </div>
                  </div>
                </div>
              </div>

              <div class="col ps-16 ps-sm-32 py-24 py-sm-32 overflow-hidden">
                <div class="row">
                  <div class="col-12">
                    <h2>Change Password</h2>
                    <p class="hp-p1-body mb-0">
                      Set a unique password to protect your account.
                    </p>
                  </div>

                  <div
                    class="divider border-black-40 hp-border-color-dark-80"></div>

                  <div class="col-12">
                    <div class="row">
                      <div
                        class="col-12 col-sm-8 col-md-7 col-xl-5 col-xxxl-3">
                        <form>
                          <div class="mb-24">
                            <label for="profileOldPassword" class="form-label">Old Password :</label>
                            <input
                              type="password"
                              class="form-control"
                              id="profileOldPassword"
                              placeholder="Password" />
                          </div>

                          <div class="mb-24">
                            <label for="profileNewPassword" class="form-label">New Password :</label>
                            <input
                              type="password"
                              class="form-control"
                              id="profileNewPassword"
                              placeholder="Password" />
                          </div>

                          <div class="mb-24">
                            <label
                              for="profileConfirmPassword"
                              class="form-label">Confirm New Password :</label>
                            <input
                              type="password"
                              class="form-control"
                              id="profileConfirmPassword"
                              placeholder="Password" />
                          </div>

                          <button type="submit" class="btn btn-primary w-100">
                            Change Password
                          </button>
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

  <div class="scroll-to-top">
    <button
      type="button"
      class="btn btn-primary btn-icon-only rounded-circle hp-primary-shadow">
      <svg
        stroke="currentColor"
        fill="currentColor"
        stroke-width="0"
        viewbox="0 0 24 24"
        height="16px"
        width="16px"
        xmlns="http://www.w3.org/2000/svg">
        <g>
          <path fill="none" d="M0 0h24v24H0z"></path>
          <path
            d="M13 7.828V20h-2V7.828l-5.364 5.364-1.414-1.414L12 4l7.778 7.778-1.414 1.414L13 7.828z"></path>
        </g>
      </svg>
    </button>
  </div>


  <?php
  include "components/jsComponents/profile-password-js.php"
  ?>
</body>

</html>