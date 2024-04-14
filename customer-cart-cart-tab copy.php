
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
                        <div class="mb-3">
                            <div class="col">Mode of payment:</div>
                            <div class="col">
                                <select class="form-control form-control-sm" id="mop" name="mop" placeholder="col-form-label-sm" required oninput="calculateSubtotal()">
                                    <option selected disabled readonly>Please select...</option>
                                    <option value="cod">Cash on Delivery</option>
                                    <option value="online">Online Payment</option>
                                </select>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col">Item Total:</div>
                            <div  class="col text-right"> <span id="itemTotal">0</span></div>
                        </div>
                        <div class="row">
                            <div class="col">Shipping Fee:</div>
                            <div  class="col text-right"> <span id="shippingFee">0</span></div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col">Sub Total:</div>
                            <div  class="col text-right"> <span id="subtotal">0</span></div>
                        </div>
                        
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

<div class="container">
    <div class="row">
        <div class="col-xl-8">
            <div class="card border shadow-none">
                <div class="card-body">

                    <div class="d-flex align-items-start border-bottom pb-3">
                        <div class="me-4">
                            <img src="https://www.bootdey.com/image/380x380/008B8B/000000" alt="" class="avatar-lg rounded">
                        </div>
                        <div class="flex-grow-1 align-self-center overflow-hidden">
                            <div>
                                <h5 class="text-truncate font-size-18"><a href="#" class="text-dark">Waterproof Mobile Phone </a></h5>
                                <p class="text-muted mb-0">
                                    <i class="bx bxs-star text-warning"></i>
                                    <i class="bx bxs-star text-warning"></i>
                                    <i class="bx bxs-star text-warning"></i>
                                    <i class="bx bxs-star text-warning"></i>
                                    <i class="bx bxs-star-half text-warning"></i>
                                </p>
                                <p class="mb-0 mt-1">Color : <span class="fw-medium">Gray</span></p>
                            </div>
                        </div>
                        <div class="flex-shrink-0 ms-2">
                            <ul class="list-inline mb-0 font-size-16">
                                <li class="list-inline-item">
                                    <a href="#" class="text-muted px-1">
                                        <i class="mdi mdi-trash-can-outline"></i>
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="#" class="text-muted px-1">
                                        <i class="mdi mdi-heart-outline"></i>
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
                                    <h5 class="mb-0 mt-2"><span class="text-muted me-2"><del class="font-size-16 fw-normal">$500</del></span>$450</h5>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="mt-3">
                                    <p class="text-muted mb-2">Quantity</p>
                                    <div class="d-inline-flex">
                                        <select class="form-select form-select-sm w-xl">
                                            <option value="1">1</option>
                                            <option value="2" selected="">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mt-3">
                                    <p class="text-muted mb-2">Total</p>
                                    <h5>$900</h5>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <!-- end card -->

            <div class="card border shadow-none">
                <div class="card-body">

                    <div class="d-flex align-items-start border-bottom pb-3">
                        <div class="me-4">
                            <img src="https://www.bootdey.com/image/380x380/FF00FF/000000" alt="" class="avatar-lg rounded">
                        </div>
                        <div class="flex-grow-1 align-self-center overflow-hidden">
                            <div>
                                <h5 class="text-truncate font-size-18"><a href="#" class="text-dark">Smartphone Dual Camera </a></h5>
                                <p class="text-muted mb-0">
                                    <i class="bx bxs-star text-warning"></i>
                                    <i class="bx bxs-star text-warning"></i>
                                    <i class="bx bxs-star text-warning"></i>
                                    <i class="bx bxs-star text-warning"></i>
                                </p>
                                <p class="mb-0 mt-1">Color : <span class="fw-medium">Green</span></p>
                            </div>
                        </div>
                        <div class="flex-shrink-0 ms-2">
                            <ul class="list-inline mb-0 font-size-16">
                                <li class="list-inline-item">
                                    <a href="#" class="text-muted px-1">
                                        <i class="mdi mdi-trash-can-outline"></i>
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="#" class="text-muted px-1">
                                        <i class="mdi mdi-heart-outline"></i>
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
                                    <h5 class="mb-0 mt-2"><span class="text-muted me-2"><del class="font-size-16 fw-normal">$280</del></span>$240</h5>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="mt-3">
                                    <p class="text-muted mb-2">Quantity</p>
                                    <div class="d-inline-flex">
                                        <select class="form-select form-select-sm w-xl">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3" selected="">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mt-3">
                                    <p class="text-muted mb-2">Total</p>
                                    <h5>$720</h5>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <!-- end card -->

            <div class="card border shadow-none">
                <div class="card-body">

                    <div class="d-flex align-items-start border-bottom pb-3">
                        <div class="me-4">
                            <img src="https://www.bootdey.com/image/380x380/FF8C00/000000" alt="" class="avatar-lg rounded">
                        </div>
                        <div class="flex-grow-1 align-self-center overflow-hidden">
                            <div>
                                <h5 class="text-truncate font-size-18"><a href="#" class="text-dark">Black Colour Smartphone </a></h5>
                                <p class="text-muted mb-0">
                                    <i class="bx bxs-star text-warning"></i>
                                    <i class="bx bxs-star text-warning"></i>
                                    <i class="bx bxs-star text-warning"></i>
                                </p>
                                <p class="mb-0 mt-1">Color : <span class="fw-medium">Blue</span></p>
                            </div>
                        </div>
                        <div class="flex-shrink-0 ms-2">
                            <ul class="list-inline mb-0 font-size-16">
                                <li class="list-inline-item">
                                    <a href="#" class="text-muted px-1">
                                        <i class="mdi mdi-trash-can-outline"></i>
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="#" class="text-muted px-1">
                                        <i class="mdi mdi-heart-outline"></i>
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
                                    <h5 class="mb-0 mt-2"><span class="text-muted me-2"><del class="font-size-16 fw-normal">$750</del></span>$950</h5>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="mt-3">
                                    <p class="text-muted mb-2">Quantity</p>
                                    <div class="d-inline-flex">
                                        <select class="form-select form-select-sm w-xl">
                                            <option value="1" selected="">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mt-3">
                                    <p class="text-muted mb-2">Total</p>
                                    <h5>$950</h5>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <!-- end card -->

            <div class="row my-4">
                <div class="col-sm-6">
                    <a href="ecommerce-products.html" class="btn btn-link text-muted">
                        <i class="mdi mdi-arrow-left me-1"></i> Continue Shopping </a>
                </div> <!-- end col -->
                <div class="col-sm-6">
                    <div class="text-sm-end mt-2 mt-sm-0">
                        <a href="ecommerce-checkout.html" class="btn btn-success">
                            <i class="mdi mdi-cart-outline me-1"></i> Checkout </a>
                    </div>
                </div> <!-- end col -->
            </div> <!-- end row-->
        </div>

        <div class="col-xl-4">
            <div class="mt-5 mt-lg-0">
                <div class="card border shadow-none">
                    <div class="card-header bg-transparent border-bottom py-3 px-4">
                        <h5 class="font-size-16 mb-0">Order Summary <span class="float-end">#MN0124</span></h5>
                    </div>
                    <div class="card-body p-4 pt-2">

                        <div class="table-responsive">
                            <table class="table mb-0">
                                <tbody>
                                    <tr>
                                        <td>Sub Total :</td>
                                        <td class="text-end">$ 780</td>
                                    </tr>
                                    <tr>
                                        <td>Discount : </td>
                                        <td class="text-end">- $ 78</td>
                                    </tr>
                                    <tr>
                                        <td>Shipping Charge :</td>
                                        <td class="text-end">$ 25</td>
                                    </tr>
                                    <tr>
                                        <td>Estimated Tax : </td>
                                        <td class="text-end">$ 18.20</td>
                                    </tr>
                                    <tr class="bg-light">
                                        <th>Total :</th>
                                        <td class="text-end">
                                            <span class="fw-bold">
                                                $ 745.2
                                            </span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- end table-responsive -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end row -->
    
</div>