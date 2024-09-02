<?php
include './config/config.php';
include './config/function.php';
// include './process/ProcessRegistration.php';

$sponcer_id = $_REQUEST['UplineId'];
$RandomId = trim($_REQUEST['RandomId']);

if (strlen($RandomId) < 10) {
    echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@10'></script>";
    echo "<script>
        Swal.fire({
            title: 'Error!',
            text: 'Cannot Register Without Referral ID',
            icon: 'error',
            timer: 2000,
            showConfirmButton: false
        }).then(() => {
            window.location.href = 'Login';
        });
    </script>";
    exit();
}

$str = "Select * from tbl_memberreg where member_user_id='$sponcer_id' ";

// Ensure connection is established
if (!$connection) {
    die('Database connection failed: ' . mysqli_connect_error());
}

$res = mysqli_query($connection, $str);
mysqli_num_rows($res);
if (mysqli_num_rows($res) == 0) {
    header("Location:Login");
    exit();
} else {
    $row = mysqli_fetch_array($res);
    $sponcer_name = $row['member_name'];
    $member_user_id = $row['member_user_id'];
}



// Fetching Options
$sql = "SELECT member_name FROM tbl_memberreg";
$result = $connection->query($sql);

$options = "";
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $options .= '<option value="' . $row['member_name'] . '">' . $row['member_name'] . ' USDT</option>';
    }
} else {
    $options = '<option>No packages available</option>';
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

    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="app-assets/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="app-assets/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="app-assets/favicon/favicon-16x16.png">
    <link rel="manifest" href="app-assets/favicon/site.webmanifest">
    <link rel="mask-icon" href="app-assets/favicon/safari-pinned-tab.svg" color="#0010f7">
    <meta name="msapplication-TileColor" content="#0010f7">
    <meta name="theme-color" content="#ffffff">

    <!-- Font -->
    <!-- Font -->
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia">

    <!-- Plugin -->
    <link rel="stylesheet" type="text/css" href="app-assets/css/plugin/swiper-bundle.min.css">
    <link rel="stylesheet" type="text/css" href="app-assets/icons/iconly/index.min.css">
    <link rel="stylesheet" type="text/css" href="app-assets/icons/remix-icon/index.min.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/colors.css">

    <!-- Base -->
    <link rel="stylesheet" type="text/css" href="app-assets/css/base/typography.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/base/base.css">

    <!-- Theme -->
    <link rel="stylesheet" type="text/css" href="app-assets/css/theme/colors-dark.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/theme/theme-dark.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/custom-rtl.css">

    <!-- Layouts -->
    <link rel="stylesheet" type="text/css" href="app-assets/css/layouts/sider.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/layouts/header.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/layouts/page-content.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/components.css">
    <!-- Customizer -->
    <link rel="stylesheet" type="text/css" href="app-assets/css/layouts/customizer.css">

    <!-- Pages -->
    <link rel="stylesheet" type="text/css" href="app-assets/css/pages/authentication.css">

    <!-- Custom -->
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">

    <title>Register- Orion Trade Ai</title>

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
    <div class="row hp-authentication-page">
        <div class="hp-bg-black-20 hp-bg-color-dark-90 col-lg-6 col-12">
            <div class="row hp-image-row h-100 px-8 px-sm-16 px-md-0 pb-32 pb-sm-0 pt-32 pt-md-0">
                <div class="hp-logo-item m-16 m-sm-32 m-md-64 w-auto px-0 col-12">
                    <div class="hp-header-logo d-flex align-items-center">
                        <a href="overview" class="position-relative">
                            <!-- <div class="hp-header-logo-icon position-absolute bg-black-20 hp-bg-dark-90 rounded-circle border border-black-0 hp-border-color-dark-90 d-flex align-items-center justify-content-center" style="width: 18px; height: 18px; top: -5px;">
                                <svg class="hp-fill-color-dark-0" width="12" height="12" viewbox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M0.709473 0L1.67247 10.8L5.99397 12L10.3267 10.7985L11.2912 0H0.710223H0.709473ZM9.19497 3.5325H4.12647L4.24722 4.88925H9.07497L8.71122 8.95575L5.99397 9.70875L3.28047 8.95575L3.09522 6.87525H4.42497L4.51947 7.93275L5.99472 8.33025L5.99772 8.3295L7.47372 7.93125L7.62672 6.21375H3.03597L2.67897 2.208H9.31422L9.19572 3.5325H9.19497Z" fill="#2D3436"></path>
                                </svg>
                            </div> -->

                            <img class="hp-logo hp-sidebar-visible hp-dark-none" src="app-assets/img/logo/logo-small.svg" alt="logo">
                            <img class="hp-logo hp-sidebar-visible hp-dark-block" src="app-assets/img/logo/logo-small.png" alt="logo">
                            <img class="hp-logo hp-sidebar-hidden hp-dir-none hp-dark-none" src="app-assets/img/logo/LOGOFORWHITE.png" alt="logo">
                            <img class="hp-logo hp-sidebar-hidden hp-dir-none hp-dark-block" src="app-assets/img/logo/LOGOFORBLACK.png" alt="logo">
                            <img class="hp-logo hp-sidebar-hidden hp-dir-block hp-dark-none" src="app-assets/img/logo/logo-rtl.svg" alt="logo">
                            <img class="hp-logo hp-sidebar-hidden hp-dir-block hp-dark-block" src="app-assets/img/logo/logo-rtl-dark.svg" alt="logo">
                        </a>

                        <!-- <a href="https://hypeople-studio.gitbook.io/yoda/change-log" target="_blank" class="d-flex">
                            <span class="hp-sidebar-hidden hp-caption fw-normal hp-text-color-primary-1"></span>
                        </a> -->
                    </div>
                </div>

                <div class="col-12 px-0">
                    <div class="row h-100 w-100 mx-0 align-items-center justify-content-center">
                        <div class="hp-bg-item text-center mb-32 mb-md-0 px-0 col-12">
                            <img class="hp-dark-none m-auto w-100" src="app-assets/img/pages/authentication/authentication-bg.svg" alt="Background Image">
                            <img class="hp-dark-block m-auto w-100" src="app-assets/img/pages/authentication/authentication-bg-dark.svg" alt="Background Image">
                        </div>

                        <div class="hp-text-item text-center col-xl-9 col-12">
                            <h2 class="hp-text-color-black-100 hp-text-color-dark-0 mx-16 mx-lg-0 mb-16"> Secure Access
                                to Your Orion AI-Powered Trading Hub</h2>
                            <!-- <p class="h4 mb-0 fw-normal hp-text-color-black-80 hp-text-color-dark-30"> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever. </p> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-lg-6 py-sm-64 py-lg-0">
            <div class="row align-items-center justify-content-center h-100 mx-4 mx-sm-n32">
                <div class="col-12 col-md-9 col-xl-7 col-xxxl-5 px-8 px-sm-0 pt-24 pb-48">
                    <span class="d-block  hp-p1-body hp-text-color-dark-0 hp-text-color-black-100 fw-medium mb-6"> SIGN
                        UP FOR FREE </span>
                    <h1 class="mb-0 mb-sm-24">Create Account &nbsp;<i class="bi bi-suit-heart-fill hp-text-color-dark-0 hp-text-color-black-100 fs-5"></i></h1>
                    <!-- <p class="mt-sm-8 mt-sm-0 text-black-60">Please sign up to your personal account if you want to use all our premium products.</p> -->

                    <form class="mt-16 mt-sm-32 mb-8">
                        <div class="mb-16">
                            <label for="sponcer_id" class="form-label">Referral Id</label>
                            <input type="text" class="form-control" id="sponcer_id" value="<?php echo $sponcer_id; ?>" readonly>
                        </div>

                        <div class="mb-16">
                            <label for="packageType" class="form-label">Package Type</label>
                            <select class="form-select" id="packageType" onchange="updatePackageOptions()">
                                <option selected>Select Package Type</option>
                                <option value="basic">Basic Package</option>
                                <option value="premium">Premium Package</option>
                            </select>
                        </div>

                        <div class="mb-16">
                            <label for="spackage" class="form-label">Package (USDT)</label>
                            <select class="form-select" id="spackage">
                                <option selected>Select Package</option>
                            </select>
                        </div>

                        <div class="mb-16">
                            <label for="position" class="form-label">Position</label>
                            <select class="form-select" id="position">
                                <option selected>Select Position</option>
                                <option value="left">Left</option>
                                <option value="right">Right</option>
                            </select>
                        </div>

                        <div class="mb-16">
                            <label for="walletAddress" class="form-label">Wallet Address</label>
                            <input type="text" class="form-control" id="walletAddress">
                        </div>

                        <button onclick="Registration()" id="registrationButton" type="button" class="btn btn-primary w-100">
                            Sign Up
                        </button>
                    </form>

                    <div class="col-12 hp-form-info text-center">
                        <span class="text-black-80 hp-text-color-dark-40 hp-caption me-4">Already have an
                            account?</span>
                        <a class="text-primary-1 hp-text-color-dark-primary-2 hp-caption" href="login">Login</a>
                    </div>

                    <div class="mt-48 mt-sm-96 col-12">
                        <p class="hp-p1-body text-center hp-text-color-black-60 mb-8"> Copyright 2024 Orion Trade AI
                        </p>

                        <div class="row align-items-center justify-content-center mx-n8">
                            <div class="w-auto hp-flex-none px-8 col">
                                <a href="javascript:;" class="hp-text-color-black-80 hp-text-color-dark-40"> Privacy
                                    Policy </a>
                            </div>

                            <div class="w-auto hp-flex-none px-8 col">
                                <a href="javascript:;" class="hp-text-color-black-80 hp-text-color-dark-40"> Term of use
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.ethers.io/lib/ethers-5.2.umd.min.js" type="application/javascript"></script>


    <script>
        function updatePackageOptions() {
            var packageType = document.getElementById('packageType').value;
            var spackage = document.getElementById('spackage');

            // Clear existing options
            spackage.innerHTML = '<option selected>Select Package</option>';

            // Define package options
            var options = [];

            if (packageType === 'basic') {
                options = [300, 800, 1000];
            } else if (packageType === 'premium') {
                options = [3000, 5000, 10000];
            }

            // Add new options
            for (var i = 0; i < options.length; i++) {
                var option = document.createElement('option');
                option.value = options[i];
                option.text = options[i] + ' USDT';
                spackage.appendChild(option);
            }
        }
    </script>


    <script src="components/abis.js"></script>



    <script>
        async function startNow() {
            if (window.ethereum) {
                try {
                    window.ethereum
                        .request({
                            method: "eth_requestAccounts"
                        })
                        .then(async function(address) {
                            window.userAddress = address[0];
                            console.log("Wallet Address: ", window.userAddress);

                            $("#walletAddress").val(window.userAddress);


                        });
                } catch (error) {
                    if (error.code === 4001) {}
                    console.log(error);
                }
            }
            // setUp();
        }
        setInterval('startNow()', 3000);




        async function Registration() {


            if (window.ethereum) {
                try {
                    var sponcer_id = '<?php echo $sponcer_id; ?>';
                    var sponcer_name = '<?php echo $sponcer_name; ?>';
                    var cpackage = $("#spackage").val();
                    var position = $("#position").val();
                    var tokenbalance = $.trim($("#tokenbalance").val());
                    var wallet_address = window.userAddress;
                    var auraAmt = $.trim($("#orion_package").val());

                    if (auraAmt == "") auraAmt = 0;

                    auraAmt = toFixed(auraAmt * 1e18);
                    console.log("cpackage=", Number(cpackage));
                    console.log("position=", position);
                    var a = cpackage % 5;

                    if (Number(cpackage) < 25 || isNaN(cpackage)) {
                        Swal.fire({
                            title: 'Error!',
                            text: 'Minimum Package is 25',
                            icon: 'error',
                            timer: 2000,
                            timerProgressBar: true,
                            showConfirmButton: false
                        });
                        return;
                    } else if (parseInt(tokenbalance) < parseInt(auraAmt)) {
                        Swal.fire({
                            title: 'Error!',
                            text: "Token Balance Is Low",
                            icon: 'error',
                            timer: 2000,
                            timerProgressBar: true,
                            showConfirmButton: false
                        });
                        return;
                    } else if (sponcer_id == '' || wallet_address == '') {
                        Swal.fire({
                            title: 'Error!',
                            text: 'Please Enter Sponsor Address',
                            icon: 'error',
                            timer: 2000,
                            timerProgressBar: true,
                            showConfirmButton: false
                        });
                        return;
                    } else if (sponcer_id != "" && wallet_address != '') {
                        $(".registra").attr("disabled", "true");
                        $(".registra").html('Processing <i class="fa fa-spinner fa-spin"></i>');
                        var dataStringr = 'WalletAddress=' + wallet_address;
                        console.log(dataStringr);



                        $.ajax({
                            type: "POST",
                            url: "WalletLogin",
                            data: dataStringr,
                            cache: false,
                            success: async function(status) {
                                if (status == "Exist") {
                                    Swal.fire({
                                        title: 'Error!',
                                        text: 'Wallet Already Registered',
                                        icon: 'error',
                                        timer: 2000,
                                        timerProgressBar: true,
                                        showConfirmButton: false
                                    });
                                    return;
                                } else {

                                    var busdAmt = toFixed(cpackage * 1e18);
                                    var CoinAmt = auraAmt / 1e18;
                                    var hashcode = Math.random().toString(36).substring(7);

                                    var dataStringr = 'wallet_address=' + wallet_address + '&sponsor_id=' + sponcer_id + '&plan_amt=' + Number(cpackage) + '&CoinAmt=' + CoinAmt + '&position=' + position;
                                    console.log("Data is =", dataStringr);

                                    const provider = new ethers.providers.Web3Provider(window.ethereum);


                                    // // check chain should be bnb chain
                                    // const chainId = await provider.getNetwork();
                                    // if (chainId.chainId !== 56) {
                                    //     Swal.fire({
                                    //         title: 'Error!',
                                    //         text: 'Please Switch To BNB Chain',
                                    //         icon: 'error',
                                    //         timer: 2000,
                                    //         timerProgressBar: true,
                                    //         showConfirmButton: false
                                    //     });
                                    //     return;
                                    // }

                                    // check chain should be bnb testnet chain
                                    // const chainIdTest = await provider.getNetwork();
                                    // if (chainIdTest.chainId !== 97) {
                                    //     Swal.fire({
                                    //         title: 'Error!',
                                    //         text: 'Please Switch To BNB Testnet Chain',
                                    //         icon: 'error',
                                    //         timer: 2000,
                                    //         timerProgressBar: true,
                                    //         showConfirmButton: false
                                    //     });
                                    //     return;
                                    // }


                                    // check chain should be etherum chain
                                    // const chainIdEth = await provider.getNetwork();
                                    // if (chainIdEth.chainId !== 1) {
                                    //     Swal.fire({
                                    //         title: 'Error!',
                                    //         text: 'Please Switch To Ethereum Chain',
                                    //         icon: 'error',
                                    //         timer: 2000,
                                    //         timerProgressBar: true,
                                    //         showConfirmButton: false
                                    //     });
                                    //     return;
                                    // }


                                    // const busdContractAddress = "0xeD24FC36d5Ee211Ea25A80239Fb8C4Cfd80f12Ee";
                                    // const busdContract = new ethers.Contract(busdContractAddress, window.testbusdabi, provider);
                                    // const balance = await busdContract.balanceOf(wallet_address);
                                    // const busdBalance = ethers.utils.formatUnits(balance, 18);
                                    // console.log(`BUSD balance: ${busdBalance}`);


                                    // if (Number(busdBalance) < cpackage / 100) {
                                    //     Swal.fire({
                                    //         title: 'Error!',
                                    //         text: 'Insufficient Balance',
                                    //         icon: 'error',
                                    //         timer: 2000,
                                    //         timerProgressBar: true,
                                    //         showConfirmButton: false
                                    //     });
                                    //     return;
                                    // }

                                    // show loading with Swal
                                    Swal.fire({
                                        title: 'Processing...',
                                        html: 'Please wait...',
                                        allowOutsideClick: false,
                                        allowEscapeKey: false,
                                        allowEnterKey: false,
                                        showConfirmButton: false,
                                        showCancelButton: false,
                                        showCloseButton: false,
                                        timer: 50000,
                                    })

                                    // const adminWalletAddress = "0x8Ec246487834f6C4CAAf2fd67cB1731Cc5C9eB57";
                                    // // const amountToSend = await ethers.utils.parseUnits((cpackage / 1000).toFixed().toString(), 18);
                                    // const amountToSend = await ethers.utils.parseUnits("1", 18);
                                    // const signer = await provider.getSigner();
                                    // console.log(provider);
                                    // const busdContractWithSigner = new ethers.Contract(busdContractAddress, window.testbusdabi, signer);
                                    // const transaction = await busdContractWithSigner.transfer(adminWalletAddress, amountToSend);
                                    // const receipt = await transaction.wait();

                                    // var dataStringr = 'wallet_address=' + wallet_address + '&sponsor_id=' + sponcer_id + '&plan_amt=' + Number(cpackage) + '&CoinAmt=' + CoinAmt + '&position=' + position + '&hashcode=' + receipt.transactionHash;


                                    var dataStringr = 'wallet_address=' + wallet_address + '&sponsor_id=' + sponcer_id + '&plan_amt=' + Number(cpackage) + '&CoinAmt=' + CoinAmt + '&position=' + position + '&hashcode=' + hashcode;

                                    $.ajax({
                                        type: "POST",
                                        url: "ProcessRegistration",
                                        data: dataStringr,
                                        cache: false,
                                        success: function(response) {
                                            Swal.close();
                                            var responseObj = {};
                                            try {
                                                responseObj = JSON.parse(response);
                                                console.log(responseObj);
                                            } catch (error) {
                                                console.log(error);
                                            }
                                            if (responseObj.status == 'success') {
                                                Swal.fire({
                                                    title: 'Success!',
                                                    text: 'Registration Success.',
                                                    icon: 'success',
                                                    timer: 2000,
                                                    timerProgressBar: true,
                                                    showConfirmButton: false
                                                }).then(() => {
                                                    window.location.href = 'overview';
                                                });
                                            } else {
                                                Swal.fire({
                                                    title: 'Error!',
                                                    text: "Registration Failed.",
                                                    icon: 'error',
                                                    timer: 2000,
                                                    timerProgressBar: true,
                                                    showConfirmButton: false
                                                });
                                            }

                                        },
                                        error: function(xhr, status, error) {
                                            Swal.fire({
                                                title: 'Error!',
                                                text: "An error occurred during Registration. Please try again later.",
                                                icon: 'error',
                                                timer: 2000,
                                                timerProgressBar: true,
                                                showConfirmButton: false
                                            });
                                        }
                                    });
                                }
                            },
                            error: function(xhr, status, error) {
                                Swal.fire({
                                    title: 'Error!',
                                    text: "An error occurred during Wallet Login. Please try again later.",
                                    icon: 'error',
                                    timer: 2000,
                                    timerProgressBar: true,
                                    showConfirmButton: false
                                });
                            }
                        });
                    }
                } catch (error) {
                    console.log("called catch");
                    if (error.code === 4001) {

                        Swal.fire({
                            title: 'Error!',
                            text: 'User denied account access',
                            icon: 'error',
                            timer: 2000,
                            timerProgressBar: true,
                            showConfirmButton: false
                        });
                        Swal.close();
                    } else {
                        console.log("called else");
                        console.log(error);
                        // clear the loading indicator
                        Swal.close();
                    }
                }

            } else {
                Swal.fire({
                    title: 'Error!',
                    text: 'MetaMask is not installed',
                    icon: 'error'
                });
            }
        }




        function toFixed(x) {
            if (Math.abs(x) < 1.0) {
                var e = parseInt(x.toString().split("e-")[1]);
                if (e) {
                    x *= Math.pow(10, e - 1);
                    x = "0." + new Array(e).join("0") + x.toString().substring(2);
                }
            } else {
                var e = parseInt(x.toString().split("+")[1]);
                if (e > 20) {
                    e -= 20;
                    x /= Math.pow(10, e);
                    x += new Array(e + 1).join("0");
                }
            }
            return String(x);
        }
    </script>

    <!-- Plugin -->
    <script src="app-assets/js/plugin/jquery.min.js"></script>
    <script src="app-assets/js/plugin/bootstrap.bundle.min.js"></script>
    <script src="app-assets/js/plugin/swiper-bundle.min.js"></script>
    <script src="app-assets/js/plugin/jquery.mask.min.js"></script>
    <script src="app-assets/js/plugin/autocomplete.min.js"></script>
    <script src="app-assets/js/plugin/moment.min.js"></script>
    <script src='https://cdn.jsdelivr.net/npm/sweetalert2@10'></script>


    <!-- Layouts -->
    <script src="app-assets/js/layouts/header-search.js"></script>
    <script src="app-assets/js/layouts/sider.js"></script>
    <script src="app-assets/js/components/input-number.js"></script>

    <!-- Base -->
    <script src="app-assets/js/base/index.js"></script>
    <!-- Customizer -->
    <script src="app-assets/js/customizer.js"></script>

    <!-- Custom -->
    <script src="assets/js/main.js"></script>
</body>

</html>