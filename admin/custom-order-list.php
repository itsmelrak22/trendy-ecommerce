
<?php 
    include_once("./includes/header.php"); 

    spl_autoload_register(function ($class) {
        include '../models/' . $class . '.php';
    });

    $order = new CustomizeOrder;
    $orders = $order->getCustomerCustomOrders();

    // displayDataTest($orders);
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
                                            // displayDataTest($jsonData);
                                            
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
        <div class="modal" tabindex="-1" id="viewCustomOrder">
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
                        <div class="input-group">
                            <input type="text" name="email" id="email" class="form-control bg-light border-0 small" placeholder="Customer Email" aria-label="Customer Email" aria-describedby="basic-addon2" required readonly>
                        </div>
                        <br>
                        <div class="input-group">
                            <input type="number" name="total_price" id="total_price" class="form-control bg-light border-0 small" placeholder="Total Price" aria-label="Total Price" aria-describedby="basic-addon2" required>
                        </div>
                        <br>
                        <select class="form-control bg-light border-0 small" name="status" id="status" placeholder="Select Status " required>
                            <option value="" disabled selected>Select Status</option>
                            <option value="Confirmed">Confirmed</option>
                            <option value="Processing">Processing</option>
                            <option value="Shipped">Shipped</option>
                            <option value="Delivered">Delivered</option>
                            <option value="Canceled">Canceled</option>
                        </select>

                        <br>
                        <div class="input-group">
                            <textarea name="remarks" id="remarks" class="form-control bg-light border-0 small" placeholder="Remarks" row="30" col="30"></textarea>
                        </div>
                        <br>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="send_email" name="send_email">
                            <label class="form-check-label font-weight-bold text-primary" for="send_email">
                                Send Email?
                            </label>
                        </div>
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
</script>

<script>

    $('#viewCustomOrder').on('hidden.bs.modal', function () {
        // Clear the contents of the text object containers
        let frontCanvasTextObjects = document.getElementById('front_canvas_text_objects');
        let backCanvasTextObjects = document.getElementById('back_canvas_text_objects');
        frontCanvasTextObjects.innerHTML = '';
        backCanvasTextObjects.innerHTML = '';
    });
    function viewData(cart){
        console.log('cart', cart)
        let jsonData = JSON.parse(cart.json_data);
        $('#viewCustomOrder').modal('show');

        let id = document.getElementById('id');
        let customerId = document.getElementById('customer_id');
        let email = document.getElementById('email');
        let status = document.getElementById('status');
        let total_price = document.getElementById('total_price');
        let remarks = document.getElementById('remarks');

        customerId.value = cart.customer_id;
        email.value = cart.email;
        id.value = cart.id;

        if(cart.status){
            status.value = cart.status
        }
        if(cart.total_price){
            total_price.value = cart.total_price
        }
        if(cart.remarks){
            remarks.value = cart.remarks
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