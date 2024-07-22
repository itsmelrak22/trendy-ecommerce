
<?php 
    include_once("./includes/header.php"); 

    if($_SESSION['email'] != 'admin@admin.com'){
        echo "<script>
            alert('Permission Denied, Page access not permitted');
            location.href = 'index.php';
        </script>";
    }


    spl_autoload_register(function ($class) {
        include '../models/' . $class . '.php';
    });

    $customer = new Customer;
    $customers = $customer->all();
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
                            <h6 class="m-0 font-weight-bold text-primary">Customer List</h6>
                            
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="customerTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>First Name </th>
                                            <th>Last Name </th>
                                            <th>Email</th>
                                            <th>Phone No.</th>
                                            <th>Date Created</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>First Name </th>
                                            <th>Last Name </th>
                                            <th>Email</th>
                                            <th>Phone No.</th>
                                            <th>Date Created</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php foreach ($customers as $key => $customer) { ?>
                                            <tr>
                                                <td> <?= $customer['first_name'] ?> </td>
                                                <td> <?= $customer['last_name'] ?> </td>
                                                <td> <?= $customer['email'] ?> </td>
                                                <td> <?= $customer['phone_no'] ?> </td>
                                                <td> <?= $customer['created_at'] ?> </td>
                                                <td>
                                                    <form action="customer-delete.php" method="POST">
                                                        <a href="customer-edit.php?id=<?=$customer['id']?>" class="btn btn-warning btn-circle btn-sm" data-toggle="tooltip" data-placement="top" title="Edit">
                                                            <i class="fas fa-pencil-alt"></i>
                                                        </a>
                                                        <a href="customer-view.php?id=<?=$customer['id']?>" class="btn btn-primary btn-circle btn-sm" data-toggle="tooltip" data-placement="top" title="View">
                                                            <i class="fas fa-arrow-right"></i>
                                                        </a>
                                                        <input type="hidden" name="id" value="<?=$customer['id']?>">
                                                        <button type="submit" name="delete-customer" class="btn btn-danger btn-circle btn-sm" data-toggle="tooltip" data-placement="top" title="Delete" value="submit">
                                                            <i class="fas fa-trash"></i>
                                                        </button>
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
    <form method="POST" action="customer-insert.php">
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
                        <br>
                        <div class="input-group">
                            <input type="text" name="first_name" id="first_name" class="form-control bg-light border-0 small" placeholder="First Name" aria-label="First Name" aria-describedby="basic-addon2" required>
                        </div>
                        <br>
                        <div class="input-group">
                            <input type="text" name="last_name" id="last_name" class="form-control bg-light border-0 small" placeholder="Last Name" aria-label="Last Name" aria-describedby="basic-addon2" required>
                        </div>
                        <br>
                        <div class="input-group">
                            <input type="text" name="email" id="email" class="form-control bg-light border-0 small" placeholder="Email" aria-label="Email" aria-describedby="basic-addon2" required>
                        </div>
                        <br>
                        <div class="input-group">
                            <input type="number" name="phone_no" id="phone_no" class="form-control bg-light border-0 small" placeholder="Phone No." aria-label="Phone No." aria-describedby="basic-addon2" required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-primary" name="add-customer" value="Submit">
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
        $('#customerTable').DataTable({
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