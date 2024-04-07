
<?php 
include_once("./includes/header.php"); 

spl_autoload_register(function ($class) {
    include '../models/' . $class . '.php';
  });

    if( !isset($_REQUEST['id']) || !$_REQUEST['id'] ){
        header("Location: product-list.php");
    }

    if( !isset($_REQUEST['product_id']) || !$_REQUEST['product_id'] ){
        header("Location: product-list.php");
    }

  $id = $_GET['id'];
  $product_id = $_GET['product_id'];
  $product_data = new ProductColor;
  $product_color_data = $product_data->findProductColor($id);
//   diplayDataTest($product_color_data);
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
                    <h1 class="h3 mb-4 text-gray-800"> Product Color Edit</h1>
                    <div>
                        <a href="product-color-list.php?product_id=<?= $product_id ?>" type="button" class="btn btn-warning btn-icon-split">
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
                            <form method="POST" action="product-color-update.php" enctype="multipart/form-data">
                                <div >
                                    <div >
                                        <div class="">
                                            <div class="row">
                                                <div class="col-12 col-md-6 col-lg-6 col-sm-12 col-xs-12">
                                                    <input type="hidden" name="id" value="<?= $product_color_data->id ?>" >
                                                    <label for="color">Name:</label>
                                                    <div class="input-group">
                                                        <input value="<?= $product_color_data->name ?>" type="text" name="color" id="color" class="form-control bg-light border-0 small" placeholder="Color" aria-label="Color" aria-describedby="basic-addon2" required>
                                                    </div>
                                                    <br>
                                                </div>

                                                <div class="col-12 col-md-6 col-lg-6 col-sm-12 col-xs-12">
                                                    <label for="product_name">Product:</label>
                                                    <div class="input-group">
                                                        <input value="<?= $product_color_data->product_name ?>" readonly type="text" name="product_name" id="product_name" class="form-control bg-light border-0 small" placeholder="Product Name" aria-label="Product Name" aria-describedby="basic-addon2" required>
                                                        <input type="hidden" name="product_id" value="<?= $product_color_data->product_id ?>" >
                                                    </div>
                                                    <br>
                                                </div>

                                                <div class="col-12 col-md-6 col-lg-6 col-sm-12 col-xs-12">
                                                    <label for="stock_qty">Quantity:</label>
                                                    <div class="input-group">
                                                        <input value="<?= $product_color_data->stock_qty ?>" type="number" name="stock_qty" id="stock_qty" class="form-control bg-light border-0 small" placeholder="Quantity" aria-label="Quantity" aria-describedby="basic-addon2" required>
                                                    </div>
                                                    <br>
                                                </div>
                                                
                                                <div class="col-12 col-md-6 col-lg-6 col-sm-12 col-xs-12">
                                                    <label for="stock_qty">Color:</label>
                                                    <div class="input-group example square">
                                                        <input value="<?= $product_color_data->code ?>" type="text" class="coloris form-control bg-light border-0 small"  name="color_selected" id="color_selected">
                                                    </div>
                                                    <br>
                                                </div>

                                            </div>
                                        
                                            <br>
                                            
                                            <div class="input-group">
                                                <input type="file" name="fileToUpload" id="fileToUpload" class="form-control bg-light border-0 small" placeholder="Image" aria-label="Image" >
                                            </div>
                                            <!-- Image preview element -->
                                            <div id="imagePreview" class="mt-4"></div>
                                        </div>
                                        <div class="mt-4">
                                            <input type="submit" class="btn btn-primary" name="edit-product-color" value="Submit">
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



    <?php include_once("./includes/scripts.php"); ?>
    <?php include_once("./includes/footer.php"); ?>

    <script> 

        // Fetch the image URL from the database
        let imgUrl = '<?=$product_color_data->image; ?>';
        if(imgUrl){
            // Get the imagePreview div
            let imagePreview = document.getElementById("imagePreview");

            // Create a new image preview
            let img = document.createElement("img");
            img.src = imgUrl;
            img.onload = function () {
                URL.revokeObjectURL(img.src);  // free memory
            };
            imagePreview.appendChild(img);
        }
            

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


