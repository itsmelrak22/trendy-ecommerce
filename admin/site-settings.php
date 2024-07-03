
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
  $site_setting_ = new SiteSetting;
  $site_setting = $site_setting_->getSiteSettingsLatest();
  $site_setting = json_decode($site_setting->json_data);

  $product_ = new Product;
  $products = $product_->getProductWIthDistictColor();
//   $products2 = $product_->getRankedProducts();

//   displayDataTest($site_setting);
?>
   <!-- Select2 CSS -->
   <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet">
    <style>
        .select2-container .select2-selection--single {
            height: 38px;
        }
        .select2-container--default .select2-selection--single .select2-selection__rendered {
            line-height: 38px;
        }
        .select2-container--default .select2-selection--single .select2-selection__arrow {
            height: 38px;
        }
        .select2-results__option img {
            width: 50px;
            height: 50px;
            margin-right: 10px;
        }

        #imagePreview {
            display: flex;
            justify-content: center;
            align-items: center;
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

                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                        <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            
                        </div>
                        <div class="card-body">
                            <form action="update-site-settings.php" method="post" enctype="multipart/form-data" >     
                                <button class="my-4 btn btn-primary" type="submit" name="update-site-settings" value="update-site-settings">Update Site Settings</button>                          
                                <div class="card mb-2 py-3 border-left-primary">
                                    <h5 class="mx-2 m-0 font-weight-bold text-primary">Banner Settings</h5>
                                    <div class="card-body form-group">
                                        <p class="lead">
                                            Banner 2nd Image
                                        </p>
                                        <div id="defaultBanner" <?=$site_setting->customRadio == "uploadSelectedBanner" || $site_setting->customRadio == "setSelectedProductBanner" ? 'style="display: none"' : '' ?> >
                                            <img src="../assets/carousel/2.jpg"  class="img-fluid rounded mx-auto d-block" alt="banner2.png" style="height: 250px;">
                                        </div>
                                        <div id="imagePreview">
                                            <?php if($site_setting->customRadio == "uploadSelectedBanner"){
                                                $banner = $site_setting->Banner;
                                                echo ' <img style="display: block" class="img-fluid rounded mx-auto d-block" src="'. "$banner" .'"> ';
                                            } ?>
                                        </div>


                                        <hr>
                                        <label class="font-weight-bold">Change banner 2nd image</label>
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="setDefaultImage" name="customRadio" class="custom-control-input" value="setDefaultImage" onchange="toggleFileUpload()" <?=isset( $site_setting->customRadio ) && $site_setting->customRadio == "setDefaultImage" ? 'checked' : ''  ?> >
                                            <label class="custom-control-label" for="setDefaultImage">Set default image as 2nd banner.</label>
                                        </div>
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="uploadSelectedBanner" name="customRadio" class="custom-control-input" value="uploadSelectedBanner" onchange="toggleFileUpload()" <?=isset( $site_setting->customRadio ) && $site_setting->customRadio == "uploadSelectedBanner" ? 'checked' : '' ?> >
                                            <label class="custom-control-label" for="uploadSelectedBanner">Set uploaded photo as 2nd banner.</label>
                                        </div>
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="setSelectedProductBanner" name="customRadio" class="custom-control-input" value="setSelectedProductBanner" onchange="toggleFileUpload()"  <?=isset( $site_setting->customRadio ) && $site_setting->customRadio == "setSelectedProductBanner" ? 'checked' : 'disabled' ?>>
                                            <label class="custom-control-label" for="setSelectedProductBanner">Set promo product image as 2nd banner. <span class="text-danger">(select promo product to enable)</span></label>
                                        </div>
                                        <div class="input-group mb-3 hidden" id="fileUploadContainer" >
                                            <input <?=isset( $site_setting->customRadio ) && $site_setting->customRadio == "uploadSelectedBanner" ? '' : 'style="display: none"' ?>  type="file" name="fileToUpload" id="fileToUpload" class="form-control bg-light border-0 small" placeholder="Image" aria-label="Image">
                                        </div>
                                    </div>

                                    <hr>
                                    <div class="card-body form-group">
                                        <p class="lead">
                                            Banner 3rd Image
                                        </p>
                                        <div id="defaultBanner2" <?=$site_setting->customRadio2 == "uploadSelectedBanner2" || $site_setting->customRadio2 == "setSelectedProductBanner2" ? 'style="display: none"' : '' ?> >
                                            <img src="../assets/carousel/3.jpg"  class="img-fluid rounded mx-auto d-block" alt="banner2.png" style="height: 250px;">
                                        </div>
                                        <div id="imagePreview2">
                                            <?php if($site_setting->customRadio2 == "uploadSelectedBanner2"){
                                                $banner = $site_setting->Banner2;
                                                echo ' <img style="display: block" class="img-fluid rounded mx-auto d-block" src="'. "$banner" .'"> ';
                                            } ?>
                                        </div>


                                        <hr>
                                        <label class="font-weight-bold">Change banner 3rd image</label>
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="setDefaultImage2" name="customRadio2" class="custom-control-input" value="setDefaultImage2" onchange="toggleFileUpload2()" <?=isset( $site_setting->customRadio2 ) && $site_setting->customRadio2 == "setDefaultImage2" ? 'checked' : ''  ?>>
                                            <label class="custom-control-label" for="setDefaultImage2">Set default image as 3rd banner.</label>
                                        </div>
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="uploadSelectedBanner2" name="customRadio2" class="custom-control-input" value="uploadSelectedBanner2" onchange="toggleFileUpload2()"  <?=isset( $site_setting->customRadio2 ) && $site_setting->customRadio2 == "uploadSelectedBanner2" ? 'checked' : '' ?>>
                                            <label class="custom-control-label" for="uploadSelectedBanner2">Set uploaded photo as 3rd banner.</label>
                                        </div>
                                        <div class="input-group mb-3 hidden" id="fileUploadContainer2" >
                                            <input style="display: none" type="file" name="fileToUpload2" id="fileToUpload2" class="form-control bg-light border-0 small" placeholder="Image" aria-label="Image">
                                        </div>


                                        
                                    </div>
                                </div>

                                <div class="card mb-2 py-3 border-left-primary">
                                    <h5 class="mx-2 m-0 font-weight-bold text-primary">Promo Product Settings</h5>
                                    <div class="card-body form-group">
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="promo-product-checkbox">
                                                    <label class="form-check-label font-weight-bold" for="promo-product-checkbox">
                                                        Promo Product
                                                    </label>
                                                </div>
                                                <div class="input-group mb-3">
                                                    <select id="product-select" name="product-select" class="form-control" style="width: 100%;" disabled>
                                                    <option></option></select>
                                                </div>
                                            </div>

                                            <div class="col-6">
                                                <label class="font-weight-bold">Promo percentage</label>
                                                <input class="form-control" name="discountPercentage" type="text" id="discountPercentage"  title="Please enter a number between 1 and 100" maxlength="3" oninput="this.value = this.value.replace(/[^0-9]/g, '').substring(0, 3)" disabled>
                                            </div>

                                            <div class="col-6">
                                                <label class="font-weight-bold">Regular Price</label>
                                                <input type="text" name="productPrice" id="productPrice" class="form-control" readonly>
                                            </div>
                                            <div class="col-6">
                                                <label class="font-weight-bold">Discounted Price</label>
                                                <input type="text" name="discountedPrice" id="discountedPrice" class="form-control" readonly>
                                            </div>
                                        </div>
                                        
                                        
                                        <input type="hidden" name="productImage" id="productImage" value="">
                                        <input type="hidden" name="Banner" id="Banner" value="">
                                        <input type="hidden" name="Banner2" id="Banner2" value="">
                                        <input type="hidden" name="color_id" id="color_id" value="">
                                        <label class="font-weight-bold my-2" >Image: </label>
                                        <div id="productPreview" class="my-2"></div>

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
                    <a class="btn btn-primary" href="login.php?logout=yes">Logout</a>

                </div>
            </div>
        </div>
    </div>


    <?php include_once("./includes/scripts.php"); ?>
<?php include_once("./includes/footer.php"); ?>
    <!-- Select2 JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
    <script>
    $(document).ready(function() {
        // Sample product data
        var products = [
            <?php foreach ($products as $key => $value) {
                $image = $value['image'];
                $name = $value['name'];
                $id = $value['id'];
                $price = $value['price'];
                $color_name = $value['color_name'];
                $color_id = $value['color_id'];

                echo "{ id: $id, text: '$name', image: './$image', price: $price, color_name: '$color_name', color_id: '$color_id' },";
            } ?>
        ];

        // Initialize Select2
        $('#product-select').select2({
            data: products,
            templateResult: formatProduct,
            templateSelection: formatProductSelection,
            placeholder: 'Select a product',
            allowClear: true
        });

        // Event listener for the product select change
        $('#product-select').change(function() {
            var selectedProduct = $(this).select2('data')[0];
            // console.log('Selected product:', selectedProduct);
            let setSelectedProductBanner = document.getElementById("setSelectedProductBanner");
            let productPreview = document.getElementById("productPreview");
            let discountPercentage = document.getElementById("discountPercentage");
            let productImage = document.getElementById("productImage");
            let color_id = document.getElementById("color_id");

            if(!selectedProduct.id) {
                setSelectedProductBanner.disabled = true; 
                setSelectedProductBanner.checked = false; 
                if(productPreview.firstChild){
                    productPreview.removeChild(productPreview.firstChild);
                }
                discountPercentage.disabled = true
                discountPercentage.value = null
                productPrice.value = null

                return
            }

            if(setSelectedProductBanner.disabled){
                setSelectedProductBanner.disabled = false
            }

            if(productPreview.firstChild){
                productPreview.removeChild(productPreview.firstChild);
            }

            let img = document.createElement("img");
            img.classList = "img-fluid rounded mx-auto d-block"
            img.src = selectedProduct.image;
            productPreview.appendChild(img);
            discountPercentage.disabled = false
            productPrice.value = selectedProduct.price
            productImage.value = selectedProduct.image;
            color_id.value = selectedProduct.color_id
        });


        function formatProduct(product) {
            if (!product.id) {
                return product.text;
            }
            var $product = $(
                `<span><img src="${product.image}" class="img-thumbnail" /> ${product.text} - ₱ ${product.price} </span>`
            );
            return $product;
        }

        function formatProductSelection(product) {
            if (!product.id) {
                return product.text;
            }
            return `${product.text}  - (${product.color_name}) `;
        }

        $('#promo-product-checkbox').change(function() {
            if ($(this).is(':checked')) {
                $('#product-select').val(null).trigger('change'); // Clear the Select2 value and trigger change
                $('#product-select').prop('disabled', false);
                $('#discountPercentage').prop('disabled', false);
                $('#discountPercentage').prop('required', true);
            } else {
                $('#discountPercentage').prop('required', false);
                $('#discountPercentage').prop('disabled', true);
                $('#discountedPrice').val('');
                $('#product-select').prop('disabled', true).val(null).trigger('change'); // Clear the Select2 value and trigger change
            }
        });

        <?php if($site_setting->productSelect){
            $productSelect = $site_setting->productSelect;
            $discountPercentage = $site_setting->discountPercentage;
            $discountedPrice = $site_setting->discountedPrice;
            $Banner = $site_setting->Banner;
            $customRadio = $site_setting->customRadio;
            // $discountPercentage = str_replace('%', '', $discountPercentage);
            echo "$('#promo-product-checkbox').click() \n";
            echo "$('#product-select').val($productSelect).trigger('change'); \n";
            echo "$('#discountPercentage').val('$discountPercentage')\n";
            echo "$('#discountedPrice').val('$discountedPrice')\n";
            echo "$('#Banner').val('$Banner')\n";
            echo "$('#$customRadio').prop('checked', true)\n";

        } ?> 

    });
</script>
    <script>
        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
        })


        $('#addModal').on('shown.bs.modal', function () {
            $('#addModal').trigger('focus')
        })
    </script>

    <script>
        function handleFileupload(type = ''){
             // Get the file extension
             let defaultBanner = document.getElementById(`defaultBanner${type}`);
            let imagePreview = document.getElementById(`imagePreview${type}`);
            let fileToUpload = document.getElementById(`fileToUpload${type}`);
            let fileExtension
            let isValidFile = false;
            let allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];

            try {
                fileExtension = fileToUpload.files[0].name.split('.').pop().toLowerCase();
            } catch (error) {
                console.log(error)
                imagePreview.removeChild(imagePreview.firstChild);
                defaultBanner.style.display = "block";
                fileToUpload.value = '';  // Clear the input value

                return
            }

            if(allowedExtensions.indexOf(fileExtension) > -1){
                isValidFile = true;
            }

            console.log('isValidFile', isValidFile)

            if(isValidFile){
                // Remove the old image preview
                while(imagePreview.firstChild){
                    imagePreview.removeChild(imagePreview.firstChild);
                }

                // Create a new image preview
                let img = document.createElement("img");
                img.classList = "img-fluid rounded mx-auto d-block"
                img.src = URL.createObjectURL(fileToUpload.files[0]);
                img.onload = function () {
                    URL.revokeObjectURL(img.src);  // free memory
                };
                imagePreview.appendChild(img);


                defaultBanner.style.display = "none";

            } else {
                alert('Please upload a file with a valid image extension (jpg, jpeg, png, gif).');
                fileToUpload.value = '';  // Clear the input value
                imagePreview.removeChild(imagePreview.firstChild);
            }


        }
        document.getElementById("fileToUpload").onchange = function (e) {
            handleFileupload()
        };
        document.getElementById("fileToUpload2").onchange = function (e) {
            handleFileupload('2')
        };
    </script>

    <script>
        function toggleFileUpload() {
            var fileToUpload = document.getElementById('fileToUpload');
            var defaultBanner = document.getElementById('defaultBanner');
            var imagePreview = document.getElementById('imagePreview');
            var selectedValue = document.querySelector('input[name="customRadio"]:checked').value;
            console.log("selectedValue", selectedValue)
            if (selectedValue === 'uploadSelectedBanner') {
                fileToUpload.style.display = "block";
                imagePreview.style.display = "block";
                defaultBanner.style.display = "none";

            } else if(selectedValue === 'setDefaultImage'){
                fileToUpload.style.display = "none";
                imagePreview.style.display = "none";
                defaultBanner.style.display = "block";
                fileToUpload.value = '';  // Clear the input value
                if(imagePreview.firstChild){
                    imagePreview.removeChild(imagePreview.firstChild);
                }

            } else if(selectedValue === 'setSelectedProductBanner'){
                fileToUpload.style.display = "none";
                if(imagePreview.firstChild){
                    imagePreview.removeChild(imagePreview.firstChild);
                }

                fileToUpload.value = '';  // Clear the input value

            } else {
                fileToUpload.style.display = "none";
            }
        }
        function toggleFileUpload2() {
            var fileToUpload2 = document.getElementById('fileToUpload2');
            var defaultBanner2 = document.getElementById('defaultBanner2');
            var imagePreview2 = document.getElementById('imagePreview2');
            var selectedValue = document.querySelector('input[name="customRadio2"]:checked').value;
            console.log("selectedValue", selectedValue)
            if (selectedValue === 'uploadSelectedBanner2') {
                fileToUpload2.style.display = "block";
                imagePreview2.style.display = "block";
                defaultBanner2.style.display = "none";

            } else if(selectedValue === 'setDefaultImage2'){
                imagePreview2.style.display = "none";
                fileToUpload2.style.display = "none";
                defaultBanner2.style.display = "block";
                fileToUpload2.value = '';  // Clear the input value
                if(imagePreview2.firstChild){
                    imagePreview2.removeChild(imagePreview2.firstChild);
                }

            }  else {
                fileToUpload2.style.display = "none";
            }
        }
    </script>

    <script>
        document.getElementById('discountPercentage').addEventListener('input', function() {
            this.value = this.value.replace(/[^0-9]/g, '').substring(0, 3); // Ensure only numbers, max 3 digits
            if (this.value !== '') {
                this.value = parseInt(this.value); // Convert to integer
                if (this.value < 1) {
                    this.value = 1;
                } else if (this.value > 100) {
                    this.value = 100;
                }
                let discountPercentage = this.value;
                this.value = this.value + '%'; // Add "%" suffix

                let discountedPrice = document.getElementById("discountedPrice");
                let productPrice = Number(document.getElementById("productPrice").value);
                const discountAmount = (discountPercentage / 100) * productPrice;
                discountedPrice.value = productPrice - discountAmount;

            }
        });
    </script>
