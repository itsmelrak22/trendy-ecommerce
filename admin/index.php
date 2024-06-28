
<?php 
    include_once("./includes/header.php"); 

    spl_autoload_register(function ($class) {
        include '../models/' . $class . '.php';
    });

    $sale = new Sale;
    $sales_ = $sale->getAllSales();

    // displayDataTest( $sales_);
    $currentMonth = date('F');
    $currentYear = date('Y');

    $sales_total_in_current_month = $sale->getSalesByMonth(date('Y-m'));
    $sales_total_in_current_month_count = 0;
    
    if(count($sales_total_in_current_month) > 0){
        foreach ($sales_total_in_current_month as $key => $value) {
            $sales_total_in_current_month_count += $value['total'];
        }
    }

    
    $sales_total_in_current_year = $sale->getSalesByYear($currentYear);
    $sales_total_in_current_year_count = 0;
    if(count($sales_total_in_current_year) > 0){
        foreach ($sales_total_in_current_year as $key => $value) {
            $sales_total_in_current_year_count += $value['total'];
        }
    }

    $customer = new Customer;
    $customers_ = $customer->all();
    $customers_count = 0;

    if(count($customers_) > 0){
        foreach ($customers_ as $key => $value) {
            $customers_count += 1;
        }
    }

    $order = new Order;
    $orders_ = $order->getOrderAndOrderDetails();
    $orders_count = 0;

    if(count($orders_) > 0){
        foreach ($orders_ as $key => $value) {
            $orders_count += 1;
        }
    }

    $customOrder = CustomizeOrder::getCustomerCustomOrders();
    $customOrder_count = 0;

    if(count($customOrder) > 0){
        foreach ($customOrder as $key => $value) {
            $customOrder_count += 1;
        }
    }

?>

    <!-- Daterangepicker CSS -->
    <link href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" rel="stylesheet">
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

                    <div class="row">

                        <!-- Earnings (Monthly) Card Example -->

                        <div class="col-xl-3 col-md-6 mb-4">
                            <a href="index.php">
                                <div class="card border-left-primary shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                    Earnings (<?php echo $currentMonth; ?>)</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">₱<?= $sales_total_in_current_month_count ?></div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>


                        <!-- Earnings (Annual) Card Example -->
                        <!-- <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Earnings (<?php //echo $currentYear; ?>)</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> -->

                        <!-- Tasks Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <a href="customer-list.php">
                                <div class="card border-left-success shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Customers
                                                </div>
                                                <div class="row no-gutters align-items-center">
                                                    <div class="col-auto">
                                                        <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?= $customers_count ?></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-users fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <!-- Pending Requests Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <a href="order-list.php">
                                <div class="card border-left-warning shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                    Orders</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $orders_count ?></div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-comments fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <!-- Pending Requests Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <a href="custom-order-list.php">
                                <div class="card border-left-warning shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                    Custom Orders</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?=$customOrder_count?></div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-comments fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>

                    <hr>
                        <!-- DataTales Example -->

                         <!-- <div class="card shadow mb-4">
                            <a href="#dailyReports" class="d-block card-header py-3" data-toggle="collapse"
                                role="button" aria-expanded="true" aria-controls="dailyReports">
                                <h6 class="m-0 font-weight-bold text-primary">Daily Reports</h6>
                            </a>
                            <div class="collapse show" id="dailyReports">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <input type="text" class="form-control datepicker" id="reportDate" placeholder="Select date" readonly>
                                        </div>
                                        <div class="col-md-4">
                                            <button class="btn btn-primary btn-sm" id="generateReport">Generate Report</button>
                                        </div>
                                        <div class="col-md-4 my-2">
                                            <button class="btn btn-secondary btn-sm" id="previewPDF" disabled>Preview PDF</button>
                                            <button class="btn btn-primary btn-sm" id="downloadPDF" disabled>Download PDF</button>
                                        </div>
                                    </div>
                                    <div class="table-responsive mt-4">
                                        

                                        <table class="table table-bordered" id="reportTable" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th>Customer</th>
                                                    <th>MOP</th>
                                                    <th>Order Date</th>
                                                    <th>Total</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td colspan="4"> <p class="text-center">No Data</p> </td>
                                                </tr>
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th colspan="3">Total Revenue</th>
                                                    <th id="totalRevenue">0.00</th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                         <div class="card shadow mb-4">
                            <a href="#dailyReports" class="d-block card-header py-3" data-toggle="collapse"
                                role="button" aria-expanded="true" aria-controls="dailyReports">
                                <h6 class="m-0 font-weight-bold text-primary">Weekly Reports</h6>
                            </a>
                            <div class="collapse show" id="dailyReports">
                                <div class="card-body">
                                    <div class="row mt-4">
                                        <div class="col-md-4">
                                            <input type="text" id="weekrange" class="form-control">
                                        </div>
                                        <div class="col-md-4">
                                            <button class="btn btn-primary btn-sm" id="generateWeekReport">Generate Weekly Report</button>
                                        </div>
                                        <div class="col-md-4 my-2">
                                            <button class="btn btn-secondary btn-sm" id="previewWeekPDF" disabled>Preview PDF</button>
                                            <button class="btn btn-primary btn-sm" id="downloadWeekPDF" disabled>Download PDF</button>
                                        </div>
                                    </div>
                                    <div class="table-responsive mt-4">
                                        <table class="table table-bordered" id="weekTable" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th>Customer</th>
                                                    <th>MOP</th>
                                                    <th>Order Date</th>
                                                    <th>Total</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td colspan="4"> <p class="text-center">No Data</p> </td>
                                                </tr>
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th colspan="3">Total Revenue</th>
                                                    <th id="weekTotalRevenue">0.00</th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="card shadow mb-4">
                            <a href="#monthlyReports" class="d-block card-header py-3" data-toggle="collapse"
                                role="button" aria-expanded="true" aria-controls="monthlyReports">
                                <h6 class="m-0 font-weight-bold text-primary">Monthly Reports</h6>
                            </a>
                            <div class="collapse show" id="monthlyReports">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <input type="text" class="form-control datemonthpicker" id="reportMonth" placeholder="Select month and year">
                                        </div>
                                        <div class="col-md-4">
                                            <button class="btn btn-primary btn-sm" id="generateMonthReport">Generate Report</button>
                                        </div>
                                        <div class="col-md-4 my-2">
                                            <button class="btn btn-secondary btn-sm" id="previewMonthPDF" disabled>Preview PDF</button>
                                            <button class="btn btn-primary btn-sm" id="downloaMonthdPDF" disabled>Download PDF</button>
                                        </div>
                                    </div>
                                    <div class="table-responsive mt-4">
                                        <table class="table table-bordered" id="monthTable" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th>Customer</th>
                                                    <th>MOP</th>
                                                    <th>Order Date</th>
                                                    <th>Total</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td colspan="4"> <p class="text-center">No Data</p> </td>
                                                </tr>
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th colspan="3">Total Revenue</th>
                                                    <th id="monthTotalRevenue">0.00</th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                         <div class="card shadow mb-4">
                            <a href="#yearyReport" class="d-block card-header py-3" data-toggle="collapse"
                                role="button" aria-expanded="true" aria-controls="yearyReport">
                                <h6 class="m-0 font-weight-bold text-primary">Yearly Reports</h6>
                            </a>
                            <div class="collapse show" id="yearyReport">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <input type="text" class="form-control" name="reportYear" id="reportYear">
                                        </div>
                                        <div class="col-md-4">
                                            <button class="btn btn-primary btn-sm" id="generateYearReport">Generate Report</button>
                                        </div>
                                        <div class="col-md-4 my-2">
                                            <button class="btn btn-secondary btn-sm" id="previewYearPDF" disabled>Preview PDF</button>
                                            <button class="btn btn-primary btn-sm" id="downloadYeadPDF" disabled>Download PDF</button>
                                        </div>
                                    </div>
                                    <div class="table-responsive mt-4">
                                        <table class="table table-bordered" id="yearTable" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th>Customer</th>
                                                    <th>MOP</th>
                                                    <th>Order Date</th>
                                                    <th>Total</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td colspan="4"> <p class="text-center">No Data</p> </td>
                                                </tr>
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th colspan="3">Total Revenue</th>
                                                    <th id="yearTotalRevenue">0.00</th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                         <div class="card shadow mb-4">
                            <a href="#yearyReport" class="d-block card-header py-3" data-toggle="collapse"
                                role="button" aria-expanded="true" aria-controls="yearyReport">
                                <h6 class="m-0 font-weight-bold text-primary">Custom Date Reports</h6>
                            </a>
                            <div class="collapse show" id="yearyReport">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <input type="text" id="daterange" class="form-control">
                                        </div>
                                        <div class="col-md-4">
                                            <button class="btn btn-primary btn-sm" id="generateCustomReport">Generate Report</button>
                                        </div>
                                        <div class="col-md-4 my-2">
                                            <button class="btn btn-secondary btn-sm" id="previewCustomPDF" disabled>Preview PDF</button>
                                            <button class="btn btn-primary btn-sm" id="downloadCustomPDF"  disabled>Download PDF</button>
                                        </div>
                                    </div>
                                    <div class="table-responsive mt-4">
                                        <table class="table table-bordered" id="customDateTable" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th>Customer</th>
                                                    <th>MOP</th>
                                                    <th>Order Date</th>
                                                    <th>Total</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td colspan="4"> <p class="text-center">No Data</p> </td>
                                                </tr>
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th colspan="3">Total Revenue</th>
                                                    <th id="customTotalRevenue">0.00</th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div> -->

                        

                         
                        

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
    <!-- Moment.js -->
    <script src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <!-- Daterangepicker JS -->
    <script src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
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
</script>


<script>
    $(document).ready(function() {

            $('.datemonthpicker').datepicker({
                format: 'yyyy-mm',
                startView: "months", 
                minViewMode: "months",
                autoclose: true
            });
            // Initialize datepicker
            $('#daterange').daterangepicker({
                opens: 'right',
                locale: {
                    format: 'YYYY-MM-DD',
                },
                maxDate: moment().format('YYYY-MM-DD') // Disable future dates
            }, function(start, end, label) {
                // console.log("A new date range was chosen: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
            });
            
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
            $('#reportYear').change( function (e){
                let reportYear = $('#reportYear').val();
                if(reportYear){
                    let previewYearPDF = document.getElementById('previewYearPDF');
                    let downloadYeadPDF = document.getElementById('downloadYeadPDF');
                    
                    previewYearPDF.disabled = false
                    downloadYeadPDF.disabled = false
                }else{
                    previewYearPDF.disabled = true
                    downloadYeadPDF.disabled = true
                }
            })
            $('#reportMonth').change( function (e){
                let reportMonth = $('#reportMonth').val();
                if(reportMonth){
                    let previewMonthPDF = document.getElementById('previewMonthPDF');
                    let downloaMonthdPDF = document.getElementById('downloaMonthdPDF');
                    
                    previewMonthPDF.disabled = false
                    downloaMonthdPDF.disabled = false
                }else{
                    previewMonthPDF.disabled = true
                    downloaMonthdPDF.disabled = true
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

            $('#daterange').change( function (e){
                let daterange = $('#daterange').val();
                console.log('daterange', daterange)
                if(daterange){
                    let previewCustomPDF = document.getElementById('previewCustomPDF');
                    let downloadCustomPDF = document.getElementById('downloadCustomPDF');
                    
                    previewCustomPDF.disabled = false
                    downloadCustomPDF.disabled = false
                }else{
                    previewCustomPDF.disabled = true
                    downloadCustomPDF.disabled = true
                }
            })
            $('#generateCustomReport').click(function() {
                let daterange = $('#daterange').val();
                let [startDate, endDate] = daterange.split(" - ");
                if (startDate || endDate) {
                    // Fetch report data for the selected date
                    $.ajax({
                        url: 'fetch-report.php', // Create this endpoint to fetch report data
                        type: 'GET',
                        data: { startDate: startDate, endDate: endDate },
                        success: function(response) {
                            console.log(response);
                            let data = response;
                            let tableBody = $('#customDateTable tbody');
                            tableBody.empty();

                            let totalRevenue = 0;
                            data.forEach(function(item) {
                                tableBody.append(
                                    '<tr>' +
                                        '<td>' + item.email + '</td>' +
                                        '<td>' + item.mop + '</td>' +
                                        '<td>' + item.created_at + '</td>' +
                                        '<td>' + item.total + '</td>' +
                                    '</tr>'
                                );
                                totalRevenue += parseFloat(item.total);
                            });

                            $('#customTotalRevenue').text(totalRevenue.toFixed(2));
                        }
                    });
                } else {
                    alert('Please select a date.');
                }
            });
            $('#generateYearReport').click(function() {
                let reportYear = $('#reportYear').val();
                if (reportYear) {
                    // Fetch report data for the selected date
                    $.ajax({
                        url: 'fetch-report.php', // Create this endpoint to fetch report data
                        type: 'GET',
                        data: { reportYear: reportYear },
                        success: function(response) {
                            console.log(response);
                            let data = response;
                            let tableBody = $('#yearTable tbody');
                            tableBody.empty();

                            let totalRevenue = 0;
                            data.forEach(function(item) {
                                tableBody.append(
                                    '<tr>' +
                                        '<td>' + item.email + '</td>' +
                                        '<td>' + item.mop + '</td>' +
                                        '<td>' + item.created_at + '</td>' +
                                        '<td>' + item.total + '</td>' +
                                    '</tr>'
                                );
                                totalRevenue += parseFloat(item.total);
                            });

                            $('#yearTotalRevenue').text(totalRevenue.toFixed(2));
                        }
                    });
                } else {
                    alert('Please select a date.');
                }
            });
            $('#generateMonthReport').click(function() {
                let reportMonth = $('#reportMonth').val();
                if (reportMonth) {
                    // Fetch report data for the selected date
                    $.ajax({
                        url: 'fetch-report.php', // Create this endpoint to fetch report data
                        type: 'GET',
                        data: { reportMonth: reportMonth },
                        success: function(response) {
                            console.log(response);
                            let data = response;
                            let tableBody = $('#monthTable tbody');
                            tableBody.empty();

                            let totalRevenue = 0;
                            data.forEach(function(item) {
                                tableBody.append(
                                    '<tr>' +
                                        '<td>' + item.email + '</td>' +
                                        '<td>' + item.mop + '</td>' +
                                        '<td>' + item.created_at + '</td>' +
                                        '<td>' + item.total + '</td>' +
                                    '</tr>'
                                );
                                totalRevenue += parseFloat(item.total);
                            });

                            $('#monthTotalRevenue').text(totalRevenue.toFixed(2));
                        }
                    });
                } else {
                    alert('Please select a date.');
                }
            });



            // Attach click event to download PDF button
            $('#downloadPDF').click(function() {
                downloadPdf('reportTable')
            });

            // Attach click event to preview PDF button
            $('#previewPDF').click(function() {
                previewPdf('reportTable')
            });

            $('#downloadCustomPDF').click(function() {
                downloadPdf('customDateTable')
            });
            $('#previewCustomPDF').click(function() {
                previewPdf('customDateTable')
            });

            $('#downloadYearPDF').click(function() {
                downloadPdf('yearTable')
            });
            $('#previewYearPDF').click(function() {
                previewPdf('yearTable')
            });

            $('#downloadMonthPDF').click(function() {
                downloadPdf('monthTable')
            });
            $('#previewMonthPDF').click(function() {
                previewPdf('monthTable')
            });




            // Function to generate PDF from report table
            function generatePDF(table = "reportTable") {
                let { jsPDF } = window.jspdf;
                let doc = new jsPDF();
                
                // Center alignment function
                function centerText(text, yPosition) {
                    const textWidth = doc.getStringUnitWidth(text) * doc.internal.getFontSize() / doc.internal.scaleFactor;
                    const textOffset = (doc.internal.pageSize.width - textWidth) / 2;
                    doc.text(text, textOffset, yPosition);
                }
                
                // Store name
                doc.setFontSize(16);
                centerText('TRENDY THREADS APPAREL', 20);
                
                // Address
                doc.setFontSize(12);
                centerText('9070 DR. SOLIS STREET JULUGAN 8, TANZA, CAVITE', 30);
                
                // Contact number (if needed)
                // doc.text('CONTACT NO: +639636099067', 14, 48);
                
                // Title of the report
                doc.setFontSize(14);
                centerText('Sales Report', 50);
                
                // Adding the table from HTML
                doc.autoTable({
                    html: `#${table}`,
                    startY: 60,
                    theme: 'grid',
                    footStyles: { fillColor: [0, 0, 0] }
                });
                
                return doc;
            }

            function downloadPdf(table){
                let doc = generatePDF(`${table}`);
                let date = new Date();
                doc.save(`report-${date.toISOString().split('T')[0]}.pdf`);
            }

            function previewPdf(table){
                let doc = generatePDF(`${table}`);
                let string = doc.output('datauristring');
                let iframe = "<iframe width='100%' height='100%' src='" + string + "'></iframe>";
                let x = window.open();
                x.document.open();
                x.document.write(iframe);
                x.document.close();
            }

            $('#weekrange').daterangepicker({
                locale: {
                    format: 'YYYY-MM-DD',
                    separator: ' to ',
                    cancelLabel: 'Clear'
                },
                isInvalidDate: function(date) {
                    var day = date.day();
                    return (day != 0 && day != 6);
                },
                showWeekNumbers: true,
                showCustomRangeLabel: false,
                autoApply: false,
                // ranges: {
                //     'This Week': [moment().startOf('isoWeek'), moment().endOf('isoWeek')],
                //     'Last Week': [moment().subtract(1, 'weeks').startOf('isoWeek'), moment().subtract(1, 'weeks').endOf('isoWeek')],
                //     'Next Week': [moment().add(1, 'weeks').startOf('isoWeek'), moment().add(1, 'weeks').endOf('isoWeek')]
                // }
            }, function(start, end, label) {
                // Date range selected callback
                console.log("A new date range was chosen: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
            });

        // Enable the clear button to clear the input field and reset the buttons
            $('#weekrange').on('cancel.daterangepicker', function(ev, picker) {
                $(this).val('');
                document.getElementById('previewWeekPDF').disabled = true;
                document.getElementById('downloadWeekPDF').disabled = true;
            });

            $('#weekrange').change(function(e) {
                let weekrange = $('#weekrange').val();
                console.log('weekrange', weekrange)
                if(weekrange){
                    let previewWeekPDF = document.getElementById('previewWeekPDF');
                    let downloadWeekPDF = document.getElementById('downloadWeekPDF');
                    
                    previewWeekPDF.disabled = false
                    downloadWeekPDF.disabled = false
                }else{
                    previewWeekPDF.disabled = true
                    downloadWeekPDF.disabled = true
                }
            });

    // Handle generate weekly report button click
    $('#generateWeekReport').click(function() {
        let weekrange = $('#weekrange').val();
        let [startDate, endDate] = weekrange.split(" to ");
        if (startDate || endDate) {
            // Fetch report data for the selected week
            $.ajax({
                url: 'fetch-report.php', // Create this endpoint to fetch report data
                type: 'GET',
                data: { startDate: startDate, endDate: endDate },
                success: function(response) {
                    console.log(response);
                    let data = response;
                    let tableBody = $('#weekTable tbody');
                    tableBody.empty();

                    let totalRevenue = 0;
                    data.forEach(function(item) {
                        tableBody.append(
                            '<tr>' +
                                '<td>' + item.email + '</td>' +
                                '<td>' + item.mop + '</td>' +
                                '<td>' + item.created_at + '</td>' +
                                '<td>' + item.total + '</td>' +
                            '</tr>'
                        );
                        totalRevenue += parseFloat(item.total);
                    });

                    $('#weekTotalRevenue').text(totalRevenue.toFixed(2));
                }
            });
        } else {
            alert('Please select a date.');
        }
    });

    $('#downloadWeekPDF').click(function() {
        downloadPdf('weekTable');
    });

    $('#previewWeekPDF').click(function() {
        previewPdf('weekTable');
    });
    });

</script>