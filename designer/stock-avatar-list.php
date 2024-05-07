<div class="row">
  <div class="column">
    <img style="cursor:pointer;" class="img-polaroid" src="./designer/img/letter1.png">
    <img style="cursor:pointer;" class="img-polaroid" src="./designer/img/letter2.png">
    <img style="cursor:pointer;" class="img-polaroid" src="./designer/img/letter3.png">
  </div>
  <div class="column">
    <img style="cursor:pointer;" class="img-polaroid" src="./designer/img/letter4.png">
    <img style="cursor:pointer;" class="img-polaroid" src="./designer/img/letter5.png">
    <img style="cursor:pointer;" class="img-polaroid" src="./designer/img/letter6.png">
  </div>

  <div class="column">
    <img style="cursor:pointer;" class="img-polaroid" src="./designer/img/letter7.png">
    <img style="cursor:pointer;" class="img-polaroid" src="./designer/img/letter7.png">
    <img style="cursor:pointer;" class="img-polaroid" src="./designer/img/letter9.svg">
  </div>
  
  <div class="column">
    <img style="cursor:pointer;" class="img-polaroid" src="./designer/img/letter7.png">
    <img style="cursor:pointer;" class="img-polaroid" src="./designer/img/letter7.png">
    <img style="cursor:pointer;" class="img-polaroid" src="./designer/img/letter9.svg">
  </div>
  
  <?php
    $html = '';
    $columnCount = 0;
    
    for ($i = 1; $i <= 37; $i++) {
        // Check if the image is a png or jpg
        $imgPath = "./designer/img/designs/$i.png";
        if (!file_exists($imgPath)) {
            $imgPath = "./designer/img/designs/$i.jpg";
        }
        $fileExtension = pathinfo($imgPath, PATHINFO_EXTENSION);
    
        if ($fileExtension === 'png' || $fileExtension === 'jpg') {
            // Every 3 loops, wrap with a div with class 'column'
            if ($columnCount % 3 === 0) {
                if ($columnCount > 0) {
                    // Close the previous div if it exists
                    $html .= '</div>';
                }
                $html .= '<div class="column">';
            }
    
            $html .= "<img style='cursor:pointer;' class='img-polaroid' src='$imgPath'>";
            $columnCount++;
        }
    }
    
    // Close the last div
    if ($columnCount > 0) {
        $html .= '</div>';
    }
    
    echo $html;
  
?>

</div>