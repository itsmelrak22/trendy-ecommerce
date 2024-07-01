<?php 
    include_once("./includes/header.php"); 
    if( !isset($_REQUEST['id']) || !$_REQUEST['id'] ){
        header("Location: index.php");
    }

    $id = $_REQUEST['id'];
    $color_id = isset($_REQUEST['color_id']) && $_REQUEST['color_id'] ? $_REQUEST['color_id'] : 0;

    $product = new Product;
    $products = $product->findProduct( $id, $color_id );

    $product_color = new ProductColor;
    $product_colors = $product_color->getProductColors( $id );

    $product_sizes = ProductSize::getProductSizes($id);

    // print_r($id);
    // displayDataTest($product_sizes);
    if($site_setting->productSelect == $id){
        $promoID = $site_setting->productSelect;
        $promoColorID = $site_setting->color_id;
        $discountPercentage = $site_setting->discountPercentage;
        $discountedPrice = $site_setting->discountedPrice;
    }else{
        unset($discountPercentage);
        unset($discountedPrice);
    }

?>
    <script>
        const productPrice = <?= $products->price ?>;
        // document.addEventListener('DOMContentLoaded', function() {
        //     const sizeIncrements = {
        //         xs: 0,
        //         s: 10,
        //         m: 20,
        //         l: 30,
        //         xl: 40,
        //         xxl: 50,
        //         'one_size': 0
        //     };
            
        //     const radioButtons = document.querySelectorAll('input[name="size"]');
        //     const priceDisplay = document.getElementById('display-final-price');
        //     const priceFinal = document.getElementById('final_price');
        //     let basePrice = productPrice;

        //     radioButtons.forEach(radio => {
        //         radio.addEventListener('change', function() {
        //             const increment = sizeIncrements[this.value];
        //             let price = (basePrice + increment).toFixed(2);
        //             priceDisplay.textContent = price
        //             priceFinal.value = price
        //         });
        //     });
        // });
    </script>

<style>
    .active-color-selected{
        border: 3px solid red !important;
    }
</style>

    <!-- Product section-->
    <section class="pt-5">
        <div class="container px-4 px-lg-5 mb-3">
            <div class="row gx-4 gx-lg-5 align-items-center">
                <div class="col-md-6">
                    <?php 
                    $url = "./admin/$products->image";

                    if(file_exists("$url")){ ?>
                        <img class="card-img-top mb-5 mb-md-0" max-width="600" max-height="700" src="<?=$url?>" alt="products-name.png" />
                    <?php }else{  ?>
                        <img class="card-img-top mb-5 mb-md-0" src="https://dummyimage.com/600x700/dee2e6/6c757d.jpg" alt="no-image.png" />
                    <?php }  ?>
                        
                </div>
                <div class="col-md-6">
                    
                    <h3 class="display-4 fw-bolder"><?=  $products->name  ?></h3>

                    <div class="fs-5 mb-3">
                        <div class="small mb-1 lead"><?= 'Price'. ': '. ''?>
                            <?php 
                            if(isset($discountPercentage)){
                                echo '<span id="display-final-price" class="text-decoration-line-through"> ₱'.number_format($products->price, 2).' </span>';
                                echo '<span id="display-discounted-price" class="fw-bolder mx-4"> ₱'.$discountedPrice.' </span>';
                                echo '<span class="fw-bold  text-success">(-'.$discountPercentage.' Promo)</span>';
                            }else{
                                echo '<span id="display-final-price" class=""> ₱'.number_format($products->price, 2).' </span>';
                            }
                            ?>
                        </div>
                        <div class="small mb-1 lead"> Stock: <?= $products->stock_qty <= 10 ? " <span class='text-danger'> " .$products->stock_qty ." left in the stock</span>" : $products->stock_qty ?></div>
                    </div>

                    <div class="small mb-1 lead"><?= 'Color Name'. ': '. $products->color_name  ?></div>
                    <div class="row">
                        <?php foreach ($product_colors as $color): ?>
                            <?php 
                                $product_color_id = $color['id'];
                                $product_id = $color['product_id'];
                                $product_color_name = $color['name'];
                            ?>
                            <div class="col-3 my-1">
                                <a href="view-products.php?id=<?=$product_id?>&color_id=<?=$product_color_id?>" data-bs-toggle="tooltip" data-bs-placement="top" title="<?= $color['name'] ?>">
                                    <div <?php
                                        if($product_color_id == $color_id || $products->color_name == $product_color_name ){
                                            echo 'class="active-color-selected"';
                                        }
                                    ?> style="height: 30px; background-color: <?= $color['code'] ?>; border: 2px solid black; cursor: pointer;">
                                    </div>
                                </a>
                            </div>
                          
                        <?php endforeach; ?>
                    </div>


                    <hr>
                        <p class="lead"><?= 'Description'. ': '. $products->description  ?> </p>
                                                <!-- Button trigger modal -->

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-fullscreen">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">SIZE GUIDE</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <?php 
                                        // echo ';
                                        // echo '<div class="text-center card-body">
                                        //         <img src="./assets/Polo Shirts.png" class="img-fluid" alt="sizechart">
                                        //     </div>';
                                    ?>

                                        <div class="container-fluid" >
                                            <?php switch ($products->category_name) { 
                                                case 'NIKEE SWOOSH POLO SHIRT':
                                                case 'NY POLO SHIRT':
                                                case 'CLASSIC POLO SHIRT':
                                                case 'OPEN COLLAR POLO SHIRT':
                                                case 'POLO SHIRT':
                                                    echo '
                                                    <div class="text-center card-body">
                                                        <img src="./assets/Polo Shirts.png" class="img-fluid" style="
                                                        margin: auto;
                                                        margin-top: 70px;
                                                        width: 500px;" alt="sizechart">
                                                    </div>
                                                    ';

                                                    break;

                                                case 'CORDUROY SHIRT':
                                                case 'ELITE OVERSIZE SHIRT':
                                                    echo '
                                                    <div class="text-center card-body">
                                                            <img src="./assets/Elite Oversize.png" class="img-fluid" alt="sizechart" style="
                                                            margin: auto;
                                                            margin-top: 185px;
                                                            width: 800px;
                                                            ">
                                                    </div>
                                                    ';
                                                    break;

                                            } ?>
                                        </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <!-- Additional buttons can be added here if needed -->
                                </div>
                                </div>
                            </div>
                        </div>

                    <hr>

                    <form action="add-to-cart.php" method="POST" onsubmit="return checkUser();">
                            <?php 
                            if(count($product_sizes) == 0){
                                echo '
                                    <div class="btn-group" role="group" aria-label="Basic radio toggle button group" id="size-group">
                                        <input type="radio" class="btn-check" name="size" id="one_size" autocomplete="off" value="one_size">
                                        <label class="btn btn-outline-secondary" for="one_size">ONE SIZE</label>
                                    </div>
                                ';
                            }else{
                                echo '
                                <div class="d-flex">
                                    <div class="my-2">';
                                    switch ($products->category_name) { 
                                        case 'NIKEE SWOOSH POLO SHIRT':
                                        case 'NY POLO SHIRT':
                                        case 'CLASSIC POLO SHIRT':
                                        case 'OPEN COLLAR POLO SHIRT':
                                        case 'POLO SHIRT':
                                        case 'CORDUROY SHIRT':
                                        case 'ELITE OVERSIZE SHIRT':
                                            echo '
                                                <button type="button" class="btn btn-outline-dark btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                    <i class="bi bi-patch-question"> SIZE GUIDE</i>
                                                </button>
                                            ';
                                            break;
                                        }
                                        
                                    echo '<div class="btn-group" role="group" aria-label="Basic radio toggle button group" id="size-group">';
                                        foreach ($product_sizes as $key => $item) {
                                            if($item['product_id'] == $id){
                                                $size = $item['size_display'];
                                                $size_price = $item['size_price'];
                                                echo '
                                                    <input type="radio" class="btn-check" name="size" autocomplete="off" value="'.$size.'" id="size_'.$size.'">
                                                    <label class="btn btn-outline-secondary" for="size_'.$size.'">'.$size.'</label>
                                                    ';
                                            }
                                        }

                                echo'       
                                        </div>
                                    </div>
                                </div>
                                ';

                                foreach ($product_sizes as $key => $item) {
                                    $size = $item['size_display'];
                                    $size_price = $item['size_price'];
                                    $discount_price = isset($discountedPrice) ? $discountedPrice : 0;
                                    echo '
                                        <script>
                                            document.addEventListener(`DOMContentLoaded`, function() {
                                                const radioButtons = document.querySelectorAll(`input[name="size"]`);
                                                const priceDisplay = document.getElementById(`display-final-price`);
                                                const priceDisplayDiscounter = document.getElementById(`display-discounted-price`);
                                                const priceFinal = document.getElementById(`final_price`);
                                                let basePrice = '.$products->price.';
                                                console.log(`priceDisplayDiscounter: `, priceDisplayDiscounter)
                                                radioButtons['.$key.'].addEventListener(`change`, function() {
                                                    let price = 0
                                                    if(priceDisplayDiscounter){
                                                        price = ('.$discount_price.' + '.$size_price.').toFixed(2);
                                                        priceDisplayDiscounter.textContent = price
                                                        priceFinal.value = price
                                                    }else{
                                                        price = (basePrice + '.$size_price.').toFixed(2);
                                                        priceDisplay.textContent = price
                                                        priceFinal.value = price
                                                    }
                                                });
                                             });

                                        </script>
                                    ';
                                }
                               
                            }


                            
                            ?>
                            
                        <hr>
                                                            

                        <div class="d-flex">
                            <input type="hidden" name="product_id" value="<?=$id?>">
                            <input type="hidden" name="color_id" value="<?=$products->color_id?>">
                            <input type="hidden" name="price" value="0" id="final_price">
                            <?php  if( $products->category_name != "CUSTOMIZED POLO SHIRT/UNIFORM" ){ ?>

                                <button type="button" class="btn btn-outline-secondary flex-shrink-0" onclick="decreaseQuantity()">-</button>
                                    <input name="quantity" readonly placeholder="0" value="1" class="form-control text-center mx-3" id="inputQuantity" type="text" value="" style="width: 60px; max-width: 5rem" <?= $products->stock_qty < 1 ? 'disabled' : '' ?> />
                                <button type="button" class="btn btn-outline-secondary flex-shrink-0 me-5" onclick="increaseQuantity()">+</button>
                            <?php  } ?>

                                <script>
                                    function increaseQuantity() {
                                        const input = document.getElementById('inputQuantity');
                                        
                                        let currentValue = parseInt(input.value, 10);
                                        if (!isNaN(currentValue)) {
                                            if((currentValue + 1) > <?= $products->stock_qty ?>){
                                                alert("Sorry, insufficient stocks for this item.")
                                                return;
                                            }
                                            input.value = currentValue + 1;
                                        }
                                    }

                                    function decreaseQuantity() {
                                        const input = document.getElementById('inputQuantity');
                                        let currentValue = parseInt(input.value, 10);
                                        if (!isNaN(currentValue) && currentValue > 1) {
                                            input.value = currentValue - 1;
                                        }
                                    }
                                </script>

                            <?php if( isset($_SESSION["loggedInUser"]) ) { ?>
                                <input type="hidden" name="customer_id" value="<?=$client_id?>">
                                <input type="hidden" name="shipping_fee" value="75">

                                <?php  if( $products->category_name == "CUSTOMIZED POLO SHIRT/UNIFORM" ){ 
                                    $_SESSION['viewed-design'] = $products->color_name;
                                    $_SESSION['viewed-design-product-id'] = $id;
                                    $_SESSION['viewed-design-color-id'] = $color_id;
                                    ?>
                                        
                                        <a href="./designer.php" class="btn btn-outline-dark flex-shrink-0" type="button">
                                            <i class="bi-cart-fill me-1"></i>
                                             (Sample Only, Please proceed to customize page)
                                        </a>
                                <?php }else{ ?>
                                    <?php if( count($product_colors) > 0 ){ ?>
                                        <button class="btn btn-outline-dark flex-shrink-0" name="add-cart" id="addCartButton" type="submit" disabled>
                                            <i class="bi-cart-fill me-1"></i>
                                            Add to cart
                                        </button>
                                        <button class="btn btn-outline-dark flex-shrink-0" name="buy-now" id="buyNowButton" type="submit" disabled>
                                            <i class="bi-cart-fill me-1"></i>
                                            Buy Now
                                        </button>

                                    <?php } else {?>
                                        <button class="btn btn-outline-dark flex-shrink-0" disabled >
                                            <i class="bi-cart-fill me-1"></i>
                                            Add to cart (Out of Stock)
                                        </button>
                                    <?php } ?>
                                        
                                <?php } ?>
                                
                            <?php } else {?>
                                <button class="btn btn-outline-dark flex-shrink-0" type="submit" disabled>
                                    <i class="bi-cart-fill me-1"></i>
                                    Add to cart
                                </button>
                                <div class="small mb-1 mx-2">Login to continue your checkout.</div>
                            <?php } ?>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </section>




    <!-- Related items section-->
    <section class="py-5 bg-light mb-4">
        <div class="container px-4 px-lg-5 my-5">
            <h2 class="fw-bolder mb-4">Related products</h2>
            <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                <?php require_once('./includes/display-related-products.php') ?>
            </div>
        </div>
    </section>



    <!-- Modal -->
    <div class="modal fade" tabindex="-1" id="myModal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel">Warning</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p class="lead">Ordered quantity is greater than stock quantity.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <?php include_once("./includes/scripts.php"); ?>
    <?php include_once("./includes/footer.php"); ?>



<script>
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    })

    $(document).ready(function() {
        $('#inputQuantity').on('input', function() {
            let inputQuantity = Number($(this).val())

            if( isNaN(inputQuantity) ){
                $('#inputQuantity').val(0);
            }
            
            let stockQuantity = <?= $products->stock_qty ?>;
            if (inputQuantity > stockQuantity) {
                $(this).val(stockQuantity);
                $('#myModal').modal('show');
            }
        });

        $('#myModal').on('hidden.bs.modal', function () {
            $('#inputQuantity').val(0);
        });
    });
</script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    const sizeGroup = document.getElementById('size-group');
    const addCartButton = document.getElementById('addCartButton');
    const buyNowButton = document.getElementById('buyNowButton');

    sizeGroup.addEventListener('change', function() {
        let sizeSelected = false;
        const radios = sizeGroup.querySelectorAll('input[type="radio"]');
        radios.forEach(radio => {
            if (radio.checked) {
                sizeSelected = true;
            }
        });
        addCartButton.disabled = !sizeSelected;
        buyNowButton.disabled = !sizeSelected;
    });
});
</script>