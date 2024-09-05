
<header>
                <div class="row w-100 m-0">
                    <div class="col px-0">
                        <div class="row w-100 align-items-center justify-content-between position-relative">
                            <div class="col w-auto hp-flex-none hp-mobile-sidebar-button me-24 px-0" data-bs-toggle="offcanvas" data-bs-target="#mobileMenu" aria-controls="mobileMenu">
                                <button type="button" class="btn btn-text btn-icon-only">
                                    <i class="ri-menu-fill hp-text-color-black-80 hp-text-color-dark-30 lh-1" style="font-size: 24px;"></i>
                                </button>
                            </div>

                            <div class="hp-header-text-info col col-lg-14 col-xl-16 hp-header-start-text d-flex align-items-center hp-horizontal-none">
                                <div class="d-flex overflow-hidden rounded-4 hp-bg-color-black-0 hp-bg-color-dark-100" style="min-width: 45px; width: 45px; height: 45px;">
                                    <img src="app-assets/img/memoji/newspaper.svg" alt="Newspaper" height="80%" style="margin-top: auto; margin-left: auto;">
                                </div>

                                <p class="hp-header-start-text-item hp-input-label hp-text-color-black-100 hp-text-color-dark-0 ms-12 mb-0 lh-1 d-flex align-items-center" style="font-size: 1.1rem; font-weight:500">
                        <?php
                        if (isset($title1) && isset($title2)) {
                            echo $title1 . ' / ' . $title2;
                        } else {
                            echo '';
                        }
                        ?>
                    </p>
                            </div>

                            <div class="hp-horizontal-logo-menu d-flex align-items-center w-auto">
                                <div class="col hp-flex-none w-auto hp-horizontal-block">
                                    <div class="hp-header-logo d-flex align-items-center">
                                        <a href="overview" class="position-relative">
                                            <div class="hp-header-logo-icon position-absolute bg-black-20 hp-bg-dark-90 rounded-circle border border-black-0 hp-border-color-dark-90 d-flex align-items-center justify-content-center" style="width: 18px; height: 18px; top: -5px;">
                                                <svg class="hp-fill-color-dark-0" width="12" height="12" viewbox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M0.709473 0L1.67247 10.8L5.99397 12L10.3267 10.7985L11.2912 0H0.710223H0.709473ZM9.19497 3.5325H4.12647L4.24722 4.88925H9.07497L8.71122 8.95575L5.99397 9.70875L3.28047 8.95575L3.09522 6.87525H4.42497L4.51947 7.93275L5.99472 8.33025L5.99772 8.3295L7.47372 7.93125L7.62672 6.21375H3.03597L2.67897 2.208H9.31422L9.19572 3.5325H9.19497Z" fill="#2D3436"></path>
                                                </svg>
                                            </div>

                                            <img class="hp-logo hp-sidebar-visible hp-dark-none" src="app-assets/img/logo/HIMLOGOSMALL.png" alt="logo">
                                            <img class="hp-logo hp-sidebar-visible hp-dark-block" src="app-assets/img/logo/HIMLOGOSMALL.png" alt="logo">
                                            <img class="hp-logo hp-sidebar-hidden hp-dir-none hp-dark-none" src="app-assets/img/logo/HIMLOGO1.png" alt="logo">
                                            <img class="hp-logo hp-sidebar-hidden hp-dir-none hp-dark-block" src="app-assets/img/logo/HIMLOGO1.png" alt="logo">
                                            <img class="hp-logo hp-sidebar-hidden hp-dir-block hp-dark-none" src="app-assets/img/logo/logo-rtl.svg" alt="logo">
                                            <img class="hp-logo hp-sidebar-hidden hp-dir-block hp-dark-block" src="app-assets/img/logo/logo-rtl-dark.svg" alt="logo">
                                        </a>
                                    </div>
                                </div>

                                <div class="col hp-flex-none w-auto hp-horizontal-block hp-horizontal-menu ps-24">
                                    <ul>
                                        <li>
                                          <div class="menu-title">DASHBOARD (From Header)</div>
                          
                                          <ul>
                                            <li>
                                              <a href="overview">
                                                <div
                                                  class="tooltip-item in-active"
                                                  data-bs-toggle="tooltip"
                                                  data-bs-placement="right"
                                                  title=""
                                                  data-bs-original-title="Overview"
                                                  aria-label="Overview"
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
                          
                                                  <span>Overview</span>
                                                </span>
                                              </a>
                                            </li>
                                          </ul>
                                        </li>
                          
                                        <li>
                                          <div class="menu-title">Profile</div>
                          
                                          <ul>
                                            <li>
                                              <a href="kyc-verification">
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
                          
                                                  <span>KYC Verification</span>
                                                </span>
                                              </a>
                                            </li>
                                            <li>
                                              <a href="profile-information">
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
                          
                                                  <span>User Details </span>
                                                </span>
                                              </a>
                                            </li>
                                          </ul>
                                        </li>
                          
                                        <li>
                                          <div class="menu-title">Mt5 Platform</div>
                          
                                          <ul>
                                            <li>
                                              <a href="mt5" class="submenu-item">
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
                          
                                                  <span>Mt5 Platform Link</span>
                                                </span>
                                              </a>
                                            </li>
                                          </ul>
                                        </li>
                          
                                        <li>
                                          <div class="menu-title">Account Type</div>
                          
                                          <ul>
                                            <li>
                                              <a href="see-live-account" class="submenu-item">
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
                          
                                                  <span>Live Account</span>
                                                </span>
                          
                                                <div class="menu-arrow"></div>
                                              </a>
                          
                                              <ul class="submenu-children" data-level="1">
                                                <li>
                                                    <a href="see-live-account">
                                                    <span>See Live Account</span>
                                                  </a>
                                                </li>
                                                <li>
                                                  <a href="live-reset-password">
                                                    <span>Reset Passwrod</span>
                                                  </a>
                                                </li>
                          
                                                <li>
                                                  <a href="live-account-details">
                                                    <span>Live Account Details</span>
                                                  </a>
                                                </li>
                                              </ul>
                                            </li>
                                            <li>
                                              <a href="see-demo-account" class="submenu-item">
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
                          
                                                  <span>Demo Account</span>
                                                </span>
                          
                                                <div class="menu-arrow"></div>
                                              </a>
                          
                                              <ul class="submenu-children" data-level="1">
                                                <li>
                                                    <a href="see-demo-account">
                                                    <span>See Demo Account</span>
                                                  </a>
                                                </li>
                                                <li>
                                                  <a href="demo-reset-password">
                                                    <span>Reset Passwrod</span>
                                                  </a>
                                                </li>
                          
                                                <li>
                                                  <a href="demo-account-details">
                                                    <span>Demo Account Details</span>
                                                  </a>
                                                </li>
                                              </ul>
                                            </li>
                          
                                            <li>
                                              <a href="investor-reset-password">
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
                          
                                                  <span>Investor Account Reset Password</span>
                                                </span>
                                              </a>
                                            </li>
                                          </ul>
                                        </li>
                          
                                        <li>
                                          <div class="menu-title">MY Payments</div>
                          
                                          <ul>
                                            <li>
                                              <a href="deposit-by-usdt" class="submenu-item">
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
                          
                                                  <span>Deposits</span>
                                                </span>
                          
                                                <div class="menu-arrow"></div>  
                                              </a>
                          
                                              <ul class="submenu-children" data-level="1">
                                                <li>
                                                  <a href="deposit-by-usdt">
                                                    <span>Deposit By USDT</span>
                                                  </a>
                                                </li>
                          
                                                <li>
                                                  <a href="deposit-history">
                                                    <span>Deposit History </span>
                                                  </a>
                                                </li>
                                              </ul>
                                            </li>
                                            <li>
                                              <a href="client-withdraw" class="submenu-item">
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
                          
                                                  <span>Withdrawals</span>
                                                </span>
                          
                                                <div class="menu-arrow"></div>  
                                              </a>
                          
                                              <ul class="submenu-children" data-level="1">
                                                <li>
                                                  <a href="client-withdraw">
                                                    <span>Withdraw</span>
                                                  </a>
                                                </li>
                          
                                                <li>
                                                  <a href="withdraw-history">
                                                    <span>Withdraw History </span>
                                                  </a>
                                                </li>
                                              </ul>
                                            </li>
                          
                                            <li>
                                              <a href="transfer" class="submenu-item">
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
                          
                                                  <span>Transfer</span>
                                                </span>
                                              </a>
                                            </li>
                          
                                            <li>
                                              <a href="deposit-demo-account" class="submenu-item">
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
                          
                                                  <span>Deposit Demo Account</span>
                                                </span>
                                              </a>
                                            </li>
                          
                                            <li>
                                              <a href="wallet-finance" class="submenu-item">
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
                          
                                                  <span>Wallet Finance</span>
                                                </span>
                                              </a>
                                            </li>
                          
                                           
                                          </ul>
                                        </li>
                          
                                         <li>
                          <a href="customer-support" class="menu-link">
                            <div class="menu-title">Customer Support</div>
                          </a>
                        </li>
                                        <li>
                                        <a href="logout" class="menu-link">
                                          <div class="menu-title">Logout</div>
                                        </a>
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
                            </div>

                            <div class="hp-header-search d-none col">
                                <input type="text" class="form-control" placeholder="Search..." id="header-search" autocomplete="off">
                            </div>

                            <div class="col hp-flex-none w-auto pe-0">
                                <div class="row align-items-center justify-content-end">
                                    <div class="w-auto px-0">
                                        <div class="d-flex align-items-center me-4 hp-header-search-button">
                                            <button type="button" class="btn btn-icon-only bg-transparent border-0 hp-hover-bg-black-10 hp-hover-bg-dark-100 hp-transition d-flex align-items-center justify-content-center" style="height: 40px;">
                                                <svg class="hp-header-search-button-icon-1 hp-text-color-black-80 hp-text-color-dark-30" set="curved" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewbox="0 0 24 24" fill="none">
                                                    <path d="M11.5 21a9.5 9.5 0 1 0 0-19 9.5 9.5 0 0 0 0 19ZM22 22l-2-2" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                </svg>
                                                <i class="d-none hp-header-search-button-icon-2 ri-close-line hp-text-color-black-60" style="font-size: 24px;"></i>
                                            </button>
                                        </div>
                                    </div>

                                    <!-- <div class="hover-dropdown-fade w-auto px-0 d-flex align-items-center position-relative">
                                        <button type="button" class="btn btn-icon-only bg-transparent border-0 hp-hover-bg-black-10 hp-hover-bg-dark-100 hp-transition d-flex align-items-center justify-content-center" style="height: 40px;">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewbox="0 0 24 24" fill="none" class="hp-text-color-black-80 hp-text-color-dark-30">
                                                <path d="M12 6.44v3.33M12.02 2C8.34 2 5.36 4.98 5.36 8.66v2.1c0 .68-.28 1.7-.63 2.28l-1.27 2.12c-.78 1.31-.24 2.77 1.2 3.25a23.34 23.34 0 0 0 14.73 0 2.22 2.22 0 0 0 1.2-3.25l-1.27-2.12c-.35-.58-.63-1.61-.63-2.28v-2.1C18.68 5 15.68 2 12.02 2Z" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round"></path>
                                                <path d="M15.33 18.82c0 1.83-1.5 3.33-3.33 3.33-.91 0-1.75-.38-2.35-.98-.6-.6-.98-1.44-.98-2.35" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10"></path>
                                            </svg>
                                            <span class="position-absolute translate-middle p-2 rounded-circle bg-primary hp-notification-circle" style="width: 6px; height: 6px; top: 12px;"></span>
                                        </button>

                                        <div class="hp-notification-menu dropdown-fade position-absolute pt-18" style="width: 380px; top: 100%;">
                                            <div class="p-24 rounded hp-bg-black-0 hp-bg-dark-100">
                                                <div class="row justify-content-between align-items-center mb-16">
                                                    <div class="col hp-flex-none w-auto h5 hp-text-color-black-100 hp-text-color-dark-10 hp-text-color-dark-0 me-64 mb-0">Bank Details</div>

                                                    <div class="col hp-flex-none w-auto hp-badge-text fw-medium hp-text-color-black-80 me-12 px-0">4 New</div>
                                                </div>

                                                <div class="divider my-4"></div>

                                                <div class="hp-overflow-y-auto px-10" style="max-height: 400px; margin-right: -10px; margin-left: -10px;">
                                                    <div class="row hp-cursor-pointer rounded hp-transition hp-hover-bg-primary-4 hp-hover-bg-dark-80 py-12 px-10" style="margin-left: -10px; margin-right: -10px;">
                                                        <div class="w-auto px-0 me-12">
                                                            <div class="avatar-item d-flex align-items-center justify-content-center rounded-circle" style="width: 48px; height: 48px;">
                                                                <img src="app-assets/img/memoji/user-avatar-1.png" class="w-100">
                                                            </div>
                                                        </div>

                                                        <div class="w-auto px-0 col">
                                                            <p class="d-block fw-medium hp-p1-body hp-text-color-black-100 hp-text-color-dark-0 mb-4">
                                                                Debi Cakar
                                                                <span class="hp-text-color-black-60">commented on</span>
                                                                Ecosystem and conservation
                                                            </p>

                                                            <span class="d-block hp-badge-text fw-medium hp-text-color-black-60 hp-text-color-dark-40">1m ago</span>
                                                        </div>
                                                    </div>

                                                    <div class="row hp-cursor-pointer rounded hp-transition hp-hover-bg-primary-4 hp-hover-bg-dark-80 py-12 px-10" style="margin-left: -10px; margin-right: -10px;">
                                                        <div class="w-auto px-0 me-12">
                                                            <div class="avatar-item d-flex align-items-center justify-content-center rounded-circle" style="width: 48px; height: 48px;">
                                                                <img src="app-assets/img/memoji/user-avatar-2.png" class="w-100">
                                                            </div>
                                                        </div>

                                                        <div class="w-auto px-0 col">
                                                            <p class="d-block fw-medium hp-p1-body hp-text-color-black-100 hp-text-color-dark-0 mb-4">
                                                                Edward Adams <span class="hp-text-color-black-60">invite you</span> to Prototyping
                                                            </p>

                                                            <span class="d-block hp-badge-text fw-medium hp-text-color-black-60 hp-text-color-dark-40">9h ago</span>
                                                        </div>
                                                    </div>

                                                    <div class="row hp-cursor-pointer rounded hp-transition hp-hover-bg-primary-4 hp-hover-bg-dark-80 py-12 px-10" style="margin-left: -10px; margin-right: -10px;">
                                                        <div class="w-auto px-0 me-12">
                                                            <div class="avatar-item d-flex align-items-center justify-content-center rounded-circle" style="width: 48px; height: 48px;">
                                                                <img src="app-assets/img/memoji/user-avatar-3.png" class="w-100">
                                                            </div>
                                                        </div>

                                                        <div class="w-auto px-0 col">
                                                            <p class="d-block fw-medium hp-p1-body hp-text-color-black-100 hp-text-color-dark-0 mb-4">
                                                                Richard Charles <span class="hp-text-color-black-60">mentioned you in</span> UX Basics Field
                                                            </p>

                                                            <span class="d-block hp-badge-text fw-medium hp-text-color-black-60 hp-text-color-dark-40">13h ago</span>
                                                        </div>
                                                    </div>

                                                    <div class="row hp-cursor-pointer rounded hp-transition hp-hover-bg-primary-4 hp-hover-bg-dark-80 py-12 px-10" style="margin-left: -10px; margin-right: -10px;">
                                                        <div class="w-auto px-0 me-12">
                                                            <div class="avatar-item hp-bg-dark-success bg-success-4 d-flex align-items-center justify-content-center rounded-circle" style="width: 48px; height: 48px;">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewbox="0 0 24 24" fill="none" class="hp-text-color-success-1">
                                                                    <path d="M12 2C6.49 2 2 6.49 2 12s4.49 10 10 10 10-4.49 10-10S17.51 2 12 2Zm4.78 7.7-5.67 5.67a.75.75 0 0 1-1.06 0l-2.83-2.83a.754.754 0 0 1 0-1.06c.29-.29.77-.29 1.06 0l2.3 2.3 5.14-5.14c.29-.29.77-.29 1.06 0 .29.29.29.76 0 1.06Z" fill="currentColor"></path>
                                                                </svg>
                                                            </div>
                                                        </div>

                                                        <div class="w-auto px-0 col">
                                                            <p class="d-block fw-medium hp-p1-body hp-text-color-black-100 hp-text-color-dark-0 mb-4">
                                                                <span class="hp-text-color-black-60">You swapped exactly</span>
                                                                0.230000 ETH <span class="hp-text-color-black-60">for</span> 28,031.99
                                                            </p>

                                                            <span class="d-block hp-badge-text fw-medium hp-text-color-black-60 hp-text-color-dark-40">17h ago</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div> -->


                                    <div class="hover-dropdown-fade w-auto px-0 ms-6 position-relative">
                                        <div class="hp-cursor-pointer rounded-4 border hp-border-color-dark-80">
                                            <div class="rounded-3 overflow-hidden m-4 d-flex">
                                                <div class="avatar-item hp-bg-info-4 d-flex" style="width: 32px; height: 32px;">
                                                    <img src="app-assets/img/memoji/man.png">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="hp-header-profile-menu dropdown-fade position-absolute pt-18" style="top: 100%; width: 260px;">
                                            <div class="rounded hp-bg-black-0 hp-bg-dark-100 px-18 py-24">
                                                <span class="d-block h5 hp-text-color-black-100 hp-text-color-dark-0 mb-16">Profile Settings</span>

                                                <a href="profile-information" class="hp-p1-body fw-medium hp-hover-text-color-primary-2">View Profile</a>

                                                <div class="divider mt-18 mb-16"></div>

                                                <!-- <div class="row">
                                                    <div class="col-12">
                                                        <a href="app-contact.html" class="d-flex align-items-center fw-medium hp-p1-body my-4 py-8 px-10 hp-transition hp-hover-bg-primary-4 hp-hover-bg-dark-primary hp-hover-bg-dark-80 rounded" target="_self" style="margin-left: -10px; margin-right: -10px;">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewbox="0 0 24 24" fill="none" class="me-8">
                                                                <path d="M21.08 8.58v6.84c0 1.12-.6 2.16-1.57 2.73l-5.94 3.43c-.97.56-2.17.56-3.15 0l-5.94-3.43a3.15 3.15 0 0 1-1.57-2.73V8.58c0-1.12.6-2.16 1.57-2.73l5.94-3.43c.97-.56 2.17-.56 3.15 0l5.94 3.43c.97.57 1.57 1.6 1.57 2.73Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                <path d="M12 11a2.33 2.33 0 1 0 0-4.66A2.33 2.33 0 0 0 12 11ZM16 16.66c0-1.8-1.79-3.26-4-3.26s-4 1.46-4 3.26" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                            </svg>
                                                            <span>Explore Creators</span>
                                                        </a>
                                                    </div>

                                                    <div class="col-12">
                                                        <a href="page-knowledge-base-1.html" class="d-flex align-items-center fw-medium hp-p1-body my-4 py-8 px-10 hp-transition hp-hover-bg-primary-4 hp-hover-bg-dark-primary hp-hover-bg-dark-80 rounded" target="_self" style="margin-left: -10px; margin-right: -10px;">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewbox="0 0 24 24" fill="none" class="me-8">
                                                                <path d="M8 2v3M16 2v3M3.5 9.09h17M21 8.5V17c0 3-1.5 5-5 5H8c-3.5 0-5-2-5-5V8.5c0-3 1.5-5 5-5h8c3.5 0 5 2 5 5Z" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                <path d="M15.695 13.7h.009M15.695 16.7h.009M11.995 13.7h.01M11.995 16.7h.01M8.294 13.7h.01M8.294 16.7h.01" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                                            </svg>
                                                            <span>Help Desk</span>
                                                        </a>
                                                    </div>
                                                </div> -->

                                                <!-- <div class="divider my-12"></div> -->

                                                <!-- <div class="row">
                                                    <div class="col-12">
                                                        <a href="page-pricing.html" class="d-flex align-items-center fw-medium hp-p1-body py-8 px-10 hp-transition hp-hover-bg-primary-4 hp-hover-bg-dark-primary hp-hover-bg-dark-80 rounded" target="_self" style="margin-left: -10px; margin-right: -10px;">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewbox="0 0 24 24" fill="none" class="me-8">
                                                                <path d="M10 22h4c5 0 7-2 7-7V9c0-5-2-7-7-7h-4C5 2 3 4 3 9v6c0 5 2 7 7 7Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                <path d="M16.5 7.58v1c0 .82-.67 1.5-1.5 1.5H9c-.82 0-1.5-.67-1.5-1.5v-1c0-.82.67-1.5 1.5-1.5h6c.83 0 1.5.67 1.5 1.5Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                <path d="M8.136 14h.012M11.995 14h.012M15.854 14h.012M8.136 17.5h.012M11.995 17.5h.012M15.854 17.5h.012" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                                            </svg>
                                                            <span>Pricing List</span>
                                                        </a>
                                                    </div>
                                                </div> -->

                                                <!-- <div class="divider mt-12 mb-18"></div> -->

                                                <div class="row">
                                                    <div class="col-12">
                                                        <a class="hp-p1-body fw-medium" href="profile-information">Account Settings</a>
                                                    </div>

                                                    <div class="col-12 mt-24">
                                                        <a class="hp-p1-body fw-medium" href="logout">Logout</a>
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
            </header>