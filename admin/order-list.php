
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
                                <a href="order-list.php?sortBy=checked out">
                                    <span class="badge badge-primary">Checked out</span>
                                </a>
                                <a href="order-list.php?sortBy=processing">
                                    <span class="badge badge-info">Processing</span>
                                </a>
                                <a href="order-list.php?sortBy=shipped">
                                    <span class="badge badge-warning">Shipped</span>
                                </a>
                                <a href="order-list.php?sortBy=delivered">
                                    <span class="badge badge-success">Delivered</span>
                                </a>
                                <a href="order-list.php?sortBy=cancelled">
                                    <span class="badge badge-danger">Cancelled</span>
                                </a>
                            </span>

                            <div class="card-body">
                                <div class="table-responsive">
                                    <div class="alert alert-warning" role="alert">
                                        Items that has highlight with this color notify you that an order submitted "Days" still awaits approval. Please review and approve at your earliest convenience.
                                    </div>
                                    <table class="table table-bordered" width="100%" cellspacing="0" id="orderTable">
                                        <thead>
                                            <tr>
                                                <th>Order ID</th>
                                                <th>Date Ordered</th>
                                                <th>Customer</th>
                                                <th>Email</th>
                                                <th>Phone</th>
                                                <th>Block & lot, street/subd.</th>
                                                <th>Barangay</th>
                                                <th>City / Municipality</th>
                                                <th>Province</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Order ID</th>
                                                <th>Date Ordered</th>
                                                <th>Customer</th>
                                                <th>Email</th>
                                                <th>Phone</th>
                                                <th>Block & lot, street/subd.</th>
                                                <th>Barangay</th>
                                                <th>City / Municipality</th>
                                                <th>Province</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            <?php foreach ($orders as $order) { 
                                                $created_at = new DateTime($order['created_at']);
                                                $current_date = new DateTime();
                                                $interval = $created_at->diff($current_date);
                                                $is_older_than_two_days = $interval->days > 2;?>
                                                    <tr <?= $is_older_than_two_days ? 'style="background-color: #fdf3d8;"' : '' ?>>
                                                    <td><?= $order['id'] ?></td>
                                                    <td <?= $is_older_than_two_days ? 'class="text-danger"' : '' ?>><?= $order['created_at'] ?></td>
                                                        <td>    
                                                        <?= $order['first_name']. " " . $order['last_name'] ?>
                                                    </td>
                                                    <td><?= $order['email'] ?></td>
                                                    <td><?= $order['phone_no'] ?></td>
                                                    <td><?= $order['complete_address'] ? $order['complete_address'] : "N/A" ?></td>
                                                    <td><?= findNameByCode($barangaysArray, $order['barangay']) ?></td>
                                                    <td><?= findNameByCode($citiesMunicipalitiesArray, $order['city_municipality']) ?></td>
                                                    <td><?= findNameByCode($provincesArray, $order['province']) ?></td>
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
        let table = $('#orderTable').DataTable();
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

    async function getProvinces(){
        await $.ajax({
            url: 'https://psgc.gitlab.io/api/provinces.json',
            type: 'GET',
            success: function(data) {
                ProvinceArray = data;
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