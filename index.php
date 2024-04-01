<?php 
    include_once("./includes/header.php");
?>


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

        <?php  include_once("./includes/top-four-sales.php"); ?>



        <!-- Section-->
        <section class="py-5">
            <div class="container px-4 px-lg-5 mt-5">
                <h3 id="product_list">PRODUCT LIST: </h3>
                <div class="row gx-4 gx-lg-3 row-cols-2 row-cols-md-4 justify-content-center">
                    <?php include_once("./includes/display-products.php"); ?>
                </div>
            </div>
        </section>
        <?php include_once("./includes/scripts.php"); ?>
        <?php include_once("./includes/footer.php"); ?>

