<?php
    $url = getCurrentUrl();
    $location = basename($url);

    function getPageName($location){
        switch ($location) {
            case 'custom-order-list.php':
                return "CUSTOMIZATION SERVICE ORDERS PAGE";
                break;
            case 'index.php':
                return "ADMIN DASHBOARD";
                break;
            case 'sale-list.php':
                return "SALES PAGE";
                break;
            case 'order-list.php':
                return "PRODUCT ORDERS PAGE";
                break;
            case 'customer-list.php':
                return "CUSTOMER INFORMATION PAGE";
                break;
            case 'product-list.php':
                return "PRODUCT INFORMATION PAGE";
                break;
            case 'category-list.php':
                return "PRODUCT CATEGORY INFORMATION PAGE";
                break;
   
            default:
                # code...
                break;
        }
    }
?>


<nav id="adminNav" class="navbar navbar-expand navbar-light bg-white topbar mb-4  shadow sticky-top">

<!-- Sidebar Toggle (Topbar) -->
<button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
    <i class="fa fa-bars"></i>
</button>


<span><h1 class="h3 text-gray-800"><?php  echo getPageName($location);   ?></h1></span>


<!-- Topbar Navbar -->
<ul  class="navbar-nav ml-auto">
    <div class="topbar-divider d-none d-sm-block"></div>

    <!-- Nav Item - User Information -->
    <li class="nav-item dropdown no-arrow">
        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $_SESSION['email'] ?></span>
            <img class="img-profile rounded-circle"
                src="img/undraw_profile.svg">
        </a>
        <!-- Dropdown - User Information -->
        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
            aria-labelledby="userDropdown">
            <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="admin-logout.php" data-toggle="modal" data-target="#logoutModal">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                    Logout
                </a>
            <div class="dropdown-divider"></div>

        </div>
    </li>

</ul>

</nav>


