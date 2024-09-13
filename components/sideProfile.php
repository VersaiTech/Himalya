<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include "./config/config.php";
if (!isset($_SESSION['member_user_id']) || !isset($_SESSION['email_id'])) {
  exit();
}
$member_user_id = $_SESSION['member_user_id'];
$member_name = $_SESSION['member_name'];
if (!$connection) {
  die('Database connection failed: ' . mysqli_connect_error());
}
if (empty($_SESSION['member_name'])) {
  $referralURL = $baseURL . '/auth-register-metamask-1.php?UplineId=' . $_SESSION['member_user_id'] . '&RandomId=Please Invest First';
} else {
  $referralURL = $baseURL . '/auth-register-metamask-1.php?UplineId=' . $_SESSION['member_user_id'] . '&RandomId=' . substr($_SESSION['member_name'], 0, 10);
}
?>

<div class="row justify-content-between align-items-center hp-sidebar-footer mx-0 hp-bg-color-dark-90">
          <div class="divider border-black-40 hp-border-color-dark-70 hp-sidebar-hidden mt-0 px-0"></div>

          <div class="col">
            <div class="row align-items-center">
              <div class="w-auto px-0">
                <div class="avatar-item bg-primary-4 d-flex align-items-center justify-content-center rounded-circle" style="width: 48px; height: 48px;">
                  <img src="app-assets/img/memoji/man.png" height="100%" class="hp-img-cover">
                </div>
              </div>

              <div class="w-auto ms-8 px-0 hp-sidebar-hidden mt-4">
                <span class="d-block hp-text-color-black-100 hp-text-color-dark-0 hp-p1-body lh-1"><?php echo $member_name; ?></span>
                <a href="profile-information" class="hp-badge-text fw-normal hp-text-color-dark-30">View Profile</a>
              </div>
            </div>
          </div>

          <div class="col hp-flex-none w-auto px-0 hp-sidebar-hidden">
            <a href="profile-information">
              <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewbox="0 0 24 24" class="remix-icon hp-text-color-black-100 hp-text-color-dark-0" height="24" width="24" xmlns="http://www.w3.org/2000/svg">
                <g>
                  <path fill="none" d="M0 0h24v24H0z"></path>
                  <path d="M3.34 17a10.018 10.018 0 0 1-.978-2.326 3 3 0 0 0 .002-5.347A9.99 9.99 0 0 1 4.865 4.99a3 3 0 0 0 4.631-2.674 9.99 9.99 0 0 1 5.007.002 3 3 0 0 0 4.632 2.672c.579.59 1.093 1.261 1.525 2.01.433.749.757 1.53.978 2.326a3 3 0 0 0-.002 5.347 9.99 9.99 0 0 1-2.501 4.337 3 3 0 0 0-4.631 2.674 9.99 9.99 0 0 1-5.007-.002 3 3 0 0 0-4.632-2.672A10.018 10.018 0 0 1 3.34 17zm5.66.196a4.993 4.993 0 0 1 2.25 2.77c.499.047 1 .048 1.499.001A4.993 4.993 0 0 1 15 17.197a4.993 4.993 0 0 1 3.525-.565c.29-.408.54-.843.748-1.298A4.993 4.993 0 0 1 18 12c0-1.26.47-2.437 1.273-3.334a8.126 8.126 0 0 0-.75-1.298A4.993 4.993 0 0 1 15 6.804a4.993 4.993 0 0 1-2.25-2.77c-.499-.047-1-.048-1.499-.001A4.993 4.993 0 0 1 9 6.803a4.993 4.993 0 0 1-3.525.565 7.99 7.99 0 0 0-.748 1.298A4.993 4.993 0 0 1 6 12c0 1.26-.47 2.437-1.273 3.334a8.126 8.126 0 0 0 .75 1.298A4.993 4.993 0 0 1 9 17.196zM12 15a3 3 0 1 1 0-6 3 3 0 0 1 0 6zm0-2a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"></path>
                </g>
              </svg>
            </a>
          </div>
</div>