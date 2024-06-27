<?php 
function generateCartCards($cart, $key, $img_link){
    echo "key: $key";
    $cartID = $cart['id'];

    $product_info_ = Product::findProduct($cart['product_id'], $cart['color_id']);
    $site_setting = SiteSetting::getSiteSettingsLatest();
    $site_setting = json_decode($site_setting->json_data);
    $product_sizes = ProductSize::getProductSizes($cartID);

    $product_name = $cart['product_name'];
    $color = $cart['color'];
    if($site_setting->productSelect == $cart['product_id']){
        $price = $site_setting->discountedPrice;
    }else{
        $price = $cart['price'];
    }

    $size = $cart['size'];
    $quantity = $cart['quantity'];
    $created_at = $cart['created_at'];
    $total_price = $cart['total_price'];
    // displayDataTest($product_sizes);

    foreach ($product_sizes as $value) {
        if($size == $value['size_display']){
            $price += $value['size_price'];
        }
    }
    echo '
    
        <div class="container mb-2">
            <div class="row">
                <div class="card border shadow-none">
                    <div class="card-body">
                        <div class="d-flex align-items-start border-bottom pb-3">
                            <div class="mt-2 col-md-1">
                            <input id="cart-'.$cartID.'" class="form-check-input" type="checkbox" name="cartCheckbox" onClick="calculateSubtotal()">
                            </div>
                            <div class="me-4"  >
                                <img src="'.$img_link.'" alt="'.$product_name.'"  class="avatar-lg rounded">
                            </div>
                            <div class="flex-grow-1 align-self-center overflow-hidden">
                                <div>
                                    <h5 class="text-truncate font-size-18"><a href="#" class="text-dark">'.$product_name.'</a></h5>
                                    <p class="mb-0 mt-1">Color : <span class="fw-medium">'.$color.'</span></p>
                                    <p class="mb-0 mt-1">Size : <span class="fw-medium">'.$size.'</span></p>
                                </div>
                            </div>
                            <div class="flex-shrink-0 ms-2">
                                <ul class="list-inline mb-0 font-size-16">
                                    <li class="list-inline-item">
                                        <a href="delete_cart_item.php?id='.$cartID.'" class="text-muted px-1">
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
                                        <p class="text-muted mb-2">Price</p>';
                                        if($site_setting->productSelect == $cart['product_id']){
                                             echo '<span id="display-final-price" class="text-decoration-line-through"> ₱'.$cart['price'].' </span>
                                                <span class="fw-bold  text-success">(-'.$site_setting->discountPercentage.' Promo)</span>';
                                        }
                                        
                                        echo '<h5 class="mb-0 mt-2" >₱ <span id="price-id-'.$key.'" name="price"> '.$price.' </span> </h5>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="mt-3">
                                        <p class="text-muted mb-2">Quantity</p>
                                        <div class="d-inline-flex">
                                        <button class="btn btn-md btn-outline-dark"  type="button" onClick="updateCartQuantity(`quantity-id-'.$key.'`, '.$price.', `total-id-'.$key.'`, '.$key.', `minus`, '.$product_info_->stock_qty.')">-</button>
                                        <input style=" width: 70px; " readonly class="mx-2 form-control form-control-sm text-center" id="quantity-id-'.$key.'" type="number" min="1" value="'.$quantity.'" name="quantity" >
                                        <button class="btn btn-md btn-outline-dark" type="button" onClick="updateCartQuantity(`quantity-id-'.$key.'`, '.$price.', `total-id-'.$key.'`, '.$key.', `add`, '.$product_info_->stock_qty.')">+</button>
                                        
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="mt-3">
                                        <p class="text-muted mb-2">Total</p>
                                        <h5 >₱ <span id="total-id-'.$key.'">'.($quantity * $price).'</span></h5>
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
    $cartID = $cart['id'];

    $product_info_ = Product::findProduct($cart['product_id'], $cart['color_id']);
    $site_setting = SiteSetting::getSiteSettingsLatest();
    $site_setting = json_decode($site_setting->json_data);
    $product_sizes = ProductSize::getProductSizes($cartID);

    $product_name = $cart['product_name'];
    $color = $cart['color'];
    if($site_setting->productSelect == $cart['product_id']){
        $price = $site_setting->discountedPrice;
    }else{
        $price = $cart['price'];
    }

    $size = $cart['size'];
    $quantity = $cart['quantity'];
    $created_at = $cart['created_at'];
    $total_price = $cart['total_price'];
    // displayDataTest($product_sizes);
        foreach ($product_sizes as $value) {
            if($size == $value['size_display']){
                $price += $value['size_price'];
            }
        }
    $shippingFee = 75;
    // $price += $shippingFee; 
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
                                    <div class="mt-1">
                                        <p class="text-muted mb-2">Shipping Fee</p>
                                        <h5 class="mb-0 mt-2" >₱ <span id="price-id-'.$key.'" name="price"> '.$shippingFee.' </span> </h5>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="mt-3">
                                        <p class="text-muted mb-2">Quantity</p>
                                        <div class="d-inline-flex">
                                        <input disabled class="form-control  form-control-sm" id="quantity-id-'.$key.'" type="number" min="1" max="'.$product_info_->stock_qty.'" value="'.$quantity.'" name="quantity" oninput="updateCartQuantity(this, '.$price.', total'.$key.', '.$key.', '.$product_info_->stock_qty.')"">
                                        
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="mt-3">
                                        <p class="text-muted mb-2">Total</p>
                                        <h5 >₱ <span id="total-id-'.$key.'">'.($total_price + $shippingFee).'</span></h5>
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

?>

<script>
    function updateCartQuantity(inputId, price, total, key, operation, maxValue) {
        let input = document.getElementById(inputId);
        if(operation == 'add'){
            if( (Number(input.value) + 1) > maxValue ){
                alert("Sorry, insufficient stocks for this item.")
                return
            }
            input.value++

        }else{
            input.value--
        }
        console.log(input.value)

        if (input.value < 1) input.value = 1;
        total.innerHTML = price * input.value;
        calculateSubtotal();
        updateSpecificTotal(key)
        
    }
</script>