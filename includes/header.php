<?php 
    require_once  './vendor/autoload.php';

    session_start(); 
    function diplayDataTest($array){
        echo "<pre>";
        echo print_r($array);
        echo "</pre>";
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
        // diplayDataTest($cartItems);
        $cartItemCount = 0;

        foreach ($cartItems as $key => $value) {
            $cartItemCount += (int) $value['quantity']; 

        }

    }
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
                        <li class="nav-item"><a class="nav-link" href="#!">About</a></li>
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

                    <form class="d-flex">
                        <a href="customer-cart.php" method="post" class="me-2 btn btn-outline-dark" type="submit">
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
                        <?php if(isset($client_email)) { ?>
                            <div class="me-2">Welcome, <?php echo $client_email; ?>!</div>
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

            <!-- Login Modal -->
            <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                    <div id="registerContent"></div>
                        <h5 class="modal-title" id="loginModalLabel">Login</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="./client/login-client.php">
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="text" class="form-control" id="email" name="email">
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" name="password">
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <!-- <button type="button" onclick="loadRegisterPage()" class="btn btn-primary">Register</button> -->
                        </form>
                    </div>
                </div>
            </div>
        </div>