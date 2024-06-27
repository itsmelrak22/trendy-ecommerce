
<?php 
include_once("./includes/header.php"); 

spl_autoload_register(function ($class) {
    include '../models/' . $class . '.php';
  });

  $id = $_GET['id'];

  $product = new Product;
  $products = $product->find($id);
//   displayDataTest($gender_age_category_data);
    $product_sizes = ProductSize::getProductSizes($id);
//   displayDataTest($product_sizes);

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
                    <h1 class="h3 mb-4 text-gray-800">Product View</h1>
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
                                <form method="POST" action="#">
                                    <div>
                                        <div>
                                            <div class="">
                                                <label for="basic-url">Name</label>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <!-- <span class="input-group-text" id="basic-addon3">Male/Female/Unisex</span> -->
                                                    </div>
                                                    <input value="<?= $products->name; ?>" type="text" name="product_name" id="product_name" class="form-control" required readonly disabled>
                                                </div>
                                                <label for="basic-url">Description</label>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <!-- <span class="input-group-text" id="basic-addon3">Male/Female/Unisex</span> -->
                                                    </div>
                                                    <textarea type="text"  cols="30" rows="10" name="description" id="description" class="form-control" required readonly disabled > <?= $products->description; ?> </textarea>
                                                </div>
                                                <label for="basic-url">Price</label>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <!-- <span class="input-group-text" id="basic-addon3">Male/Female/Unisex</span> -->
                                                    </div>
                                                    <input value="<?= $products->price; ?>" type="text" name="price" id="price" class="form-control" required readonly disabled>
                                                </div>
                                                
                                                <input type="hidden" name="id" value="<?= $products->id ?>">
                                            </div>
                                            <div class="">
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <!-- New Card for Sizes and Additional Price Per Size -->
                        <div class="card shadow mb-4">
                            <div class="card-body">
                                <form method="POST" action="product_size_add.php">
                                    <div>
                                        <h6 class="m-0 font-weight-bold text-primary mb-3">Product Sizes</h6>
                                        <div class="row">
                                            <div class="col-6">
                                                <label for="size_name">Size</label>
                                                <div class="input-group mb-3">
                                                    <input type="text" name="size_name" id="size_name" class="form-control" placeholder="Enter size (e.g., Small, Medium, Large)" required>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <label for="size_display">Size Display</label>
                                                <div class="input-group mb-3">
                                                    <input type="text" name="size_display" id="size_display" class="form-control" placeholder="Enter size (e.g., S, M, L)" required>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <label for="size_price">Additional Price</label>
                                                <div class="input-group mb-3">
                                                    <input type="text" name="size_price" id="size_price" class="form-control" placeholder="Enter additional price for this size" required>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <label for="price_after">Price After</label>
                                                <div class="input-group mb-3">
                                                    <input type="text" name="price_after" id="price_after" class="form-control" value="<?= $products->price ?>" readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <input type="hidden" name="product_id" value="<?= $products->id ?>">
                                        <button type="submit" class="btn btn-primary" name="produce-size-add">Add Size</button>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <!-- Table for Displaying Sizes and Additional Prices -->
                        <div class="card shadow mb-4">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="sizesTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Size</th>
                                                <th>Size Display</th>
                                                <th>Additional Price</th>
                                                <th>Price After</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($product_sizes as $size): ?>
                                                <tr>
                                                    <td><?= $size['size_name'] ?></td>
                                                    <td><?= $size['size_display'] ?></td>
                                                    <td><?= $size['size_price'] ?></td>
                                                    <td><?= $size['size_price'] + $products->price ?></td>
                                                    <td>
                                                        <button class="btn btn-primary btn-sm edit-btn" data-toggle="modal" data-target="#editModal" data-id="<?= $size['id'] ?>" data-name="<?= $size['size_name'] ?>" data-display="<?= $size['size_display'] ?>" data-price="<?= $size['size_price'] ?>">Edit</button>
                                                        <button class="btn btn-danger btn-sm delete-btn" data-toggle="modal" data-target="#deleteModal" data-id="<?= $size['id'] ?>" data-name="<?= $size['size_name'] ?>">Delete</button>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <!-- Edit Modal -->
                        <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <form method="POST" action="product_size_edit.php">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="editModalLabel">Edit Size</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <input type="hidden" name="id" id="edit-size-id">
                                            <input type="hidden" name="product_id" value="<?=$products->id?>">
                                            <div class="form-group">
                                                <label for="edit-size-name">Size</label>
                                                <input type="text" name="size_name" id="edit-size-name" class="form-control" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="edit-size-display">Size Display</label>
                                                <input type="text" name="size_display" id="edit-size-display" class="form-control" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="edit-size-price">Additional Price</label>
                                                <input type="text" name="size_price" id="edit-size-price" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary" name="product_size_edit">Save changes</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <!-- Delete Modal -->
                        <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <form method="POST" action="product_size_delete.php">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="deleteModalLabel">Delete Size</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <input type="hidden" name="id" id="delete-size-id">
                                            <input type="hidden" name="product_id" value="<?=$products->id?>">
                                            <p>Are you sure you want to delete the size <strong id="delete-size-name"></strong>?</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-danger" name="product_size_delete">Delete</button>
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
        document.getElementById('size_price').addEventListener('input', function (e) {
            let priceAfter = document.getElementById('price_after');
            priceAfter.value = 0;
            priceAfter.value="<?= $products->price?>";
            let additional = 0;
            let value = e.target.value;
            
            // Remove any non-numeric characters and negative signs
            let cleanValue = value.replace(/[^0-9.]/g, '');
            cleanValue = cleanValue.replace(/^-/, '');

            // Remove extra decimals
            if ((cleanValue.match(/\./g) || []).length > 1) {
                cleanValue = cleanValue.replace(/\.+$/, "");
            }
            
            // If the cleaned value is different from the original, it means invalid characters were present
            if (value !== cleanValue) {
                e.target.value = cleanValue;
                return; // Early exit if invalid input
            }

            e.target.value = cleanValue;
            additional += parseInt(cleanValue || 0);
            priceAfter.value = (parseInt(priceAfter.value || 0) + additional).toFixed(2);
        });
    </script>

    <script>
        // Pass data to Edit Modal
        $('#editModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var id = button.data('id');
            var name = button.data('name');
            var display = button.data('display');
            var price = button.data('price');

            var modal = $(this);
            modal.find('#edit-size-id').val(id);
            modal.find('#edit-size-name').val(name);
            modal.find('#edit-size-display').val(display);
            modal.find('#edit-size-price').val(price);
        });

        // Pass data to Delete Modal
        $('#deleteModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var id = button.data('id');
            var name = button.data('name');

            var modal = $(this);
            modal.find('#delete-size-id').val(id);
            modal.find('#delete-size-name').text(name);
        });
    </script>

