
<?php 

    include_once("./includes/header.php"); 

    spl_autoload_register(function ($class) {
        include '../models/' . $class . '.php';
    });

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


    $order = new Order;
    $orders = $order->getOrderAndOrderDetails();
    $ungrouped_data = [];


    foreach ($orders as $key => &$value) {
        $value['cart_status'] = getStatusText($value['order_details'][0]['status']);
    }
    
    // displayDataTest($orders);
    function getStatusText($status){

        switch ($status) {
            case 0:
                return "Added to cart";
                break;
            case 1:
                return "Checked out";
                break;
            case 2:
                return "Processing";
                break;
            case 3:
                return "Shipped";
                break;
            case 4:
                return "Delivered";
                break;
            case 10:
                return "Declined";
                break;
            case 11:
                return "Canceled";
                break;
            default:
                return "Unknown status";
                break;
        }
        

    }


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

                <!-- Topbar -->

                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <div>
                        <!-- <button type="button" class="btn btn-primary btn-icon-split" data-toggle="modal" data-target="#addModal">
                            <span class="icon text-white-50">
                                <i class="fas fa-plus"></i>
                            </span>
                            <span class="text">Add</span>
                        </button> -->
                    </div>

                    <hr>
                        <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Order Page</h6>
                            
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
                            <span class="legend-container" >
                                <p class="lead">Legends: </p>
                                <span class="badge badge-primary">Checked out</span>
                                <span class="badge badge-info">Processing</span>
                                <span class="badge badge-warning">Shipped</span>
                                <span class="badge badge-success">Delivered</span>
                                <span class="badge badge-danger">Cancelled</span>
                            </span>

                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" width="100%" cellspacing="0" id="orderTable">
                                        <thead>
                                            <tr>
                                                <th>Order ID</th>
                                                <th>Customer</th>
                                                <th>Email</th>
                                                <th>Phone</th>
                                                <th>Additional Address</th>
                                                <th>Barangay</th>
                                                <th>City / Municipality</th>
                                                <th>Provice</th>
                                                <th>Date Ordered</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Order ID</th>
                                                <th>Customer</th>
                                                <th>Email</th>
                                                <th>Phone</th>
                                                <th>Additional Address</th>
                                                <th>Barangay</th>
                                                <th>City / Municipality</th>
                                                <th>Provice</th>
                                                <th>Date Ordered</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            <?php foreach ($orders as $order) { ?>
                                                <tr>
                                                    <td><?= $order['id'] ?></td>
                                                    <td>
                                                        <?= $order['first_name']. " " . $order['last_name'] ?>
                                                    </td>
                                                    <td><?= $order['email'] ?></td>
                                                    <td><?= $order['phone_no'] ?></td>
                                                    <td><?= $order['complete_address'] ?></td>
                                                    <td><?= findNameByCode($barangaysArray, $order['barangay']) ?></td>
                                                    <td><?= findNameByCode($citiesMunicipalitiesArray, $order['city_municipality']) ?></td>
                                                    <td><?= findNameByCode($provincesArray, $order['province']) ?></td>
                                                    <td><?= $order['created_at'] ?></td>
                                                    <td>
                                                        <span class="badge <?= getBadgeClass($order['cart_status']) ?>">
                                                            <?= htmlspecialchars($order['cart_status']) ?>
                                                        </span>
                                                    </td>
                                                    <td>
                                                        <form action="order-delete.php" method="POST">
                                                            <a href="order-edit.php?id=<?= $order['id'] ?>" class="btn btn-warning btn-circle btn-sm" data-toggle="tooltip" data-placement="top" title="Edit">
                                                                <i class="bi bi-box-arrow-right"></i>
                                                            </a>
                                                            <input type="hidden" name="id" value="<?= $order['id'] ?>">
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
                        <span>TRENDY THREADS APPAREL BY LOVE J'S STORE</span>
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
    <form method="POST" action="cart-insert.php">
        <div class="modal" tabindex="-1" id="addModal">
            <div class="modal-dialog modal-dialog modal-dialog-centered">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title font-weight-bold text-primary">Add Order Entry</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="">
                        <br>
                        <div class="input-group">
                            <input type="text" name="customer_id" id="customer_id" class="form-control bg-light border-0 small" placeholder="Customer Name" aria-label="Customer Name" aria-describedby="basic-addon2" required>
                        </div>
                        <br>
                        <div class="input-group">
                            <input type="text" name="product_id" id="product_id" class="form-control bg-light border-0 small" placeholder="Product Name" aria-label="Product Name" aria-describedby="basic-addon2" required>
                        </div>
                        <br>
                        <div class="input-group">
                            <input type="number" name="total_price" id="total_price" class="form-control bg-light border-0 small" placeholder="Total Price" aria-label="Total Price" aria-describedby="basic-addon2" required>
                        </div>
                        <br>
                        <div class="input-group">
                            <input type="number" name="status" id="status" class="form-control bg-light border-0 small" placeholder="Status" aria-label="Status" aria-describedby="basic-addon2" required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-primary" name="add-cart" value="Submit">
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


    $('#addModal').on('shown.bs.modal', function () {
        $('#addModal').trigger('focus')
    })

    $(document).ready(function() {
        $('#orderTable').DataTable();
        

    });

    async function getProvinces(){
        await $.ajax({
            url: 'https://psgc.gitlab.io/api/provinces.json',
            type: 'GET',
            success: function(data) {
                proviceArray = data;
                var provinces = data;

                // Sort the provinces array by the "name" property
                provinces.sort(function(a, b) {
                    var nameA = a.name.toUpperCase(); // Ignore case
                    var nameB = b.name.toUpperCase(); // Ignore case
                    if (nameA < nameB) {
                        return -1;
                    }
                    if (nameA > nameB) {
                        return 1;
                    }
                    return 0; // Names must be equal
                });


                console.log("provinces", provinces)
            },
            error: function(xhr, status, error) {
                console.error('Error fetching provinces: ' + error);
            }
        });
    }

    async function getCitiesMunicipalities(){
        await $.ajax({
            url: 'https://psgc.gitlab.io/api/cities-municipalities.json',
            type: 'GET',
            success: function(data) {
                citiesMunicipalitiesArray = data;
                var citiesMunicipalities = data;

                // Sort the citiesMunicipalities array by the "name" property
                citiesMunicipalities.sort(function(a, b) {
                    var nameA = a.name.toUpperCase(); // Ignore case
                    var nameB = b.name.toUpperCase(); // Ignore case
                    if (nameA < nameB) {
                        return -1;
                    }
                    if (nameA > nameB) {
                        return 1;
                    }
                    return 0; // Names must be equal
                });


                console.log("citiesMunicipalities", citiesMunicipalities)
            },
            error: function(xhr, status, error) {
                console.error('Error fetching citiesMunicipalities: ' + error);
            }
        });
    }

    async function getBarangays(){
        await $.ajax({
            url: 'https://psgc.gitlab.io/api/barangays.json',
            type: 'GET',
            success: function(data) {
                barangaysArray = data;
                var barangays = data;

                // Sort the barangays array by the "name" property
                barangays.sort(function(a, b) {
                    var nameA = a.name.toUpperCase(); // Ignore case
                    var nameB = b.name.toUpperCase(); // Ignore case
                    if (nameA < nameB) {
                        return -1;
                    }
                    if (nameA > nameB) {
                        return 1;
                    }
                    return 0; // Names must be equal
                });


                console.log("barangays", barangays)
            },
            error: function(xhr, status, error) {
                console.error('Error fetching barangays: ' + error);
            }
        });
    }


</script>