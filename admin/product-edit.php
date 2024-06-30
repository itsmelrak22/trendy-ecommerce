
<?php 
include_once("./includes/header.php"); 

spl_autoload_register(function ($class) {
    include '../models/' . $class . '.php';
  });

  $id = $_GET['id'];

  $product = new Product;
  $product_data = $product->find($id);
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
                    <h1 class="h3 mb-4 text-gray-800">Product Edit</h1>
                    <div>
                        <a href="product-list.php" type="button" class="btn btn-primary btn-icon-split">
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
                            <form method="POST" action="product-update.php">
                                <div >
                                    <div >
                                        <div class="">
                                            <label for="basic-url">Product Name</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon3"> </span>
                                                </div>
                                                <input value="<?= $product_data->name; ?>" type="text" name="product_name" id="product_name" class="form-control" required>
                                            </div>
                                            <label for="basic-url">Description</label>
                                            <div class="input-group mb-3">
                                                <textarea type="text" name="description" id="description" class="form-control bg-light border-0 small" placeholder="Description" aria-label="Description" required aria-describedby="basic-addon2" required cols="15" rows="10"><?= $product_data->description; ?></textarea>
                                            </div>
                                            <label for="basic-url">Price</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon3"> </span>
                                                </div>
                                                <input value="<?= $product_data->price; ?>" type="text" name="price" id="price" class="form-control" required>
                                            </div>
                                            <!-- <label for="basic-url">Quantity</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon3"> </span>
                                                </div>
                                                <input value="<?php // echo $product_data->stock_qty; ?>" type="text" name="quantity" id="quantity" class="form-control" required>
                                            </div> -->
                                            <input type="hidden" name="id" value="<?= $product_data->id ?>">
                                        </div>
                                        <div class="">
                                            <input type="submit" class="btn btn-primary" name="edit-product" value="Submit">
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
                    <a class="btn btn-primary" href="login.php">Logout</a>
                </div>
            </div>
        </div>
    </div>



    <?php include_once("./includes/scripts.php"); ?>
    <?php include_once("./includes/footer.php"); ?>

<script>
 
</script>




<script>
  tinymce.init({
    selector: '#description',
    plugins: 'advlist autolink lists link image charmap print preview hr anchor pagebreak',
    // toolbar_mode: 'floating',
  });
</script>