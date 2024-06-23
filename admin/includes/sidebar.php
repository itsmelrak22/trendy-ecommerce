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
        <img class="img-fluid rounded" loading="lazy" src="../assets/carousel/Logo2.jpeg" alt="About 1">

    </div>
    <div class="sidebar-brand-text mx-3 my-2">TRENDY THREADS APPAREL</div>
</a>

<!-- Divider -->
<hr class="sidebar-divider my-0">

<!-- Nav Item - Dashboard -->
<li class="nav-item <?= $location ==  "index.php" ? "active" : ""?>">
    <a class="nav-link" href="index.php">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
</li>


<!-- Nav Item - Sales-->
<li class="nav-item <?= $location ==  "sale-list.php" ? "active" : ""?>">
    <a class="nav-link" href="sale-list.php">
        <i class="fas fa-fw fa-table"></i>
        <span>Sales</span></a>
</li>

<!-- Nav Item - Product List Menu -->
<li class="nav-item <?= $location ==  "order-list.php" ? "active" : ""?>">
    <a class="nav-link" href="order-list.php">
        <i class="fas fa-fw fa-table"></i>
        <span>Orders</span></a>
</li>
<!-- Nav Item - Product List Menu -->
<li class="nav-item <?= $location ==  "custom-order-list.php" ? "active" : ""?>">
    <a class="nav-link" href="custom-order-list.php">
        <i class="fas fa-fw fa-table"></i>
        <span>Custom Orders</span></a>
</li>

<!-- Nav Item - Carts -->


<!-- Divider -->
<hr class="sidebar-divider">

<!-- Nav Item - Customers -->
<li class="nav-item <?= $location ==  "customer-list.php" ? "active" : ""?>">
    <a class="nav-link" href="customer-list.php">
        <i class="fas fa-fw fa-table"></i>
        <span>Customers</span></a>
</li>


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
        <span>Catergory Master</span></a>
</li>

<!-- Nav Item - Gender / Age Category Master-->
<!-- <li class="nav-item <?php //echo $location ==  "gender-age-category-list.php" ? "active" : ""?>">
    <a class="nav-link" href="gender-age-category-list.php">
        <i class="fas fa-fw fa-table"></i>
        <span>Age Category Master</span></a>
</li> -->



<!-- Divider -->
<hr class="sidebar-divider d-none d-md-block">

<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>


</ul>
<!-- End of Sidebar -->