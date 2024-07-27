<?php 
    require_once  './vendor/autoload.php';
    date_default_timezone_set('Asia/Manila');
    

    session_start(); 
    function displayDataTest($array){
        echo "<pre>";
        echo print_r($array);
        echo "</pre>";
    }

    function getImageLink($image){
        $img_link = '';
        if(!$image){
            $img_link = 'https://dummyimage.com/450x450/dee2e6/6c757d.jpg';
        }else{
            if(file_exists("./admin/$image")){
                $img_link = "./admin/$image";
            }else{
                $img_link = 'https://dummyimage.com/450x450/dee2e6/6c757d.jpg';
            }
        }

        return $img_link;
    }
    function getCustomOrderImageLink($image){
        // displayDataTest($image);
        $img_link = '';
        if(!$image){
            $img_link = 'https://dummyimage.com/450x450/dee2e6/6c757d.jpg';
        }else{
            if(file_exists("./designer/customize/$image")){ 
                $img_link = "./designer/customize/$image";
            }else{
                $img_link = 'https://dummyimage.com/450x450/dee2e6/6c757d.jpg';
            }
        }

        return $img_link;
    }

    spl_autoload_register(function ($class) {
        include './models/' . $class . '.php';
    });

    if( isset($_SESSION['loggedInUser']) ){
        $client_username = $_SESSION['loggedInUser']['username'];
        $client_email = $_SESSION['loggedInUser']['email'];
        $client_id = $_SESSION['loggedInUser']['id'];

        $cartItem = new Cart;
        $cartItems = $cartItem->getCustomerCartItems( $client_id );
        // displayDataTest($cartItems);
        $cartItemCount = 0;

        foreach ($cartItems as $key => $value) {
            $cartItemCount += (int) $value['quantity']; 
        }

        // Sort the cart items by created_at in descending order
        usort($cartItems, function($a, $b) {
            return strtotime($b['created_at']) - strtotime($a['created_at']);
        });

        $customers = new Customer;
        $customer = $customers->find($client_id);
        // print_r($customer);

    }


    $paypal_client_id = "Ad-DKICXtIrrhJRR4e7Bj1LMfHx1FKNPNf2rCWebJs3aX3Vv7HcNAwVHt8LMov7UJ2A7KRc3c_LrnM0z";
    $paypal_currency =  "PHP";
    $paypal_components = "buttons,marks";
    $paypal_debug = "false";
    $paypal_disable_function = "credit,card";
    

    // displayDataTest($customer);
    function getCurrentUrl() {
        $protocol = 'http';
        // Check if HTTPS is used
        if (isset($_SERVER["HTTPS"]) && $_SERVER["HTTPS"] == "on") {
            $protocol .= "s";
        }
        // Construct the full URL
        $currentUrl = $protocol . "://" . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"];
        return $currentUrl;
    }
    
    $url = getCurrentUrl();
    $location = basename($url);

    $site_setting_ = new SiteSetting;
    $site_setting = $site_setting_->getSiteSettingsLatest();
    $site_setting = json_decode($site_setting->json_data);

    
    
    if( isset($client_id) ){
        $customizeOrder = new CustomizeOrder;
        $confirmedCustomizeItems = $customizeOrder->getCustomerCustomOrders($client_id, 'Confirmed');
        $confirmedCustomizeItemsCount = count($confirmedCustomizeItems);
    }

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>TRENDY THREADS APPAREL</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="../assets/favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/5.3.45/css/materialdesignicons.css" integrity="sha256-NAxhqDvtY0l4xn+YVa6WjAcmd94NNfttjNsDmNatFVc=" crossorigin="anonymous" />
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css" rel="stylesheet">

        <script src="https://www.paypal.com/sdk/js?client-id=<?=$paypal_client_id?>&components=<?=$paypal_components?>&currency=<?=$paypal_currency?>&debug=<?=$paypal_debug?>&disable-funding=<?=$paypal_disable_function?>"></script>

        <style>
            body{
                /* font-family: Verdana, sans-serif; */
                font-family: Helvetica, sans-serif;
            }
            .navbar-nav > .nav-item > .active {
                background-color: #454e57;
                font-weight: bold;
                color: white !important;
            }

            .product-item-img {
                width: 100%;
                max-width: 292px;   /* Set the maximum width */
                height: auto;
                aspect-ratio: 1 / 1; /* Maintains a 1:1 aspect ratio */
                object-fit: cover;  /* Ensures the image covers the container, cropping if necessary */
            }

            .overlay {
                height: 100%;
                width: 100%;
                display: none;
                position: fixed;
                z-index: 99999 !important;
                top: 0;
                left: 0;
                background-color: rgba(0,0,0, 0.5);
            }
        
        </style>

    </head>
    <body>

        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top">
    <div class="container">
        <?php if (strpos($_SERVER['REQUEST_URI'], "browse-products.php") === false) { ?>
            <a class="navbar-brand" href="index.php">TRENDY THREADS APPAREL</a>
        <?php } ?>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-between" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item mx-2">
                    <a class="nav-link <?= $location == "index.php" ? "active" : "" ?>" href="index.php">Home</a>
                </li>
                <li class="nav-item mx-2">
                    <a class="nav-link <?= strpos($_SERVER['REQUEST_URI'], "browse-products.php") !== false || strpos($_SERVER['REQUEST_URI'], "view-products.php") !== false ? "active" : "" ?>" href="browse-products.php">Products</a>
                </li>
                <li class="nav-item mx-2">
                    <a class="nav-link <?= $location == "designer.php" ? "active" : "" ?>" href="designer.php">Customize</a>
                </li>
            </ul>
            <form class="d-flex align-items-center">
                <?php if (isset($client_username)) { ?>
                    <a href="customer-cart.php" class="btn btn-outline-dark btn-sm me-2 <?= $location == "customer-cart.php" ? "active" : "" ?>">
                        <i class="bi-cart me-1"></i>
                        <span class="d-none d-sm-inline">Cart</span>
                        <span class="badge bg-dark text-white ms-1 rounded-pill">
                            <?php echo isset($cartItemCount) ? $cartItemCount : "0"; ?>
                        </span>
                    </a>

                    <!-- Example split danger button with badge -->
                    <div class="btn-group">
                        <button type="button" class="btn btn-outline-dark btn-sm" data-bs-toggle="modal" data-bs-target="#editProfileModal">
                            <i class="bi-person me-1"></i>
                            <span class="d-none d-sm-inline"><?php echo $client_username; ?></span>
                        </button>
                        <button type="button" class="btn btn-outline-dark btn-sm dropdown-toggle dropdown-toggle-split  me-2" data-bs-toggle="dropdown" aria-expanded="false">
                            <span class="visually-hidden">Toggle Dropdown</span>
                            <span class="badge bg-secondary"><?= $confirmedCustomizeItemsCount ?></span>
                        </button>

                        <ul class="dropdown-menu">
                            <?php foreach ($confirmedCustomizeItems as $key => $value) {
                                echo '<li><hr class="dropdown-divider"></li>';
                                echo '<li><a class="dropdown-item" href="customer-cart.php?confirmed-customize-order-tab=true">Order: #'.$value['id'].' - '.$value['status'].'</a></li>';
                            } ?>
                            
                        </ul>
                    </div>

                    <a href="./client/logout-customer.php" class="btn btn-outline-dark btn-sm" id="logoutLink">
                        <i class="bi-box-arrow-right me-1"></i>
                        <!-- <span class="d-none d-sm-inline">Logout</span> -->
                    </a>

                    <script>
                    document.getElementById('logoutLink').onclick = function(event) {
                        if (!confirm('Are you sure you want to log out?')) {
                            event.preventDefault();
                        }
                    };
                    </script>
                <?php } else { ?>
                    <button class="btn btn-outline-dark btn-sm" type="button" data-bs-toggle="modal" data-bs-target="#loginModal">
                        <i class="bi bi-box-arrow-in-right me-1"></i>
                        <span class="d-none d-sm-inline">Login</span>
                    </button>
                <?php } ?>
            </form>

        </div>
    </div>
</nav>
<div id="myOverlay2" class="overlay" style="display: none;"></div>

        
<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true" data-bs-backdrop="static">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header ">
                <h5 class="modal-title" id="loginModalLabel">Sign In</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="loginForm">
                <form method="POST" action="./client/login-client.php">
                    <div class="mb-3">
                        <label for="username" class="form-label">Username <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="username" name="username" aria-describedby="emailHelp" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password <span class="text-danger">*</span></label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <button type="submit" class="btn btn-primary btn-lg w-100">Sign In</button>
                </form>

                <div class="text-center mt-3">
                    <p class="mb-0">New to our site? <a href="#" onclick="showRegisterForm()" class="link-primary">Create an account</a></p>
                </div>  
                <div class="text-center mt-3">
                    <p class="mb-0">Forgot your password?
                        <a type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#resetPasswordModal">
                                Reset Password
                        </a> 
                    </p>
                </div>

            </div>
            <div class="modal-body" id="registerForm" style="display: none;">

                <form method="POST" action="./client/register-customer.php">
                    <h6 class="card-subtitle mb-2 text-muted" style="text-align: center;"> Basic Information </h6>
                    <hr>
                    <div class="row">
                        <div class="mb-3 col-sm-6">
                            <label for="first_name" class="form-label">Firstname <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="first_name" name="first_name" required>
                        </div>
                        <div class="mb-3 col-sm-6">
                            <label for="last_name" class="form-label">Lastname <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="last_name" name="last_name" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3 col-sm-6">
                            <label for="phone_number" class="form-label">Phone Number <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <span class="input-group-text">+63</span>
                                <input type="tel" class="form-control" id="phone_number" name="phone_number" required maxlength="10">
                            </div>
                        </div>
                        <div class="mb-3 col-sm-6">
                            <label for="reg_email" class="form-label">Email <span class="text-danger">*</span></label>
                            <input type="email" class="form-control" id="reg_email" name="reg_email" required>
                        </div>
                    </div>

                    <h6 class="card-subtitle mb-2 text-muted" style="text-align: center;"> Login Credentials </h6>
                    <hr>
                    <div class="row">
                        <style>
                            .is-invalid {
                                border-color: #dc3545;
                            }
                        </style>
                        <div class="mb-3 col-sm-6">
                            <label for="username" class="form-label">Username <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="username" name="reg_username" required>
                        </div>
                        <div class="mb-3 col-sm-6">
                            <label for="password" class="form-label">Password <span class="text-danger">*</span></label>
                            <input type="password" class="form-control" id="reg_password" name="reg_password" required maxlength="16">
                        </div>
                        <div class="mb-3 col-sm-6">
                            <label for="confirm_password" class="form-label">Confirm Password <span class="text-danger">*</span></label>
                            <input type="password" class="form-control" id="confirm_password" name="confirm_password" required maxlength="16">
                        </div>
                        <div class="mb-3 col-sm-6">
                            <span id="passwordMatchText"></span>
                        </div>
                    </div>
                    <h6 class="card-subtitle mb-2 text-muted" style="text-align: center;"> Address Information </h6>
                    <hr>
                    <div class="row">
                            <div class="mb-3 col-sm-6">
                            <label for="islandGroupDropdown">Island Group <span class="text-danger">*</span></label>
                            <!-- <select id="islandGroupDropdown" name="island_group" class="form-control" onchange="initPopulate(this.value)" required>
                                <option value="" selected disabled readonly>Select Island Group</option>
                                <option value="luzon">Luzon</option>
                                <option value="visayas">Visayas</option>
                                <option value="mindanao">Mindanao</option>
                            </select> -->
                        </div>
                        <div class="mb-3 col-sm-6">
                            <label for="provinceDropdown">Province <span class="text-danger">*</span></label>
                            <select id="provinceDropdown" name="province" class="form-control" onchange="populateCitiesMunicipalities(this.value)" required>
                                <option value="" selected disabled readonly>Select Province</option>
                            </select>
                        </div>
                        <div class="mb-3 col-sm-6">
                            <label for="cityDropdown">City/Municipality <span class="text-danger">*</span></label>
                            <select id="cityDropdown" name="city_municipality" class="form-control" onchange="populateBarangays(this.value)" required>
                                <option value="" selected disabled readonly>Select City/Municipality</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3 col-sm-6">
                            <label for="barangayDropdown">Barangay <span class="text-danger">*</span></label>
                            <select id="barangayDropdown" name="barangay" class="form-control" required>
                                <option value="" selected disabled readonly>Select Barangay</option>
                            </select>
                        </div>
                        <div class="mb-3 col-sm-6">
                            <label for="landmark">Landmark</label>
                            <textarea id="landmark" name="landmark" class="form-control" placeholder="Landmark"></textarea>
                        </div>
                        <div class="mb-3 col-sm-12">
                            <label for="complete_add">Other Address Info (Subdivision/Street/Lot/Block/House No.) <span class="text-danger">*</span></label>
                            <textarea id="complete_add" name="complete_add" class="form-control" placeholder="Subdivision/Street/Lot/Block/House No." required></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3 col-sm-12">
                            <label for="verification_code" class="form-label">Verification Code <span class="text-danger">*</span></label>
                            <div class="input-group mb-3">
                                <input id="verification_code" type="text" class="form-control" placeholder="Enter Verification Code Here" aria-label="Enter Verification Code Here" aria-describedby="button-addon2" required>
                                <button class="btn btn-outline-secondary" type="button" id="button-addon2" onclick="sendVerificationCode()">Send Verification Code</button>
                                <div class="mb-3 col-sm-12">
                                    <label class="form-check-label" for="">
                                        NOTE: this will send an email containing the verification code.
                                    </label>
                                </div>
                            </div>
                            <input type="hidden" name="isVerified" id="isVerified" value="false">
                            <button type="button" class="btn btn-secondary mt-2" onclick="verifyCode()">Verify Code</button>
                        </div>
                        <div class="mb-3 col-sm-6">
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3 col-sm-12">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="userAgreement" onclick="toggleSubmitButton()" required>
                                <label class="form-check-label" for="userAgreement">
                                    I hereby declare that the information provided is true and correct. <span class="text-danger">*</span>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3 col-sm-12">
                            <input type="submit" class="btn btn-primary" name="add-customer" value="Submit" disabled id="submitBtn">
                        </div>
                        
                    </div>
                </form>
                <div class="row">
                    <div class="col-sm-12 text-center">
                        <p>Already have an account? <a href="#" onclick="showLoginForm()" class="text-warning">Sign in here</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true" data-bs-backdrop="static">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header ">
                <h5 class="modal-title" id="loginModalLabel">Sign In</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="loginForm">
                <form method="POST" action="./client/login-client.php">
                    <div class="mb-3">
                        <label for="username" class="form-label">Username <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="username" name="username" aria-describedby="emailHelp" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password <span class="text-danger">*</span></label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <button type="submit" class="btn btn-primary btn-lg w-100">Sign In</button>
                </form>
                <div class="text-center mt-3">
                    <p class="mb-0">New to our site? <a href="#" onclick="showRegisterForm()" class="link-primary">Create an account</a></p>
                </div>
            </div>
            <div class="modal-body" id="registerForm" style="display: none;">
                <div id="myOverlay2" class="overlay" style="display: none;"></div>

                <form method="POST" action="./client/register-customer.php">
                    <h6 class="card-subtitle mb-2 text-muted" style="text-align: center;"> Basic Information </h6>
                    <hr>
                    <div class="row">
                        <div class="mb-3 col-sm-6">
                            <label for="first_name" class="form-label">Firstname <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="first_name" name="first_name" required>
                        </div>
                        <div class="mb-3 col-sm-6">
                            <label for="last_name" class="form-label">Lastname <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="last_name" name="last_name" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3 col-sm-6">
                            <label for="phone_number" class="form-label">Phone Number <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <span class="input-group-text">+63</span>
                                <input type="tel" class="form-control" id="phone_number" name="phone_number" required maxlength="10">
                            </div>
                        </div>
                        <div class="mb-3 col-sm-6">
                            <label for="reg_email" class="form-label">Email <span class="text-danger">*</span></label>
                            <input type="email" class="form-control" id="reg_email" name="reg_email" required>
                        </div>
                    </div>

                    <h6 class="card-subtitle mb-2 text-muted" style="text-align: center;"> Login Credentials </h6>
                    <hr>
                    <div class="row">
                        <style>
                            .is-invalid {
                                border-color: #dc3545;
                            }
                        </style>
                        <div class="mb-3 col-sm-6">
                            <label for="username" class="form-label">Username <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="username" name="reg_username" required>
                        </div>
                        <div class="mb-3 col-sm-6">
                            <label for="password" class="form-label">Password <span class="text-danger">*</span></label>
                            <input type="password" class="form-control" id="reg_password" name="reg_password" required maxlength="16">
                        </div>
                        <div class="mb-3 col-sm-6">
                            <label for="confirm_password" class="form-label">Confirm Password <span class="text-danger">*</span></label>
                            <input type="password" class="form-control" id="confirm_password" name="confirm_password" required maxlength="16">
                        </div>
                        <div class="mb-3 col-sm-6">
                            <span id="passwordMatchText"></span>
                        </div>
                    </div>
                    <h6 class="card-subtitle mb-2 text-muted" style="text-align: center;"> Address Information </h6>
                    <hr>
                    <div class="row">

                        <div class="mb-3 col-sm-6">
                            <label for="provinceDropdown">Province <span class="text-danger">*</span></label>
                            <select id="provinceDropdown" name="province" class="form-control" onchange="populateCitiesMunicipalities(this.value)" required>
                                <option value="" selected disabled readonly>Select Province</option>
                            </select>
                        </div>
                        <div class="mb-3 col-sm-6">
                            <label for="cityDropdown">City/Municipality <span class="text-danger">*</span></label>
                            <select id="cityDropdown" name="city_municipality" class="form-control" onchange="populateBarangays(this.value)" required>
                                <option value="" selected disabled readonly>Select City/Municipality</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3 col-sm-6">
                            <label for="barangayDropdown">Barangay <span class="text-danger">*</span></label>
                            <select id="barangayDropdown" name="barangay" class="form-control" required>
                                <option value="" selected disabled readonly>Select Barangay</option>
                            </select>
                        </div>
                        <div class="mb-3 col-sm-6">
                            <label for="landmark">Landmark</label>
                            <textarea id="landmark" name="landmark" class="form-control" placeholder="Landmark"></textarea>
                        </div>
                        <div class="mb-3 col-sm-12">
                            <label for="complete_add">Other Address Info (Subdivision/Street/Lot/Block/House No.) <span class="text-danger">*</span></label>
                            <textarea id="complete_add" name="complete_add" class="form-control" placeholder="Subdivision/Street/Lot/Block/House No." required></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3 col-sm-12">
                            <label for="verification_code" class="form-label">Verification Code <span class="text-danger">*</span></label>
                            <div class="input-group mb-3">
                                <input id="verification_code" type="text" class="form-control" placeholder="Enter Verification Code Here" aria-label="Enter Verification Code Here" aria-describedby="button-addon2" required>
                                <button class="btn btn-outline-secondary" type="button" id="button-addon2" onclick="sendVerificationCode()">Send Verification Code</button>
                            </div>
                            <input type="hidden" name="isVerified" id="isVerified" value="false">
                            <button type="button" class="btn btn-secondary mt-2" onclick="verifyCode()">Verify Code</button>
                        </div>
                        <div class="mb-3 col-sm-6">
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3 col-sm-12">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="userAgreement" onclick="toggleSubmitButton()" required>
                                <label class="form-check-label" for="userAgreement">
                                    I hereby declare that the information provided is true and correct. <span class="text-danger">*</span>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3 col-sm-12">
                            <input type="submit" class="btn btn-primary" name="add-customer" value="Submit" disabled id="submitBtn">
                        </div>
                    </div>
                </form>
                <div class="row">
                    <div class="col-sm-12 text-center">
                        <p>Already have an account? <a href="#" onclick="showLoginForm()" class="text-warning">Sign in here</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> -->


        <?php if( isset($client_id) ){ ?>
            <!-- Edit Profile Modal -->
            <div class="modal fade" id="editProfileModal" tabindex="-1" aria-labelledby="editProfileModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered ">
                    <div class="modal-content">
                        <div class="modal-header ">
                            <h5 class="modal-title" id="editProfileModalLabel">Edit Profile</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        
                        <div class="modal-body" id="editProfileForm">
                            <?php include('./update-profile.php') ?>
                        </div>
                    </div>
                </div>
            </div>

            

 
        <?php } ?>

        <!-- Reset Password Mod`al -->
        <div class="modal fade" id="resetPasswordModal" tabindex="-1" aria-labelledby="resetPasswordModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="resetPasswordModalLabel">Reset Password</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- <form id="resetPasswordForm" action="send_verification.php" method="post"> -->
                            <div class="mb-3">
                                <label for="email" class="form-label">Send verification code to your email:</label>
                                <?php  if( isset($client_id) ){ ?>
                                    <input type="email" class="form-control" id="email" name="email" required value="<?=$customer->email ?>" readonly>
                                <?php } else { ?>
                                    <input type="email" class="form-control" id="email" name="email" required >
                                <?php } ?>
                            </div>
                            <button type="button" class="btn btn-primary" onclick="sendVerificationCode('email')">Send Verification Code</button>
                        <!-- </form> -->
                    </div>
                    <div class="modal-body" style="display: none;" id="verifyForm">
                        <form id="verificationCodeForm" action="./client/verify_code.php" method="post">
                            <div class="mb-3">
                                <label for="forgot_verification_code" class="form-label">Verification Code:</label>
                                <input type="text" class="form-control" id="forgot_verification_code" name="forgot_verification_code" required>
                                <input type="hidden" id="response_verification_code" name="response_verification_code" value="">
                                <input type="hidden" class="form-control" id="forgot_email" name="forgot_email">
                            </div>
                            <div class="mb-3">
                                <label for="new_password" class="form-label">New Password:</label>
                                <input type="password" class="form-control" id="new_password" name="new_password" required>
                            </div>
                            <div class="mb-3">
                                <label for="confirm_new_password" class="form-label">Confirm New Password:</label>
                                <input type="password" class="form-control" id="confirm_new_password" name="confirm_new_password" required>
                            </div>
                            <button type="submit" class="btn btn-primary" id="confirm_reset_password" disabled >Reset Password</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


<script>
    function checkPasswordMatch (){
        let  confirm_reset_password = document.getElementById('confirm_reset_password')
        const new_password = document.getElementById('new_password').value;
        const confirm_new_password = document.getElementById('confirm_new_password').value;
        let response_verification_code = document.getElementById('response_verification_code');
        let forgot_verification_code = document.getElementById('forgot_verification_code');

        if( !response_verification_code.value || (response_verification_code.value != forgot_verification_code.value)){
            confirm_reset_password.disabled = true;
            return false;
        }

        if((new_password && confirm_new_password) &&  new_password === confirm_new_password){
        //   passwordMatchText.innerText = 'Password match.'
            confirm_reset_password.disabled = false;
            return true;
        }

        // passwordMatchText.innerText = 'Password does not match.'

        
        confirm_reset_password.disabled = true;
        return false;
        
    }
     document.getElementById('new_password').addEventListener('input', checkPasswordMatch)
     document.getElementById('confirm_new_password').addEventListener('input', checkPasswordMatch)
     document.getElementById('forgot_verification_code').addEventListener('input', checkPasswordMatch)

     document.getElementById('phone_number').addEventListener('input', function (e) {
            let value = e.target.value;

            // Remove any non-numeric characters
            value = value.replace(/\D/g, '');

            // Ensure the number starts with 9
            if (value.length === 0) {
                value = '9';
            } else if (value[0] !== '9') {
                value = '9' + value.slice(1);
            }

            // Update the input value
            e.target.value = value;
        });



    $(document).ready(function() {

        
            let islandCode = null;

            var userDetails = <?php echo isset($customer) ? json_encode($customer) : json_encode(([])); ?>;

            function setIslandCode(value){
                if(value) populateProvinces(islandGroup);
                return null;
            }



            
            
            // let islandGroupArg = 
            // Fetch provinces and populate the province dropdown
            function populateProvinces(islandGroup){
                    $.ajax({
                    url: `https://psgc.gitlab.io/api/island-groups/${islandGroup}provinces.json`,
                    type: 'GET',
                    success: function(data) {
                        var provinces = data;
                        var provinceDropdown = $('#edit_provinceDropdown');

                        // Sort the provinces array by the "name" property
                        provinces.sort(function(a, b) {
                            var nameA = a.name.toUpperCase(); // Ignore case
                            var nameB = b.name.toUpperCase(); // Ignore case
                            if (nameA < nameB) {
                                return -1;
                            }
                            if (nameA > nameB) {
                                return 1;
                            }
                            return 0; // Names must be equal
                        });


                        $.each(provinces, function(index, province) {
                            provinceDropdown.append($('<option></option>').val(province.code).text(province.name));
                        });


                        if( typeof userDetails.province != 'undefined' && userDetails.province ){
                            $('#edit_provinceDropdown').val(userDetails.province);
                            editPopulateCitiesMunicipalities(userDetails.province);
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error('Error fetching provinces: ' + error);
                    }
                });
            }

        // Function to fetch and populate cities/municipalities based on the selected province
            function editPopulateCitiesMunicipalities(provinceCode) {
                $.ajax({
                    url: `https://psgc.gitlab.io/api/provinces/${provinceCode}/cities-municipalities.json`,
                    type: 'GET',
                    success: function(data) {
                        var citiesMunicipalities = data;
                        var cityDropdown = $('#edit_cityDropdown');

                        // Sort the provinces array by the "name" property
                        citiesMunicipalities.sort(function(a, b) {
                            var nameA = a.name.toUpperCase(); // Ignore case
                            var nameB = b.name.toUpperCase(); // Ignore case
                            if (nameA < nameB) {
                                return -1;
                            }
                            if (nameA > nameB) {
                                return 1;
                            }
                            return 0; // Names must be equal
                        });


                        cityDropdown.empty(); // Clear existing options
                        cityDropdown.append($('<option></option>').val('').text('Select City/Municipality')); // Add default option
                        $.each(citiesMunicipalities, function(index, cityMunicipality) {
                            cityDropdown.append($('<option></option>').val(cityMunicipality.code).text(cityMunicipality.name));
                        });

                        if( typeof userDetails.city_municipality != 'undefined' && userDetails.city_municipality ){
                            $('#edit_cityDropdown').val(userDetails.city_municipality);
                            editPopulateBarangays(userDetails.city_municipality)
                        }

                    },
                    error: function(xhr, status, error) {
                        console.error('Error fetching cities/municipalities: ' + error);
                    }
                });
            }

            function editPopulateBarangays(cityCode){
                $.ajax({
                    url: `https://psgc.gitlab.io/api/cities-municipalities/${cityCode}/barangays.json`,
                    type: 'GET',
                    success: function(data) {
                        var barangays = data;
                        var barangayDropdown = $('#edit_barangayDropdown');

                        // Sort the provinces array by the "name" property
                        barangays.sort(function(a, b) {
                            var nameA = a.name.toUpperCase(); // Ignore case
                            var nameB = b.name.toUpperCase(); // Ignore case
                            if (nameA < nameB) {
                                return -1;
                            }
                            if (nameA > nameB) {
                                return 1;
                            }
                            return 0; // Names must be equal
                        });


                        barangayDropdown.empty(); // Clear existing options
                        barangayDropdown.append($('<option></option>').val('').text('Select Barangay')); // Add default option
                        $.each(barangays, function(index, barangay) {
                            barangayDropdown.append($('<option></option>').val(barangay.code).text(barangay.name));
                        });

                        if( typeof userDetails.barangay != 'undefined' && userDetails.barangay ){
                            $('#edit_barangayDropdown').val(userDetails.barangay);
                        }

                    },
                    error: function(xhr, status, error) {
                        console.error('Error fetching cities/municipalities: ' + error);
                    }
                });
            }   

            // Event listener for province dropdown change
            $('#edit_provinceDropdown').change(function() {
                let selectedCode = $(this).val();
                if (selectedCode) {
                    editPopulateCitiesMunicipalities(selectedCode);
                } else {
                    // Clear cities/municipalities dropdown if no province is selected
                    $('#edit_cityDropdown').empty();
                }
            });
            // Event listener for province dropdown change
            $('#edit_cityDropdown').change(function() {
                let selectedCode = $(this).val();
                if (selectedCode) {
                    editPopulateBarangays(selectedCode);
                } else {
                    // Clear cities/municipalities dropdown if no province is selected
                    $('#edit_cityDropdown').empty();
                }
            });
        });


        function populateCitiesMunicipalities(provinceCode) {
            
            $.ajax({
                url: `https://psgc.gitlab.io/api/provinces/${provinceCode}/cities-municipalities.json`,
                type: 'GET',
                success: function(data) {
                    
                    var citiesMunicipalities = data;
                    var cityDropdown = $('#cityDropdown');

                    // Sort the provinces array by the "name" property
                    citiesMunicipalities.sort(function(a, b) {
                        var nameA = a.name.toUpperCase(); // Ignore case
                        var nameB = b.name.toUpperCase(); // Ignore case
                        if (nameA < nameB) {
                            return -1;
                        }
                        if (nameA > nameB) {
                            return 1;
                        }
                        return 0; // Names must be equal
                    });

                    cityDropdown.empty(); // Clear existing options
                    cityDropdown.append($('<option></option>').val('').text('Select City/Municipality')); // Add default option
                    $.each(citiesMunicipalities, function(index, cityMunicipality) {
                        cityDropdown.append($('<option></option>').val(cityMunicipality.code).text(cityMunicipality.name));
                    });


                },
                error: function(xhr, status, error) {
                    console.error('Error fetching cities/municipalities: ' + error);
                }
            });
        }

        function populateBarangays(cityCode){
            $.ajax({
                url: `https://psgc.gitlab.io/api/cities-municipalities/${cityCode}/barangays.json`,
                type: 'GET',
                success: function(data) {
                    var barangays = data;
                    var barangayDropdown = $('#barangayDropdown');

                    // Sort the provinces array by the "name" property
                    barangays.sort(function(a, b) {
                        var nameA = a.name.toUpperCase(); // Ignore case
                        var nameB = b.name.toUpperCase(); // Ignore case
                        if (nameA < nameB) {
                            return -1;
                        }
                        if (nameA > nameB) {
                            return 1;
                        }
                        return 0; // Names must be equal
                    });

                    barangayDropdown.empty(); // Clear existing options
                    barangayDropdown.append($('<option></option>').val('').text('Select Barangay')); // Add default option
                    $.each(barangays, function(index, barangay) {
                        barangayDropdown.append($('<option></option>').val(barangay.code).text(barangay.name));
                    });

                },
                error: function(xhr, status, error) {
                    console.error('Error fetching cities/municipalities: ' + error);
                }
            });
    }
        $(document).ready(function() {
            // Fetch provinces and populate the province dropdown
            // function whiye,
            // Function to fetch and populate cities/municipalities based on the selected province


            // Event listener for province dropdown change
        $('#provinceDropdown').change(function() {
            var selectedProvinceCode = $(this).val();
            if (selectedProvinceCode) {
                populateCitiesMunicipalities(selectedProvinceCode);
            } else {
                // Clear cities/municipalities dropdown if no province is selected
                $('#cityDropdown').empty();
            }
        });
    });

    function showRegisterForm() {
        $('#loginForm').hide();
        $('#registerForm').show();
        $('#loginModalLabel').text('Register');
        document.getElementById("loginForm").style.display = "none";
        document.getElementById("registerForm").style.display = "block";
        adjustModalWidth();
    }

    function showLoginForm() {
        $('#registerForm').hide();
        $('#loginForm').show();
        $('#loginModalLabel').text('Sign In');
        document.getElementById("loginForm").style.display = "block";
        document.getElementById("registerForm").style.display = "none";
        adjustModalWidth();
    }

    function adjustModalWidth() {
        var modalDialog = document.querySelector(".modal-dialog");
        var loginForm = document.getElementById("loginForm");
        var registerForm = document.getElementById("registerForm");
        var updateForm = document.getElementById("updateForm");
        if (loginForm.style.display === "block") {
            modalDialog.style.maxWidth = "400px";
        } else if (registerForm.style.display === "block") {
            modalDialog.style.maxWidth = "600px";
        }else if(registerForm.style.display === "block"){
            modalDialog.style.maxWidth = "600px";
        }
    }
</script>
<!-- <script>
    function toggleSubmitButton() {
        const submitBtn = document.getElementById('submitBtn');
        const userAgreement = document.getElementById('userAgreement');
        submitBtn.disabled = !userAgreement.checked;
    }
</script> -->

<script>

    function toggleOverlay2(value){
        let overlay = document.getElementById('myOverlay2');

        if(value){
            overlay.style.display = "block";
        }else{
            overlay.style.display = "none";
        }
    }


    let verificationCode = "";



    function sendVerificationCode(reg_mail = 'reg_email') {


        let email = document.getElementById(reg_mail).value;
    
        if (!email) {
            alert('Please input an email.');
            return;
        }
        
        // Regular expression to validate email format
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        
        if (!emailRegex.test(email)) {
            alert('Please input a valid email.');
            return;
        }

        toggleOverlay2(true)

        if (email) {
            const xhr = new XMLHttpRequest();
            xhr.open("POST", "./client/send-verification.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    const response = JSON.parse(xhr.responseText);
                    if (response.success) {
                        verificationCode = response.verificationCode;
                        alert('Verification code sent to ' + email);

                        if(reg_mail != 'reg_mail'){
                            let verifyForm = document.getElementById('verifyForm');
                            let response_verification_code = document.getElementById('response_verification_code');
                            let forgot_email = document.getElementById('forgot_email');
                            verifyForm.style.display = 'block';
                            response_verification_code.value = response.verificationCode;
                            forgot_email.value = email;
                        }

                        toggleOverlay2(false)
                    } else {
                        alert('Failed to send verification code. Please try again.');
                        toggleOverlay2(false)
                    }
                }
            };
            xhr.send("email=" + encodeURIComponent(email));
        } else {
            alert('Please enter a valid email address.');
            toggleOverlay2(false)
        }
    }

    function verifyCode() {
        const userCode = document.getElementById('verification_code').value;
        console.log(`userCode: ${userCode}`)
        console.log(`verificationCode: ${verificationCode}`)
        if(!userCode && !verificationCode){
            alert('Invalid verification code. Please try again.');
            return
        }

        if (userCode == verificationCode) {
            alert('Email verified successfully!');
            document.getElementById('isVerified').value = 'true';
            toggleSubmitButton()
        } else {
            alert('Invalid verification code. Please try again.');
        }
    }

    // function toggleSubmitButton() {
    //     const submitBtn = document.getElementById('submitBtn');
    //     const userAgreement = document.getElementById('userAgreement');
    //     const emailVerified = !document.getElementById('submitBtn').disabled; // Check if email is verified
    //     submitBtn.disabled = !(userAgreement.checked && emailVerified);
    // }

    function toggleSubmitButton() {
            const submitBtn = document.getElementById('submitBtn');
            const passwordMatchText = document.getElementById('passwordMatchText');
            const userAgreement = document.getElementById('userAgreement');
            const isVerified = document.getElementById('isVerified');

            // const emailVerified = !submitBtn.disabled; // Check if email is verified (assuming some logic sets this)
            
            const reg_password = document.getElementById('reg_password').value;
            const confirmPassword = document.getElementById('confirm_password').value;
            let passwordsMatch = false
            if((reg_password && confirmPassword) &&  reg_password === confirmPassword){
                passwordsMatch = true;
            }

            if(passwordsMatch){
                passwordMatchText.innerText = 'Password match.'
            }else{
                passwordMatchText.innerText = 'Password does not match.'
                submitBtn.disabled = true
                return false;
            }

            console.log('isVerified', isVerified.value)
            if(isVerified.value != 'true'){
                submitBtn.disabled = true
                return false;
            }

            console.log('passwordsMatch', passwordsMatch)
            
            submitBtn.disabled = !(userAgreement.checked && isVerified.value == 'true' && passwordsMatch);

            return true;
        }

        document.getElementById('reg_password').addEventListener('input', function() {
            toggleSubmitButton()
        });
        document.getElementById('confirm_password').addEventListener('input', function() {
            toggleSubmitButton()
        });

</script>
