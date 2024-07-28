

<div class="row container" id="cart-item-container" >
        <div class=" card col-md-8 mt-2" >
        <?php if( isset($cartItems) ){?>
        <form id="checkout-form">

            <input class="form-check-input" type="checkbox" onClick="toggle(this)" /> Select All

            <div class="card-text" style="height: 74vh ; overflow-y:auto !important; overflow:auto;">


                <?php foreach ($cartItems as $key => $cart) { ?>
        
                    <?php 
                        $img_link = getImageLink($cart['image']);  
                        generateCartCards($cart, $key, $img_link);
                        $shouldBeChecked = isset($_SESSION['buy_now_cart_id']) && $_SESSION['buy_now_cart_id'] == $cart['id'];
                        $cartID = $cart['id'];
                        echo "
                            <script>
                                $(document).ready(function() {
                                    " . ($shouldBeChecked ? "document.getElementById('cart-$cartID').click();" : "") . "
                                });
                            </script>
                        ";

                    ?>
                    <div>
                        <input type="hidden" name="product_id" value="<?= $cart['product_id'] ?>">
                        <input type="hidden" name="color_id" value="<?= $cart['color_id'] ?>">
                        <input type="hidden" name="cart_id" value="<?= $cart['id'] ?>">
                    </div>

            <?php }?>

            </div>
            <input type="hidden" name="client_id" value="<?=$client_id?>">
            </div>
        <div class="col-md-4 mt-2">
            <div class="mt-5 mt-lg-0">
                <div class="card border shadow-none">
                    <div class="card-header bg-transparent border-bottom py-3 px-4">
                        <h5 class="font-size-16 mb-0">Order Summary 
                        <!-- <span class="float-end">#MN0124</span> -->
                        </h5>
                    </div>
                    <div class="card-body p-4 pt-2">

                        <div class="table-responsive">
                            <table class="table mb-0">
                                <tbody>
                                    <tr>
                                        <td>Mode of payment :</td>
                                        <td>
                                        <select class="form-control form-control-sm" id="mop" name="mop" placeholder="col-form-label-sm" required oninput="calculateSubtotal()">
                                            <option selected disabled readonly>Please select...</option>
                                            <option value="cod">Cash on Delivery</option>
                                            <option value="online">Online Payment</option>
                                        </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Item Total : </td>
                                        <td class="text-end">₱  <span id="itemTotal">0.00</span></td>
                                    </tr>
                                    <tr>
                                        <td>Shipping Fee : <span id="islandGroupInfo"></span></td>
                                        <td class="text-end">₱ <span id="shippingFee">0.00</span></td>
                                    </tr>
                                
                                    <tr class="bg-light">
                                        <th>Total :</th>
                                        <td class="text-end">
                                            <span class="fw-bold"> ₱ 
                                                <span id="subtotal">0.00</span>
                                            </span>
                                        </td>
                                    </tr>

                                   

                                </tbody>
                            </table>
                            <div class="card-body">
                                <div class="row mt-3">
                                    <input type="hidden" name="subtotal" id="hiddenSubtotal">
                                    <!-- <button class="btn btn-outline-dark flex-shrink-0 mt-3" type="submit" id="checkout-btn" disabled>Checkout</button> -->
                                    <button class="btn btn-outline-dark flex-shrink-0 mt-3" id="checkout-btn" type="button" disabled data-bs-toggle="modal" data-bs-target="#confirmCheckout">Checkout</button>
                                </div>
                            </div>
                        </div>
                        <!-- end table-responsive -->
                    </div>
                </div>
            </div>

            <!-- Modal -->
                <div class="modal fade" id="confirmCheckout" tabindex="-1" aria-labelledby="confirmCheckoutLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="confirmCheckoutLabel">Order Confirmation </h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row mt-3">
                            <div class="row mx-3">Are you sure you want to purchase the item?</div>
                            <div class="row" id="paypalContainer" style="display: none;">
                                <div class="col-lg-12">
                                    <div class="p-5">
                                        <form class="user">
                                            <div class="form-group row">
                                                <div class="form-group col-12">
                                                    <label for="paymentInput">Yout Amount to be paid:</label>
                                                    <input name="payment" id="paymentInput" type="text" class="form-control form-control-user" placeholder="Payment" required readonly>
                                                </div>
                                            </div>
                                        </form>
                                        <hr>
                                    </div>
                                    <div class="card-body container-fluid" id="paypalDiv">
                                        <span>Available Payment Methods:</span>
                                        <hr>
                                        <div class="form-group col-12">
                                            <div class="paypal-button-container" id="paypal-button-container"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" onClick="proceedCheckOut()">Close</button>
                        <input type="button" class="btn btn-primary" value="Proceeed" onClick="proceedCheckOut(true)">
                    </div>
                    </div>
                </div>
                </div>

        </div>
        </form>
        <?php } else{ ?>
            <div style="height: 60vh"></div>
        <?php } ?>
    </div>
</div>


<script>


    let transaction = {};

    paypal.Buttons({
        style: {
            layout: 'vertical',
            color:  'blue',
            shape:  'rect',
            label:  'paypal'
        },
        createOrder: function(data, actions) {
            // Set up the transaction
            let value = document.getElementById('hiddenSubtotal').value;
            
            return actions.order.create({
                purchase_units: [{
                amount: {
                    value:value

                }
                }]
            });
        },
        // onApprove: function(data, actions) {
        //     // This function captures the funds from the transaction.
        //     return actions.order.capture().then(function(details) {
        //     // This function shows a transaction success message to your buyer.
        //         alert('Transaction completed by ' + details.payer.name.given_name);
        //     });
        // }
        onApprove: function(data, actions) {
            console.log('data', data)
            console.log('actions', actions)
            // This function captures the funds from the transaction.
            return actions.order.capture().then(function(details) {
            // This function shows a transaction success message to your buyer.

                proceedPaidCheckOut(true, details);
            });
        }
    }).render('#paypal-button-container');

    function checkOption(){
        let option = document.getElementById('orderOption');
        let paypalContainer = document.getElementById('paypalContainer');
        console.log(option.value);
        if (option.value == 2){
            paypalContainer.style.display = "block";
        }else{
            paypalContainer.style.display = "none";

        }
    }

    function togglePaypalDiv(show, subtotal = 0){
        let paypalContainer = document.getElementById('paypalContainer');
        if(show && subtotal){
            const subtotal = document.getElementById('hiddenSubtotal').value;
            const paymentInput = document.getElementById('paymentInput');
            paymentInput.value = 0;
            paymentInput.value = subtotal;

            console.log('paymentInput.value', paymentInput.value)
            console.log('subtotal', subtotal)

            paypalContainer.style.display = "block";
        }else{
            paypalContainer.style.display = "none";
        }
    }
</script>

<script>



    document.querySelector('#checkout-form').addEventListener('submit', function(e) {
        // Prevent the default form submission
        e.preventDefault();

        // Create a new FormData object
        let formData = new FormData(e.target);

        let checkboxes = document.getElementsByName('cartCheckbox');
        let quantities = document.getElementsByName('quantity');
        let prices = document.getElementsByName('price');
        let product_ids = document.getElementsByName('product_id');
        let color_ids = document.getElementsByName('color_id');
        let cart_ids = document.getElementsByName('cart_id');
        const checkoutOrders = [];


        checkboxes.forEach((element, key) => {
            if (element.checked) {
                const productId = product_ids[key].value
                const colorId = color_ids[key].value
                const cartId = cart_ids[key].value

                checkoutOrders.push({
                    id: element.id,
                    product_id: productId,
                    cart_id: cartId,
                    color_id: colorId,
                    quantity: quantities[key].value,
                    price: prices[key].innerHTML,
                    subtotal: quantities[key].value * prices[key].innerHTML,
                })
            }
        });
    

        // Iterate over the checkoutOrders array and append each item to the FormData
        checkoutOrders.forEach((item, index) => {
            for (var key in item) {
                formData.append(`checkoutOrders[${index}][${key}]`, item[key]);
            }
        });

        // Use fetch or XMLHttpRequest to send the form data
        fetch('customer-checkout.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if(data.status == 200){
                alert("Succesfully Checked out.");
                window.location.href = "customer-cart.php";
            }else{
                alert(data.message);
                window.location.href = "customer-cart.php";
            }
        })
        .catch((error) => {
            console.error('Error:', error);
        });
    });

    
    function proceedCheckOut(bool){
        if(bool){
            let form =  document.querySelector('#checkout-form');
            let event = new Event('submit');
            form.dispatchEvent(event);
        }
    }

    function proceedPaidCheckOut(bool, details){
        if(bool){
            let form =  document.querySelector('#checkout-form');
            let formData = new FormData(form);
            let payer = `${details.payer.name.given_name} ${details.payer.name.surname}`
            let id = details.id;
            let status = details.status;

            const paymentInfo = [ 
                { "payment_status" : status },
                { "payment_id" : id },
                { "payer" : payer },
               ]

            // Append the data to the form
            formData.append('payment_status', status);
            formData.append('payment_id', id);
            formData.append('payer', payer);

            paymentInfo.forEach( (el, key) => {
                let input = document.createElement('input');
                input.type = 'hidden';
                input.name = Object.keys(el)[0];
                input.value = el[input.name];

                form.appendChild(input)
            });

            let event = new Event('submit');
            form.dispatchEvent(event);
        }
    }



    function toggle(source) {
        checkboxes = document.getElementsByName('cartCheckbox');
        for(var i=0, n=checkboxes.length;i<n;i++) {
            checkboxes[i].checked = source.checked;
        }
        calculateSubtotal();
    }

    function updateQuantity(input, price, total, key) {
        if (input.value < 1) input.value = 1;
        total.innerHTML = price * input.value;
        calculateSubtotal();
        updateSpecificTotal(key)
        
    }

    function updateSpecificTotal(key){
        const totalId = `total-id-${key}`;
        const priceId = `price-id-${key}`;
        const quantityId = `quantity-id-${key}`;

        let totalText = document.getElementById(totalId);
        let priceText = document.getElementById(priceId);
        let quantityText = document.getElementById(quantityId).value;
        totalText.innerHTML = Number(+priceText.innerHTML * quantityText).toFixed(2) ;
    }

    function calculateSubtotal() {
        console.log(userDetails)
        
        if( !userDetails.island_group ||  
            !userDetails.province ||
            !userDetails.city_municipality ||
            !userDetails.barangay ||
            !userDetails.complete_address ||
            !userDetails.email 
        ){
            alert("Please complete your profile details first.")
            return;
        }

        let checkboxes = document.getElementsByName('cartCheckbox');
        let quantities = document.getElementsByName('quantity');
        let prices = document.getElementsByName('price');
        let subtotal = 0.00;
        let itemTotal = 0.00;
        let hiddenInput = document.getElementById('hiddenSubtotal');

        let mop = document.getElementById('mop');
        let shippingfee = 0.00

        for(let i=0, n=checkboxes.length;i<n;i++) {
            if (checkboxes[i].checked) {
                itemTotal += quantities[i].value * prices[i].innerHTML;
            }
        }

        document.getElementById('itemTotal').innerHTML = Number(itemTotal).toFixed(2);
        document.getElementById('islandGroupInfo').innerText = `( ${userDetails.island_group} )`;

        if( userDetails.island_group == 'luzon' ){
            shippingfee = 150;
        }else if ( userDetails.island_group == 'visayas' ){
            shippingfee = 250;
        }else if ( userDetails.island_group == 'mindanao' ){
            shippingfee = 350;
        }

        if( mop.value == 'cod' ){ 
            togglePaypalDiv(false, 0)
        }else if (mop.value == "online"){
            togglePaypalDiv(true, Number(itemTotal).toFixed(2))
        }

        subtotal = Number(eval(itemTotal + shippingfee)).toFixed(2);
        document.getElementById('shippingFee').innerHTML = Number(shippingfee).toFixed(2);
        document.getElementById('subtotal').innerHTML = Number(subtotal).toFixed(2);
        hiddenInput.value = Number(subtotal).toFixed(2);

        if((Number(subtotal) && itemTotal) && hasSelectedModeOfPayment()){
            document.getElementById('checkout-btn').disabled = false;
        }else{
            document.getElementById('checkout-btn').disabled = true;
        }
    }

    function hasSelectedModeOfPayment(){
        const mop = document.getElementById('mop');
        if(mop.value == 'cod' || mop.value == 'online') return true;
        return false
    }

</script>


