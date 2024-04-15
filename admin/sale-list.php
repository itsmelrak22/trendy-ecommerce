
<?php 
    include_once("./includes/header.php"); 

    spl_autoload_register(function ($class) {
        include '../models/' . $class . '.php';
    });

    $sale = new Sale;
    $sales_ = $sale->getAllSales();

    // displayDataTest( $sales_);

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
                    <h1 class="h3 mb-4 text-gray-800">Sale Page</h1>

                    <div>
                        <button type="button" class="btn btn-primary btn-icon-split" data-toggle="modal" data-target="#addModal">
                            <span class="icon text-white-50">
                                <i class="fas fa-plus"></i>
                            </span>
                            <span class="text">Add</span>
                        </button>
                    </div>

                    <hr>
                        <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Product List</h6>
                            
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="saleTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Customer </th>
                                            <th>Order #</th>
                                            <th>Order Details</th>
                                            <th>MOP</th>
                                            <th>Total</th>
                                            <th>Order Date</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Customer </th>
                                            <th>Order #</th>
                                            <th>Order Details</th>
                                            <th>MOP</th>
                                            <th>Total</th>
                                            <th>Order Date</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php foreach ($sales_ as $key => $sale) { ?>
                                            <tr>
                                                <td> <?= $sale['email'] ?> </td>
                                                <td> <?= $sale['order_id'] ?> </td>
                                                <td>
                                                    <a href="order-view.php?id=<?=$sale['order_id']?>" class="btn btn-primary btn-circle btn-sm" data-toggle="tooltip" data-placement="top" title="View Order Details">
                                                        <i class="bi bi-list-ul"></i>
                                                    </a>
                                                </td>
                                                <td> <?= $sale['mop'] ?> </td>
                                                <td> <?= $sale['total'] ?> </td>
                                                <td> <?= $sale['created_at'] ?> </td>
                                               
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
    <form method="POST" action="sale-insert.php">
        <div class="modal" tabindex="-1" id="addModal">
            <div class="modal-dialog modal-dialog modal-dialog-centered">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title font-weight-bold text-primary">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="">
                        <div class="input-group">
                            <input type="text" name="customer_id" id="customer_id" class="form-control bg-light border-0 small" placeholder="Customer Name" aria-label="Customer Name" aria-describedby="basic-addon2" required>
                        </div>
                        <br>
                        <div class="input-group">
                            <input type="text" name="product_id" id="product_id" class="form-control bg-light border-0 small" placeholder="Product Name" aria-label="Product Name" aria-describedby="basic-addon2" required>
                        </div>
                        <br>
                        <div class="input-group">
                            <input type="number" name="qty" id="qty" class="form-control bg-light border-0 small" placeholder="Quantity" aria-label="Quantity" aria-describedby="basic-addon2" required>
                        </div>
                        <br>
                        <div class="input-group">
                            <input type="number" name="sale_price" id="sale_price" class="form-control bg-light border-0 small" placeholder="Sale Price" aria-label="Sale Price" aria-describedby="basic-addon2" required>
                        </div>
                        <br>
                        <div class="input-group">
                            <input type="number" name="mop" id="mop" class="form-control bg-light border-0 small" placeholder="MOP" aria-label="MOP" aria-describedby="basic-addon2" required>
                        </div>
                        <div class="input-group">
                            <input type="number" name="sub_total" id="sub_total" class="form-control bg-light border-0 small" placeholder="Sub Total" aria-label="Sub Total" aria-describedby="basic-addon2" required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-primary" name="add-sale" value="Submit">
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
        $('#productTable').DataTable();
    });
</script>