
<?php 
    include_once("./includes/header.php"); 

    spl_autoload_register(function ($class) {
        include '../models/' . $class . '.php';
    });

    if( !isset($_REQUEST['product_id']) || !$_REQUEST['product_id'] ){
        header("Location: product-list.php");
    }

    $product_id = $_REQUEST['product_id'];

    $product_color = new ProductColor;
    $product_colors = $product_color->getProductColors($product_id);

    
    $parent = new Product;
    $parentProduct = $parent->find($product_id);

    // print_r($product_colors);
    // displayDataTest($product_colors);

?>

<style>
    #imagePreview {
        display: flex;
        justify-content: center;
        align-items: center;
    }
    #imagePreview img{
        max-width: 250px !important;
    }
</style>

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
                    <h1 class="h3 mb-4 text-gray-800">Product Color Page</h1>
                    <span>
                        <a href="product-color-list.php" type="button" class="btn btn-warning btn-icon-split">
                            <span class="icon text-white-50">
                                <i class="fas fa-arrow-left"></i>
                            </span>
                            <span class="text">Return</span>
                        </a>

                        <button type="button" class="btn btn-primary btn-icon-split" data-toggle="modal" data-target="#addModal">
                            <span class="icon text-white-50">
                                <i class="fas fa-plus"></i>
                            </span>
                            <span class="text">Add</span>
                        </button>
                    </span>


                    <hr>
                        <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Product : <?= $parentProduct->name ?></h6>
                            
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="productTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Code</th>
                                            <th style="width: 75px !important">Color</th>
                                            <th>Quantity</th>
                                            <th>Image</th>
                                            <th>Date Created</th>
                                            <th>Date Updated</th>
                                            <th style="width: 175px">Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Name</th>
                                            <th>Code</th>
                                            <th style="width: 75px !important">Color</th>
                                            <th>Quantity</th>
                                            <th>Image</th>
                                            <th>Date Created</th>
                                            <th>Date Updated</th>
                                            <th style="width: 175px">Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php foreach ($product_colors as $key => $product_color) { ?>
                                            <tr>
                                                <td> <?= $product_color['name'] ?> </td>
                                                <td> <?= $product_color['code'] ?> </td>
                                                <td style="max-width: 70px !important; background-color: <?= $product_color['code'] ?>">  </td>
                                                <td> <?= $product_color['stock_qty'] ?> </td>
                                                <td> 
                                                    <img src="./<?=$product_color['image'] ?>" alt="" width="75" height="75">
                                                </td>
                                                <td> <?= $product_color['created_at'] ?> </td>
                                                <td> <?= $product_color['updated_at'] ?> </td>
                                                <td>
                                                    <form action="product-color-delete.php" method="POST">
                                                        <a href="product-color-edit.php?id=<?=$product_color['id']?>&product_id=<?=$product_id ?>" class="btn btn-warning btn-circle btn-sm" data-toggle="tooltip" data-placement="top" title="Edit">
                                                            <i class="fas fa-pencil-alt"></i>
                                                        </a>
                                                        <a href="product-color-view.php?id=<?=$product_color['id']?>" class="btn btn-primary btn-circle btn-sm" data-toggle="tooltip" data-placement="top" title="View">
                                                            <i class="fas fa-arrow-right"></i>
                                                        </a>
                                                        <input type="hidden" name="id" value="<?=$product_color['id']?>">
                                                        <input type="hidden" name="product_id" value="<?=$product_color['product_id']?>">
                                                        <button type="submit" name="delete-product-color" class="btn btn-danger btn-circle btn-sm" data-toggle="tooltip" data-placement="top" title="Delete" value="submit">
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



    <!-- MODALS -->
    <form method="POST" action="product-color-insert.php" enctype="multipart/form-data">
        <div class="modal" tabindex="-1" id="addModal">
            <div class="modal-dialog modal-lg modal-dialog modal-dialog-centered">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title font-weight-bold text-primary">Add Color</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="">
                        <div class="row">

                            <div class="col-12 col-md-6 col-lg-6 col-sm-12 col-xs-12">
                                <div class="input-group">
                                    <input type="text" name="color" id="color" class="form-control bg-light border-0 small" placeholder="Color" aria-label="Color" aria-describedby="basic-addon2" required>
                                </div>
                                <br>
                            </div>

                            <div class="col-12 col-md-6 col-lg-6 col-sm-12 col-xs-12">
                                <div class="input-group">
                                    <input value="<?= $parentProduct->name ?>" readonly type="text" name="product_name" id="product_name" class="form-control bg-light border-0 small" placeholder="Product Name" aria-label="Product Name" aria-describedby="basic-addon2" required>
                                    <input type="hidden" name="product_id" value="<?= $parentProduct->id ?>" >
                                </div>
                                <br>
                            </div>

                            <div class="col-12 col-md-6 col-lg-6 col-sm-12 col-xs-12">
                                <div class="input-group">
                                    <input type="number" name="stock_qty" id="stock_qty" class="form-control bg-light border-0 small" placeholder="Quantity" aria-label="Quantity" aria-describedby="basic-addon2" required>
                                </div>
                                <br>
                            </div>
                            
                            <div class="col-12 col-md-6 col-lg-6 col-sm-12 col-xs-12">
                                <div class="input-group example square">
                                    <input type="text" class="coloris form-control bg-light border-0 small" value="#00a5cc" name="color_selected" id="color_selected">
                                </div>
                                <br>
                            </div>

                        </div>
                       
                        <br>
                        <div class="input-group">
                            <input type="file" name="fileToUpload" id="fileToUpload" class="form-control bg-light border-0 small" 
                                    placeholder="Image" aria-label="Image" required>
                        </div>
                        <!-- Image preview element -->
                        <div id="imagePreview"></div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-primary" name="add-color" value="Submit">
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
    
    
        document.getElementById("fileToUpload").onchange = function (e) {
            // Get the file extension
            let fileExtension = e.target.files[0].name.split('.').pop().toLowerCase();
            let isValidFile = false;

            // Define allowed extensions
            let allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];

            // Check if file is an allowed extension
            if(allowedExtensions.indexOf(fileExtension) > -1){
                isValidFile = true;
            }

            if(isValidFile){
                // Remove the old image preview
                let imagePreview = document.getElementById("imagePreview");
                while(imagePreview.firstChild){
                    imagePreview.removeChild(imagePreview.firstChild);
                }

                // Create a new image preview
                let img = document.createElement("img");
                img.src = URL.createObjectURL(e.target.files[0]);
                img.onload = function () {
                    URL.revokeObjectURL(img.src);  // free memory
                };
                imagePreview.appendChild(img);
            } else {
                alert('Please upload a file with a valid image extension (jpg, jpeg, png, gif).');
                e.target.value = '';  // Clear the input value
                imagePreview.removeChild(imagePreview.firstChild);

            }


        };

</script>

<!-- COLORS -->
<script> 

/** Default configuration **/

Coloris({
      el: '.coloris',
      swatches: [
        '#ffffff',
        '#000000',
        '#264653',
        '#2a9d8f',
        '#e9c46a',
        '#f4a261',
        '#e76f51',
        '#d62828',
        '#023e8a',
        '#0077b6',
        '#0096c7',
        '#00b4d8',
        '#48cae4'
      ]
    });

    $("#picker1").colorPick({
        'initialColor' : '#FFFFFF',
        'palette': ["#FFFFFF","#000000","#1abc9c", "#16a085", "#2ecc71", "#27ae60", "#3498db", "#2980b9", "#9b59b6", "#8e44ad", "#34495e", "#2c3e50", "#f1c40f", "#f39c12", "#e67e22", "#d35400", "#e74c3c", "#c0392b", "#ecf0f1"],
        'onColorSelected': function() {
            console.log("The user has selected the color: " + this.color)
            this.element.css({'backgroundColor': this.color, 'color': this.color});
            const form = document.getElementById("color_selected");
            console.log('form', form)
            form.value = this.color
        }
    });

</script>