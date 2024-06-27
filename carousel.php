<?php
  $Banner = $site_setting->Banner;
  $Banner2 = $site_setting->Banner2;
?>
    
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

      .b-example-divider {
        width: 100%;
        height: 3rem;
        background-color: rgba(0, 0, 0, .1);
        border: solid rgba(0, 0, 0, .15);
        border-width: 1px 0;
        box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
      }

      .b-example-vr {
        flex-shrink: 0;
        width: 1.5rem;
        height: 100vh;
      }

      .bi {
        vertical-align: -.125em;
        fill: currentColor;
      }

      .nav-scroller {
        position: relative;
        z-index: 2;
        height: 2.75rem;
        overflow-y: hidden;
      }

      .nav-scroller .nav {
        display: flex;
        flex-wrap: nowrap;
        padding-bottom: 1rem;
        margin-top: -1px;
        overflow-x: auto;
        text-align: center;
        white-space: nowrap;
        -webkit-overflow-scrolling: touch;
      }

      .btn-bd-primary {
        --bd-violet-bg: #712cf9;
        --bd-violet-rgb: 112.520718, 44.062154, 249.437846;

        --bs-btn-font-weight: 600;
        --bs-btn-color: var(--bs-white);
        --bs-btn-bg: var(--bd-violet-bg);
        --bs-btn-border-color: var(--bd-violet-bg);
        --bs-btn-hover-color: var(--bs-white);
        --bs-btn-hover-bg: #6528e0;
        --bs-btn-hover-border-color: #6528e0;
        --bs-btn-focus-shadow-rgb: var(--bd-violet-rgb);
        --bs-btn-active-color: var(--bs-btn-hover-color);
        --bs-btn-active-bg: #5a23c8;
        --bs-btn-active-border-color: #5a23c8;
      }

      .bd-mode-toggle {
        z-index: 1500;
      }

      .bd-mode-toggle .dropdown-menu .active .bi {
        display: block !important;
      }

      #carouselExampleIndicators .carousel-item{
         /* min-height: 450px !important; */
      }

      .carousel-item img {
        width: 100%;
        height: 110%;
        object-fit: contain; /* or 'contain' to see the whole image */
      }
    </style>
    <!-- Custom styles for this template -->
    <link href="css/carousel.css" rel="stylesheet">

  <!-- <div id="myCarousel" class="carousel slide mb-6" data-bs-ride="carousel">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%" fill="var(--bs-secondary-color)"/></svg>
        <div class="container">
          <div class="carousel-caption text-start">
            <h1>Example headline.</h1>
            <p class="opacity-75">Some representative placeholder content for the first slide of the carousel.</p>
            <p><a class="btn btn-lg btn-primary" href="#">Sign up today</a></p>
          </div>
        </div>
      </div>
      <div class="carousel-item">
        <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%" fill="var(--bs-secondary-color)"/></svg>
        <div class="container">
          <div class="carousel-caption">
            <h1>Another example headline.</h1>
            <p>Some representative placeholder content for the second slide of the carousel.</p>
            <p><a class="btn btn-lg btn-primary" href="#">Learn more</a></p>
          </div>
        </div>
      </div>
      <div class="carousel-item">
        <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%" fill="var(--bs-secondary-color)"/></svg>
        <div class="container">
          <div class="carousel-caption text-end">
            <h1>One more for good measure.</h1>
            <p>Some representative placeholder content for the third slide of this carousel.</p>
            <p><a class="btn btn-lg btn-primary" href="#">Browse gallery</a></p>
          </div>
        </div>
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div> -->


  <div id="carouselExampleIndicators" class="carousel slide">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner" >

      <div class="carousel-item active">
      <img src="./assets/carousel/1.png" alt="">

        <!-- <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%" fill="var(--bs-secondary-color)"/></svg> -->
        <div class="container">
          <div class="carousel-caption text-start">
            <!-- <h1>Example headline.</h1> -->
            <!-- <p class="opacity-75">Some representative placeholder content for the first slide of the carousel.</p> -->
            <!-- <p><a class="btn btn-lg btn-primary" href="#">Sign up today</a></p> -->
          </div>
        </div>
      </div>
      <div class="carousel-item">
        <?php
          switch ($site_setting->customRadio) {
            case 'setDefaultImage':
              if($site_setting->productSelect){
                  $id = $site_setting->productSelect;
                  $color_id = $site_setting->color_id;
                  echo '<a href="view-products.php?id='.$id.'&color_id='.$color_id.'">';
                  echo '<img src="./assets/carousel/2.jpg" alt="">';
                  echo      '</a>';
                }else{
                echo '<img src="./assets/carousel/2.jpg" alt="">';
              }

              break;
            case 'uploadSelectedBanner':
              # code...
              if($site_setting->productSelect){
                  $id = $site_setting->productSelect;
                  $color_id = $site_setting->color_id;
                  echo '<a href="view-products.php?id='.$id.'&color_id='.$color_id.'">';
                  echo '<img src="./admin/'.$Banner.'" alt="">';
                  echo      '</a>';
                }else{
              }

              break;
            case 'setSelectedProductBanner':
              // Remove '%' from the string
              $Banner = str_replace('./uploads', 'uploads', $Banner);
              if($site_setting->productSelect){
                $id = $site_setting->productSelect;
                $color_id = $site_setting->color_id;
                echo '<a href="view-products.php?id='.$id.'&color_id='.$color_id.'">
                        <img src="./admin/'.$Banner.'" alt="">
                      </a>';
              }else{
                echo '<img src="./admin/'.$Banner.'" alt="">';
              }

              # code...
              break;
            
            default:
              echo '<img src="./assets/carousel/2.jpg" alt="">';
              break;
          }
        ?>
        
        <!-- <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%" fill="var(--bs-secondary-color)"/></svg> -->
        <div class="container">
          <div class="carousel-caption text-start">
            <!-- <h1>Example headline.</h1>
            <p class="opacity-75">Some representative placeholder content for the first slide of the carousel.</p> -->
            <!-- <p><a class="btn btn-lg btn-primary" href="#">Sign up today</a></p> -->
          </div>
        </div>
      </div>
      <div class="carousel-item">
      <?php
          switch ($site_setting->customRadio2) {
            case 'setDefaultImage2':
              echo '<a href="browse-products.php">';
              echo '<img src="./assets/carousel/3.jpg" alt="">';
              echo '</a>';
              break;
            case 'uploadSelectedBanner2':
              # code...
              echo '<a href="browse-products.php">';
              echo '<img src="./admin/'.$Banner2.'" alt="">';
              echo '</a>';

              break;
            
            default:
              echo '<img src="./assets/carousel/3.jpg" alt="">';
              break;
          }
        ?>
        <!-- <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%" fill="var(--bs-secondary-color)"/></svg> -->
        <div class="container">
          <div class="carousel-caption text-start">
            <!-- <h1>Example headline.</h1>
            <p class="opacity-75">Some representative placeholder content for the first slide of the carousel.</p> -->
            <!-- <p><a class="btn btn-lg btn-primary" href="#">Sign up today</a></p> -->
          </div>
        </div>
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
</div>


