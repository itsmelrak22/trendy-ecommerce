<?php 
/* 
<div class="card mb-3">
<div class=" container card-text row">

    <div class="mt-2 col-md-1">
        <input class="form-check-input" type="checkbox" name="cartCheckbox" id="<?=$cart['id']?>" onClick="calculateSubtotal()">
    </div>
    <div class="my-4 col-md-3">
        <img src="<?= $img_link?>" class=" card-img-top" alt="<?= $cart['product_name'] ?>">
    </div>
    <div class="col-md-8">
        <div class="card-body">
            <h5 class="card-title"><?= $cart['product_name'] ?></h5>
            <p class="card-text">Color: <?= $cart['color'] ?></p>
            <p class="card-text">Price: <span name="price"><?= $cart['price'] ?></span></p>
            <div class="input-group">
                <span class="input-group-text" id="basic-addon3">Price</span>
                <input type="text" class="form-control" readonly disabled value="<?= $cart['price'] ?>">
            </div>
            <div class="input-group">
                <span class="input-group-text" id="basic-addon3">Quantity</span>
                <input class="form-control form-control-sm"  type="number" min="1" value="<?= $cart['quantity'] ?>" name="quantity" oninput="updateQuantity(this, <?= $cart['price'] ?>, total<?= $key ?>)">
            </div>
            <p class="card-text"><small class="text-muted">Date Ordered: <?= $cart['created_at'] ?></small></p>
        </div>
    </div>
</div>
</div>

*/
function generateCartCards($cart, $key, $img_link){
    // displayDataTest($cart);
    $product_name = $cart['product_name'];
    $color = $cart['color'];
    $price = $cart['price'];
    $quantity = $cart['quantity'];
    $created_at = $cart['created_at'];
    $total_price = $cart['total_price'];

    echo '
    
        <div class="container mb-2">
            <div class="row">
                <div class="card border shadow-none">
                    <div class="card-body">
                        <div class="d-flex align-items-start border-bottom pb-3">
                        <div class="mt-2 col-md-1">
                            <input class="form-check-input" type="checkbox" name="cartCheckbox" onClick="calculateSubtotal()">
                        </div>
                            <div class="me-4"  >
                                <img src="'.$img_link.'" alt="'.$product_name.'"  class="avatar-lg rounded">
                            </div>
                            <div class="flex-grow-1 align-self-center overflow-hidden">
                                <div>
                                    <h5 class="text-truncate font-size-18"><a href="#" class="text-dark">'.$product_name.'</a></h5>
                                    <p class="mb-0 mt-1">Color : <span class="fw-medium">'.$color.'</span></p>
                                </div>
                            </div>
                            <div class="flex-shrink-0 ms-2">
                                <ul class="list-inline mb-0 font-size-16">
                                    <li class="list-inline-item">
                                        <a href="#" class="text-muted px-1">
                                            <i class="mdi mdi-trash-can-outline"></i>
                                        </a>
                                    </li>
                                   
                                </ul>
                            </div>
                        </div>

                        <div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="mt-3">
                                        <p class="text-muted mb-2">Price</p>
                                        <h5 class="mb-0 mt-2" >₱ <span id="price-id-'.$key.'" name="price"> '.$price.' </span> </h5>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="mt-3">
                                        <p class="text-muted mb-2">Quantity</p>
                                        <div class="d-inline-flex">
                                        <input class="form-control form-control-sm" id="quantity-id-'.$key.'" type="number" min="1" value="'.$quantity.'" name="quantity" oninput="updateQuantity(this, '.$price.', total'.$key.', '.$key.')"">

                                        
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="mt-3">
                                        <p class="text-muted mb-2">Total</p>
                                        <h5 >₱ <span id="total-id-'.$key.'">'.$total_price.'</span></h5>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>


    ';
}

function generateViewCards($cart, $key, $img_link){
    // displayDataTest($cart);
    $product_name = $cart['product_name'];
    $color = $cart['color'];
    $price = $cart['price'];
    $quantity = $cart['quantity'];
    $created_at = $cart['created_at'];
    $total_price = $cart['total_price'];

    echo '
    
        <div class="container mb-2">
            <div class="row">
                <div class="card border shadow-none">
                    <div class="card-body">
                        <div class="d-flex align-items-start border-bottom pb-3">
                            <div class="me-4"  >
                                <img src="'.$img_link.'" alt="'.$product_name.'"  class="avatar-lg rounded">
                            </div>
                            <div class="flex-grow-1 align-self-center overflow-hidden">
                                <div>
                                    <h5 class="text-truncate font-size-18"><a href="#" class="text-dark">'.$product_name.'</a></h5>
                                    <p class="mb-0 mt-1">Color : <span class="fw-medium">'.$color.'</span></p>
                                </div>
                            </div>
                            <div class="flex-shrink-0 ms-2">
                                <ul class="list-inline mb-0 font-size-16">
                                    
                                   
                                </ul>
                            </div>
                        </div>

                        <div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="mt-3">
                                        <p class="text-muted mb-2">Price</p>
                                        <h5 class="mb-0 mt-2" >₱ <span id="price-id-'.$key.'" name="price"> '.$price.' </span> </h5>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="mt-3">
                                        <p class="text-muted mb-2">Quantity</p>
                                        <div class="d-inline-flex">
                                        <input disabled class="form-control  form-control-sm" id="quantity-id-'.$key.'" type="number" min="1" value="'.$quantity.'" name="quantity" oninput="updateQuantity(this, '.$price.', total'.$key.', '.$key.')"">
                                        
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="mt-3">
                                        <p class="text-muted mb-2">Total</p>
                                        <h5 >₱ <span id="total-id-'.$key.'">'.$total_price.'</span></h5>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>


    ';
}