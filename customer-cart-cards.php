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
                <input class="form-control form-control-sm"  type="number" min="1" value="<?= $cart['quantity'] ?>" name="quantity" oninput="updateCartQuantity(this, <?= $cart['price'] ?>, total<?= $key ?>)">
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
    $size = $cart['size'];
    $quantity = $cart['quantity'];
    $created_at = $cart['created_at'];
    $total_price = $cart['total_price'];
    $cartID = $cart['id'];

    // Adjust the price based on size
        switch ($size) {
            case 'xs':
                break;
            case 's':
                $price += 10; // Increase price by 20%
                break;
            case 'm':
                $price += 20; // Increase price by 30%
                break;
            case 'l':
                $price += 30; // Increase price by 40%
                break;
            case 'xl':
                $price += 40; // Increase price by 50%
                break;
            case 'xxl':
                $price += 50; // Increase price by 60%
                break;
            case 'one_size':
                // Do nothing, price remains unchanged
                break;
            default:
                // Handle any other cases here
                break;
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
                                        <p class="text-muted mb-2">Price</p>
                                        <h5 class="mb-0 mt-2" >₱ <span id="price-id-'.$key.'" name="price"> '.$price.' </span> </h5>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="mt-3">
                                        <p class="text-muted mb-2">Quantity</p>
                                        <div class="d-inline-flex">
                                        <button class="btn btn-md btn-outline-dark"  type="button" onClick="updateCartQuantity(`quantity-id-'.$key.'`, '.$price.', `total-id-'.$key.'`, '.$key.', `minus`)">-</button>
                                        <input readonly class="mx-2 form-control form-control-sm" id="quantity-id-'.$key.'" type="number" min="1" value="'.$quantity.'" name="quantity" >
                                        <button class="btn btn-md btn-outline-dark" type="button" onClick="updateCartQuantity(`quantity-id-'.$key.'`, '.$price.', `total-id-'.$key.'`, '.$key.', `add`)">+</button>
                                        
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
                                        <input disabled class="form-control  form-control-sm" id="quantity-id-'.$key.'" type="number" min="1" value="'.$quantity.'" name="quantity" oninput="updateCartQuantity(this, '.$price.', total'.$key.', '.$key.')"">
                                        
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

?>

<script>
    function updateCartQuantity(inputId, price, total, key, operation) {
        console.log(inputId)
        console.log(operation)
        let input = document.getElementById(inputId);
        console.log(input)
        if(operation == 'add'){
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