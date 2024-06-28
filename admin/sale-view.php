
<?php 
include_once("./includes/header.php"); 

spl_autoload_register(function ($class) {
    include '../models/' . $class . '.php';
  });

  $id = $_GET['id'];

  $sale = new Sale;
  $sales = $sale->find($id);
//   displayDataTest($gender_age_category_data);
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
                    <h1 class="h3 mb-4 text-gray-800">Sale View</h1>
                    <div>
                        <a href="sale-list.php" type="button" class="btn btn-primary btn-icon-split">
                            <span class="icon text-white-50">
                                <i class="fas fa-arrow-left"></i>
                            </span>
                            <span class="text">Return</span>
                        </a>
                    </div>
                    <hr>
                        <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <form method="POST" action="#">
                                <div >
                                    <div >
                                        <div class="">
                                            <label for="basic-url">Customer Name</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <!-- <span class="input-group-text" id="basic-addon3">Male/Female/Unisex</span> -->
                                                </div>
                                                <input value="<?= $sales->customer_id; ?>" type="text" name="customer_id" id="customer_id" class="form-control" required readonly disabled>
                                            </div>
                                            <label for="basic-url">Product Name</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <!-- <span class="input-group-text" id="basic-addon3">Male/Female/Unisex</span> -->
                                                </div>
                                                <input value="<?= $sales->product_id; ?>" type="text" name="product_id" id="product_id" class="form-control" required readonly disabled>
                                            </div>
                                            <label for="basic-url">Quantity</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <!-- <span class="input-group-text" id="basic-addon3">Male/Female/Unisex</span> -->
                                                </div>
                                                <input value="<?= $sales->qty; ?>" type="text" name="qty" id="qty" class="form-control" required readonly disabled>
                                            </div>
                                            <label for="basic-url">Sale Price</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <!-- <span class="input-group-text" id="basic-addon3">Male/Female/Unisex</span> -->
                                                </div>
                                                <input value="<?= $sales->sale_price; ?>" type="text" name="sale_price" id="sale_price" class="form-control" required readonly disabled>
                                            </div>
                                            <label for="basic-url">Sales Date</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <!-- <span class="input-group-text" id="basic-addon3">Male/Female/Unisex</span> -->
                                                </div>
                                                <input value="<?= $sales->sales_date; ?>" type="text" name="sales_date" id="sales_date" class="form-control" required readonly disabled>
                                            </div>
                                            <label for="basic-url">MOP</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <!-- <span class="input-group-text" id="basic-addon3">Male/Female/Unisex</span> -->
                                                </div>
                                                <input value="<?= $sales->mop; ?>" type="text" name="mop" id="mop" class="form-control" required readonly disabled>
                                            </div>
                                            <label for="basic-url">Sub Total</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <!-- <span class="input-group-text" id="basic-addon3">Male/Female/Unisex</span> -->
                                                </div>
                                                <input value="<?= $sales->sub_total; ?>" type="text" name="sub_total" id="sub_total" class="form-control" required readonly disabled>
                                            </div>
                                            <label for="basic-url">Order Date</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <!-- <span class="input-group-text" id="basic-addon3">Male/Female/Unisex</span> -->
                                                </div>
                                                <input value="<?= $sales->order_date; ?>" type="text" name="order_date" id="order_date" class="form-control" required readonly disabled>
                                            </div>
                                            <input type="hidden" name="id" value="<?= $sales->id ?>">
                                        </div>
                                        <div class="">
                                            <!-- <input type="submit" class="btn btn-primary" name="edit-gender-age-category" value="Submit"> -->
                                        </div>
                                    </div>
                                </div>
                            </form>
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
                        <span>TRENDY THREADS APPARELTORE</span>
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



    <?php include_once("./includes/scripts.php"); ?>
    <?php include_once("./includes/footer.php"); ?>

<script>
 
</script>



