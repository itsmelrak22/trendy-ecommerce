
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

  $couriers_ = new CustomizedProductDimensions;
  $couriers = $couriers_->all();
    // displayDataTest($couriers);

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
                            <h6 class="m-0 font-weight-bold text-primary">Customized Product Dimension List</h6>
                            
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Dimension (Inches)</th>
                                                <th>Shirt Option Type</th>
                                                <th>Customized By</th>
                                                <th>Size</th>
                                                <th>Price</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Dimension (Inches)</th>
                                                <th>Shirt Option Type</th>
                                                <th>Customized By</th>
                                                <th>Size</th>
                                                <th>Price</th>
                                                <th>Action</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            <?php foreach ($couriers as $key => $value) { ?>
                                                <tr>
                                                    <td><?=$value['dimension']?> </td>
                                                    <td><?=$value['shirt_option_type']?></td>
                                                    <td><?=$value['customized_by']?></td>
                                                    <td><?=$value['size']?></td>
                                                    <td><?=$value['price']?></td>
                                                    <td>
                                                        <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#updateModal" 
                                                                data-id="<?=$value['id']?>" 
                                                                data-dimension="<?=$value['dimension']?>" 
                                                                data-shirt_option_type="<?=$value['shirt_option_type']?>" 
                                                                data-customized_by="<?=$value['customized_by']?>" 
                                                                data-size="<?=$value['size']?>" 
                                                                data-price="<?=$value['price']?>" 
                                                                data-date="<?=$value['created_at']?>
                                                                ">Update</button>
                                                        <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteModal" data-id="<?=$value['id']?>">Delete</button>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Update Modal -->
                    <div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="updateModalLabel">Update Courier</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="customized-product-dimensions-update.php" method="post">
                                    <div class="modal-body">
                                        <input type="hidden" name="id" id="update-id">
                                        <label for="shirt_option_type">Shirt Option Type</label>
                                        <div class="input-group">
                                            <select name="shirt_option_type" id="update-shirt_option_type" class="form-control bg-light border-0 small" required>
                                                <option value="Logo">Logo</option>
                                                <option value="Text">Text</option>
                                            </select>
                                        </div>
                                        <br>
                                        <label for="update-customized_by">Customized By</label>
                                        <div class="input-group">
                                            <select name="customized_by" id="update-customized_by" class="form-control bg-light border-0 small" required>
                                                <option value="embroidered">Embroidered</option>
                                                <option value="printed">Printed</option>
                                            </select>
                                        </div>
                                        <br>
                                        <label for="size">Size</label>
                                        <div class="input-group">
                                            <select name="size" id="update-size" class="form-control bg-light border-0 small" required>
                                                <option value="xs">XS</option>
                                                <option value="s">S</option>
                                                <option value="m">M</option>
                                                <option value="l">L</option>
                                                <option value="xl">XL</option>
                                                <option value="xxl">XXL</option>
                                            </select>
                                        </div>
                                        <br>
                                        <label for="dimension">Dimension</label>
                                        <div class="input-group">
                                            <input type="text" name="dimension" id="update-dimension" class="form-control bg-light border-0 small" placeholder="Dimension" aria-label="Dimension" aria-describedby="basic-addon2" required>
                                        </div>
                                        <br>
                                        <label for="price">Price</label>
                                        <div class="input-group">
                                            <input type="number" name="price" id="update-price" class="form-control bg-light border-0 small" placeholder="Price" aria-label="Price" aria-describedby="basic-addon2" required>
                                        </div>
                                        <br>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary" name="dimension-edit">Save changes</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- Delete Modal -->
                    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="deleteModalLabel">Delete Courier</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="customized-product-dimensions-delete.php" method="post">
                                    <div class="modal-body">
                                        <input type="hidden" name="id" id="delete-id">
                                        <p>Are you sure you want to delete <strong id="delete-name"></strong>?</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-danger" name="dimension-delete">Delete</button>
                                    </div>
                                </form>
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
    <form method="POST" action="customized-product-dimensions-insert.php">
        <div class="modal" tabindex="-1" id="addModal">
            <div class="modal-dialog modal-dialog modal-dialog-centered">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title font-weight-bold text-primary">Add Customized Product Dimenstion </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="">
                        <label for="shirt_option_type">Shirt Option Type</label>
                        <div class="input-group">
                            <select name="shirt_option_type" id="shirt_option_type" class="form-control bg-light border-0 small" required>
                                <option value="Logo">Logo</option>
                                <option value="Text">Text</option>
                            </select>
                        </div>
                        <br>
                        <label for="shirt_option_type">Customized By</label>
                        <div class="input-group">
                            <select name="customized_by" id="customized_by" class="form-control bg-light border-0 small" required>
                                <option value="embroidered">Embroidered</option>
                                <option value="printed">Printed</option>
                            </select>
                        </div>
                        <br>
                        <label for="size">Size</label>
                        <div class="input-group">
                            <select name="size" id="size" class="form-control bg-light border-0 small" required>
                                <option value="xs">XS</option>
                                <option value="s">S</option>
                                <option value="m">M</option>
                                <option value="l">L</option>
                                <option value="xl">XL</option>
                                <option value="xxl">XXL</option>
                            </select>
                        </div>
                        <br>
                        <label for="dimension">Dimension</label>
                        <div class="input-group">
                            <input type="text" name="dimension" id="dimension" class="form-control bg-light border-0 small" placeholder="Dimension" aria-label="Dimension" aria-describedby="basic-addon2" required>
                        </div>
                        <br>
                        <label for="price">Price</label>
                        <div class="input-group">
                            <input type="number" name="price" id="price" class="form-control bg-light border-0 small" placeholder="Price" aria-label="Price" aria-describedby="basic-addon2" required>
                        </div>
                        <br>
                        <input type="hidden" name="add-dimension" value="true">
                    </div>
                </div>
                <div class="modal-footer">

                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-primary" name="add-courier" value="Submit">
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
</script>
<script>
    $('#updateModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var id = button.data('id');
        var dimension = button.data('dimension');
        var shirt_option_type = button.data('shirt_option_type');
        var customized_by = button.data('customized_by');
        var size = button.data('size');
        var price = button.data('price');

        var modal = $(this);
        console.log('shirt_option_type', shirt_option_type)

        modal.find('#update-id').val(id);
        modal.find('#update-dimension').val(dimension);
        modal.find('#update-shirt_option_type').val(shirt_option_type);
        modal.find('#update-customized_by').val(customized_by);
        modal.find('#update-size').val(size);
        modal.find('#update-price').val(price);
    });

    $('#deleteModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var id = button.data('id');
        var name = button.data('name');

        var modal = $(this);
        modal.find('#delete-id').val(id);
    });
</script>





