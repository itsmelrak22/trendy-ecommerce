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
      <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
    <div class="sidebar-brand-icon rotate-n-15">
        <!-- <i class="fas fa-laugh-wink"></i> -->
    </div>
    <div class="sidebar-brand-text mx-3">TrendyDress Shop</div>
</a>

<!-- Divider -->
<hr class="sidebar-divider my-0">

<!-- Nav Item - Dashboard -->
<li class="nav-item <?= $location ==  "index.php" ? "active" : ""?>">
    <a class="nav-link" href="index.php">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
    Product Master
</div>

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
<li class="nav-item <?= $location ==  "gender-age-category-list.php" ? "active" : ""?>">
    <a class="nav-link" href="gender-age-category-list.php">
        <i class="fas fa-fw fa-table"></i>
        <span>Age Category Master</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider d-none d-md-block">

<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>


</ul>
<!-- End of Sidebar -->