<?php 
    include_once("./includes/header.php");

    $category = new Category;
    $categories = $category->all();
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
        <section class="py-2">
            <div class="container px-2 px-lg-5">
                <h3 id="product_list">PRODUCT LIST:</h3>
                <div class="row gx-2 gx-lg-3 justify-content-center">
                    <div class="col-md-2">
                        <div class="list-group" style="padding-left: 10px;">
                            <h3 class="my-4">Categories</h3>
                            <?php 
                            $categoryFilter = '<span style="cursor: pointer;" class="list-group-item list-group-item-action" onclick="applyFilter(\'all\')">All</span>';
                            foreach ($categories as $category) {
                                $categoryFilter .= '<span style="cursor: pointer;" class="list-group-item list-group-item-action" onclick="applyFilter(\'' . $category['id'] . '\')">' . $category['name'] . '</span>';
                            }
                            echo $categoryFilter;
                            ?>
                        </div>
                    </div>
                    <div class="col-md-10">
                        <div class="row row-cols-2 row-cols-md-4 justify-content-center" id="productContainer" >
                            <?php include_once("./includes/display-products.php"); ?>
                        </div>
                        <button id="loadMore" class="btn btn-primary">See More</button>

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
            document.getElementById('loadMore').addEventListener('click', loadMoreProducts);

            // document.getElementById('load-more').addEventListener('click', function() {
            //     var items = Array.from(document.getElementsByClassName('product-item'));
            //     var hiddenItems = items.filter(function(item) {
            //         return item.style.display === 'none';
            //     });
            //     hiddenItems.slice(0, 5).forEach(function(item) {
            //         item.style.display = 'block';
            //     });
            // });
        </script>
