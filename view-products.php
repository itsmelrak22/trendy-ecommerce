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


    // displayDataTest($products);
  
?>

<style>
    .active-color-selected{
        border: 3px solid red !important;
    }
</style>

    <!-- Product section-->
    <section class="py-5">
        <div class="container px-4 px-lg-5 my-5">
            <div class="row gx-4 gx-lg-5 align-items-center">
                <div class="col-md-6">
                    <?php 
                    $url = "./admin/$products->image";

                    if(file_exists("$url")){ ?>
                        <img class="card-img-top mb-5 mb-md-0" max-width="600" max-height="700" src="<?$url?>" alt="products-name.png" />
                    <?php }else{  ?>
                        <img class="card-img-top mb-5 mb-md-0" src="https://dummyimage.com/600x700/dee2e6/6c757d.jpg" alt="no-image.png" />
                    <?php }  ?>
                        
                </div>
                <div class="col-md-6">
                    
                    <h3 class="display-4 fw-bolder"><?=  $products->name  ?></h3>

                    <div class="fs-5 mb-3">
                        <div class="small mb-1 lead"><?= 'Price'. ': '. '₱'. $products->price  ?></div>
                        <div class="small mb-1 lead"><?= 'Stock'. ': '. $products->stock_qty  ?></div>
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
                    <form action="add-to-cart.php" method="POST" onsubmit="return checkUser();">
                        <div class="d-flex">
                            <input type="hidden" name="product_id" value="<?=$id?>">
                            <input type="hidden" name="color_id" value="<?=$products->color_id?>">
                            <input name="quantity" required placeholder="0" value="1" class="form-control text-center me-3" id="inputQuantity" type="text" value="" style="width: 70px; max-width: 5rem" <?= $products->stock_qty < 1 ? 'disabled' : '' ?> />
                            <?php if( isset($_SESSION["loggedInUser"]) ) { ?>
                                <input type="hidden" name="customer_id" value="<?=$client_id?>">

                                <?php if( count($product_colors) > 0 ){ ?>
                                    <button class="btn btn-outline-dark flex-shrink-0" name="add-cart" type="submit">
                                        <i class="bi-cart-fill me-1"></i>
                                        Add to cart
                                    </button>
                                <?php } else {?>
                                    <button class="btn btn-outline-dark flex-shrink-0" disabled >
                                        <i class="bi-cart-fill me-1"></i>
                                        Add to cart (Out of Stock)
                                    </button>
                                <?php } ?>
                                

                            <?php } else {?>
                                <button class="btn btn-outline-dark flex-shrink-0" type="submit" disabled>
                                    <i class="bi-cart-fill me-1"></i>
                                    Add to cart
                                </button>
                                <div class="small mb-1 mx-2 lead">Login to continue your checkout.</div>
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
