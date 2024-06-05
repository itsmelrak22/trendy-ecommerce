<?php
    $product = new Product;
    $products = $product->getProducts($_GET['category_id'] ?? null);
   
    foreach ($products as $key => &$value) {
        $value['image_link'] = getImageLink($value['image']);
    }
    
    $initialDisplayCount = 4;
    $productCount = 0;
    
    foreach ($products as $product) {
        $isHidden = $productCount >= $initialDisplayCount ? 'style="display: none;"' : '';
        echo '<div class="col mb-5 product-item" data-category="' . $product['category_id'] . '" ' . $isHidden . '>';
        addItemInProductList(
            $product['name'],
            $product['price'],
            $product['id'],
            $product['color_name'],
            $product['image'],
            $product['color_id'] ? $product['color_id'] : 0,
            $product['category_id'],
            $product['category_name']
        );
        echo '</div>';
        $productCount++;
    }
    
    if ($productCount > $initialDisplayCount) {
        echo '<div class="col-12 text-center">
                  <button id="seeMoreButton" class="btn btn-primary">See More</button>
              </div>';
    }
    
    function addItemInProductList($name, $price, $id, $color_name, $image, $color_id, $category_id, $category_name) {
        $img_link = getImageLink($image);
        echo '
            <div class="card h-100">
                <!-- Product image-->
                <a class="btn btn-outline-dark mt-auto" href="./view-products.php?id='.$id.'&color_id='.$color_id.'">
                    <img class="card-img-top product-item-img" src="'. $img_link .'" alt="..." />
                </a>
                <!-- Product details-->
                <div class="card-body p-3">
                    <div class="text-center">
                        <!-- Product name-->
                        <h4 class="fw-bolder">'. $name .'</h4>
                        <p class=""> ( '. $color_name .' ) </p>
                        <!-- Product price-->
                        ₱'. $price .'.00
                    </div>
                </div>
                <!-- Product actions-->
                <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                    <div class="text-center">
                        <a class="btn btn-outline-dark mt-auto" href="./view-products.php?id='.$id.'&color_id='.$color_id.'">View</a>
                    </div>
                </div>
            </div>
        ';
    }
    
?>