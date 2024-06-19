
<?php 
include_once("./includes/header.php"); 

spl_autoload_register(function ($class) {
    include '../models/' . $class . '.php';
  });

  $id = $_GET['id'];

  $order = new Order;
  $orders = $order->getOrderAndOrderDetails($id);

//   displayDataTest($orders);

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
                    <?php include_once("./includes/topbar-nav.php"); ?>


                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">Order Details View</h1>
                    <div>
                        <a href="order-list.php" type="button" class="btn btn-primary btn-icon-split">
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
                                                <th>Product </th>
                                                <th>Image</th>
                                                <th>Color</th>
                                                <th>Color Name</th>
                                                <th>Quantity</th>
                                                <th>Date Ordered</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Order ID </th>
                                                <th>Product</th>
                                                <th>Image</th>
                                                <th>Color</th>
                                                <th>Color Name</th>
                                                <th>Quantity</th>
                                                <th>Date Ordered</th>
                                                <th>Action</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            <?php foreach ($orders->order_details as $key => $order_detail) { ?>
                                                <?php $img_link = getImageLink($order_detail['image']); ?>
                                                <tr>
                                                    <td> <?= $order_detail['order_id'] ?> </td>
                                                    <td> <?= $order_detail['product_name'] ?> </td>
                                                    <td style="text-align: center; vertical-align: middle;">
                                                        <img style="" width="75" height="75" src="<?= $img_link ?>" alt="..." />
                                                    </td>

                                                    <td style="background-color:<?= $order_detail['color_code'] ?> ">  </td>
                                                    <td> <?= $order_detail['color_name'] ?> </td>
                                                    <td> <?= $order_detail['qty'] ?> </td>
                                                    <td> <?= $order_detail['created_at'] ?> </td>
                                                    <td>
                                                        <form action="" method="POST">
                                                        
                                                            <input type="hidden" name="id" value="<?=$order_detail['id']?>">
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



    <?php include_once("./includes/scripts.php"); ?>
    <?php include_once("./includes/footer.php"); ?>

<script>
 
</script>



