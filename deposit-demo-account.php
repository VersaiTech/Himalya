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
    include "components/cssComponents/deposit-demo-account-css.php"
    ?>


    <title>Dashboard -Withdrawal</title>


    <style>
        /* Custom CSS for accordion */
        .custom-accordion .accordion-item {
          border-bottom: none; /* Remove bottom border from accordion items */
          margin-bottom: 0; /* Optional: Adjust margin if necessary */
        }
        
        .custom-accordion .accordion-button {
          padding: 1rem 1.25rem; /* Adjust padding as needed */
        }
      </style>

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
      <!-- <div
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

            <ul>
              <li>
                <div class="menu-title">DASHBOARD</div>

                <ul>
                  <li>
                    <a href="dashboard-analytics.html">
                      <div
                        class="tooltip-item in-active"
                        data-bs-toggle="tooltip"
                        data-bs-placement="right"
                        title=""
                        data-bs-original-title="Analytics"
                        aria-label="Analytics"
                      ></div>

                      <span>
                        <span class="submenu-item-icon">
                          <svg
                            xmlns="http://www.w3.org/2000/svg"
                            width="18"
                            height="18"
                            viewbox="0 0 24 24"
                            fill="none"
                          >
                            <path
                              d="M8.97 22h6c5 0 7-2 7-7V9c0-5-2-7-7-7h-6c-5 0-7 2-7 7v6c0 5 2 7 7 7Z"
                              stroke="currentColor"
                              stroke-width="1.5"
                              stroke-linecap="round"
                              stroke-linejoin="round"
                            ></path>
                            <path
                              d="m1.97 12.7 6-.02c.75 0 1.59.57 1.87 1.27l1.14 2.88c.26.65.67.65.93 0l2.29-5.81c.22-.56.63-.58.91-.05l1.04 1.97c.31.59 1.11 1.07 1.77 1.07h4.06"
                              stroke="currentColor"
                              stroke-width="1.5"
                              stroke-linecap="round"
                              stroke-linejoin="round"
                            ></path>
                          </svg>
                        </span>

                        <span>Analytics</span>
                      </span>
                    </a>
                  </li>

                  <li>
                    <a href="overview">
                      <div
                        class="tooltip-item in-active"
                        data-bs-toggle="tooltip"
                        data-bs-placement="right"
                        title=""
                        data-bs-original-title="E-Commerce"
                        aria-label="E-Commerce"
                      ></div>

                      <span>
                        <span class="submenu-item-icon">
                          <svg
                            xmlns="http://www.w3.org/2000/svg"
                            width="18"
                            height="18"
                            viewbox="0 0 24 24"
                            fill="none"
                          >
                            <path
                              d="M3 9.11v5.77C3 17 3 17 5 18.35l5.5 3.18c.83.48 2.18.48 3 0l5.5-3.18c2-1.35 2-1.35 2-3.46V9.11C21 7 21 7 19 5.65l-5.5-3.18c-.82-.48-2.17-.48-3 0L5 5.65C3 7 3 7 3 9.11Z"
                              stroke="currentColor"
                              stroke-width="1.5"
                              stroke-linecap="round"
                              stroke-linejoin="round"
                            ></path>
                            <path
                              d="M12 15a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z"
                              stroke="currentColor"
                              stroke-width="1.5"
                              stroke-linecap="round"
                              stroke-linejoin="round"
                            ></path>
                          </svg>
                        </span>

                        <span>E-Commerce</span>
                      </span>
                    </a>
                  </li>
                </ul>
              </li>

              <li>
                <div class="menu-title">Withdrawal</div>

                <ul>
                  <li>
                    <a href="transfer.html">
                      <div
                        class="tooltip-item in-active"
                        data-bs-toggle="tooltip"
                        data-bs-placement="right"
                        title=""
                        data-bs-original-title="Analytics"
                        aria-label="Analytics"
                      ></div>

                      <span>
                        <span class="submenu-item-icon">
                          <svg
                            xmlns="http://www.w3.org/2000/svg"
                            width="18"
                            height="18"
                            viewbox="0 0 24 24"
                            fill="none"
                          >
                            <path
                              d="M8.97 22h6c5 0 7-2 7-7V9c0-5-2-7-7-7h-6c-5 0-7 2-7 7v6c0 5 2 7 7 7Z"
                              stroke="currentColor"
                              stroke-width="1.5"
                              stroke-linecap="round"
                              stroke-linejoin="round"
                            ></path>
                            <path
                              d="m1.97 12.7 6-.02c.75 0 1.59.57 1.87 1.27l1.14 2.88c.26.65.67.65.93 0l2.29-5.81c.22-.56.63-.58.91-.05l1.04 1.97c.31.59 1.11 1.07 1.77 1.07h4.06"
                              stroke="currentColor"
                              stroke-width="1.5"
                              stroke-linecap="round"
                              stroke-linejoin="round"
                            ></path>
                          </svg>
                        </span>

                        <span>Staking</span>
                      </span>
                    </a>
                  </li>

                  <li>
                    <a href="overview">
                      <div
                        class="tooltip-item in-active"
                        data-bs-toggle="tooltip"
                        data-bs-placement="right"
                        title=""
                        data-bs-original-title="E-Commerce"
                        aria-label="E-Commerce"
                      ></div>

                      <span>
                        <span class="submenu-item-icon">
                          <svg
                            xmlns="http://www.w3.org/2000/svg"
                            width="18"
                            height="18"
                            viewbox="0 0 24 24"
                            fill="none"
                          >
                            <path
                              d="M3 9.11v5.77C3 17 3 17 5 18.35l5.5 3.18c.83.48 2.18.48 3 0l5.5-3.18c2-1.35 2-1.35 2-3.46V9.11C21 7 21 7 19 5.65l-5.5-3.18c-.82-.48-2.17-.48-3 0L5 5.65C3 7 3 7 3 9.11Z"
                              stroke="currentColor"
                              stroke-width="1.5"
                              stroke-linecap="round"
                              stroke-linejoin="round"
                            ></path>
                            <path
                              d="M12 15a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z"
                              stroke="currentColor"
                              stroke-width="1.5"
                              stroke-linecap="round"
                              stroke-linejoin="round"
                            ></path>
                          </svg>
                        </span>

                        <span>Staking Summary</span>
                      </span>
                    </a>
                  </li>
                </ul>
              </li>

              <li>
                <div class="menu-title">Team</div>

                <ul>
                  <li>
                    <a href="referral.html">
                      <div
                        class="tooltip-item in-active"
                        data-bs-toggle="tooltip"
                        data-bs-placement="right"
                        title=""
                        data-bs-original-title="Contact"
                        aria-label="Contact"
                      ></div>

                      <span>
                        <span class="submenu-item-icon">
                          <svg
                            xmlns="http://www.w3.org/2000/svg"
                            width="18"
                            height="18"
                            viewbox="0 0 24 24"
                            fill="none"
                          >
                            <path
                              d="M9 22h6c5 0 7-2 7-7V9c0-5-2-7-7-7H9C4 2 2 4 2 9v6c0 5 2 7 7 7Z"
                              stroke="currentColor"
                              stroke-width="1.5"
                              stroke-linecap="round"
                              stroke-linejoin="round"
                            ></path>
                            <path
                              d="M17 2.44v9.98c0 1.97-1.41 2.74-3.14 1.7l-1.32-.79c-.3-.18-.78-.18-1.08 0l-1.32.79C8.41 15.15 7 14.39 7 12.42V2.44"
                              stroke="currentColor"
                              stroke-width="1.5"
                              stroke-linecap="round"
                              stroke-linejoin="round"
                            ></path>
                            <path
                              d="M9 22h6c5 0 7-2 7-7V9c0-5-2-7-7-7H9C4 2 2 4 2 9v6c0 5 2 7 7 7Z"
                              stroke="currentColor"
                              stroke-width="1.5"
                              stroke-linecap="round"
                              stroke-linejoin="round"
                            ></path>
                            <path
                              d="M17 2.44v9.98c0 1.97-1.41 2.74-3.14 1.7l-1.32-.79c-.3-.18-.78-.18-1.08 0l-1.32.79C8.41 15.15 7 14.39 7 12.42V2.44"
                              stroke="currentColor"
                              stroke-width="1.5"
                              stroke-linecap="round"
                              stroke-linejoin="round"
                            ></path>
                          </svg>
                        </span>

                        <span>My Referral</span>
                      </span>
                    </a>
                  </li>

                  <li>
                    <a href="javascript:;" class="submenu-item">
                      <span>
                        <span class="submenu-item-icon">
                          <svg
                            xmlns="http://www.w3.org/2000/svg"
                            width="18"
                            height="18"
                            viewbox="0 0 24 24"
                            fill="none"
                          >
                            <path
                              d="M4.26 11.02v4.97c0 1.82 0 1.82 1.72 2.98l4.73 2.73c.71.41 1.87.41 2.58 0l4.73-2.73c1.72-1.16 1.72-1.16 1.72-2.98v-4.97c0-1.82 0-1.82-1.72-2.98l-4.73-2.73c-.71-.41-1.87-.41-2.58 0L5.98 8.04C4.26 9.2 4.26 9.2 4.26 11.02Z"
                              stroke="currentColor"
                              stroke-width="1.5"
                              stroke-linecap="round"
                              stroke-linejoin="round"
                            ></path>
                            <path
                              d="M17.5 7.63V5c0-2-1-3-3-3h-5c-2 0-3 1-3 3v2.56M12.63 10.99l.57.89c.09.14.29.28.44.32l1.02.26c.63.16.8.7.39 1.2l-.67.81c-.1.13-.18.36-.17.52l.06 1.05c.04.65-.42.98-1.02.74l-.98-.39a.863.863 0 0 0-.55 0l-.98.39c-.6.24-1.06-.1-1.02-.74l.06-1.05c.01-.16-.07-.4-.17-.52l-.67-.81c-.41-.5-.24-1.04.39-1.2l1.02-.26c.16-.04.36-.19.44-.32l.57-.89c.36-.54.92-.54 1.27 0Z"
                              stroke="currentColor"
                              stroke-width="1.5"
                              stroke-linecap="round"
                              stroke-linejoin="round"
                            ></path>
                          </svg>
                        </span>

                        <span>My Team</span>
                      </span>
                    </a>
                  </li>
                </ul>
              </li>

              <li>
                <div class="menu-title">Earning</div>

                <ul>
                  <li>
                    <a href="javascript:;" class="submenu-item">
                      <span>
                        <span class="submenu-item-icon">
                          <svg
                            xmlns="http://www.w3.org/2000/svg"
                            width="18"
                            height="18"
                            viewbox="0 0 24 24"
                            fill="none"
                          >
                            <path
                              d="M4.26 11.02v4.97c0 1.82 0 1.82 1.72 2.98l4.73 2.73c.71.41 1.87.41 2.58 0l4.73-2.73c1.72-1.16 1.72-1.16 1.72-2.98v-4.97c0-1.82 0-1.82-1.72-2.98l-4.73-2.73c-.71-.41-1.87-.41-2.58 0L5.98 8.04C4.26 9.2 4.26 9.2 4.26 11.02Z"
                              stroke="currentColor"
                              stroke-width="1.5"
                              stroke-linecap="round"
                              stroke-linejoin="round"
                            ></path>
                            <path
                              d="M17.5 7.63V5c0-2-1-3-3-3h-5c-2 0-3 1-3 3v2.56M12.63 10.99l.57.89c.09.14.29.28.44.32l1.02.26c.63.16.8.7.39 1.2l-.67.81c-.1.13-.18.36-.17.52l.06 1.05c.04.65-.42.98-1.02.74l-.98-.39a.863.863 0 0 0-.55 0l-.98.39c-.6.24-1.06-.1-1.02-.74l.06-1.05c.01-.16-.07-.4-.17-.52l-.67-.81c-.41-.5-.24-1.04.39-1.2l1.02-.26c.16-.04.36-.19.44-.32l.57-.89c.36-.54.92-.54 1.27 0Z"
                              stroke="currentColor"
                              stroke-width="1.5"
                              stroke-linecap="round"
                              stroke-linejoin="round"
                            ></path>
                          </svg>
                        </span>

                        <span>Withdrawal Bonus</span>
                      </span>
                    </a>
                  </li>

                  <li>
                    <a href="javascript:;" class="submenu-item">
                      <span>
                        <span class="submenu-item-icon">
                          <svg
                            xmlns="http://www.w3.org/2000/svg"
                            width="18"
                            height="18"
                            viewbox="0 0 24 24"
                            fill="none"
                          >
                            <path
                              d="M4.26 11.02v4.97c0 1.82 0 1.82 1.72 2.98l4.73 2.73c.71.41 1.87.41 2.58 0l4.73-2.73c1.72-1.16 1.72-1.16 1.72-2.98v-4.97c0-1.82 0-1.82-1.72-2.98l-4.73-2.73c-.71-.41-1.87-.41-2.58 0L5.98 8.04C4.26 9.2 4.26 9.2 4.26 11.02Z"
                              stroke="currentColor"
                              stroke-width="1.5"
                              stroke-linecap="round"
                              stroke-linejoin="round"
                            ></path>
                            <path
                              d="M17.5 7.63V5c0-2-1-3-3-3h-5c-2 0-3 1-3 3v2.56M12.63 10.99l.57.89c.09.14.29.28.44.32l1.02.26c.63.16.8.7.39 1.2l-.67.81c-.1.13-.18.36-.17.52l.06 1.05c.04.65-.42.98-1.02.74l-.98-.39a.863.863 0 0 0-.55 0l-.98.39c-.6.24-1.06-.1-1.02-.74l.06-1.05c.01-.16-.07-.4-.17-.52l-.67-.81c-.41-.5-.24-1.04.39-1.2l1.02-.26c.16-.04.36-.19.44-.32l.57-.89c.36-.54.92-.54 1.27 0Z"
                              stroke="currentColor"
                              stroke-width="1.5"
                              stroke-linecap="round"
                              stroke-linejoin="round"
                            ></path>
                          </svg>
                        </span>

                        <span>Referral Bonus</span>
                      </span>
                    </a>
                  </li>

                  <li>
                    <a href="javascript:;" class="submenu-item">
                      <span>
                        <span class="submenu-item-icon">
                          <svg
                            xmlns="http://www.w3.org/2000/svg"
                            width="18"
                            height="18"
                            viewbox="0 0 24 24"
                            fill="none"
                          >
                            <path
                              d="M4.26 11.02v4.97c0 1.82 0 1.82 1.72 2.98l4.73 2.73c.71.41 1.87.41 2.58 0l4.73-2.73c1.72-1.16 1.72-1.16 1.72-2.98v-4.97c0-1.82 0-1.82-1.72-2.98l-4.73-2.73c-.71-.41-1.87-.41-2.58 0L5.98 8.04C4.26 9.2 4.26 9.2 4.26 11.02Z"
                              stroke="currentColor"
                              stroke-width="1.5"
                              stroke-linecap="round"
                              stroke-linejoin="round"
                            ></path>
                            <path
                              d="M17.5 7.63V5c0-2-1-3-3-3h-5c-2 0-3 1-3 3v2.56M12.63 10.99l.57.89c.09.14.29.28.44.32l1.02.26c.63.16.8.7.39 1.2l-.67.81c-.1.13-.18.36-.17.52l.06 1.05c.04.65-.42.98-1.02.74l-.98-.39a.863.863 0 0 0-.55 0l-.98.39c-.6.24-1.06-.1-1.02-.74l.06-1.05c.01-.16-.07-.4-.17-.52l-.67-.81c-.41-.5-.24-1.04.39-1.2l1.02-.26c.16-.04.36-.19.44-.32l.57-.89c.36-.54.92-.54 1.27 0Z"
                              stroke="currentColor"
                              stroke-width="1.5"
                              stroke-linecap="round"
                              stroke-linejoin="round"
                            ></path>
                          </svg>
                        </span>

                        <span>Passive Bonus</span>
                      </span>
                    </a>
                  </li>

                  <li>
                    <a href="javascript:;" class="submenu-item">
                      <span>
                        <span class="submenu-item-icon">
                          <svg
                            xmlns="http://www.w3.org/2000/svg"
                            width="18"
                            height="18"
                            viewbox="0 0 24 24"
                            fill="none"
                          >
                            <path
                              d="M4.26 11.02v4.97c0 1.82 0 1.82 1.72 2.98l4.73 2.73c.71.41 1.87.41 2.58 0l4.73-2.73c1.72-1.16 1.72-1.16 1.72-2.98v-4.97c0-1.82 0-1.82-1.72-2.98l-4.73-2.73c-.71-.41-1.87-.41-2.58 0L5.98 8.04C4.26 9.2 4.26 9.2 4.26 11.02Z"
                              stroke="currentColor"
                              stroke-width="1.5"
                              stroke-linecap="round"
                              stroke-linejoin="round"
                            ></path>
                            <path
                              d="M17.5 7.63V5c0-2-1-3-3-3h-5c-2 0-3 1-3 3v2.56M12.63 10.99l.57.89c.09.14.29.28.44.32l1.02.26c.63.16.8.7.39 1.2l-.67.81c-.1.13-.18.36-.17.52l.06 1.05c.04.65-.42.98-1.02.74l-.98-.39a.863.863 0 0 0-.55 0l-.98.39c-.6.24-1.06-.1-1.02-.74l.06-1.05c.01-.16-.07-.4-.17-.52l-.67-.81c-.41-.5-.24-1.04.39-1.2l1.02-.26c.16-.04.36-.19.44-.32l.57-.89c.36-.54.92-.54 1.27 0Z"
                              stroke="currentColor"
                              stroke-width="1.5"
                              stroke-linecap="round"
                              stroke-linejoin="round"
                            ></path>
                          </svg>
                        </span>

                        <span>Pool Bonus</span>
                      </span>
                    </a>
                  </li>

                  <li>
                    <a href="javascript:;" class="submenu-item">
                      <span>
                        <span class="submenu-item-icon">
                          <svg
                            xmlns="http://www.w3.org/2000/svg"
                            width="18"
                            height="18"
                            viewbox="0 0 24 24"
                            fill="none"
                          >
                            <path
                              d="M4.26 11.02v4.97c0 1.82 0 1.82 1.72 2.98l4.73 2.73c.71.41 1.87.41 2.58 0l4.73-2.73c1.72-1.16 1.72-1.16 1.72-2.98v-4.97c0-1.82 0-1.82-1.72-2.98l-4.73-2.73c-.71-.41-1.87-.41-2.58 0L5.98 8.04C4.26 9.2 4.26 9.2 4.26 11.02Z"
                              stroke="currentColor"
                              stroke-width="1.5"
                              stroke-linecap="round"
                              stroke-linejoin="round"
                            ></path>
                            <path
                              d="M17.5 7.63V5c0-2-1-3-3-3h-5c-2 0-3 1-3 3v2.56M12.63 10.99l.57.89c.09.14.29.28.44.32l1.02.26c.63.16.8.7.39 1.2l-.67.81c-.1.13-.18.36-.17.52l.06 1.05c.04.65-.42.98-1.02.74l-.98-.39a.863.863 0 0 0-.55 0l-.98.39c-.6.24-1.06-.1-1.02-.74l.06-1.05c.01-.16-.07-.4-.17-.52l-.67-.81c-.41-.5-.24-1.04.39-1.2l1.02-.26c.16-.04.36-.19.44-.32l.57-.89c.36-.54.92-.54 1.27 0Z"
                              stroke="currentColor"
                              stroke-width="1.5"
                              stroke-linecap="round"
                              stroke-linejoin="round"
                            ></path>
                          </svg>
                        </span>

                        <span>Royaly Bonus</span>
                      </span>
                    </a>
                  </li>

                  <li>
                    <a href="page-landing.html">
                      <div
                        class="tooltip-item in-active"
                        data-bs-toggle="tooltip"
                        data-bs-placement="right"
                        title=""
                        data-bs-original-title="Landing"
                        aria-label="Landing"
                      ></div>

                      <span>
                        <span class="submenu-item-icon">
                          <svg
                            xmlns="http://www.w3.org/2000/svg"
                            width="18"
                            height="18"
                            viewbox="0 0 24 24"
                            fill="none"
                          >
                            <path
                              d="M4.26 11.02v4.97c0 1.82 0 1.82 1.72 2.98l4.73 2.73c.71.41 1.87.41 2.58 0l4.73-2.73c1.72-1.16 1.72-1.16 1.72-2.98v-4.97c0-1.82 0-1.82-1.72-2.98l-4.73-2.73c-.71-.41-1.87-.41-2.58 0L5.98 8.04C4.26 9.2 4.26 9.2 4.26 11.02Z"
                              stroke="currentColor"
                              stroke-width="1.5"
                              stroke-linecap="round"
                              stroke-linejoin="round"
                            ></path>
                            <path
                              d="M17.5 7.63V5c0-2-1-3-3-3h-5c-2 0-3 1-3 3v2.56M12.63 10.99l.57.89c.09.14.29.28.44.32l1.02.26c.63.16.8.7.39 1.2l-.67.81c-.1.13-.18.36-.17.52l.06 1.05c.04.65-.42.98-1.02.74l-.98-.39a.863.863 0 0 0-.55 0l-.98.39c-.6.24-1.06-.1-1.02-.74l.06-1.05c.01-.16-.07-.4-.17-.52l-.67-.81c-.41-.5-.24-1.04.39-1.2l1.02-.26c.16-.04.36-.19.44-.32l.57-.89c.36-.54.92-.54 1.27 0Z"
                              stroke="currentColor"
                              stroke-width="1.5"
                              stroke-linecap="round"
                              stroke-linejoin="round"
                            ></path>
                          </svg>
                        </span>

                        <span>All Income</span>
                      </span>
                    </a>
                  </li>
                </ul>
              </li>

              <li>
                <div class="menu-title">Withdraw</div>

                <ul>
                  <li>
                    <a href="/transfer.html" class="submenu-item">
                      <span>
                        <span class="submenu-item-icon">
                          <svg
                            xmlns="http://www.w3.org/2000/svg"
                            width="18"
                            height="18"
                            viewbox="0 0 24 24"
                            fill="none"
                          >
                            <path
                              d="M4.26 11.02v4.97c0 1.82 0 1.82 1.72 2.98l4.73 2.73c.71.41 1.87.41 2.58 0l4.73-2.73c1.72-1.16 1.72-1.16 1.72-2.98v-4.97c0-1.82 0-1.82-1.72-2.98l-4.73-2.73c-.71-.41-1.87-.41-2.58 0L5.98 8.04C4.26 9.2 4.26 9.2 4.26 11.02Z"
                              stroke="currentColor"
                              stroke-width="1.5"
                              stroke-linecap="round"
                              stroke-linejoin="round"
                            ></path>
                            <path
                              d="M17.5 7.63V5c0-2-1-3-3-3h-5c-2 0-3 1-3 3v2.56M12.63 10.99l.57.89c.09.14.29.28.44.32l1.02.26c.63.16.8.7.39 1.2l-.67.81c-.1.13-.18.36-.17.52l.06 1.05c.04.65-.42.98-1.02.74l-.98-.39a.863.863 0 0 0-.55 0l-.98.39c-.6.24-1.06-.1-1.02-.74l.06-1.05c.01-.16-.07-.4-.17-.52l-.67-.81c-.41-.5-.24-1.04.39-1.2l1.02-.26c.16-.04.36-.19.44-.32l.57-.89c.36-.54.92-.54 1.27 0Z"
                              stroke="currentColor"
                              stroke-width="1.5"
                              stroke-linecap="round"
                              stroke-linejoin="round"
                            ></path>
                          </svg>
                        </span>

                        <span>Withdraw</span>
                      </span>
                    </a>
                  </li>

                  <li>
                    <a href="/deposit-demo-account.html" class="submenu-item">
                      <span>
                        <span class="submenu-item-icon">
                          <svg
                            xmlns="http://www.w3.org/2000/svg"
                            width="18"
                            height="18"
                            viewbox="0 0 24 24"
                            fill="none"
                          >
                            <path
                              d="M4.26 11.02v4.97c0 1.82 0 1.82 1.72 2.98l4.73 2.73c.71.41 1.87.41 2.58 0l4.73-2.73c1.72-1.16 1.72-1.16 1.72-2.98v-4.97c0-1.82 0-1.82-1.72-2.98l-4.73-2.73c-.71-.41-1.87-.41-2.58 0L5.98 8.04C4.26 9.2 4.26 9.2 4.26 11.02Z"
                              stroke="currentColor"
                              stroke-width="1.5"
                              stroke-linecap="round"
                              stroke-linejoin="round"
                            ></path>
                            <path
                              d="M17.5 7.63V5c0-2-1-3-3-3h-5c-2 0-3 1-3 3v2.56M12.63 10.99l.57.89c.09.14.29.28.44.32l1.02.26c.63.16.8.7.39 1.2l-.67.81c-.1.13-.18.36-.17.52l.06 1.05c.04.65-.42.98-1.02.74l-.98-.39a.863.863 0 0 0-.55 0l-.98.39c-.6.24-1.06-.1-1.02-.74l.06-1.05c.01-.16-.07-.4-.17-.52l-.67-.81c-.41-.5-.24-1.04.39-1.2l1.02-.26c.16-.04.36-.19.44-.32l.57-.89c.36-.54.92-.54 1.27 0Z"
                              stroke="currentColor"
                              stroke-width="1.5"
                              stroke-linecap="round"
                              stroke-linejoin="round"
                            ></path>
                          </svg>
                        </span>

                        <span>Pool Withdraw</span>
                      </span>
                    </a>
                  </li>

                  <li>
                    <a href="javascript:;" class="submenu-item">
                      <span>
                        <span class="submenu-item-icon">
                          <svg
                            xmlns="http://www.w3.org/2000/svg"
                            width="18"
                            height="18"
                            viewbox="0 0 24 24"
                            fill="none"
                          >
                            <path
                              d="M4.26 11.02v4.97c0 1.82 0 1.82 1.72 2.98l4.73 2.73c.71.41 1.87.41 2.58 0l4.73-2.73c1.72-1.16 1.72-1.16 1.72-2.98v-4.97c0-1.82 0-1.82-1.72-2.98l-4.73-2.73c-.71-.41-1.87-.41-2.58 0L5.98 8.04C4.26 9.2 4.26 9.2 4.26 11.02Z"
                              stroke="currentColor"
                              stroke-width="1.5"
                              stroke-linecap="round"
                              stroke-linejoin="round"
                            ></path>
                            <path
                              d="M17.5 7.63V5c0-2-1-3-3-3h-5c-2 0-3 1-3 3v2.56M12.63 10.99l.57.89c.09.14.29.28.44.32l1.02.26c.63.16.8.7.39 1.2l-.67.81c-.1.13-.18.36-.17.52l.06 1.05c.04.65-.42.98-1.02.74l-.98-.39a.863.863 0 0 0-.55 0l-.98.39c-.6.24-1.06-.1-1.02-.74l.06-1.05c.01-.16-.07-.4-.17-.52l-.67-.81c-.41-.5-.24-1.04.39-1.2l1.02-.26c.16-.04.36-.19.44-.32l.57-.89c.36-.54.92-.54 1.27 0Z"
                              stroke="currentColor"
                              stroke-width="1.5"
                              stroke-linecap="round"
                              stroke-linejoin="round"
                            ></path>
                          </svg>
                        </span>

                        <span>Withdraw History</span>
                      </span>
                    </a>
                  </li>

                  <li>
                    <a href="javascript:;" class="submenu-item">
                      <span>
                        <span class="submenu-item-icon">
                          <svg
                            xmlns="http://www.w3.org/2000/svg"
                            width="18"
                            height="18"
                            viewbox="0 0 24 24"
                            fill="none"
                          >
                            <path
                              d="M4.26 11.02v4.97c0 1.82 0 1.82 1.72 2.98l4.73 2.73c.71.41 1.87.41 2.58 0l4.73-2.73c1.72-1.16 1.72-1.16 1.72-2.98v-4.97c0-1.82 0-1.82-1.72-2.98l-4.73-2.73c-.71-.41-1.87-.41-2.58 0L5.98 8.04C4.26 9.2 4.26 9.2 4.26 11.02Z"
                              stroke="currentColor"
                              stroke-width="1.5"
                              stroke-linecap="round"
                              stroke-linejoin="round"
                            ></path>
                            <path
                              d="M17.5 7.63V5c0-2-1-3-3-3h-5c-2 0-3 1-3 3v2.56M12.63 10.99l.57.89c.09.14.29.28.44.32l1.02.26c.63.16.8.7.39 1.2l-.67.81c-.1.13-.18.36-.17.52l.06 1.05c.04.65-.42.98-1.02.74l-.98-.39a.863.863 0 0 0-.55 0l-.98.39c-.6.24-1.06-.1-1.02-.74l.06-1.05c.01-.16-.07-.4-.17-.52l-.67-.81c-.41-.5-.24-1.04.39-1.2l1.02-.26c.16-.04.36-.19.44-.32l.57-.89c.36-.54.92-.54 1.27 0Z"
                              stroke="currentColor"
                              stroke-width="1.5"
                              stroke-linecap="round"
                              stroke-linejoin="round"
                            ></path>
                          </svg>
                        </span>

                        <span>Old Withdraw History</span>
                      </span>
                    </a>
                  </li>
                </ul>
              </li>

              <li>
                <div class="menu-title">Logout</div>
              </li>

              <li>
                <div class="menu-title">USER INTERFACE</div>

                <ul>
                  <li>
                    <a href="general-style-guide.html">
                      <div
                        class="tooltip-item in-active"
                        data-bs-toggle="tooltip"
                        data-bs-placement="right"
                        title=""
                        data-bs-original-title="Typography"
                        aria-label="Typography"
                      ></div>

                      <span>
                        <span class="submenu-item-icon">
                          <svg
                            xmlns="http://www.w3.org/2000/svg"
                            width="18"
                            height="18"
                            viewbox="0 0 24 24"
                            fill="none"
                          >
                            <path
                              d="M9 22h6c5 0 7-2 7-7V9c0-5-2-7-7-7H9C4 2 2 4 2 9v6c0 5 2 7 7 7ZM10 2v20M10 12h12"
                              stroke="currentColor"
                              stroke-width="1.5"
                              stroke-linecap="round"
                              stroke-linejoin="round"
                            ></path>
                          </svg>
                        </span>

                        <span>Typography</span>
                      </span>
                    </a>
                  </li>

                  <li>
                    <a href="general-buttons.html">
                      <div
                        class="tooltip-item in-active"
                        data-bs-toggle="tooltip"
                        data-bs-placement="right"
                        title=""
                        data-bs-original-title="Buttons"
                        aria-label="Buttons"
                      ></div>

                      <span>
                        <span class="submenu-item-icon">
                          <svg
                            xmlns="http://www.w3.org/2000/svg"
                            width="18"
                            height="18"
                            viewbox="0 0 24 24"
                            fill="none"
                          >
                            <path
                              d="M9 22h6c5 0 7-2 7-7V9c0-5-2-7-7-7H9C4 2 2 4 2 9v6c0 5 2 7 7 7ZM10 2v20M10 12h12"
                              stroke="currentColor"
                              stroke-width="1.5"
                              stroke-linecap="round"
                              stroke-linejoin="round"
                            ></path>
                          </svg>
                        </span>

                        <span>Buttons</span>
                      </span>
                    </a>
                  </li>

                  <li>
                    <a href="components-page.html">
                      <div
                        class="tooltip-item in-active"
                        data-bs-toggle="tooltip"
                        data-bs-placement="right"
                        title=""
                        data-bs-original-title="Components"
                        aria-label="Components"
                      ></div>

                      <span>
                        <span class="submenu-item-icon">
                          <svg
                            xmlns="http://www.w3.org/2000/svg"
                            width="18"
                            height="18"
                            viewbox="0 0 24 24"
                            fill="none"
                          >
                            <path
                              d="M4.26 11.02v4.97c0 1.82 0 1.82 1.72 2.98l4.73 2.73c.71.41 1.87.41 2.58 0l4.73-2.73c1.72-1.16 1.72-1.16 1.72-2.98v-4.97c0-1.82 0-1.82-1.72-2.98l-4.73-2.73c-.71-.41-1.87-.41-2.58 0L5.98 8.04C4.26 9.2 4.26 9.2 4.26 11.02Z"
                              stroke="currentColor"
                              stroke-width="1.5"
                              stroke-linecap="round"
                              stroke-linejoin="round"
                            ></path>
                            <path
                              d="M17.5 7.63V5c0-2-1-3-3-3h-5c-2 0-3 1-3 3v2.56M12.63 10.99l.57.89c.09.14.29.28.44.32l1.02.26c.63.16.8.7.39 1.2l-.67.81c-.1.13-.18.36-.17.52l.06 1.05c.04.65-.42.98-1.02.74l-.98-.39a.863.863 0 0 0-.55 0l-.98.39c-.6.24-1.06-.1-1.02-.74l.06-1.05c.01-.16-.07-.4-.17-.52l-.67-.81c-.41-.5-.24-1.04.39-1.2l1.02-.26c.16-.04.36-.19.44-.32l.57-.89c.36-.54.92-.54 1.27 0Z"
                              stroke="currentColor"
                              stroke-width="1.5"
                              stroke-linecap="round"
                              stroke-linejoin="round"
                            ></path>
                          </svg>
                        </span>

                        <span>Components</span>
                      </span>
                    </a>
                  </li>

                  <li>
                    <a href="charts.html">
                      <div
                        class="tooltip-item in-active"
                        data-bs-toggle="tooltip"
                        data-bs-placement="right"
                        title=""
                        data-bs-original-title="Charts"
                        aria-label="Charts"
                      ></div>

                      <span>
                        <span class="submenu-item-icon">
                          <svg
                            xmlns="http://www.w3.org/2000/svg"
                            width="18"
                            height="18"
                            viewbox="0 0 24 24"
                            fill="none"
                          >
                            <path
                              d="M4.26 11.02v4.97c0 1.82 0 1.82 1.72 2.98l4.73 2.73c.71.41 1.87.41 2.58 0l4.73-2.73c1.72-1.16 1.72-1.16 1.72-2.98v-4.97c0-1.82 0-1.82-1.72-2.98l-4.73-2.73c-.71-.41-1.87-.41-2.58 0L5.98 8.04C4.26 9.2 4.26 9.2 4.26 11.02Z"
                              stroke="currentColor"
                              stroke-width="1.5"
                              stroke-linecap="round"
                              stroke-linejoin="round"
                            ></path>
                            <path
                              d="M17.5 7.63V5c0-2-1-3-3-3h-5c-2 0-3 1-3 3v2.56M12.63 10.99l.57.89c.09.14.29.28.44.32l1.02.26c.63.16.8.7.39 1.2l-.67.81c-.1.13-.18.36-.17.52l.06 1.05c.04.65-.42.98-1.02.74l-.98-.39a.863.863 0 0 0-.55 0l-.98.39c-.6.24-1.06-.1-1.02-.74l.06-1.05c.01-.16-.07-.4-.17-.52l-.67-.81c-.41-.5-.24-1.04.39-1.2l1.02-.26c.16-.04.36-.19.44-.32l.57-.89c.36-.54.92-.54 1.27 0Z"
                              stroke="currentColor"
                              stroke-width="1.5"
                              stroke-linecap="round"
                              stroke-linejoin="round"
                            ></path>
                          </svg>
                        </span>

                        <span>Charts</span>
                      </span>
                    </a>
                  </li>

                  <li>
                    <a href="widgets-selectbox.html">
                      <div
                        class="tooltip-item in-active"
                        data-bs-toggle="tooltip"
                        data-bs-placement="right"
                        title=""
                        data-bs-original-title="Charts"
                        aria-label="Charts"
                      ></div>

                      <span>
                        <span class="submenu-item-icon">
                          <svg
                            xmlns="http://www.w3.org/2000/svg"
                            width="18"
                            height="18"
                            viewbox="0 0 24 24"
                            fill="none"
                          >
                            <path
                              d="M4.26 11.02v4.97c0 1.82 0 1.82 1.72 2.98l4.73 2.73c.71.41 1.87.41 2.58 0l4.73-2.73c1.72-1.16 1.72-1.16 1.72-2.98v-4.97c0-1.82 0-1.82-1.72-2.98l-4.73-2.73c-.71-.41-1.87-.41-2.58 0L5.98 8.04C4.26 9.2 4.26 9.2 4.26 11.02Z"
                              stroke="currentColor"
                              stroke-width="1.5"
                              stroke-linecap="round"
                              stroke-linejoin="round"
                            ></path>
                            <path
                              d="M17.5 7.63V5c0-2-1-3-3-3h-5c-2 0-3 1-3 3v2.56M12.63 10.99l.57.89c.09.14.29.28.44.32l1.02.26c.63.16.8.7.39 1.2l-.67.81c-.1.13-.18.36-.17.52l.06 1.05c.04.65-.42.98-1.02.74l-.98-.39a.863.863 0 0 0-.55 0l-.98.39c-.6.24-1.06-.1-1.02-.74l.06-1.05c.01-.16-.07-.4-.17-.52l-.67-.81c-.41-.5-.24-1.04.39-1.2l1.02-.26c.16-.04.36-.19.44-.32l.57-.89c.36-.54.92-.54 1.27 0Z"
                              stroke="currentColor"
                              stroke-width="1.5"
                              stroke-linecap="round"
                              stroke-linejoin="round"
                            ></path>
                          </svg>
                        </span>

                        <span>SelectBox</span>
                      </span>
                    </a>
                  </li>

                  <li>
                    <a href="javascript:;" class="submenu-item">
                      <span>
                        <span class="submenu-item-icon">
                          <svg
                            xmlns="http://www.w3.org/2000/svg"
                            width="18"
                            height="18"
                            viewbox="0 0 24 24"
                            fill="none"
                          >
                            <path
                              d="M4.26 11.02v4.97c0 1.82 0 1.82 1.72 2.98l4.73 2.73c.71.41 1.87.41 2.58 0l4.73-2.73c1.72-1.16 1.72-1.16 1.72-2.98v-4.97c0-1.82 0-1.82-1.72-2.98l-4.73-2.73c-.71-.41-1.87-.41-2.58 0L5.98 8.04C4.26 9.2 4.26 9.2 4.26 11.02Z"
                              stroke="currentColor"
                              stroke-width="1.5"
                              stroke-linecap="round"
                              stroke-linejoin="round"
                            ></path>
                            <path
                              d="M17.5 7.63V5c0-2-1-3-3-3h-5c-2 0-3 1-3 3v2.56M12.63 10.99l.57.89c.09.14.29.28.44.32l1.02.26c.63.16.8.7.39 1.2l-.67.81c-.1.13-.18.36-.17.52l.06 1.05c.04.65-.42.98-1.02.74l-.98-.39a.863.863 0 0 0-.55 0l-.98.39c-.6.24-1.06-.1-1.02-.74l.06-1.05c.01-.16-.07-.4-.17-.52l-.67-.81c-.41-.5-.24-1.04.39-1.2l1.02-.26c.16-.04.36-.19.44-.32l.57-.89c.36-.54.92-.54 1.27 0Z"
                              stroke="currentColor"
                              stroke-width="1.5"
                              stroke-linecap="round"
                              stroke-linejoin="round"
                            ></path>
                          </svg>
                        </span>

                        <span>Icons</span>
                      </span>

                      <div class="menu-arrow"></div>
                    </a>

                    <ul class="submenu-children" data-level="1">
                      <li>
                        <a href="general-remix-icons.html">
                          <span>Remix Icons</span>
                        </a>
                      </li>

                      <li>
                        <a href="general-iconly-icons.html">
                          <span>Iconly Icons</span>
                        </a>
                      </li>

                      <li>
                        <a href="widgets-illustration-set.html">
                          <span>Illustration Set</span>
                        </a>
                      </li>

                      <li>
                        <a href="widgets-crypto-icons.html">
                          <span>Crypto Icons</span>
                        </a>
                      </li>

                      <li>
                        <a href="widgets-user-icons.html">
                          <span>User Icons</span>
                        </a>
                      </li>

                      <li>
                        <a href="widgets-flags.html">
                          <span>Flags</span>
                        </a>
                      </li>
                    </ul>
                  </li>

                  <li>
                    <a href="javascript:;" class="submenu-item">
                      <span>
                        <span class="submenu-item-icon">
                          <svg
                            xmlns="http://www.w3.org/2000/svg"
                            width="18"
                            height="18"
                            viewbox="0 0 24 24"
                            fill="none"
                          >
                            <path
                              d="M4.26 11.02v4.97c0 1.82 0 1.82 1.72 2.98l4.73 2.73c.71.41 1.87.41 2.58 0l4.73-2.73c1.72-1.16 1.72-1.16 1.72-2.98v-4.97c0-1.82 0-1.82-1.72-2.98l-4.73-2.73c-.71-.41-1.87-.41-2.58 0L5.98 8.04C4.26 9.2 4.26 9.2 4.26 11.02Z"
                              stroke="currentColor"
                              stroke-width="1.5"
                              stroke-linecap="round"
                              stroke-linejoin="round"
                            ></path>
                            <path
                              d="M17.5 7.63V5c0-2-1-3-3-3h-5c-2 0-3 1-3 3v2.56M12.63 10.99l.57.89c.09.14.29.28.44.32l1.02.26c.63.16.8.7.39 1.2l-.67.81c-.1.13-.18.36-.17.52l.06 1.05c.04.65-.42.98-1.02.74l-.98-.39a.863.863 0 0 0-.55 0l-.98.39c-.6.24-1.06-.1-1.02-.74l.06-1.05c.01-.16-.07-.4-.17-.52l-.67-.81c-.41-.5-.24-1.04.39-1.2l1.02-.26c.16-.04.36-.19.44-.32l.57-.89c.36-.54.92-.54 1.27 0Z"
                              stroke="currentColor"
                              stroke-width="1.5"
                              stroke-linecap="round"
                              stroke-linejoin="round"
                            ></path>
                          </svg>
                        </span>

                        <span>Page Layouts</span>
                      </span>

                      <div class="menu-arrow"></div>
                    </a>

                    <ul class="submenu-children" data-level="1">
                      <li>
                        <a href="layout-boxed.html">
                          <span>Boxed Layout</span>
                        </a>
                      </li>

                      <li>
                        <a href="layout-vertical.html">
                          <span>Vertical Layout</span>
                        </a>
                      </li>

                      <li>
                        <a href="layout-horizontal.html">
                          <span>Horizontal Layout</span>
                        </a>
                      </li>

                      <li>
                        <a href="layout-full.html">
                          <span>Full Layout</span>
                        </a>
                      </li>
                    </ul>
                  </li>

                  <li>
                    <a href="javascript:;" class="submenu-item">
                      <span>
                        <span class="submenu-item-icon">
                          <svg
                            xmlns="http://www.w3.org/2000/svg"
                            width="18"
                            height="18"
                            viewbox="0 0 24 24"
                            fill="none"
                          >
                            <path
                              d="M4.26 11.02v4.97c0 1.82 0 1.82 1.72 2.98l4.73 2.73c.71.41 1.87.41 2.58 0l4.73-2.73c1.72-1.16 1.72-1.16 1.72-2.98v-4.97c0-1.82 0-1.82-1.72-2.98l-4.73-2.73c-.71-.41-1.87-.41-2.58 0L5.98 8.04C4.26 9.2 4.26 9.2 4.26 11.02Z"
                              stroke="currentColor"
                              stroke-width="1.5"
                              stroke-linecap="round"
                              stroke-linejoin="round"
                            ></path>
                            <path
                              d="M17.5 7.63V5c0-2-1-3-3-3h-5c-2 0-3 1-3 3v2.56M12.63 10.99l.57.89c.09.14.29.28.44.32l1.02.26c.63.16.8.7.39 1.2l-.67.81c-.1.13-.18.36-.17.52l.06 1.05c.04.65-.42.98-1.02.74l-.98-.39a.863.863 0 0 0-.55 0l-.98.39c-.6.24-1.06-.1-1.02-.74l.06-1.05c.01-.16-.07-.4-.17-.52l-.67-.81c-.41-.5-.24-1.04.39-1.2l1.02-.26c.16-.04.36-.19.44-.32l.57-.89c.36-.54.92-.54 1.27 0Z"
                              stroke="currentColor"
                              stroke-width="1.5"
                              stroke-linecap="round"
                              stroke-linejoin="round"
                            ></path>
                          </svg>
                        </span>

                        <span>Cards</span>
                      </span>

                      <div class="menu-arrow"></div>
                    </a>

                    <ul class="submenu-children" data-level="1">
                      <li>
                        <a href="cards-advance.html">
                          <span>Advance</span>
                        </a>
                      </li>

                      <li>
                        <a href="cards-statistics.html">
                          <span>Statistics</span>
                        </a>
                      </li>

                      <li>
                        <a href="cards-analytic.html">
                          <span>Analytics</span>
                        </a>
                      </li>
                    </ul>
                  </li>
                </ul>
              </li>
            </ul>
          </div>

          <div
            class="row justify-content-between align-items-center hp-sidebar-footer mx-0 hp-bg-color-dark-90"
          >
            <div
              class="divider border-black-40 hp-border-color-dark-70 hp-sidebar-hidden mt-0 px-0"
            ></div>

            <div class="col">
              <div class="row align-items-center">
                <div class="w-auto px-0">
                  <div
                    class="avatar-item bg-primary-4 d-flex align-items-center justify-content-center rounded-circle"
                    style="width: 48px; height: 48px"
                  >
                    <img
                      src="app-assets/img/memoji/user-avatar-8.png"
                      height="100%"
                      class="hp-img-cover"
                    />
                  </div>
                </div>

                <div class="w-auto ms-8 px-0 hp-sidebar-hidden mt-4">
                  <span
                    class="d-block hp-text-color-black-100 hp-text-color-dark-0 hp-p1-body lh-1"
                    >Jane Doe</span
                  >
                  <a
                    href="profile-information.html"
                    class="hp-badge-text fw-normal hp-text-color-dark-30"
                    >View Profile</a
                  >
                </div>
              </div>
            </div>

            <div class="col hp-flex-none w-auto px-0 hp-sidebar-hidden">
              <a href="profile-information.html">
                <svg
                  stroke="currentColor"
                  fill="currentColor"
                  stroke-width="0"
                  viewbox="0 0 24 24"
                  class="remix-icon hp-text-color-black-100 hp-text-color-dark-0"
                  height="24"
                  width="24"
                  xmlns="http://www.w3.org/2000/svg"
                >
                  <g>
                    <path fill="none" d="M0 0h24v24H0z"></path>
                    <path
                      d="M3.34 17a10.018 10.018 0 0 1-.978-2.326 3 3 0 0 0 .002-5.347A9.99 9.99 0 0 1 4.865 4.99a3 3 0 0 0 4.631-2.674 9.99 9.99 0 0 1 5.007.002 3 3 0 0 0 4.632 2.672c.579.59 1.093 1.261 1.525 2.01.433.749.757 1.53.978 2.326a3 3 0 0 0-.002 5.347 9.99 9.99 0 0 1-2.501 4.337 3 3 0 0 0-4.631 2.674 9.99 9.99 0 0 1-5.007-.002 3 3 0 0 0-4.632-2.672A10.018 10.018 0 0 1 3.34 17zm5.66.196a4.993 4.993 0 0 1 2.25 2.77c.499.047 1 .048 1.499.001A4.993 4.993 0 0 1 15 17.197a4.993 4.993 0 0 1 3.525-.565c.29-.408.54-.843.748-1.298A4.993 4.993 0 0 1 18 12c0-1.26.47-2.437 1.273-3.334a8.126 8.126 0 0 0-.75-1.298A4.993 4.993 0 0 1 15 6.804a4.993 4.993 0 0 1-2.25-2.77c-.499-.047-1-.048-1.499-.001A4.993 4.993 0 0 1 9 6.803a4.993 4.993 0 0 1-3.525.565 7.99 7.99 0 0 0-.748 1.298A4.993 4.993 0 0 1 6 12c0 1.26-.47 2.437-1.273 3.334a8.126 8.126 0 0 0 .75 1.298A4.993 4.993 0 0 1 9 17.196zM12 15a3 3 0 1 1 0-6 3 3 0 0 1 0 6zm0-2a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"
                    ></path>
                  </g>
                </svg>
              </a>
            </div>
          </div>
        </div>
      </div> -->

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
      $title1="My Payments";
      $title2="Demo Deposits";
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

                <a
                  href="https://hypeople-studio.gitbook.io/yoda/change-log"
                  target="_blank"
                  class="d-flex"
                >
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
        </div>

        <!-- FORM -->
        <div class="hp-main-layout-content">
          <div class="row">
            <!-- FORM ACTUAl -->
            <div class="col-12">
              <div class="card">
                <div class="card-body">
                  <div class="row justify-content-between">
                    <div class="col pe-md-32 pe-md-120">
                      <h4>Demo Account</h4>

                      <p class="hp-p1-body">Deposit In Demo Account</p>
                    </div>

                    

                    <div class="col-12 mt-16">
                      <form>
                        <div class="mb-24">
                          <label for="exampleInputEmail1" class="form-label"
                            >Select Account No.</label
                          >
                          <!-- <input
                            type="text"
                            class="form-control"
                            id="exampleInputEmail1"
                            aria-describedby="emailHelp"
                          /> -->

                          <select class="form-control" aria-label="Default select example">
                            <option selected>Open this select menu</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                          </select>
                        </div>

                        <div class="mb-24">
                          <label for="exampleInputPassword1" class="form-label"
                            >Select Amount</label
                          >
                          

                          <select class="form-control" aria-label="Default select example">
                            <option selected>Open this select menu</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                          </select>
                        </div>

                       

                        <div class="mb-24">
                          <label for="exampleInputPassword1" class="form-label"
                            >Comment</label
                          >
                          <input
                            type="text"
                            class="form-control"
                            id="comment"
                          />
                        </div>

                        <button type="submit" class="btn btn-primary">
                          Deposit
                        </button>
                      </form>
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

            
          </div>
        </div>
    
      </div>
    </main>

    <?php
  include "components/appTheme.php";
  ?>
    
    <!-- Pages -->
    <!-- Plugin -->
    <?php
  include "components/jsComponents/demo-deposit-account-js.php";
  ?>
  </body>
</html>
