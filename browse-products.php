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

        header { 
        background: #009688;
        overflow: hidden;
        font-family: 'Open Sans', sans-serif;
        }
        .loop-wrapper {
        margin: 0 auto;
        position: relative;
        display: block;
        max-width: 1070px;
        height: 130px;
        overflow: hidden;
        border-bottom: 3px solid #fff;
        color: #fff;
        }
        .mountain {
        position: absolute;
        right: -900px;
        bottom: -20px;
        width: 2px;
        height: 2px;
        box-shadow: 
            0 0 0 50px #4DB6AC,
            60px 50px 0 70px #4DB6AC,
            90px 90px 0 50px #4DB6AC,
            250px 250px 0 50px #4DB6AC,
            290px 320px 0 50px #4DB6AC,
            320px 400px 0 50px #4DB6AC
            ;
        transform: rotate(130deg);
        animation: mtn 20s linear infinite;
        }
        .hill {
        position: absolute;
        right: -900px;
        bottom: -50px;
        width: 400px;
        border-radius: 50%;
        height: 20px;
        box-shadow: 
            0 0 0 50px #4DB6AC,
            -20px 0 0 20px #4DB6AC,
            -90px 0 0 50px #4DB6AC,
            250px 0 0 50px #4DB6AC,
            290px 0 0 50px #4DB6AC,
            620px 0 0 50px #4DB6AC;
        animation: hill 4s 2s linear infinite;
        }
        .tree, .tree:nth-child(2), .tree:nth-child(3) {
        position: absolute;
        height: 100px; 
        width: 35px;
        bottom: 0;
        background: url(https://s3-us-west-2.amazonaws.com/s.cdpn.io/130015/tree.svg) no-repeat;
        }
        .rock {
        margin-top: -17%;
        height: 2%; 
        width: 2%;
        bottom: -2px;
        border-radius: 20px;
        position: absolute;
        background: #ddd;
        }
        .truck, .wheels {
        transition: all ease;
        width: 85px;
        margin-right: -60px;
        bottom: 0px;
        right: 50%;
        position: absolute;
        background: #eee;
        }
        .truck {
        background: url(https://s3-us-west-2.amazonaws.com/s.cdpn.io/130015/truck.svg) no-repeat;
        background-size: contain;
        height: 60px;
        }
        .truck:before {
        content: " ";
        position: absolute;
        width: 25px;
        box-shadow:
            -30px 28px 0 1.5px #fff,
            -35px 18px 0 1.5px #fff;
        }
        .wheels {
        background: url(https://s3-us-west-2.amazonaws.com/s.cdpn.io/130015/wheels.svg) no-repeat;
        height: 15px;
        margin-bottom: 0;
        }

        .tree  { animation: tree 3s 0.000s linear infinite; }
        .tree:nth-child(2)  { animation: tree2 2s 0.150s linear infinite; }
        .tree:nth-child(3)  { animation: tree3 8s 0.050s linear infinite; }
        .rock  { animation: rock 4s   -0.530s linear infinite; }
        .truck  { animation: truck 4s   0.080s ease infinite; }
        .wheels  { animation: truck 4s   0.001s ease infinite; }
        .truck:before { animation: wind 1.5s   0.000s ease infinite; }


        @keyframes tree {
        0%   { transform: translate(1350px); }
        50% {}
        100% { transform: translate(-50px); }
        }
        @keyframes tree2 {
        0%   { transform: translate(650px); }
        50% {}
        100% { transform: translate(-50px); }
        }
        @keyframes tree3 {
        0%   { transform: translate(2750px); }
        50% {}
        100% { transform: translate(-50px); }
        }

        @keyframes rock {
        0%   { right: -200px; }
        100% { right: 2000px; }
        }
        @keyframes truck {
        0%   { }
        6%   { transform: translateY(0px); }
        7%   { transform: translateY(-6px); }
        9%   { transform: translateY(0px); }
        10%   { transform: translateY(-1px); }
        11%   { transform: translateY(0px); }
        100%   { }
        }
        @keyframes wind {
        0%   {  }
        50%   { transform: translateY(3px) }
        100%   { }
        }
        @keyframes mtn {
        100% {
            transform: translateX(-2000px) rotate(130deg);
        }
        }
        @keyframes hill {
        100% {
            transform: translateX(-2000px);
        }
        }





    </style>

    <header class="bg-dark py-5" >
        <div class="container px-2 px-lg-3 my-3">
            <div class="text-center text-white" style="border: white">
                <h1 class="display-5 fw-bolder" style="font-family: Courier New, sans-serif;">TRENDY THREADS APPAREL</h1>
                <p class="lead fw-normal text-white-50 mb-0" style="font-family: Courier New, sans-serif;">Shop in style we will deliver it to you.</p>
            </div>
            <div class="loop-wrapper">
            <div class="mountain"></div>
            <div class="hill"></div>
            <div class="tree"></div>
            <div class="tree"></div>
            <div class="tree"></div>
            <div class="rock"></div>
            <div class="truck"></div>
            <div class="wheels"></div>
        </div> 
            
        </div>
    </header>


    <section class="py-2" id="categories-wrapper">
        <div class="container text-center">
            <div class="btn-group" role="group" aria-label="Category Buttons">
                <style>
                     a:link {
                        text-decoration: none;
                    }

                    a:visited {
                        text-decoration: none;
                    }

                    a:hover {
                        text-decoration: none;
                    }

                    a:active {
                        text-decoration: none;
                    }

                .btn.active,
                .btn:active {
                    background-color: #454e57 !important;
                    font-weight: bold;
                    color: white !important;
                    /* Add other styles as needed */
                }
                </style>
                <a href="browse-products.php">
                    <button style="width: 290px !important;" type="button" class="mx-2 my-2 btn btn-outline-dark active" id="allCategory">All</button>
                </a>
                <?php 
                    function sortByName($a, $b) {
                        return strcasecmp($a['name'], $b['name']);
                    }
                    
                    usort($categories, 'sortByName');

                    function sortCategories($a, $b) {
                        $specialCategory = "CUSTOMIZED POLO SHIRT/UNIFORM";
                        
                        if ($a['name'] == $specialCategory) {
                            return 1;
                        }
                        if ($b['name'] == $specialCategory) {
                            return -1;
                        }
                        return 0;
                    }

                    usort($categories, "sortCategories");

                    foreach ($categories as $key => $category): ?>
                        <a href="browse-products.php?category_id=<?=$category['id']?>">
                            <button style="width: 290px !important;" type="button" class="mx-2 my-2 btn btn-outline-dark" id="<?php echo $category['id']; ?>">
                                <?php echo $category['name']; ?>
                            </button>
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