<?php 
    include_once("./includes/header.php");
?>

        <!-- Section-->
        <section class="py-5">
            <div class="container px-4 px-lg-5">
                <h3>Your Cart: </h3>
                <div class="row gx-4 gx-lg-3 justify-content-center">
                    
                <div class="card-body">
                    <div class="container">
                        <script>
                            function toggle(source) {
                                checkboxes = document.getElementsByName('cartCheckbox');
                                for(var i=0, n=checkboxes.length;i<n;i++) {
                                    checkboxes[i].checked = source.checked;
                                }
                            }

                            function updateQuantity(input, price, total) {
                                if (input.value < 1) input.value = 1;
                                total.innerHTML = price * input.value;
                                calculateSubtotal();
                            }

                            function calculateSubtotal() {
                                var checkboxes = document.getElementsByName('cartCheckbox');
                                var quantities = document.getElementsByName('quantity');
                                var prices = document.getElementsByName('price');
                                var subtotal = 0;
                                for(var i=0, n=checkboxes.length;i<n;i++) {
                                    if (checkboxes[i].checked) {
                                        subtotal += quantities[i].value * prices[i].innerHTML;
                                    }
                                }
                                document.getElementById('subtotal').innerHTML = subtotal;
                                document.querySelector('#hiddenSubtotal').value = subtotal;

                            }
                        </script>
                         <form action="customer-checkout.php" method="post">
                            <input class="form-check-input" type="checkbox" onClick="toggle(this)" /> Select All

                            <?php foreach ($cartItems as $key => $cart) { ?>
                                <div class="card mb-3">
                                    <div class="row g-0">
                                        <div class="col-md-1">
                                            <input class="form-check-input" type="checkbox" name="cartCheckbox" id="" onClick="calculateSubtotal()">
                                        </div>
                                        <div class="col-md-3">
                                            <img src="admin/<?=$cart['image']?>" class="img-fluid rounded-start" alt="<?= $cart['product_name'] ?>">
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

                                <input type="hidden" name="items[<?= $key ?>][product_name]" value="<?= $cart['product_name'] ?>">
                                <input type="hidden" name="items[<?= $key ?>][quantity]" value="<?= $cart['quantity'] ?>">
                                <input type="hidden" name="items[<?= $key ?>][price]" value="<?= $cart['price'] ?>">
                            <?php } ?>

                            <p>Subtotal: <span id="subtotal"></span></p>
                                
                            <button class="btn btn-outline-dark flex-shrink-0 mt-3" type="submit">Checkout</button>
                         </form>
                    </div>
                </div>

                </div>
            </div>
        </section>
    <?php include_once("./includes/scripts.php"); ?>
    <?php include_once("./includes/footer.php"); ?>


    <script>
            $(document).ready(function() {
                $('#customerCartTable').DataTable();
            });
    </script>
