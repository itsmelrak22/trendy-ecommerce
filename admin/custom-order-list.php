
<?php 
    // Read and decode JSON files
    $barangaysJson = file_get_contents('barangays.json');
    $citiesMunicipalitiesJson = file_get_contents('citiesMunicipalities.json');
    $provincesJson = file_get_contents('provinces.json');

    $barangaysArray = json_decode($barangaysJson, true);
    $citiesMunicipalitiesArray = json_decode($citiesMunicipalitiesJson, true);
    $provincesArray = json_decode($provincesJson, true);

    // Check if the decoding was successful
    if (json_last_error() !== JSON_ERROR_NONE) {
        die('Error decoding JSON data: ' . json_last_error_msg());
    }

    function findNameByCode($array, $code) {
        foreach ($array as $item) {
            if ($item['code'] === $code) {
                return $item['name'];
            }
        }
        return null; // Return null if code is not found
    }

    include_once("./includes/header.php"); 

    spl_autoload_register(function ($class) {
        include '../models/' . $class . '.php';
    });

    $order = new CustomizeOrder;
    $orders = $order->getCustomerCustomOrders();
    $ungrouped_data = [];

    // Define the desired order of statuses
    $status_order = ['For Approval','Confirmed', 'Processing', 'Shipped', 'Delivered', 'Cancelled'];

    foreach ($orders as $order) {
        if($order['status'] == '' || $order['status'] == null){
            $cart_status = "For Approval";
        }else{
            $cart_status = $order['status'];
        }
        if (!isset($ungrouped_data[$cart_status])) {
            $ungrouped_data[$cart_status] = [];
        }
        $ungrouped_data[$cart_status][] = $order;
    }

    // Create a new array to hold the grouped data in the desired order
    $grouped_data = [];

    // Populate the grouped_data with the groups in the desired order
    foreach ($status_order as $status) {
        if (isset($ungrouped_data[$status])) {
            $grouped_data[$status] = $ungrouped_data[$status];
        } else {
            $grouped_data[$status] = [];
        }
    }
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

                    <?php include_once("./includes/topbar-nav.php"); ?>


                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <hr>
                        <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Customization Service Order List</h6>
                            
                        </div>
                        <div class=" card-body">
                        <style>
                                .legend-container {
                                    display: flex;
                                    flex-direction: row;
                                    align-items: center; /* Align items vertically centered */
                                }

                                .legend-container .lead {
                                    margin-right: 10px; /* Add some spacing between the text and the badges */
                                }

                                .legend-container .badge {
                                    margin-left: 5px; /* Add some spacing between the badges */
                                }

                            </style>
                            <span class="legend-container">
                                <p class="lead">Legends: </p>
                                <div <?= isset($_GET['sortBy'])  && $_GET['sortBy'] == 'For Approval' ? 'style="background-color: #5a5c69; border-radius: 5%; border: 3px solid black;"' : ''  ?>>
                                    <a href="custom-order-list.php?sortBy=For Approval">
                                        <span class="badge badge-dark">For Approval</span>
                                    </a>
                                </div>
                                <div <?= isset($_GET['sortBy'])  && $_GET['sortBy'] == 'Confirmed' ? 'style="background-color: #4e73df; border-radius: 5%; border: 3px solid black;"' : ''  ?>>
                                    <a href="custom-order-list.php?sortBy=Confirmed">
                                        <span class="badge badge-primary">Confirmed</span>
                                    </a>
                                </div>
                                <div <?= isset($_GET['sortBy'])  && $_GET['sortBy'] == 'processing' ? 'style="background-color: #36b9cc; border-radius: 5%; border: 3px solid black;"' : ''  ?>>
                                    <a href="custom-order-list.php?sortBy=processing">
                                        <span class="badge badge-info">Processing</span>
                                    </a>
                                </div>
                                <div <?= isset($_GET['sortBy'])  && $_GET['sortBy'] == 'shipped' ? 'style="background-color: #f6c23e; border-radius: 5%; border: 3px solid black;"' : ''  ?>>
                                    <a href="custom-order-list.php?sortBy=shipped">
                                        <span class="badge badge-warning">Shipped</span>
                                    </a>
                                </div>
                                <div <?= isset($_GET['sortBy'])  && $_GET['sortBy'] == 'delivered' ? 'style="background-color: #1cc88a; border-radius: 5%; border: 3px solid black;"' : ''  ?>>
                                    <a href="custom-order-list.php?sortBy=delivered">
                                        <span class="badge badge-success">Delivered</span>
                                    </a>
                                </div>
                                <div <?= isset($_GET['sortBy'])  && $_GET['sortBy'] == 'canceled' ? 'style="background-color: #e74a3b; border-radius: 5%; border: 3px solid black;"' : ''  ?>>
                                    <a href="custom-order-list.php?sortBy=canceled">
                                        <span class="badge badge-danger">Cancelled</span>
                                    </a>
                                </div>
                            </span>
                            <span class="legend-container">
                            <p class="lead">Customer Confirmation: </p>

                            <div <?= isset($_GET['sortBy'])  && $_GET['sortBy'] == 'Accepted' ? 'style="background-color: #1cc88a; border-radius: 5%; border: 3px solid black;"' : ''  ?>>
                                    <a href="custom-order-list.php?sortBy=Accepted">
                                        <span class="badge badge-success">Accepted</span>
                                    </a>
                                </div>
                                <div <?= isset($_GET['sortBy'])  && $_GET['sortBy'] == 'Declined' ? 'style="background-color: #e74a3b; border-radius: 5%; border: 3px solid black;"' : ''  ?>>
                                    <a href="custom-order-list.php?sortBy=Declined">
                                        <span class="badge badge-danger">Declined</span>
                                    </a>
                                </div>
                                <div <?= isset($_GET['sortBy'])  && $_GET['sortBy'] == 'N/A' ? 'style="background-color: #5a5c69; border-radius: 5%; border: 3px solid black;"' : ''  ?>>
                                    <a href="custom-order-list.php?sortBy=N/A">
                                        <span class="badge badge-dark">N/A</span>
                                    </a>
                                </div>
                            </span>

                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="customOrderTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Order ID </th>
                                                <th>Customer</th>
                                                <th>Email</th>
                                                <th>Phone</th>
                                                <th>Block & lot, street/subd.</th>
                                                <th>Barangay</th>
                                                <th>City / Municipality</th>
                                                <th>Province</th>
                                                <th>Confirmation </th>
                                                <th>Status </th>
                                                <th>Date Ordered</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Order ID </th>
                                                <th>Customer</th>
                                                <th>Email</th>
                                                <th>Phone</th>
                                                <th>Block & lot, street/subd.</th>
                                                <th>Barangay</th>
                                                <th>City / Municipality</th>
                                                <th>Province</th>
                                                <th>Confirmation </th>
                                                <th>Status </th>
                                                <th>Date Ordered</th>
                                                <th>Action</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            <?php foreach ($orders as $key => &$cart) { 
                                                $jsonData = json_encode($cart);
                                                $cart['status'] ? $cart['status'] : $cart['status'] = 'For Approval' 
                                                
                                            ?>
                                                
                                                <tr>
                                                    <td> <?= $cart['id'] ?> </td>
                                                    <td>
                                                        <?= $cart['first_name']. " " . $cart['last_name'] ?>
                                                    </td>
                                                    <td><?= $cart['email'] ?></td>
                                                    <td><?= $cart['phone_no'] ?></td>
                                                    <td><?= $cart['complete_address'] ? $cart['complete_address'] : 'N/A' ?></td>
                                                    <td><?= findNameByCode($barangaysArray, $cart['barangay']) ?></td>
                                                    <td><?= findNameByCode($citiesMunicipalitiesArray, $cart['city_municipality']) ?></td>
                                                    <td><?= findNameByCode($provincesArray, $cart['province']) ?></td>
                                                    <td> 
                                                        <?php
                                                            if( $cart['customer_confirmation'] == 'accept' ){
                                                                echo '<span class="badge badge-success" >
                                                                        Accepted
                                                                    </span>';
                                                                
                                                            }else if( $cart['customer_confirmation'] == 'decline' ){
                                                                echo '<span class="badge badge-danger" >
                                                                    Declined
                                                                </span>';
                                                            }else {
                                                                echo '<span class="badge badge-dark" >
                                                                    N/A
                                                                </span>';
                                                            }
                                                        ?>
                                                    </td>
                                                    <td>
                                                        
                                                        <span class="badge <?= getBadgeClass($cart['status']) ?>">
                                                            <?= $cart['status']?>
                                                        </span>
                                                    </td>
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

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>TRENDY THREADS APPAREL</span>
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
                    <a class="btn btn-primary" href="login.php?logout=yes">Logout</a>

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
                        <div class=" card container">
                            <div class="card-header bg-transparent border-bottom">
                                <h6 class="modal-title font-weight-bold text-primary">Customer Information</h6>
                            </div>
                            <div class="card-body row">
                                <div class="col-6">
                                    <label for="email">Email:</label>
                                    <input type="text" name="email" id="email" class="form-control bg-light border-0 small" placeholder="Customer Email" aria-label="Customer Email" aria-describedby="basic-addon2" required readonly>
                                </div>
                                <div class="col-6">
                                    <label for="phone_no">Contact Number:</label>
                                    <input type="text" name="phone_no" id="phone_no" class="form-control bg-light border-0 small" placeholder="Customer Email" aria-label="Customer Email" aria-describedby="basic-addon2" required readonly>
                                </div>
                                <br>
                                <div class="col-6 mt-3">
                                    <label for="province">Province:</label>
                                    <input type="text" name="province" id="province" class="form-control bg-light border-0 small" placeholder="" aria-label="" aria-describedby="basic-addon2" required readonly>
                                </div>
                                <br>
                                <div class="col-6 mt-3">
                                    <label for="city_municipality">City / Municipality:</label>
                                    <input type="text" name="city_municipality" id="city_municipality" class="form-control bg-light border-0 small" placeholder="" aria-label="CITY / MUNICIPALITY" aria-describedby="basic-addon2" required readonly>
                                </div>
                                <br>
                                <div class="col-6 mt-3">
                                    <label for="barangay">Barangay:</label>
                                    <input type="text" name="barangay" id="barangay" class="form-control bg-light border-0 small" placeholder="" aria-label="BARANGAY" aria-describedby="basic-addon2" required readonly>
                                </div>
                                <br>
                                <div class="col-6 mt-3">
                                    <label for="complete_address">Additional Orderes:</label>
                                    <input type="text" name="complete_address" id="complete_address" class="form-control bg-light border-0 small" placeholder="" aria-label="ADDITIONAL ADDRESS" aria-describedby="basic-addon2" required readonly>
                                </div>
                                <br>
                                <div class="col-6 mt-3">
                                    <label for="landmark">Landmark:</label>
                                    <input type="text" name="landmark" id="landmark" class="form-control bg-light border-0 small" placeholder="" aria-label="LANDMARK" aria-describedby="basic-addon2" required readonly>
                                </div>
                            </div>
                        </div>
                        <br>
                        <input type="hidden" name="customer_id" id="customer_id">
                        <input type="hidden" name="id" id="id">
                        <div class="card container">
                            <div class="card-header bg-transparent border-bottom">
                                <h6 class="modal-title font-weight-bold text-primary">Custom Order Details</h6>
                            </div>
                            <div class="card-body">
                                <div class=" input-group row">
                                    <div class="col-6 mt-3">
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
                                    <div class="col-6 mt-3">
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
                                    <div class="col-6 mt-3">
                                        <label for="shirt_selected">CUSTOMIZATION METHOD:</label>
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
                                    <div class="col-6 mt-3">
                                        <label for="shirt_selected">Avatar/Logo sizing:</label>
                                        <input type="text" 
                                        name="avatar_sizing" 
                                        id="avatar_sizing" 
                                        class="form-control bg-light border-0 small" 
                                        placeholder="Size" 
                                        aria-label="Size" 
                                        aria-describedby="basic-addon2" 
                                        required 
                                        readonly
                                        >
                                    </div>
                                    <div class="col-6 mt-3">
                                        <label for="shirt_selected">Text sizing:</label>
                                        <input type="text" 
                                        name="text_sizing" 
                                        id="text_sizing" 
                                        class="form-control bg-light border-0 small" 
                                        placeholder="Size" 
                                        aria-label="Size" 
                                        aria-describedby="basic-addon2" 
                                        required 
                                        readonly
                                        >
                                    </div>
                                </div>
                                <div class="input-group row  mt-3">
                                    <br>
                                    <div class="col-12">
                                        <label for="remarks">REMARKS:</label>
                                        <textarea name="remarks" id="remarks" class="form-control bg-light border-0 small" placeholder="Remarks" row="30" col="30"></textarea>
                                    </div>
                                    <br>
                                    <div class="form-check col-12 mx-4">
                                        <input class="form-check-input" type="checkbox" value="" id="send_email" name="send_email">
                                        <label class="form-check-label font-weight-bold text-primary" for="send_email">
                                            Send Email?
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                            <hr>
                        <div class="input-group row" >
                            <div class="col-6">
                                <div class="my-2" style="width: 500px;">
                                    <div class="card border shadow-none">
                                        <div class="card-header bg-transparent border-bottom">
                                                <h6 class="modal-title font-weight-bold text-primary">Order Summary</h6>
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
                                                            <td>Addtional Fee:&nbsp ₱</td>
                                                            <td class="text-end">
                                                                <div class="input-group">
                                                                    <input type="text" 
                                                                            name="additional_fee" 
                                                                            id="additional_fee" 
                                                                            class="form-control bg-light border-0 small" 
                                                                            placeholder="Input Addtional Fee Cost" 
                                                                            aria-label="Addtional Fee" 
                                                                            aria-describedby="basic-addon2" 
                                                                            
                                                                            >
                                                                </div>
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
                                                        <tr>
                                                            <td>Personalized Items Total:&nbsp ₱</td>
                                                            <td class="text-end">
                                                                <div class="input-group">
                                                                    <input type="number" 
                                                                            name="personalized_items_total" 
                                                                            id="personalized_items_total" 
                                                                            class="form-control bg-light border-0 small" 
                                                                            placeholder="0" 
                                                                            aria-label="Personalized Items Total" 
                                                                            aria-describedby="basic-addon2" 
                                                                            required 
                                                                            readonly
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
                            <div class="col-6">
                                <div class="container mt-4">
                                    <div class="card border shadow-none">
                                        <div class="card-header bg-transparent border-bottom">
                                                <h6 class="modal-title font-weight-bold text-primary">Personalized Items</h6>
                                        </div>
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table id="personalized-items-table" class="table table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>Item</th>
                                                            <th>Code</th>
                                                            <th>Color</th>
                                                            <th>Price</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <!-- Table rows will be dynamically added here -->
                                                    </tbody>
                                                </table>
                                            </div>
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

        <input type="hidden" name="estimatedPrice" id="estimatedPrice">
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
        $('#productTable').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    {
                        extend: 'csvHtml5',
                        text: 'Export CSV',
                        titleAttr: 'CSV'
                    },
                    {
                        extend: 'pdfHtml5',
                        text: 'Export PDF',
                        titleAttr: 'PDF'
                    }
                ]
            });
    });

 
</script>

<script>

    function computeTotal(e, input){
        let value = e.target.value;
        let numValue = Number(value);
        let shipping_fee = 0;
        let total = 0;
        let total_price = document.getElementById('total_price'); 
        let personalized_items_total = document.getElementById('personalized_items_total'); 

        const previous_value = total_price.value;
        total_price.value = total;

        // Check if the value is a number and greater than 1
        if (isNaN(numValue) || numValue < 0) {
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

        
        total_price.value = eval(total + +personalized_items_total.value);

    }

    document.getElementById('shipping_fee').addEventListener('input', function (e) {
        computeTotal(e, 'shipping_fee')
    });
    document.getElementById('additional_fee').addEventListener('input', function (e) {
        computeTotal(e, 'additional_fee')
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

    // Function to create and populate the table
    function createTable(personalizedItems) {
        // Get the table body element
        let tableBody = document.querySelector('#personalized-items-table tbody');

        // Clear existing table rows if any
        tableBody.innerHTML = '';

        // Loop through the personalizedItems object
        for (let key in personalizedItems) {
            if (personalizedItems.hasOwnProperty(key)) {
                let item = personalizedItems[key];

                // Extract the item name from the key (e.g., "collar", "sleeve right", etc.)
                let itemName = key.substring(2, key.indexOf('_value')).replace(/_/g, ' ');
                itemName = itemName.charAt(0).toUpperCase() + itemName.slice(1); // Convert to sentence case

                // Create a new row
                let row = document.createElement('tr');

                // Create cell for item name
                let itemCell = document.createElement('td');
                itemCell.textContent = itemName;
                row.appendChild(itemCell);

                // Create cell for color code
                let colorCodeCell = document.createElement('td');
                colorCodeCell.textContent = item.color;
                row.appendChild(colorCodeCell);

                // Create cell for color
                let colorCell = document.createElement('td');
                colorCell.style.backgroundColor = item.color;
                row.appendChild(colorCell);

                // Create cell for price
                let priceCell = document.createElement('td');
                priceCell.textContent = '₱' + item.price;
                row.appendChild(priceCell);

                // Append row to the table body
                tableBody.appendChild(row);
            }
        }
    }

    // Function to remove the table
    function removeTable() {
        // Get the table body element
        let tableBody = document.querySelector('#personalized-items-table tbody');

        // Clear the table body
        tableBody.innerHTML = '';
    }

    const BARANGAY_LIST = <?= json_encode($barangaysArray) ?>;
    const CITY_MUNI_LIST = <?= json_encode($citiesMunicipalitiesArray) ?>;
    const PROVINCE_LIST = <?= json_encode($provincesArray) ?>;
    // console.log('BARANGAY_LIST', BARANGAY_LIST)
    function findNameByCode(arrayList, code) {
        let name = null
         arrayList.forEach(item => {
            if ( item.code == code ){
                name = item.name
            }
        });
        
        return name; // Return null if code is not found
    }

    function viewData(cart){
        removeTable()
        
        console.log('cart', cart)
        jsonData = JSON.parse(cart.json_data);
        console.log('jsonData', jsonData)

        if(jsonData.checkPersonalizedItems){
            const checkPersonalizedItems = jsonData.checkPersonalizedItems;
            console.log('checkPersonalizedItems', checkPersonalizedItems)
            createTable(checkPersonalizedItems)
        }



        $('#viewCustomOrder').modal('show');

        let id = document.getElementById('id');
        let customerId = document.getElementById('customer_id');
        let email = document.getElementById('email');
        let phone_no = document.getElementById('phone_no');
        let status = document.getElementById('status');
        let total_price = document.getElementById('total_price');
        let personalized_items_total = document.getElementById('personalized_items_total');
        let remarks = document.getElementById('remarks');
        let shirt_selected = document.getElementById('shirt_selected');
        // let shirt_price = document.getElementById('shirt_price');
        let customize_by = document.getElementById('customize_by');
        // let sizing = document.getElementById('sizing');
        let avatar_sizing = document.getElementById('avatar_sizing');
        let text_sizing = document.getElementById('text_sizing');
        let cutomize_sizing = document.getElementById('cutomize_sizing');
        let estimatedPrice = document.getElementById('estimatedPrice');
        let shipping_fee = document.getElementById('shipping_fee');
        let province = document.getElementById('province');
        let city_municipality = document.getElementById('city_municipality');
        let barangay = document.getElementById('barangay');
        let landmark = document.getElementById('landmark');
        let complete_address = document.getElementById('complete_address');

        for (const key in jsonData.sizes_ordered) {
            if (Object.hasOwnProperty.call(jsonData.sizes_ordered, key)) {
                
                const element = jsonData.sizes_ordered[key];
                console.log(`jsonData: ${jsonData}`)
                console.log(`element: ${element}`)
                console.log(`key: ${key}`)
                // Assuming you have a reference to the table or tbody
                var table = document.getElementById('updateTableBody');

                // Create new row and cells
                var row = document.createElement('tr');
                var cell1 = document.createElement('td');
                var cell2 = document.createElement('td');
                var div = document.createElement('div');
                var input = document.createElement('input');


                let sizeText = {
                    "xs" : "EXTRA SMALL",
                    "s" : "SMALL",
                    "m" : "MEDIUM",
                    "l" : "LARGE",
                    "xl" : "EXTRA LARGE",
                    "xxl" : "2 EXTRA LARGE",
                }

                // Set cell1 text
                cell1.className = '';
                cell1.innerHTML = `<span><strong>${sizeText[key]}</strong>: ${jsonData.sizes_ordered[key]} x ₱${jsonData.estimatedPrice} </span>`;

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
                input.value = (jsonData.sizes_ordered[key] * jsonData.estimatedPrice);

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
        phone_no.value = cart.phone_no;
        province.value = findNameByCode(PROVINCE_LIST, cart.province);
        city_municipality.value = findNameByCode(CITY_MUNI_LIST, cart.city_municipality);
        barangay.value = findNameByCode(BARANGAY_LIST, cart.barangay);
        landmark.value = cart.landmark;
        complete_address.value = cart.complete_address;
        id.value = cart.id;

        shipping_fee.value = null
        total_price.value = null
        status.value = null
        total_price.value = null


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
        if(jsonData.checkPersonalizedItemsTotal){
            personalized_items_total.value = Number(jsonData.checkPersonalizedItemsTotal)
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
        if(jsonData.text_sizing){
            text_sizing.value = jsonData.text_sizing
        }
        if(jsonData.avatar_sizing){
            avatar_sizing.value = jsonData.avatar_sizing
        }
        // if(jsonData.sizing){
        //     sizing.value = jsonData.sizing
        //     cutomize_sizing.textContent = jsonData.sizing
        // }
        if(jsonData.estimatedPrice){
            estimatedPrice.value = jsonData.estimatedPrice
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


    $(document).ready(function() {
        let table = $('#customOrderTable').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    {
                        extend: 'csvHtml5',
                        text: 'Export CSV',
                        titleAttr: 'CSV'
                    },
                    {
                        extend: 'pdfHtml5',
                        text: 'Export PDF',
                        titleAttr: 'PDF'
                    }
                ]
            });
                // Function to get query parameter
        function getQueryParameter(param) {
            var urlParams = new URLSearchParams(window.location.search);
            return urlParams.get(param);
        }

        // Get the 'sortBy' query parameter value
        var sortBy = getQueryParameter('sortBy');

        // If 'sortBy' exists, use it as the search value in DataTable
        if (sortBy) {
            table.search(sortBy).draw();
        }
    });



</script>