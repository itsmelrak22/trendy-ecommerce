
<?php 
    include_once("./includes/header.php"); 

    spl_autoload_register(function ($class) {
        include '../models/' . $class . '.php';
    });

    $order = new CustomizeOrder;
    $orders = $order->getCustomerCustomOrders();

    // displayDataTest($orders[ count($orders) - 1 ]);
?>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php include_once("./includes/sidebar.php"); ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    <!-- <form
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                                aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form> -->

                    <?php include_once("./includes/topbar-nav.php"); ?>


                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">Custom Order Page</h1>
                    <hr>
                        <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Order List</h6>
                            
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="cartTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Order ID </th>
                                            <th>Customer Email </th>
                                            <th>Status </th>
                                            <th>Date Ordered</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Order ID </th>
                                            <th>Customer Email </th>
                                            <th>Status </th>
                                            <th>Date Ordered</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php foreach ($orders as $key => $cart) { 
                                            $jsonData = json_encode($cart);
                                        ?>
                                            
                                            <tr>
                                                <td> <?= $cart['id'] ?> </td>
                                                <td> <?= $cart['email'] ?> </td>
                                                <td> <?= $cart['status'] ? $cart['status'] : 'For Checking' ?> </td>
                                                <td> <?= $cart['created_at'] ?> </td>
                                                <td>
                                                    <form action="order-delete.php" method="POST">
                                                        <button type="button" class="btn btn-primary btn-circle btn-icon-split btn-sm" onclick='viewData(<?= $jsonData ?>)'>
                                                            <span class="icon text-white-50" data-toggle="tooltip" data-placement="top" title="View Order">
                                                                <i class="bi bi-stack"></i>
                                                            </span>
                                                        </button>
                                                        <input type="hidden" name="id" value="<?=$cart['id']?>">
                                                        <!-- <button type="submit" name="delete-cart" class="btn btn-danger btn-circle btn-sm" data-toggle="tooltip" data-placement="top" title="Delete" value="submit">
                                                            <i class="fas fa-trash"></i>
                                                        </button> -->
                                                    </form>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Trendy Dress Shop</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.php">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- MODALS -->
    <form method="POST" action="custom-order-update.php">
        <div class="modal " tabindex="-1" id="viewCustomOrder">
            <div class="modal-dialog modal-xl modal-dialog-centered">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title font-weight-bold text-primary">View Custom Order</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="" id="viewOrderCard">
                        <br>
                        <input type="hidden" name="customer_id" id="customer_id">
                        <input type="hidden" name="id" id="id">
                        <div class="input-group row">
                            <div class="col-6">
                                <label for="email">CUSTOMER EMAIL:</label>
                                <input type="text" name="email" id="email" class="form-control bg-light border-0 small" placeholder="Customer Email" aria-label="Customer Email" aria-describedby="basic-addon2" required readonly>
                            </div>
                            <div class="col-6">
                                <label for="status">STATUS:</label>
                                <select class="form-control bg-light border-0 small" name="status" id="status" placeholder="Select Status " required>
                                    <option value="" disabled selected>Select Status</option>
                                    <option value="Confirmed">Confirmed</option>
                                    <option value="Processing">Processing</option>
                                    <option value="Shipped">Shipped</option>
                                    <option value="Delivered">Delivered</option>
                                    <option value="Canceled">Canceled</option>
                                </select>
                            </div>
                        </div>
                        <br>
                        <div class="input-group row">
                            <div class="col-4">
                                <label for="shirt_selected">SHIRT SELECTED:</label>
                                <input type="text" 
                                name="shirt_selected" 
                                id="shirt_selected" 
                                class="form-control bg-light border-0 small" 
                                placeholder="Shirt Selected" 
                                aria-label="Shirt Selected" 
                                aria-describedby="basic-addon2" 
                                required 
                                readonly
                                >
                            </div>
                            <div class="col-4">
                                <label for="shirt_selected">Customization Method:</label>
                                <input type="text" 
                                name="customize_by" 
                                id="customize_by" 
                                class="form-control bg-light border-0 small" 
                                placeholder="Customized By" 
                                aria-label="Customized By" 
                                aria-describedby="basic-addon2" 
                                required 
                                readonly
                                >
                            </div>
                            <div class="col-4">
                                <label for="shirt_selected">SIZE:</label>
                                <input type="text" 
                                name="sizing" 
                                id="sizing" 
                                class="form-control bg-light border-0 small" 
                                placeholder="Size" 
                                aria-label="Size" 
                                aria-describedby="basic-addon2" 
                                required 
                                readonly
                                >
                            </div>
                        </div>
                        <br>
                        <div class="input-group row">
                            <div class="col-12">
                                <label for="remarks">REMARKS:</label>
                                <textarea name="remarks" id="remarks" class="form-control bg-light border-0 small" placeholder="Remarks" row="30" col="30"></textarea>
                            </div>
                            <br>
                            <br>
                            <div class="form-check col-12 mx-4">
                                <input class="form-check-input" type="checkbox" value="" id="send_email" name="send_email">
                                <label class="form-check-label font-weight-bold text-primary" for="send_email">
                                    Send Email?
                                </label>
                            </div>
                        </div>
                        
                        <hr>
                        <div class="input-group" style="
                                display: flex !important;
                                justify-content: center !important;
                            ">
                            <div class="my-2" style="width: 500px;">
                                <div class="card border shadow-none">
                                    <div class="card-header bg-transparent border-bottom">
                                        <h5 class="font-size-16 mb-0">Order Summary 
                                        <!-- <span class="float-end">#MN0124</span> -->
                                        </h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table mb-0" id="updateTable">
                                                <tbody id="updateTableBody" class="mt-3">
                                                    
                                                    <!-- <tr>
                                                        <td>Shirt Price:&nbsp ₱ </td>
                                                        <td class="text-end">
                                                            <input type="text" 
                                                                        name="shirt_price" 
                                                                        id="shirt_price" 
                                                                        class="form-control bg-light border-0 small" 
                                                                        placeholder="" 
                                                                        aria-label="" 
                                                                        aria-describedby="basic-addon2" 
                                                                        required 
                                                                        readonly
                                                                        >
                                                        </td>
                                                    </tr> -->
                                                    <tr>
                                                        <td>Customize Size (<span id="cutomize_sizing"></span>):&nbsp ₱ </td>
                                                        <td class="text-end">
                                                            <input type="text" 
                                                                        name="price" 
                                                                        id="price" 
                                                                        class="form-control bg-light border-0 small" 
                                                                        placeholder="" 
                                                                        aria-label="" 
                                                                        aria-describedby="basic-addon2" 
                                                                        required 
                                                                        readonly
                                                                        >
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Shipping Fee:&nbsp ₱</td>
                                                        <td class="text-end">
                                                            <div class="input-group">
                                                                <input type="text" 
                                                                        name="shipping_fee" 
                                                                        id="shipping_fee" 
                                                                        class="form-control bg-light border-0 small" 
                                                                        placeholder="Input Shipping Fee Cost" 
                                                                        aria-label="Shipping Fee" 
                                                                        aria-describedby="basic-addon2" 
                                                                        required 
                                                                        >
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                                <tfoot>
                                                <tr class="bg-light">
                                                        <th>Total:&nbsp ₱</th>
                                                        <td class="text-end">
                                                            <span class="fw-bold">
                                                                <div class="input-group">
                                                                    <input type="number" 
                                                                            name="total_price" 
                                                                            id="total_price" 
                                                                            class="form-control bg-light border-0 small" 
                                                                            placeholder="Total Price" 
                                                                            aria-label="Total Price" 
                                                                            aria-describedby="basic-addon2" 
                                                                            required 
                                                                            readonly
                                                                    >
                                                                </div>
                                                            </span>
                                                        </td>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        
                        <br>
                        <div style="display: flex; justify-content: space-between;">
                            <div style="flex: 1; text-align: center; vertical-align: middle;">
                                <label for="front_canvas_image">Front Canvas Image</label>
                                <div>
                                    <img id="front_canvas_image" style="max-width: 150px !important; max-height: 150px !important;" src="<?= $img_link ?>" alt="..." />
                                </div>
                                <hr>
                                <label for="front_canvas_image_objects">Front Canvas Customize Images;</label>
                                <div id="front_canvas_image_objects"></div>
                                <hr>
                                <label for="front_canvas_text_objects">Front Canvas Customize Texts:</label>
                                <div id="front_canvas_text_objects"></div>
                            </div>

                            <div style="flex: 1; text-align: center; vertical-align: middle;">
                                <label for="back_canvas_image">Back Canvas Image</label>
                                <div>
                                <img id="back_canvas_image" style="max-width: 150px !important; max-height: 150px !important; " src="<?= $img_link ?>" alt="..." />
                                </div>
                                <hr>
                                <label for="back_canvas_image_objects">Back Canvas Customize Images;</label>
                                <div id="back_canvas_image_objects"></div>
                                <hr>
                                <label for="back_canvas_text_objects">Back Canvas Customize Texts:</label>
                                <div id="back_canvas_text_objects"></div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-primary" name="custom-edit-order-detail" value="Submit">
                </div>
                </div>
            </div>
        </div>
    </form>

    <?php include_once("./includes/scripts.php"); ?>
<?php include_once("./includes/footer.php"); ?>

<script>
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    })


    $('#viewCustomOrder').on('shown.bs.modal', function () {
        $('#viewCustomOrder').trigger('focus')
    })

    $(document).ready(function() {
        $('#productTable').DataTable();
    });

    $(document).ready(function() {
        $('#cartTable').DataTable();
    });
</script>

<script>

    document.getElementById('shipping_fee').addEventListener('input', function (e) {
        let value = e.target.value;
        let numValue = Number(value);
        let shipping_fee = 0;
        let total = 0;
        let total_price = document.getElementById('total_price'); 
        total_price.value = total;

        // Check if the value is a number and greater than 1
        if (isNaN(numValue) || numValue <= 0) {
            // If not, clear the input
            e.target.value = '';
            shipping_fee = 0;
            total_price.value = total;

            return
        }

        // Assuming your table has an id 'myTable'
        let table = document.getElementById('updateTable');

        // Get all input elements within the table
        let inputs = table.querySelectorAll('input');

        // Now you can loop over the inputs array to get each input element
        for(let i = 0; i < inputs.length; i++) {
            total += (+inputs[i].value);
            console.log('total', total)
        }

        total_price.value = total;


    });


    $('#viewCustomOrder').on('hidden.bs.modal', function () {
        // Clear the contents of the text object containers
        let frontCanvasTextObjects = document.getElementById('front_canvas_text_objects');
        let backCanvasTextObjects = document.getElementById('back_canvas_text_objects');
        frontCanvasTextObjects.innerHTML = '';
        backCanvasTextObjects.innerHTML = '';

        let frontCanvasImageObjects = document.getElementById('front_canvas_image_objects');
        let backCanvasImageObjects = document.getElementById('back_canvas_image_objects');
        frontCanvasImageObjects.innerHTML = '';
        backCanvasImageObjects.innerHTML = '';

        $('tr.addedSize').remove();
    });

    function viewData(cart){
        console.log('cart', cart)
        jsonData = JSON.parse(cart.json_data);
        console.log('jsonData', jsonData)
        $('#viewCustomOrder').modal('show');

        let id = document.getElementById('id');
        let customerId = document.getElementById('customer_id');
        let email = document.getElementById('email');
        let status = document.getElementById('status');
        let total_price = document.getElementById('total_price');
        let remarks = document.getElementById('remarks');
        let shirt_selected = document.getElementById('shirt_selected');
        // let shirt_price = document.getElementById('shirt_price');
        let customize_by = document.getElementById('customize_by');
        let sizing = document.getElementById('sizing');
        let cutomize_sizing = document.getElementById('cutomize_sizing');
        let price = document.getElementById('price');
        let shipping_fee = document.getElementById('shipping_fee');

        for (const key in jsonData.sizes_ordered) {
            if (Object.hasOwnProperty.call(jsonData.sizes_ordered, key)) {
                const element = jsonData.sizes_ordered[key];

                // Assuming you have a reference to the table or tbody
                var table = document.getElementById('updateTableBody');

                // Create new row and cells
                var row = document.createElement('tr');
                var cell1 = document.createElement('td');
                var cell2 = document.createElement('td');
                var div = document.createElement('div');
                var input = document.createElement('input');


                let sizeText = {
                    "s" : "SMALL",
                    "m" : "MEDIUM",
                    "l" : "LARGE",
                    "xl" : "EXTRA LARGE",
                    "xxl" : "2 EXTRA LARGE",
                }

                // Set cell1 text
                cell1.className = '';
                cell1.innerHTML = `<span><strong>${sizeText[key]}</strong>: ${jsonData.sizes_ordered[key]} x ₱${jsonData.price} </span>`;

                // Set div attributes
                div.className = 'input-group';

                // Set input attributes
                input.type = 'text';
                input.name = `total_sizes_ordered_${key}`;
                input.id = `total_sizes_ordered_${key}`;
                input.className = 'form-control bg-light border-0 small';
                input.placeholder = '0';
                input.setAttribute('aria-label', '0');
                input.setAttribute('aria-describedby', 'basic-addon2');
                input.required = true;
                input.readOnly = true;
                input.value = (jsonData.sizes_ordered[key] * jsonData.price);

                row.className = 'addedSize'

                // Append everything
                div.appendChild(input);
                cell2.appendChild(div);
                row.appendChild(cell1);
                row.appendChild(cell2);
                table.appendChild(row);
            }
        }
        
        customerId.value = cart.customer_id;
        email.value = cart.email;
        id.value = cart.id;

        if(cart.status){
            status.value = cart.status
        }
        if(cart.shipping_fee){
            shipping_fee.value = cart.shipping_fee
            shipping_fee.readOnly = true
        }
        if(cart.total_price){
            total_price.value = cart.total_price
        }
        if(cart.remarks){
            remarks.value = cart.remarks
        }
        if(jsonData.shirt_selected){
            shirt_selected.value = jsonData.shirt_selected
        }
        // if(jsonData.shirt_price){
        //     shirt_price.value = jsonData.shirt_price
        // }
        if(jsonData.customize_by){
            customize_by.value = jsonData.customize_by
        }
        if(jsonData.sizing){
            sizing.value = jsonData.sizing
            cutomize_sizing.textContent = jsonData.sizing
        }
        if(jsonData.price){
            price.value = jsonData.price
        }
        

        // Use the DOM's getElementById method to get references to the elements
        let frontCanvasImage = document.getElementById('front_canvas_image');
        let frontCanvasImageObjects = document.getElementById('front_canvas_image_objects');
        let frontCanvasTextObjects = document.getElementById('front_canvas_text_objects');

        let backCanvasImage = document.getElementById('back_canvas_image');
        let backCanvasImageObjects = document.getElementById('back_canvas_image_objects');
        let backCanvasTextObjects = document.getElementById('back_canvas_text_objects');

        // Update the src attribute of the image elements
        frontCanvasImage.src = `../designer/customize/${jsonData.front_canvas_image}`;
        backCanvasImage.src = `../designer/customize/${jsonData.back_canvas_image}`;

        // For the image objects, you'll need to create new img elements for each one
        jsonData.front_canvas_image_objects.forEach(function(image) {
            let img = document.createElement('img');
            img.src = `../designer/customize/${image}`;
            img.style.maxHeight = '150px';
            img.style.maxWidth = '150px';
            frontCanvasImageObjects.appendChild(img);
        });

        jsonData.back_canvas_image_objects.forEach(function(image) {
            let img = document.createElement('img');
            img.src = `../designer/customize/${image}`;
            img.style.maxHeight = '150px';
            img.style.maxWidth = '150px';
            backCanvasImageObjects.appendChild(img);
        });

        // For the text objects, you can create new div elements and set their innerText
        jsonData.front_canvas_text_objects.forEach(function(textObject) {
            let div = document.createElement('div');
            div.innerText = textObject.value;
            frontCanvasTextObjects.appendChild(div);
        });

        jsonData.back_canvas_text_objects.forEach(function(textObject) {
            let div = document.createElement('div');
            div.innerText = textObject.value;
            backCanvasTextObjects.appendChild(div);
        });
    }


</script>