<?php 
    include_once("./includes/header.php");
?>

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
                                <label for="username" class="form-label">Username</label>
                                <input type="text" class="form-control" id="username" name="username">
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" name="password">
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <button type="button" onclick="loadRegisterPage()" class="btn btn-primary">Register</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Header-->
        <header class="bg-dark py-5">
            <!-- <div class="container px-4 px-lg-5 my-5">
                <div class="text-center text-white">
                    <h1 class="display-4 fw-bolder">Shop in style</h1>
                    <p class="lead fw-normal text-white-50 mb-0">With this shop hompeage template</p>
                </div>
            </div> -->
            <div>
                <?php include_once('carousel.php'); ?>
            </div>
        </header>

        <?php include_once("./includes/top-four-sales.php"); ?>



        <!-- Section-->
        <section class="py-5">
            <div class="container px-4 px-lg-5 mt-5">
                <h3>PRODUCT LIST: </h3>
                <div class="row gx-4 gx-lg-3 row-cols-2 row-cols-md-4 justify-content-center">
                    <?php include_once("./includes/display-products.php"); ?>
                </div>
            </div>
        </section>
        <?php include_once("./includes/scripts.php"); ?>
        <?php include_once("./includes/footer.php"); ?>

