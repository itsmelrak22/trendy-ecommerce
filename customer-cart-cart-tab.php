
<div class="row container"  >
        <div class=" card col-md-8 mt-2" >
        <?php if( isset($cartItems) ){?>
        <form id="checkout-form">

            <input class="form-check-input" type="checkbox" onClick="toggle(this)" /> Select All

            <div class="card-text" style="height: 74vh ; overflow-y:auto !important; overflow:auto;">
                <?php foreach ($cartItems as $key => $cart) { ?>
        
                    <?php $img_link = getImageLink($cart['image']);  ?>
                    <div class="card mb-3">
                        <div class=" container card-text row">
                            <div>
                                <input type="hidden" name="product_id" value="<?= $cart['product_id'] ?>">
                                <input type="hidden" name="color_id" value="<?= $cart['color_id'] ?>">
                                <input type="hidden" name="cart_id" value="<?= $cart['id'] ?>">
                            </div>
                            <div class="mt-2 col-md-1">
                                <input class="form-check-input" type="checkbox" name="cartCheckbox" id="<?=$cart['id']?>" onClick="calculateSubtotal()">
                            </div>
                            <div class="mt-5 col-md-3">
                                <img src="<?= $img_link?>" class=" card-img-top" alt="<?= $cart['product_name'] ?>">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title"><?= $cart['product_name'] ?></h5>
                                    <p class="card-text">Color: <?= $cart['color'] ?></p>
                                    <p class="card-text">Price: <span name="price"><?= $cart['price'] ?></span></p>
                                    <p class="card-text">Quantity: <input type="number" min="1" value="<?= $cart['quantity'] ?>" name="quantity" oninput="updateQuantity(this, <?= $cart['price'] ?>, total<?= $key ?>)"></p>
                                    <p class="card-text">Total Price: <span id="total<?= $key ?>"><?=  (int) $cart['price'] * (int) $cart['quantity']  ?></span></p>
                                    <p class="card-text"><small class="text-muted">Date Created: <?= $cart['created_at'] ?></small></p>
                                </div>
                            </div>
                        </div>
                    </div>

                <?php } ?>
            </div>
            <input type="hidden" name="client_id" value="<?=$client_id?>">
            </div>
        <div class="col-md-4 mt-2">
            <div class="card">
                <div class="card-body">
                    <h5><b>Summary</b></h5>
                    <hr>
                    <div class="row mt-3">
                        <div class="col">Sub Total</div>
                        <div  class="col text-right"> <span id="subtotal"></span></div>
                    
                        <input type="hidden" name="subtotal" id="hiddenSubtotal">
                    </div>
                    <button class="btn btn-outline-dark flex-shrink-0 mt-3" type="submit" id="checkout-btn" disabled>Checkout</button>
                </div>
            </div>
        </div>
        </form>
        <?php } else{ ?>
            <div style="height: 60vh"></div>
        <?php } ?>
    </div>
</div>