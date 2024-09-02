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

$str = "Select * from tbl_memberreg where member_user_id='$sponcer_id' AND member_status = 1 ";

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
    // $sponcer_name = $row['member_name'];
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

    <?php
    include "./components/cssComponents/register-css.php"
    ?>

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

                            <img class="hp-logo hp-sidebar-visible hp-dark-none" src="app-assets/img/logo/logo-small.svg" alt="logo">
                            <img class="hp-logo hp-sidebar-visible hp-dark-block" src="app-assets/img/logo/logo-small.png" alt="logo">
                            <img class="hp-logo hp-sidebar-hidden hp-dir-none hp-dark-none" src="app-assets/img/logo/LOGOFORWHITE.png" alt="logo">
                            <img class="hp-logo hp-sidebar-hidden hp-dir-none hp-dark-block" src="app-assets/img/logo/LOGOFORBLACK.png" alt="logo">
                            <img class="hp-logo hp-sidebar-hidden hp-dir-block hp-dark-none" src="app-assets/img/logo/logo-rtl.svg" alt="logo">
                            <img class="hp-logo hp-sidebar-hidden hp-dir-block hp-dark-block" src="app-assets/img/logo/logo-rtl-dark.svg" alt="logo">
                        </a>

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
                    <span class="d-block hp-p1-body hp-text-color-dark-0 hp-text-color-black-100 fw-medium mb-6"> SIGN UP FOR FREE </span>
                    <h1 class="mb-0 mb-sm-24">Create Account &nbsp;<i class="bi bi-suit-heart-fill hp-text-color-dark-0 hp-text-color-black-100 fs-5"></i></h1>
                    <!-- <p class="mt-sm-8 mt-sm-0 text-black-60">Please sign up to your personal account if you want to use all our premium products.</p> -->

                    <form class="mt-16 mt-sm-32 mb-8" id="registrationForm">
                        <div class="mb-16">
                            <label for="sponcer_id" class="form-label">Referral Id</label>
                            <input type="text" class="form-control" id="sponcer_id" value="<?php echo $sponcer_id; ?>" readonly required>
                        </div>

                        <div class="mb-16">
                            <label for="email_id" class="form-label">Email Id </label>
                            <input type="text" class="form-control" id="email_id" value="" required>
                        </div>

                        <div class="mb-16">
                            <label for="password" class="form-label">Password </label>
                            <input type="password" class="form-control" id="password" value="" required>
                        </div>

                        <div class="mb-16">
                            <label for="confirm_password" class="form-label">Confirm Password</label>
                            <input type="password" class="form-control" id="confirm_password" value="" required>
                            <div id="passwordError" class="text-danger mt-2" style="display: none;">Passwords do not match. Please try again.</div>

                        </div>

                        <div class="mb-16">
                            <label for="position" class="form-label">Position</label>
                            <select class="form-select" id="position" required>
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
                        <span class="text-black-80 hp-text-color-dark-40 hp-caption me-4">Already have an account?</span>
                        <a class="text-primary-1 hp-text-color-dark-primary-2 hp-caption" href="login">Login</a>
                    </div>

                    <div class="mt-48 mt-sm-96 col-12">
                        <p class="hp-p1-body text-center hp-text-color-black-60 mb-8"> Copyright 2024 Orion Trade AI </p>

                        <div class="row align-items-center justify-content-center mx-n8">
                            <div class="w-auto hp-flex-none px-8 col">
                                <a href="javascript:;" class="hp-text-color-black-80 hp-text-color-dark-40"> Privacy Policy </a>
                            </div>

                            <div class="w-auto hp-flex-none px-8 col">
                                <a href="javascript:;" class="hp-text-color-black-80 hp-text-color-dark-40"> Term of use </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script>
            function validateForm(event) {
                event.preventDefault();
                var password = document.getElementById("password").value;
                var confirmPassword = document.getElementById("confirm_password").value;
                var passwordError = document.getElementById("passwordError");

                if (password !== confirmPassword) {
                    passwordError.style.display = "block";
                } else {
                    passwordError.style.display = "none";
                    Registration(); // Call the registration function if passwords match
                }
            }

            document.getElementById("confirm_password").addEventListener("input", function() {
                var password = document.getElementById("password").value;
                var confirmPassword = document.getElementById("confirm_password").value;
                var passwordError = document.getElementById("passwordError");

                if (password !== confirmPassword) {
                    passwordError.style.display = "block";
                } else {
                    passwordError.style.display = "none";
                }
            });


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
            // setInterval('startNow()', 3000);




            async function Registration() {
                    try {
                        var sponcer_id = '<?php echo $sponcer_id; ?>';
                        // var cpackage = $("#spackage").val();
                        var position = $("#position").val();
                        var email_id = $("#email_id").val();
                        var password = $("#password").val();
                        var tokenbalance = $.trim($("#tokenbalance").val());
                        // var wallet_address = window.userAddress;
                        // var auraAmt = $.trim($("#orion_package").val());

                        // if (auraAmt == "") auraAmt = 0;

                        // auraAmt = toFixed(auraAmt * 1e18);
                        // console.log("cpackage=", Number(cpackage));
                        // console.log("position=", position);
                        // var a = cpackage % 5;

                        // if (Number(cpackage) < 25 || isNaN(cpackage)) {
                        //     Swal.fire({
                        //         title: 'Error!',
                        //         text: 'Minimum Package is 25',
                        //         icon: 'error',
                        //         timer: 2000,
                        //         timerProgressBar: true,
                        //         showConfirmButton: false
                        //     });
                        //     return;
                        // } else if (parseInt(tokenbalance) < parseInt(auraAmt)) {
                        //     Swal.fire({
                        //         title: 'Error!',
                        //         text: "Token Balance Is Low",
                        //         icon: 'error',
                        //         timer: 2000,
                        //         timerProgressBar: true,
                        //         showConfirmButton: false
                        //     });
                        //     return;
                        // }
                        if (sponcer_id == '') {
                            Swal.fire({
                                title: 'Error!',
                                text: 'Please Enter Sponsor Address',
                                icon: 'error',
                                timer: 2000,
                                timerProgressBar: true,
                                showConfirmButton: false
                            });
                            return;
                        } else if (sponcer_id != "") {
                            $(".registra").attr("disabled", "true");
                            $(".registra").html('Processing <i class="fa fa-spinner fa-spin"></i>');

                            // Assuming you have variables email_id and password set up correctly
                            var dataStringr = 'email_id=' + email_id + '&password=' + password;
                            // console.log("Data during login is ",dataStringr)

                            var dataStringNew = 'email_id=' + email_id + '&password=' + password + '&sponsor_id=' + sponcer_id +
                             '&position=' + position;
                            console.log("Data during login prior is ",dataStringNew)

                            $.ajax({
                                type: "POST",
                                url: "WalletLogin1",
                                data: dataStringr,
                                cache: false,
                                success: async function(status) {
                                    if (status == "Exist") {
                                        Swal.fire({
                                            title: 'Error!',
                                            text: 'User Already Registered',
                                            icon: 'error',
                                            timer: 2000,
                                            timerProgressBar: true,
                                            showConfirmButton: false
                                        });
                                        return;
                                    } else {
                                        // var busdAmt = toFixed(cpackage * 1e18);
                                        // var CoinAmt = auraAmt / 1e18;
                                        // var hashcode = Math.random().toString(36).substring(7);
// var hashcode = Math.random().toString(36).substring(7);  

                                        // const provider = new ethers.providers.Web3Provider(window.ethereum);

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
                                        });

                                        $.ajax({
                                            type: "POST",
                                            url: "ProcessRegistration1",
                                            data: dataStringNew,
                                            cache: false,
                                            success: function(response) {
                                                Swal.close();
                                                
                                                var responseObj = {};
                                                try {
                                                    responseObj = JSON.parse(response);
                                                    console.log("Response new is ",responseObj);
                                                    console.log("Response status is ",responseObj.status);
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
                                        text: "An error occurred during User Login. Please try again later.",
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

                // } else {
                //     Swal.fire({
                //         title: 'Error!',
                //         text: 'MetaMask is not installed',
                //         icon: 'error'
                //     });
                // }

                // console.log("Hello")
                // alert("Registration Clicked ")
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

    </div>

    <script src="https://cdn.ethers.io/lib/ethers-5.2.umd.min.js" type="application/javascript"></script>

    <script src="components/abis.js"></script>



    <script>

    </script>

    <?php
    include "./components/jsComponents/register.php"
    ?>
</body>

</html>