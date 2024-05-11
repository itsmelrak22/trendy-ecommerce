<!-- Page Content -->
<style>
  .avatar-img-bg{
    background-color: #c5cecf !important;
  }
</style>
<div class="container">
  <div class="row text-center text-sm-start column">
    <?php

      for ($i = 1; $i <= 21; $i++) {
          $imgPath = "./designer/img/designs/$i.png";
        echo '
        <div class="col-lg-6 col-md-6 col-6">
          <a href="#" class="d-block mb-2 h-100">
            <img class="img-polaroid avatar-img-bg img-fluid img-thumbnail" src="'.$imgPath.'" alt="">
          </a>
        </div>
        ';
      }
    ?>
    <div class="col-lg-6 col-md-4 col-6">
      <a href="#" class="d-block mb-2 h-100">
        <img class="img-polaroid avatar-img-bg img-fluid img-thumbnail" src="./designer/img/letter1.png" alt="">
      </a>
    </div>
    <div class="col-lg-6 col-md-4 col-6">
      <a href="#" class="d-block mb-2 h-100">
        <img class="img-polaroid avatar-img-bg img-fluid img-thumbnail" src="./designer/img/letter2.png" alt="">
      </a>
    </div>
    <div class="col-lg-6 col-md-6 col-6">
      <a href="#" class="d-block mb-2 h-100">
        <img class="img-polaroid avatar-img-bg img-fluid img-thumbnail" src="./designer/img/letter3.png" alt="">
      </a>
    </div>
    <div class="col-lg-6 col-md-6 col-6">
      <a href="#" class="d-block mb-2 h-100">
        <img class="img-polaroid avatar-img-bg img-fluid img-thumbnail" src="./designer/img/letter4.png" alt="">
      </a>
    </div>
    <div class="col-lg-6 col-md-6 col-6">
      <a href="#" class="d-block mb-2 h-100">
        <img class="img-polaroid avatar-img-bg img-fluid img-thumbnail" src="./designer/img/letter5.png" alt="">
      </a>
    </div>
    <div class="col-lg-6 col-md-6 col-6">
      <a href="#" class="d-block mb-2 h-100">
        <img class="img-polaroid avatar-img-bg img-fluid img-thumbnail" src="./designer/img/letter6.png" alt="">
      </a>
    </div>
    <div class="col-lg-6 col-md-6 col-6">
      <a href="#" class="d-block mb-2 h-100">
        <img class="img-polaroid avatar-img-bg img-fluid img-thumbnail" src="./designer/img/letter7.png" alt="">
      </a>
    </div>
    <div class="col-lg-6 col-md-6 col-6">
      <a href="#" class="d-block mb-2 h-100">
        <img class="img-polaroid avatar-img-bg img-fluid img-thumbnail" src="./designer/img/letter9.svg" alt="">
      </a>
    </div>

  </div>


</div>
