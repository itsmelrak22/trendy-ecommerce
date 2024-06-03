<?php 
    include_once("./includes/header.php");

?>

<style>
    .full-height {
        height: 100vh;
        display: flex;
        flex-direction: column;
        justify-content: center; /* Optional: Center content vertically */
        align-items: center; /* Optional: Center content horizontally */
    }

    .product-item-img {
        max-height: 40vh; /* Adjust this value to set the maximum height relative to the viewport height */
        width: auto; /* Maintain aspect ratio */
        object-fit: cover; /* Ensure the image covers the area while maintaining aspect ratio */
    }

</style>


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
            <div>
                <?php include_once('snackbar.php'); ?>
            </div>
        </header>

        <?php // include_once("./includes/top-four-sales.php"); ?>
        <hr>

        <section class="py-2">
            <?php include_once('about-us.php'); ?>
        </section>

        <hr>

            <!-- Section-->
            <section class="py-2 full-height">
                <div class="container px-2 px-lg-5">
                    <h3 id="product_list" >PRODUCT LIST:</h3>
                    <div class="row gx-2 gx-lg-3 justify-content-center">
                        <!-- <div class="col-md-2">
                            <div class="list-group" style="padding-left: 10px;">
                                <h3 class="my-4">Categories</h3>
                                <?php 
                                // $categoryFilter = '<span style="cursor: pointer;" class="list-group-item list-group-item-action" onclick="applyFilter(\'all\')">All</span>';
                                // foreach ($categories as $category) {
                                //     $categoryFilter .= '<span style="cursor: pointer;" class="list-group-item list-group-item-action" onclick="applyFilter(\'' . $category['id'] . '\')">' . $category['name'] . '</span>';
                                // }
                                // echo $categoryFilter;
                                ?>
                            </div>
                        </div> -->
                        <div class="col-md-12">
                            <div class="row gx-2 gx-lg-3 row-cols-2 row-cols-md-4 justify-content-center" id="productContainer" >
                                <?php include_once("./includes/display-products.php"); ?>
                            </div>
                            <!-- <button id="loadMore" class="btn btn-primary">See More</button> -->
                        </div>
                    </div>
                </div>
            </section>



        <!-- <section class="py-2">
            <div class="container px-2 px-lg-5 ">
                <h3 id="product_list">PRODUCT LIST: </h3>
                <div class="row gx-2 gx-lg-3 row-cols-2 row-cols-md-4 justify-content-center">
                    <?php //include_once("./includes/display-products.php"); ?>
                </div>
            </div>
        </section> -->
        <?php include_once("./includes/scripts.php"); ?>
        <?php include_once("./includes/footer.php"); ?>
        <script>
        $(document).ready(function() {
            $('#seeMoreButton').click(function() {
                $('.product-item[style="display: none;"]').slice(0, 4).slideDown().removeAttr('style');
                if ($('.product-item[style="display: none;"]').length == 0) {
                    $('#seeMoreButton').fadeOut();
                }
            });
        });

        function getQueryParam(name) {
            const urlParams = new URLSearchParams(window.location.search);
            return urlParams.get(name);
        }
    </script>
