<div class="row container " id="cart-item-container" >
    <div class="card mt-2">
        <div class="card-text" style="height: 74vh ; overflow-y:auto !important; overflow:auto;">
            <?php foreach ($shippedItems as $key => $cart) { ?>
                <?php 
                    $img_link = getImageLink($cart['image']); 
                    generateViewCards($cart, $key, $img_link) ;
                ?>
            <?php } ?>
        </div>
    </div>
</div>