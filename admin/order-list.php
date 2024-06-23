
<?php 
    include_once("./includes/header.php"); 

    spl_autoload_register(function ($class) {
        include '../models/' . $class . '.php';
    });

    $order = new Order;
    $orders = $order->getOrderAndOrderDetails();
    $ungrouped_data = [];


    foreach ($orders as $key => &$value) {
        $value['cart_status'] = getStatusText($value['order_details'][0]['status']);
    }
    foreach ($orders as $order) {
        $cart_status = $order['cart_status'];
        if (!isset($ungrouped_data[$cart_status])) {
            $ungrouped_data[$cart_status] = [];
        }
        $ungrouped_data[$cart_status][] = $order;
    }


        // Define the desired order of statuses
    $status_order = ['Checked out', 'Processing', 'Shipped', 'Delivered', 'Cancelled'];

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

    // echo '<pre>';
    // print_r($grouped_data);
    // echo '</pre>';

    
    // displayDataTest($orders);
    // displayDataTest($grouped_data);
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
                    <h1 class="h3 mb-4 text-gray-800">Order Page</h1>

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
                            <h6 class="m-0 font-weight-bold text-primary">Order List</h6>
                            
                        </div>

                        <div class="container card-body">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs" id="orderTabs" role="tablist">
                                <?php foreach ($grouped_data as $status => $orders) { ?>
                                    <li class="nav-item">
                                        <a class="nav-link <?php echo $status === array_key_first($grouped_data) ? 'active' : '' ?>" id="tab-<?php echo strtolower(str_replace(' ', '-', $status)) ?>" data-toggle="tab" href="#content-<?php echo strtolower(str_replace(' ', '-', $status)) ?>" role="tab" aria-controls="content-<?php echo strtolower(str_replace(' ', '-', $status)) ?>" aria-selected="true">
                                            <?php echo $status ?>
                                        </a>
                                    </li>
                                <?php } ?>
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">
                                <?php foreach ($grouped_data as $status => $orders) { 
                                    $generateId = camelize($status);
                                    ?>
                                    <div class="tab-pane fade <?php echo $status === array_key_first($grouped_data) ? 'show active' : '' ?>" id="content-<?php echo strtolower(str_replace(' ', '-', $status)) ?>" role="tabpanel" aria-labelledby="tab-<?php echo strtolower(str_replace(' ', '-', $status)) ?>">
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table class="table table-bordered" width="100%" cellspacing="0" id="<?="orderTable$generateId" ?>">
                                                    <thead>
                                                        <tr>
                                                            <th>Order ID</th>
                                                            <th>Order Details</th>
                                                            <th>Customer</th>
                                                            <th>Date Ordered</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tfoot>
                                                        <tr>
                                                            <th>Order ID</th>
                                                            <th>Order Details</th>
                                                            <th>Customer</th>
                                                            <th>Date Ordered</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </tfoot>
                                                    <tbody>
                                                        <?php foreach ($orders as $order) { ?>
                                                            <tr>
                                                                <td><?= $order['id'] ?></td>
                                                                <td>
                                                                    <a href="order-view.php?id=<?= $order['id'] ?>" class="btn btn-primary btn-circle btn-sm" data-toggle="tooltip" data-placement="top" title="View Order Details">
                                                                        <i class="bi bi-list-ul"></i>
                                                                    </a>
                                                                </td>
                                                                <td><?= $order['email'] ?></td>
                                                                <td><?= $order['created_at'] ?></td>
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
                                <?php } ?>
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
        <?php foreach ($grouped_data as $status => $orders) { 
            $generateId = camelize($status);
            echo "$('#orderTable$generateId').DataTable(); \n\t";
        }?>

    });
</script>