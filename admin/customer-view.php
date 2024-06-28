
<?php 
include_once("./includes/header.php"); 

spl_autoload_register(function ($class) {
    include '../models/' . $class . '.php';
  });

  $id = $_GET['id'];

  $customer = new Customer;
  $customers = $customer->find($id);
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
                    <h1 class="h3 mb-4 text-gray-800">Customer View</h1>
                    <div>
                        <a href="customer-list.php" type="button" class="btn btn-primary btn-icon-split">
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
                                            <label for="basic-url">First Name</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <!-- <span class="input-group-text" id="basic-addon3">Male/Female/Unisex</span> -->
                                                </div>
                                                <input value="<?= $customers->first_name; ?>" type="text" name="first_name" id="first_name" class="form-control" required readonly disabled>
                                            </div>
                                            <label for="basic-url">Last Name</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <!-- <span class="input-group-text" id="basic-addon3">Male/Female/Unisex</span> -->
                                                </div>
                                                <input value="<?= $customers->last_name; ?>" type="text" name="last_name" id="last_name" class="form-control" required readonly disabled>
                                            </div>
                                            <label for="basic-url">Email</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <!-- <span class="input-group-text" id="basic-addon3">Male/Female/Unisex</span> -->
                                                </div>
                                                <input value="<?= $customers->email; ?>" type="text" name="email" id="email" class="form-control" required readonly disabled>
                                            </div>
                                            <label for="basic-url">Phone No.</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <!-- <span class="input-group-text" id="basic-addon3">Male/Female/Unisex</span> -->
                                                </div>
                                                <input value="<?= $customers->phone_no; ?>" type="text" name="phone_no" id="phone_no" class="form-control" required readonly disabled>
                                            </div>
                                            <input type="hidden" name="id" value="<?= $customers->id ?>">
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



