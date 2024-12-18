
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

    $sale = new Sale;
    $sales_ = $sale->getAllSales();

    // displayDataTest( $sales_);

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
                    <?php include_once("./includes/topbar-nav.php"); ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->

                    <div>
                        <!-- <button type="button" class="btn btn-primary btn-icon-split" data-toggle="modal" data-target="#addModal">
                            <span class="icon text-white-50">
                                <i class="fas fa-plus"></i>
                            </span>
                            <span class="text">Add</span>
                        </button> -->
                    </div>

                    <hr>
                        <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Product List</h6>
                            
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="saleTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Customer </th>
                                            <th>Order #</th>
                                            <th>Order Details</th>
                                            <th>MOP</th>
                                            <th>Total</th>
                                            <th>Order Date</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Customer </th>
                                            <th>Order #</th>
                                            <th>Order Details</th>
                                            <th>MOP</th>
                                            <th>Total</th>
                                            <th>Order Date</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php foreach ($sales_ as $key => $sale) { ?>
                                            <tr>
                                                <td> <?= $sale['first_name'] .' '. $sale['last_name'] ?> </td>
                                                <td> <?= $sale['order_id'] ?> </td>
                                                <td>
                                                    <a href="order-view.php?id=<?=$sale['order_id']?>" class="btn btn-primary btn-circle btn-sm" data-toggle="tooltip" data-placement="top" title="View Order Details">
                                                        <i class="bi bi-list-ul"></i>
                                                    </a>
                                                </td>
                                                <td> <?= $sale['mop'] ?> </td>
                                                <td> <?= $sale['total'] ?> </td>
                                                <td> <?= $sale['created_at'] ?> </td>
                                               
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
    <form method="POST" action="sale-insert.php">
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
                        <div class="input-group">
                            <input type="text" name="customer_id" id="customer_id" class="form-control bg-light border-0 small" placeholder="Customer Name" aria-label="Customer Name" aria-describedby="basic-addon2" required>
                        </div>
                        <br>
                        <div class="input-group">
                            <input type="text" name="product_id" id="product_id" class="form-control bg-light border-0 small" placeholder="Product Name" aria-label="Product Name" aria-describedby="basic-addon2" required>
                        </div>
                        <br>
                        <div class="input-group">
                            <input type="number" name="qty" id="qty" class="form-control bg-light border-0 small" placeholder="Quantity" aria-label="Quantity" aria-describedby="basic-addon2" required>
                        </div>
                        <br>
                        <div class="input-group">
                            <input type="number" name="sale_price" id="sale_price" class="form-control bg-light border-0 small" placeholder="Sale Price" aria-label="Sale Price" aria-describedby="basic-addon2" required>
                        </div>
                        <br>
                        <div class="input-group">
                            <input type="number" name="mop" id="mop" class="form-control bg-light border-0 small" placeholder="MOP" aria-label="MOP" aria-describedby="basic-addon2" required>
                        </div>
                        <div class="input-group">
                            <input type="number" name="sub_total" id="sub_total" class="form-control bg-light border-0 small" placeholder="Sub Total" aria-label="Sub Total" aria-describedby="basic-addon2" required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-primary" name="add-sale" value="Submit">
                </div>
                </div>
            </div>
        </div>
    </form>

    <?php include_once("./includes/scripts.php"); ?>
<?php include_once("./includes/footer.php"); ?>
 
   <!-- Include jsPDF -->
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.0/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.23/jspdf.plugin.autotable.min.js"></script>

    <!-- Include Bootstrap Datepicker -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
<script>
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    })


    $('#addModal').on('shown.bs.modal', function () {
        $('#addModal').trigger('focus')
    })

    $(document).ready(function() {
        $('#saleTable').DataTable({
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


<script>
    $(document).ready(function() {
    // Initialize datepicker
    $('.datepicker').datepicker({
        format: 'yyyy-mm-dd',
        endDate: "today"
    });

    $('#reportDate').change( function (e){
        let reportDate = $('#reportDate').val();
        if(reportDate){
            let previewPDF = document.getElementById('previewPDF');
            let downloadPDF = document.getElementById('downloadPDF');
            
            previewPDF.disabled = false
            downloadPDF.disabled = false
        }else{
            previewPDF.disabled = true
            downloadPDF.disabled = true
        }
    })

    // Handle generate report button click
    $('#generateReport').click(function() {
        let reportDate = $('#reportDate').val();
        if (reportDate) {
            // Fetch report data for the selected date
            $.ajax({
                url: 'fetch-report.php', // Create this endpoint to fetch report data
                type: 'GET',
                data: { reportDate: reportDate },
                success: function(response) {
                    console.log(response);
                    let data = response;
                    let reportTableBody = $('#reportTable tbody');
                    reportTableBody.empty();

                    let totalRevenue = 0;
                    data.forEach(function(item) {
                        reportTableBody.append(
                            '<tr>' +
                                '<td>' + item.email + '</td>' +
                                '<td>' + item.mop + '</td>' +
                                '<td>' + item.created_at + '</td>' +
                                '<td>' + item.total + '</td>' +
                            '</tr>'
                        );
                        totalRevenue += parseFloat(item.total);
                    });

                    $('#totalRevenue').text(totalRevenue.toFixed(2));
                }
            });
        } else {
            alert('Please select a date.');
        }
    });

    // Function to generate PDF from report table
    function generatePDF() {
        let { jsPDF } = window.jspdf;
        let doc = new jsPDF();
        doc.text('Daily Report', 14, 16);
        doc.autoTable({
            html: '#reportTable',
            startY: 20,
            theme: 'grid',
            footStyles: { fillColor: [0, 0, 0] }
        });
        return doc;
    }

    // Attach click event to download PDF button
    $('#downloadPDF').click(function() {
        let doc = generatePDF();
        let date = new Date();
        doc.save(`report-${date.toISOString().split('T')[0]}.pdf`);
    });

    // Attach click event to preview PDF button
    $('#previewPDF').click(function() {
        let doc = generatePDF();
        let string = doc.output('datauristring');
        let iframe = "<iframe width='100%' height='100%' src='" + string + "'></iframe>";
        let x = window.open();
        x.document.open();
        x.document.write(iframe);
        x.document.close();
    });
});

</script>