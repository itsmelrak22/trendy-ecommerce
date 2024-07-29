
<?php 
    include_once("./includes/header.php"); 

    spl_autoload_register(function ($class) {
        include '../models/' . $class . '.php';
    });

    $product = new Product;
    $products = $product->getProducts();

    $category = new Category;
    $categories = $category->all();



    foreach ($products as &$product) {
        $hasLowStock = false;

        foreach ($product['colors'] as &$color) {
            if ($color['stock_qty'] <= 10) {
                $color['lowStock'] = true;
                $hasLowStock = true;
            }
        }

        if ($hasLowStock) {
            $product['hasLowStock'] = true;
        }
    }

    // displayDataTest( $categories );
    $jsonData = json_encode($products);
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

                    <div class="card-body row">
                        <div class="col-md-4 d-flex justify-content-start">
                            <button type="button" class="btn btn-primary btn-icon-split" data-toggle="modal" data-target="#addModal">
                                <span class="icon text-white-50">
                                    <i class="fas fa-plus"></i>
                                </span>
                                <span class="text">Add</span>
                            </button>
                        </div>
                        <div class="col-md-8 d-flex justify-content-between">
                            <button class="btn btn-danger btn-sm mx-1" id="previewPDF">View Critical Stock List PDF</button>
                            <button class="btn btn-danger btn-sm mx-1" id="downloadPDF">Download Critical Stock List PDF</button>
                        </div>
                    </div>


                    <hr>
                        <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Product List</h6>
                            
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="productTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Product  </th>
                                            <th>Category  </th>
                                            <th>Description</th>
                                            <th>Price</th>
                                            <!-- <th>Quantity</th> -->
                                            <th>Date Created</th>
                                            <th>Date Updated</th>
                                            <th style="width: 175px;">Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Product</th>
                                            <th>Category  </th>
                                            <th>Description</th>
                                            <th>Price</th>
                                            <!-- <th>Quantity</th> -->
                                            <th>Date Created</th>
                                            <th>Date Updated</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php foreach ($products as $key => $product) { ?>
                                            <tr <?= isset( $product['hasLowStock'] ) ? 'style="background-color: #a15b5b; color: black;"' : '' ?>>
                                                <td> <?= $product['name'] ?> </td>
                                                <td> <?= $product['category_name'] ?> </td>
                                                <td> <?= $product['description'] ?> </td>
                                                <td> <?= $product['price'] ?> </td>
                                                <!-- <td> <?php //$product['stock_qty'] ?> </td> -->
                                                <td> <?= $product['created_at'] ?> </td>
                                                <td> <?= $product['updated_at'] ?> </td>
                                                <td>
                                                    <form action="product-delete.php" method="POST">
                                                        <a href="product-color-list.php?product_id=<?=$product['id']?>" class="btn btn-success btn-circle btn-sm" data-toggle="tooltip" data-placement="top" title="Colors">
                                                            <i class="fa fa-paint-brush" aria-hidden="true"></i>
                                                        </a>
                                                        <a href="product-edit.php?id=<?=$product['id']?>" class="btn btn-warning btn-circle btn-sm" data-toggle="tooltip" data-placement="top" title="Edit">
                                                            <i class="fas fa-pencil-alt"></i>
                                                        </a>
                                                        <a href="product-view.php?id=<?=$product['id']?>" class="btn btn-primary btn-circle btn-sm" data-toggle="tooltip" data-placement="top" title="View">
                                                            <i class="fas fa-arrow-right"></i>
                                                        </a>
                                                        <input type="hidden" name="id" value="<?=$product['id']?>">
                                                        <button type="submit" name="delete-product" class="btn btn-danger btn-circle btn-sm" data-toggle="tooltip" data-placement="top" title="Delete" value="submit">
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
    <form method="POST" action="product-insert.php" enctype="multipart/form-data">
        <div class="modal" tabindex="-1" id="addModal">
            <div class="modal-dialog modal-lg modal-dialog modal-dialog-centered">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title font-weight-bold text-primary">Add Product</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="">
                        <div class="row">

                            <div class="col-12 col-md-6 col-lg-6 col-sm-12 col-xs-12">
                                <div class="input-group">
                                    <input type="text" name="product_name" id="product_name" class="form-control bg-light border-0 small" placeholder="Product Name" aria-label="Product Name" aria-describedby="basic-addon2" required>
                                </div>
                                <br>
                            </div>

                            <div class="col-12 col-md-6 col-lg-6 col-sm-12 col-xs-12">
                                <div class="input-group">
                                    <select name="category_id" class="custom-select form-control bg-light border-0 small" for="category">
                                        <?php foreach($categories as $key => $category) { ?>
                                        <option value="<?= $category['id'] ?>"><?= $category['name'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <br>
                            </div>

                            <div class="col-12 col-md-6 col-lg-6 col-sm-12 col-xs-12">
                                <div class="input-group">
                                    <input type="number" name="price" id="price" class="form-control bg-light border-0 small" placeholder="Price" aria-label="Price" aria-describedby="basic-addon2" required>
                                </div>
                                <br>
                            </div>

                        </div>
                        <div class="input-group">
                            <textarea type="text" name="description" id="description" class="form-control bg-light border-0 small" placeholder="Description" aria-label="Description" aria-describedby="basic-addon2" required cols="15" rows="10"></textarea>
                        </div>
                       
                        <br>
                        <div id="imagePreview"></div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-primary" name="add-product" value="Submit">
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
        $('#productTable').DataTable({
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

    // document.getElementById("fileToUpload").onchange = function (e) {
    //     // Get the file extension
    //     let fileExtension = e.target.files[0].name.split('.').pop().toLowerCase();
    //     let isValidFile = false;

    //     // Define allowed extensions
    //     let allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];

    //     // Check if file is an allowed extension
    //     if(allowedExtensions.indexOf(fileExtension) > -1){
    //         isValidFile = true;
    //     }

    //     if(isValidFile){
    //         // Remove the old image preview
    //         let imagePreview = document.getElementById("imagePreview");
    //         while(imagePreview.firstChild){
    //             imagePreview.removeChild(imagePreview.firstChild);
    //         }

    //         // Create a new image preview
    //         let img = document.createElement("img");
    //         img.src = URL.createObjectURL(e.target.files[0]);
    //         img.onload = function () {
    //             URL.revokeObjectURL(img.src);  // free memory
    //         };
    //         imagePreview.appendChild(img);
    //     } else {
    //         alert('Please upload a file with a valid image extension (jpg, jpeg, png, gif).');
    //         e.target.value = '';  // Clear the input value
    //         imagePreview.removeChild(imagePreview.firstChild);

    //     }
    // };

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

<script>
    $(document).ready(function() {

        const { jsPDF } = window.jspdf;

        // Parse JSON data from PHP
        const data = <?php echo $jsonData; ?>;

        // Filter products with low stock
        const lowStockProducts = data.filter(product => product.hasLowStock);
        function generatePDF() {
        let doc = new jsPDF();

        // Center alignment function
        function centerText(text, yPosition) {
            const textWidth = doc.getStringUnitWidth(text) * doc.internal.getFontSize() / doc.internal.scaleFactor;
            const textOffset = (doc.internal.pageSize.width - textWidth) / 2;
            doc.text(text, textOffset, yPosition);
        }

        // Add image to the top right corner
        const img = new Image();
        img.src = '../assets/carousel/Logo2.jpeg';

        return new Promise((resolve) => {
            img.onload = function () {
                doc.addImage(img, 'JPEG', 170, 10, 20, 10);

                // Store name
                doc.setFontSize(16);
                centerText('TRENDY THREADS APPAREL', 20);

                // Address
                doc.setFontSize(11);
                centerText('9070 DR. SOLIS STREET JULUGAN 8, TANZA, CAVITE', 30);

                doc.setFontSize(11);
                centerText("Facebook: TRENDY THREADS APPAREL", 35);
                doc.setFontSize(11);
                centerText("Instagram: TRENDTHREAD_APPAREL", 40);

                // Basic Info
                doc.setFontSize(11);
                centerText('Contact: 639636099067', 45);

                // Title of the report
                doc.setFontSize(14);
                centerText('Low Stock Report', 55);

                // Prepare table data
                const tableData = lowStockProducts.map(product => {
                    return product.colors.filter(color => color.lowStock).map(color => [
                        product.name,
                        color.name,
                        color.stock_qty
                    ]);
                }).flat();

                // Define table columns
                const tableColumns = ["Product Name", "Color", "Stock Quantity"];

                // Add the table to the PDF
                doc.autoTable({
                    head: [tableColumns],
                    body: tableData,
                    startY: 60,
                    theme: 'grid',
                    footStyles: { fillColor: [0, 0, 0] }
                });

                // Footer
                doc.setFontSize(10);
                doc.text('Prepared by: Admin', 14, doc.internal.pageSize.height - 10);

                // Add page numbers
                const pageCount = doc.internal.getNumberOfPages();
                for (let i = 1; i <= pageCount; i++) {
                    doc.setPage(i);
                    doc.text(`Page ${i} of ${pageCount}`, doc.internal.pageSize.width - 30, doc.internal.pageSize.height - 10);
                }

                resolve(doc);
            };
        });
    }

        function previewPdf() {
            generatePDF().then(doc => {
                let string = doc.output('datauristring');
                let iframe = "<iframe width='100%' height='100%' src='" + string + "'></iframe>";
                let x = window.open();
                x.document.open();
                            x.document.write(iframe);
                x.document.close();
            });
        }

        function downloadPdf() {
            generatePDF().then(doc => {
                let date = new Date();
                doc.save(`low-stock-report-${date.toISOString().split('T')[0]}.pdf`);
            });
        }

            
        // Attach click event to download PDF button
        $('#downloadPDF').click(function() {
            downloadPdf()
        });

        // Attach click event to preview PDF button
        $('#previewPDF').click(function() {
            previewPdf()
        });
    });

</script>

<script>
  tinymce.init({
    selector: '#description',
    plugins: 'advlist autolink lists link image charmap print preview hr anchor pagebreak',
    // toolbar_mode: 'floating',
  });
</script>