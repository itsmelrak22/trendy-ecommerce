<?php 
    include_once("./includes/header.php");
    
    $category = new Category;
    $categories = $category->getCategories();
?>
    <style>
        #categories-wrapper .btn-group .btn.active {
            background-color: #0d6efd;
            color: white;
        }
        #categories-wrapper .btn-group {
            display: inline-block; /* Ensures the button group stays in a single line */
        }
    </style>

    <header class="bg-dark py-5">
        <div class="container px-4 px-lg-5 my-5">
            <div class="text-center text-white">
                <h1 class="display-4 fw-bolder">TRENDY THREADS</h1>
                <p class="lead fw-normal text-white-50 mb-0">Shop in style</p>
            </div>
        </div>
    </header>


    <section class="py-2" id="categories-wrapper">
        <div class="container text-center">
            <div class="btn-group" role="group" aria-label="Category Buttons">
                <a href="browse-products.php">
                    <button type="button" class="mx-2 my-2 btn btn-outline-primary active" id="allCategory">All</button>
                </a>
                <?php 
                    function sortByName($a, $b) {
                        return strcasecmp($a['name'], $b['name']);
                    }
                    
                    usort($categories, 'sortByName');
                    foreach ($categories as $key => $category): ?>
                    <a href="browse-products.php?category_id=<?=$category['id']?>">
                        <button type="button" class="mx-2 my-2 btn btn-outline-primary" id="<?php echo $category['id']; ?>"><?php echo $category['name']; ?></button>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>
    </section>


    <hr>

    <!-- Section-->
    <section class="py-2">
        <div class="container px-2 px-lg-5">
            <div class="row gx-2 gx-lg-3 justify-content-center">
                <div class="col-md-12">
                    <div class="row gx-2 gx-lg-3 row-cols-2 row-cols-md-4 justify-content-center" id="productContainer">
                        <?php include_once("./includes/display-browse-products.php"); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <?php include_once("./includes/scripts.php"); ?>
    <?php include_once("./includes/footer.php"); ?>

    <script>
        $(document).ready(function() {
            const categoryIdParam = getQueryParam('category_id');

            $('#categories-wrapper .btn-group .btn').removeClass('active');

            if (categoryIdParam) {
                $(`#categories-wrapper .btn-group .btn[id="${categoryIdParam}"]`).addClass('active');
            } else {
                $('#allCategory').addClass('active');
            }

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