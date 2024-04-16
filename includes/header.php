<?php 
    require_once  './vendor/autoload.php';

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

        $customers = new Customer;
        $customer = $customers->find($client_id);

    }


    $paypal_client_id = "Ad-DKICXtIrrhJRR4e7Bj1LMfHx1FKNPNf2rCWebJs3aX3Vv7HcNAwVHt8LMov7UJ2A7KRc3c_LrnM0z";
    $paypal_currency =  "PHP";
    $paypal_components = "buttons,marks";
    $paypal_debug = "false";
    $paypa_disable_function = "credit,card";
    

    // displayDataTest($customer);

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Trendy Dress Shop</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="../assets/favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/5.3.45/css/materialdesignicons.css" integrity="sha256-NAxhqDvtY0l4xn+YVa6WjAcmd94NNfttjNsDmNatFVc=" crossorigin="anonymous" />
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
        <script src="https://www.paypal.com/sdk/js?client-id=<?=$paypal_client_id?>&components=<?=$paypal_components?>&currency=<?=$paypal_currency?>&debug=<?=$paypal_debug?>"></script>

    </head>
    <body>
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="index.php">Trendy Dress Shop</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="index.php">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="about-us.php">About</a></li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Shop</a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="index.php?#product_list">All Products</a></li>
                                <li><hr class="dropdown-divider" /></li>
                                <li><a class="dropdown-item" href="designer">Customize Item</a></li>
                            </ul>
                        </li>
                    </ul>
                    <!-- <form class="d-flex">
                        <button class="me-2 btn btn-outline-dark" type="submit">
                            <i class="bi-cart-fill me-1"></i>
                            Cart
                            <span class="badge bg-dark text-white ms-1 rounded-pill">0</span>
                        </button>

                        <button class=" btn btn-outline-dark" type="button">
                            <i class="bi bi-box-arrow-in-right"></i>
                            Login
                        </button>
                    </form> -->

                    <form class="d-flex mt-2">
                        <?php if(isset($client_email)) { ?>
                            <ul class="me-2 navbar-nav">
                                <li class="navbar-brand"><span class="">Welcome, <?php echo $client_email; ?>!</span></li>
                            </ul>

                        <a href="customer-cart.php" method="post" class=" btn btn-outline-dark" type="submit">
                            <i class="bi-cart-fill me-1"></i>
                            Carts
                            <span class="badge bg-dark text-white ms-1 rounded-pill">
                                <?php if(isset($cartItemCount)) {
                                    echo  $cartItemCount ;
                                 }else{
                                    echo "0";
                                 }
                                    
                                ?>
                            </span>
                        </a>
                            <!-- Button to trigger the modal -->
                            <button type="button" class="btn btn-outline-dark mx-2" data-bs-toggle="modal" data-bs-target="#editProfileModal">
                                Edit Profile
                            </button>
                            <a href="./client/logout-customer.php" class="btn btn-outline-dark">Logout</a>
                        <?php } else { ?>
                            <button class="btn btn-outline-dark" type="button" data-bs-toggle="modal" data-bs-target="#loginModal">
                                <i class="bi bi-box-arrow-in-right"></i>
                                Login
                            </button>
                        <?php } ?>
                    </form>
                    
                </div>
            </div>
        </nav>

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
                                <label for="email" class="form-label">Email address</label>
                                <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>
                            <button type="submit" class="btn btn-primary btn-lg w-100">Sign In</button>
                        </form>
                        <div class="text-center mt-3">
                            <p class="mb-0">New to our site? <a href="#" onclick="showRegisterForm()" class="link-primary">Create an account</a></p>
                        </div>
                    </div>
                    <div class="modal-body" id="registerForm" style="display: none;">
                        <form method="POST" action="./client/register-customer.php">
                            <div class="row">
                                <div class="mb-3 col-sm-6">
                                    <label for="reg_email" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="reg_email" name="reg_email" required>
                                </div>
                                <div class="mb-3 col-sm-6">
                                    <label for="username" class="form-label">Username</label>
                                    <input type="text" class="form-control" id="username" name="username" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="mb-3 col-sm-6">
                                    <label for="reg_password" class="form-label">Password</label>
                                    <input type="password" class="form-control" id="reg_password" name="reg_password" required>
                                </div>
                                <div class="mb-3 col-sm-6">
                                    <label for="first_name" class="form-label">First Name</label>
                                    <input type="text" class="form-control" id="first_name" name="first_name" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="mb-3 col-sm-6">
                                    <label for="last_name" class="form-label">Last Name</label>
                                    <input type="text" class="form-control" id="last_name" name="last_name" required>
                                </div>
                                <div class="mb-3 col-sm-6">
                                    <label for="phone_number" class="form-label">Phone Number</label>
                                    <input type="tel" class="form-control" id="phone_number" name="phone_number" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="mb-3 col-sm-6">
                                    <label for="provinceDropdown">Province</label>
                                    <select id="provinceDropdown" name="province" class="form-control" onchange="populateCitiesMunicipalities(this.value)">
                                        <option value="" selected disabled readonly>Select Province</option>
                                    </select>
                                </div>
                                <div class="mb-3 col-sm-6">
                                    <label for="cityDropdown">City/Municipality</label>
                                    <select id="cityDropdown" name="city_municipality" class="form-control" onchange="populateBarangays(this.value)">
                                        <option value="" selected disabled readonly>Select City/Municipality</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="mb-3 col-sm-6">
                                    <label for="barangayDropdown">Barangay</label>
                                    <select id="barangayDropdown" name="barangay" class="form-control">
                                        <option value="" selected disabled readonly>Select Barangay</option>
                                    </select>
                                </div>
                                <div class="mb-3 col-sm-6">
                                    <label for="complete_add">Street Name/Brgy/Sbdv/Lot/Block/</label>
                                    <textarea id="complete_add" name="complete_add" class="form-control" placeholder="Street Name/Brgy./Sbdv/Lot/Blk"></textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="mb-3 col-sm-12">
                                    <!-- <button type="submit" class="btn btn-primary" name="add-customer">Submit</button> -->
                                    <input type="submit" class="btn btn-primary" name="add-customer" value="Submit">
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

        <?php if( isset($client_id) ){ ?>
            <!-- Edit Profile Modal -->
            <div class="modal fade" id="editProfileModal" tabindex="-1" aria-labelledby="editProfileModalLabel" aria-hidden="true">
                <div style="max-width: 600px;" class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header ">
                            <h5 class="modal-title" id="editProfileModalLabel">Edit Profile</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        
                        <div class="modal-body" id="editProfileForm">
                            <form class="form-horizontal" action="./client/update-profile.php" method="post" enctype="multipart/form-data" ><!-- form-horizontal Starts -->
                                
                                <input type="hidden" name="id" value="<?=$customer->id?>">
                                <div class="form-group" ><!-- form-group Starts -->
                                    <label class=" control-label" >Email</label>
                                    <div class="" >
                                        <input type="email" name="email" class="form-control" value="<?= $customer->email; ?>" required disabled readonly>
                                    </div>
                                </div><!-- form-group Ends -->
    
                                <div class="form-group" ><!-- form-group Starts -->
                                    <label class=" control-label" >Customer Contact</label>
                                    <div class="" >
                                        <input type="text" name="phone_no" class="form-control" value="<?= $customer->phone_no ?>" required>
                                    </div>
                                </div><!-- form-group Ends -->
                                
                                <div class="form-group">
                                    <label class=" control-label">Province</label>
                                    <div class="">
                                        <select name="province" id="edit_provinceDropdown" class="form-control"  required value="<?= $customer->province ?>">
                                            <option  selected disabled readonly>Select Province</option>
                                        </select>
                                    </div>
                                </div>
    
                                <div class="form-group">
                                    <label class=" control-label">Customer City</label>
                                    <div class="">
                                        <select name="city_municipality" id="edit_cityDropdown" class="form-control" required  value="<?= $customer->city_municipality ?>">
                                            <option selected disabled readonly>Select City</option>
                                        </select>
                                    </div>
                                </div>
    
                                <div class="form-group">
                                    <label class=" control-label">Customer Barangay</label>
                                    <div class="">
                                        <select name="barangay" id="edit_barangayDropdown" class="form-control" required value="<?= $customer->barangay ?>">
                                            <option  selected disabled readonly>Select Barangay</option>
                                        </select>
                                    </div>
                                </div>
    
                                <div class="form-group  mb-5" ><!-- form-group Starts -->
                                    <label class=" control-label" > Other Address Info </label>
                                    <div class="" >
                                        <textarea  name="complete_address" class="form-control" cols="30" rows="10" required><?=$customer->complete_address ?></textarea>
                                    </div>
                                </div><!-- form-group Ends -->
    
                                <div class="form-group" ><!-- form-group Starts -->
                                    <label class=" control-label" ></label>
                                    <div class="" >
                                        <input type="submit" name="update_profile" value="Update Profile" class="btn btn-primary form-control">
                                    </div>
                                </div><!-- form-group Ends -->
                            </form><!-- form-horizontal Ends -->
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>

    </body>
</html>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


<script>
    $(document).ready(function() {

            var userDetails = <?php echo isset($customer) ? json_encode($customer) : json_encode(([])); ?>;
            // Fetch provinces and populate the province dropdown
            $.ajax({
            url: 'https://psgc.gitlab.io/api/provinces.json',
            type: 'GET',
            success: function(data) {
                var provinces = data;
                var provinceDropdown = $('#edit_provinceDropdown');

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

    // Function to fetch and populate cities/municipalities based on the selected province
        function editPopulateCitiesMunicipalities(provinceCode) {
            $.ajax({
                url: `https://psgc.gitlab.io/api/provinces/${provinceCode}/cities-municipalities.json`,
                type: 'GET',
                success: function(data) {
                    var citiesMunicipalities = data;
                    var cityDropdown = $('#edit_cityDropdown');
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
        $.ajax({
            url: 'https://psgc.gitlab.io/api/provinces.json',
            type: 'GET',
            success: function(data) {
                var provinces = data;
                var provinceDropdown = $('#provinceDropdown');
                provinceDropdown.empty(); // Clear existing options
                provinceDropdown.append($('<option></option>').val('').text('Select Province')); // Add default option
                $.each(provinces, function(index, province) {
                    provinceDropdown.append($('<option></option>').val(province.code).text(province.name));
                });
            },
            error: function(xhr, status, error) {
                console.error('Error fetching provinces: ' + error);
            }
        });
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