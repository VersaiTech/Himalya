<?php
include "./config/config.php";
include "components/phpComponents/phpcomponents.php";

// Check if the user is logged in and has a session
if (isset($_SESSION['member_user_id'])) {
    $member_user_id = $_SESSION['member_user_id'];

    // Query to fetch the referral bonus data for the sponcer_id
    $query = "SELECT rb.id, rb.referred_member_id, rb.bonus_amount, rb.created_at, rb.level, mr.member_name
    FROM referral_bonus rb
    INNER JOIN tbl_memberreg mr ON rb.referred_member_id = mr.member_user_id
    WHERE rb.sponcer_id = ?";


    if ($connection === null || !$connection->ping()) {
        die("Database connection is not properly initialized or not connected.");
    }

    // Prepare and execute the query
    if ($stmt = $connection->prepare($query)) {
        $stmt->bind_param("i", $member_user_id); // Bind the member_user_id parameter
        $stmt->execute();
        $result = $stmt->get_result();
    } else {
        echo "Error preparing statement: " . $connection->error;
    }
} else {
    echo "User not logged in.";
}



?>
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

        <div class="hp-main-layout">
            <?php
            $title1 = "My Income";
            $title2 = "Referral Income History";
            include "components/header.php";
            ?>

            <div class="offcanvas offcanvas-start hp-mobile-sidebar bg-black-20 hp-bg-dark-90" tabindex="-1" id="mobileMenu" aria-labelledby="mobileMenuLabel" style="width: 256px;">
                <div class="offcanvas-header justify-content-between align-items-center ms-16 me-8 mt-16 p-0">
                    <div class="w-auto px-0">
                        <div class="hp-header-logo d-flex align-items-center">
                            <a href="overview" class="position-relative">
                               

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


            <div class="hp-main-layout-content">
                <div class="row mb-32 gy-32">
                    <!-- custom form -->
                    <div class="col-12">
                        <div class="card custom-card p-0 m-0" >
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center flex-wrap mb-3">
                                    <h3 class="card-title mb-15">Referral Income History</h3>
                                    <div class="d-flex flex-wrap align-items-center">
                                        <button class="btn btn-secondary me-2 mb-2 mb-md-0 btn-sm">
                                            <span class="bi bi-download"></span>&nbsp;&nbsp;Export to Excel</button>
                                        <select class="form-select mb-2 mb-md-0" style="width: auto;">
                                            <option selected>Show Entries</option>
                                            <option value="10">10</option>
                                            <option value="25">25</option>
                                            <option value="50">50</option>
                                            <option value="100">100</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="mb-24"></div>
                                <div class="row mb-14">
                                    <!-- From Date -->
                                    <div class="col-md-3">
                                        <label for="fromDate" class="form-label">From Date</label>
                                        <input type="date" class="form-control" id="fromDate">
                                    </div>
                                    <!-- To Date -->
                                    <div class="col-md-3">
                                        <label for="toDate" class="form-label">To Date</label>
                                        <input type="date" class="form-control" id="toDate">
                                    </div>
                                    <!-- Search Bar -->
                                    <div class="col-md-6">
                                        <label for="searchTable" class="form-label">Search</label>
                                        <input type="text" class="form-control" id="searchTable" placeholder="Search table">
                                    </div>
                                </div>
                                <div class="mb-24"></div>
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead>
                                            <th scope="col" style="min-width: 50px;">ID</th>
                                            <th scope="col" style="min-width: 150px;">DATE</th>
                                            <th scope="col" style="min-width: 150px;">TIME</th>
                                            <th scope="col" style="min-width: 120px;">REFERRED MEMBER ID </th>
                                            <th scope="col" style="min-width: 120px;">REFERRED MEMBER NAME </th>
                                            <th scope="col" style="min-width: 170px;">BONUS AMOUNT</th>
                                            <th scope="col" style="min-width: 120px;">LEVEL</th>
                                        </thead>
                                        <tbody id="tableBody">
                                            <?php if ($result && $result->num_rows > 0): ?>
                                                <?php while ($row = $result->fetch_assoc()): ?>
                                                    <tr>
                                                    <td><?php echo $row['id']; ?></td>
                                                    <td> <?php
															if (!empty($row['created_at'])) {
																echo date("d-M-Y", strtotime($row['created_at']));
															} else {
																echo "Date not available"; // Handle cases where 'created_at' is missing or null
															}
															?></td>
															<td>
														<?php
														if (!empty($row['created_at'])) {
															// Display just the time
															echo date("H:i:s", strtotime($row['created_at']));
														} else {
															echo "Time not available"; // Handle cases where 'created_at' is missing or null
														}
														?>
													</td>
                                                    <td><?php echo ucfirst($row['referred_member_id']); ?></td>
                                                    <td><?php echo ucfirst($row['member_name']); ?></td>
                                                        <td><?php echo $row['bonus_amount']; ?></td>
                                                        <td><?php echo ucfirst($row['level']); ?></td>
                                                    </tr>
                                                <?php endwhile; ?>
                                            <?php else: ?>
                                                <tr>
                                                    <td colspan="6">No payments found for this user.</td>
                                                </tr>
                                            <?php endif; ?>
                                        </tbody>
                                    </table>
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

    <?php
    include "components/jsComponents/client-withdraw-js.php"
    ?>
</body>

</html>