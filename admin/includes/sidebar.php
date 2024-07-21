<?php
function getCurrentUrl() {
    $protocol = 'http';
    // Check if HTTPS is used
    if (isset($_SERVER["HTTPS"]) && $_SERVER["HTTPS"] == "on") {
        $protocol .= "s";
    }
    // Construct the full URL
    $currentUrl = $protocol . "://" . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"];
    return $currentUrl;
}

$url = getCurrentUrl();
$location = basename($url);
// echo $location; 

?>
 
 
 
 
 <!-- Sidebar -->
      <ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
    <div class="sidebar-brand-icon">
        <!-- <i class="fas fa-laugh-wink"></i> -->
        <img style="max-width: 60% !important;" class="img-fluid rounded" loading="lazy" src="../assets/carousel/Logo2.jpeg" alt="About 1">

    </div>
</a>

<!-- Divider -->
<hr class="sidebar-divider my-0">




<!-- Nav Item - Dashboard -->
<li class="nav-item <?= $location ==  "index.php" ? "active" : ""?>">
    <a class="nav-link" href="index.php">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
</li>

<?php if($_SESSION['email'] == 'admin@admin.com'){ ?>
      
<!-- Nav Item - Sales-->
<li class="nav-item <?= $location ==  "sale-list.php" ? "active" : ""?>">
    <a class="nav-link" href="sale-list.php">
        <i class="fas fa-fw fa-table"></i>
        <span>Sales</span></a>
</li>

<?php  } ?>

<!-- Nav Item - Product List Menu -->
<li class="nav-item <?= $location ==  "order-list.php" ? "active" : ""?>">
    <a class="nav-link" href="order-list.php">
        <i class="fas fa-fw fa-table"></i>
        <span>Product Orders</span></a>
</li>
<!-- Nav Item - Product List Menu -->
<li class="nav-item <?= $location ==  "custom-order-list.php" ? "active" : ""?>">
    <a class="nav-link" href="custom-order-list.php">
        <i class="fas fa-fw fa-table"></i>
        <span>Customize Orders</span></a>
</li>

<!-- Nav Item - Carts -->


<!-- Divider -->
<hr class="sidebar-divider">
<?php if($_SESSION['email'] == 'admin@admin.com'){ ?>

<!-- Nav Item - Customers -->
<li class="nav-item <?= $location ==  "customer-list.php" ? "active" : ""?>">
    <a class="nav-link" href="customer-list.php">
        <i class="fas fa-fw fa-table"></i>
        <span>Customer List</span></a>
</li>

<?php  } ?>


<!-- Nav Item - Product List Menu -->
<li class="nav-item <?= $location ==  "product-list.php" ? "active" : ""?>">
    <a class="nav-link" href="product-list.php">
        <i class="fas fa-fw fa-table"></i>
        <span>Product List</span></a>
</li>

<!-- Nav Item - Catergory Master -->
<li class="nav-item <?= $location ==  "category-list.php" ? "active" : ""?>">
    <a class="nav-link" href="category-list.php">
        <i class="fas fa-fw fa-table"></i>
        <span>Product Catergory List</span></a>
</li>


<?php if($_SESSION['email'] == 'admin@admin.com'){ ?>


<!-- Divider -->
<hr class="sidebar-divider d-none d-md-block">
<li class="nav-item <?php echo $location ==  "customized-product-dimensions-list.php" ? "active" : ""?>">
    <a class="nav-link" href="customized-product-dimensions-list.php">
        <i class="fas fa-fw fa-table"></i>
        <span>Product Dimensions</span></a>
</li>
<li class="nav-item <?php echo $location ==  "courier-list.php" ? "active" : ""?>">
    <a class="nav-link" href="courier-list.php">
        <i class="fas fa-fw fa-table"></i>
        <span>Couriers</span></a>
</li>
<li class="nav-item <?php echo $location ==  "user-list.php" ? "active" : ""?>">
    <a class="nav-link" href="user-list.php">
        <i class="fas fa-fw fa-table"></i>
        <span>Users</span></a>
</li>
<li class="nav-item <?php echo $location ==  "site-settings.php" ? "active" : ""?>">
    <a class="nav-link" href="site-settings.php">
        <i class="fas fa-fw fa-table"></i>
        <span>Site Settings</span></a>
</li>

<?php  } ?>


<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>


</ul>
<!-- End of Sidebar -->