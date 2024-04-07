
<div class="row container"  >
    <div class="card-text" style="height: 74vh ; overflow-y:auto !important; overflow:auto;">
        <?php foreach ($cancelledItems as $key => $cart) { ?>
                <div class="card mb-3">
                    <div class=" container card-text row">
                        <div>
                            <input type="hidden" name="product_id" value="<?= $cart['product_id'] ?>">
                            <input type="hidden" name="color_id" value="<?= $cart['color_id'] ?>">
                        </div>
                        <div class="my-2 col-md-3">
                            <?php $img_link = getImageLink($cart['image']);  ?>
                            <img src="<?= $img_link?>" class=" card-img-top" alt="<?= $cart['product_name'] ?>">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title"><?= $cart['product_name'] ?></h5>
                                <p class="card-text">Color: <?= $cart['color'] ?></p>
                                <p class="card-text">Price: <span name="price"><?= $cart['price'] ?></span></p>
                                <p class="card-text">Quantity: <?= $cart['quantity'] ?></p>
                                <p class="card-text">Total Price: <span id="total<?= $key ?>"><?=  (int) $cart['price'] * (int) $cart['quantity']  ?></span></p>
                                <p class="card-text"><small class="text-muted">Date Created: <?= $cart['created_at'] ?></small></p>
                            </div>
                        </div>
                    </div>
                </div>

        <?php } ?>
    </div>
</div>