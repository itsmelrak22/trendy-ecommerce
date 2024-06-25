
<?php 
include_once("./includes/header.php"); 

spl_autoload_register(function ($class) {
    include '../models/' . $class . '.php';
  });

  $id = $_GET['id'];

  $instace = new Order;
  $data = $instace->getOrderAndOrderDetails($id);
//   displayDataTest($data);
 
    function getStatusText($status){

        switch ($status) {
            case 0:
                return "Added to cart";
                break;
            case 1:
                return "Checked out";
                break;
            case 2:
                return "Processing";
                break;
            case 3:
                return "Shipped";
                break;
            case 4:
                return "Delivered";
                break;
            case 10:
                return "Declined";
                break;
            case 11:
                return "Canceled";
                break;
            default:
                return "Unknown status";
                break;
        }
        

    }


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
                    <h1 class="h3 mb-4 text-gray-800">Order Update</h1>
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
                            <form >
                                <div >
                                    <div >
                                        <div class="">
                                            <label for="email" class="font-weight-bold text-primary">Customer email</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon3"> </span>
                                                </div>
                                                <input value="<?= $data->email; ?>" type="text" name="email" id="email" class="form-control" required readonly>
                                            </div>
                                            <label for="username" class="font-weight-bold text-primary">Username</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon3"> </span>
                                                </div>
                                                <input value="<?= $data->username; ?>" type="text" name="username" id="username" class="form-control" required readonly>
                                            </div>
                                            <label for="basic-url" class="font-weight-bold text-primary">Order ID</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon3"> </span>
                                                </div>
                                                <input value="<?= $data->id; ?>" type="text" name="email" id="email"   class="form-control" required readonly>
                                            </div>
                                            <input type="hidden" name="id" value="<?= $data->id ?>">

                                            <div class=" mb-4">
                                                <div class="card mb-4">
                                                    <div class="card-header py-3">
                                                        <h6 class="m-0 font-weight-bold text-primary">Order Details</h6>
                                                    </div>
                                                    <div class="card-body">

                                                        <h6 class="m-0 font-weight-bold text-primary mb-2"> <span class="text-danger">NOTE: </span>Please see the checklist below before proceeding to update the status.</h6>

                                                        
                                                        <div class="table-responsive">
                                                            <table class="table table-bordered" id="cartTable" width="100%" cellspacing="0">
                                                                <thead id="tableHeader">
                                                                    <tr>
                                                                        <th>
                                                                            <div class="form-check">
                                                                                <input class="tableBodyCheckbox" type="checkbox" value="" id="flexCheckDefault">
                                                                                <label class="form-check-label" for="flexCheckDefault">
                                                                                    Done
                                                                                </label>
                                                                            </div>
                                                                        </th>
                                                                        <th>Order ID </th>
                                                                        <th>Product </th>
                                                                        <th>Image</th>
                                                                        <th>Color</th>
                                                                        <th>Color Name</th>
                                                                        <th>Quantity</th>
                                                                        <th>Status</th>
                                                                        <th>Date Ordered</th>
                                                                    </tr>
                                                                </thead>
                                                                <tfoot id="tableFooter">
                                                                    <tr>
                                                                        <th>
                                                                            <div class="form-check">
                                                                                <input class="tableBodyCheckbox" type="checkbox" value="" id="flexCheckDefault">
                                                                                <label class="form-check-label" for="flexCheckDefault">
                                                                                    Done
                                                                                </label>
                                                                            </div>
                                                                        </th>
                                                                        <th>Order ID </th>
                                                                        <th>Product</th>
                                                                        <th>Image</th>
                                                                        <th>Color</th>
                                                                        <th>Color Name</th>
                                                                        <th>Quantity</th>
                                                                        <th>Status</th>
                                                                        <th>Date Ordered</th>
                                                                    </tr>
                                                                </tfoot>
                                                                <tbody id="tableBody">
                                                                    <?php foreach ($data->order_details as $key => $order_detail) { ?>
                                                                        <?php $img_link = getImageLink($order_detail['image']); ?>
                                                                        <tr style="background-color: gray; color: white;">
                                                                            <td style="text-align: center; vertical-align: middle;"> 
                                                                                <input class="tableBodyCheckbox" type="checkbox" value="" id="flexCheckDefault-<?=$key?>">
                                                                            </td>
                                                                            <td style="text-align: center; vertical-align: middle;"> <?= $order_detail['order_id'] ?> </td>
                                                                            <td style="text-align: center; vertical-align: middle;"> <?= $order_detail['product_name'] ?> </td>
                                                                            <td style="text-align: center; vertical-align: middle;">
                                                                                <img style="" width="75" height="75" src="<?= $img_link ?>" alt="..." />
                                                                            </td>

                                                                            <td style="background-color:<?= $order_detail['color_code'] ?> ">  </td>
                                                                            <td style="text-align: center; vertical-align: middle;"> <?= $order_detail['color_name'] ?> </td>
                                                                            <td style="text-align: center; vertical-align: middle;"> <?= $order_detail['qty'] ?> </td>
                                                                            <td style="text-align: center; vertical-align: middle;"> <?= getStatusText($order_detail['status']) ?> </td>
                                                                            <td style="text-align: center; vertical-align: middle;"> <?= $order_detail['created_at'] ?> </td>
                                                                          
                                                                        </tr>
                                                                    <?php } ?>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div>
                                            <h6 class="m-0 font-weight-bold text-primary mb-2">
                                                <label id="checkedCountLabel">(0 / total number of checkboxes) checkboxes</label>
                                            </h6>
                                        </div>
                                        <div class="">
                                            <button data-toggle="modal" type="button" data-target="#updateModal" class="btn btn-primary" name="edit-order_detail" > Update Status </button>
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


    <!-- Update Modal -->
        <div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
            <form method="POST" action="order-update.php">
                <div class="modal-dialog modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title font-weight-bold text-primary">Update Status</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="">
                            <br>
                            <label for="status" class="font-weight-bold text-primary">Status</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon3"> </span>
                                </div>
                                <input type="hidden" name="id" value="<?= $data->id ?>">
                                <select class="form-control" name="status" id="status" placeholder="...">
                                    <option value="2" <?= $data->order_details[0]['status'] == 2 ? 'selected' : '' ?>>Processing</option>
                                    <option value="3" <?= $data->order_details[0]['status'] == 3 ? 'selected' : '' ?>>Shipped</option>
                                    <option value="4" <?= $data->order_details[0]['status'] == 4 ? 'selected' : '' ?>>Delivered</option>
                                    <!-- <option value="10" <?= $data->order_details[0]['status'] == 10 ? 'selected' : '' ?>>Declined</option> -->
                                    <option value="11" <?= $data->order_details[0]['status'] == 11 ? 'selected' : '' ?>>Canceled</option>
                                </select>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="send_email" name="send_email">
                                <label class="form-check-label font-weight-bold text-primary" for="send_email">
                                    Send Email?
                                </label>
                            </div>


                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <input type="submit" class="btn btn-primary" name="edit-order-detail" value="Submit">
                    </div>
                    </div>
                </div>
            </form>
        </div>


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
        window.onload = function() {
            var submitButton = document.querySelector('button[name="edit-order_detail"]');
            var checkboxes = document.querySelectorAll('#tableBody .tableBodyCheckbox');
            var theadCheckbox = document.querySelector('#tableHeader .tableBodyCheckbox');
            var tfootCheckbox = document.querySelector('#tableFooter .tableBodyCheckbox');
            var label = document.querySelector('#checkedCountLabel'); // Add this line
            var label = document.querySelector('#checkedCountLabel'); // Ensure this element exists in your HTML

            
            // Function to check if all tbody checkboxes are checked and update the label
            function updateCheckedCount() {
                var checkedCount = Array.from(checkboxes).filter(checkbox => checkbox.checked).length;
                label.textContent = `${checkedCount} / ${checkboxes.length} checkboxes`; // Update label text
                return checkedCount === checkboxes.length;
            }
            // Update the label immediately with initial values
            updateCheckedCount();

            // Disable the submit button initially
            submitButton.disabled = !updateCheckedCount();

            // Function to check if all tbody checkboxes are checked
            function checkAllChecked() {
                var checkedCount = 0;
                for (var i = 0; i < checkboxes.length; i++) {
                    if (checkboxes[i].checked) {
                        checkedCount++;
                    }
                }
                label.textContent = checkedCount + ' / ' + checkboxes.length; // Add this line
                return checkedCount === checkboxes.length;
            }

            // Event listener for the checkbox in thead
            theadCheckbox.addEventListener('click', function() {
                checkboxes.forEach(function(checkbox) {
                    checkbox.checked = this.checked;
                    checkbox.dispatchEvent(new Event('change'));
                }.bind(this));

                tfootCheckbox.checked = this.checked;
                tfootCheckbox.dispatchEvent(new Event('change'));

                // Enable or disable the submit button based on whether all checkboxes are checked
                submitButton.disabled = !checkAllChecked();
            });

            // Event listener for the checkbox in tfoot
            tfootCheckbox.addEventListener('click', function() {
                checkboxes.forEach(function(checkbox) {
                    checkbox.checked = this.checked;
                    checkbox.dispatchEvent(new Event('change'));
                }.bind(this));

                theadCheckbox.checked = this.checked;
                theadCheckbox.dispatchEvent(new Event('change'));

                // Enable or disable the submit button based on whether all checkboxes are checked
                submitButton.disabled = !checkAllChecked();
            });

            // Event listener for checkboxes in tbody
            checkboxes.forEach(function(checkbox) {
                checkbox.addEventListener('change', function() {
                    var tr = this.closest('tr');
                    if (this.checked) {
                        tr.style.backgroundColor = '#43A047';
                        tr.style.color = 'white';
                    } else {
                        tr.style.backgroundColor = '';
                        tr.style.color = '';
                    }

                    // Enable or disable the submit button based on whether all checkboxes are checked
                    submitButton.disabled = !checkAllChecked();
                });
            });
        };
    </script>
