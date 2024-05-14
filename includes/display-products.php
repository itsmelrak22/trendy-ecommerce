<?php
    $product = new Product;
    $products = $product->getRankedProducts();
 
    // print_r($grouped);

    // echo '<div class="col-md-2">
    //     <div class="list-group" style="padding-left: 10px;">
    //         <h3 class="my-4">Categories</h3>';

    // $categoryFilter = '<span style="cursor: pointer;" class="list-group-item list-group-item-action active" onclick="applyFilter(\'all\')">All</span>';
    // foreach ($categories as $category) {
    //     $categoryFilter .= '<span style="cursor: pointer;" class="list-group-item list-group-item-action" onclick="applyFilter(\'' . $category['id'] . '\')">' . $category['name'] . '</span>';
    // }

    // echo $categoryFilter . '</div></div>';


    foreach ($products as $key => &$value) {
        $value['image_link'] = getImageLink( $value['image'] );
    }

    $grouped = [];

    foreach ($products as $product) {
        addItemInProductList(
            $product['name'],
            $product['price'],
            $product['id'],
            $product['color_name'],
            $product['image'],
            $product['color_id'] ? $product['color_id'] : 0,
            $product['category_id'],
            $product['category_name'],
        );
    }

    // displayDataTest($grouped);


    function addItemInProductList($name, $price, $id, $color_name, $image, $color_id, $category_id, $category_name ){
        $img_link = getImageLink($image);
        echo '

            <div class="col mb-5 product-item" data-category="' . $category_id . '">
                <div class="card h-100">

                    <!-- Product image-->
                    <img class="card-img-top" style="max-width: 512px; max-height: 292px;" src="'. $img_link .'" alt="..." />

                    <!-- Product details-->
                    <div class="card-body p-3">
                        <div class="text-center">

                            <!-- Product name-->
                            <h4 class="fw-bolder">'. $category_name .'</h4>

                            <!-- Product price-->
                            ₱'. $price .'.00
                        </div>
                    </div>

                    <!-- Product actions-->
                    <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                        <div class="text-center">
                            <a class="btn btn-outline-dark mt-auto" href="./browse-products.php?category_id='.$category_id.'">Browse</a>
                        </div>
                    </div>

                </div>
            </div>
        
        ';

    }

?>

<style>
    .product-item.hidden {
        display: none;
    }
</style>

<?php 
    // $count = 0;
    // foreach ($grouped as $key => $value) { 
    //     $count++;
    //     echo '<div class="accordion" id="accordionExample">
    //         <div class="accordion-item">
    //             <h2 class="accordion-header">
    //             <button class="accordion-button '.($count == 1 ? '' : 'collapsed').'" type="button" data-bs-toggle="collapse" data-bs-target="#collapse'.$count.'" aria-expanded="'.($count == 1 ? 'true' : 'false').'" aria-controls="collapse'.$count.'">
    //                 <figure class="text-center">
    //                     <blockquote class="blockquote">
    //                         <p>'.$key.'</p>
    //                     </blockquote>
    //                 </figure>
    //             </button>
    //             </h2>
    //             <div id="collapse'.$count.'" class="accordion-collapse collapse '.($count == 1 ? 'show' : '').'" data-bs-parent="#accordionExample">
    //             <div class="accordion-body">
    //                 <div class="row row-cols-2 row-cols-md-4 product-container">';
        
    //     $productCount = 0;
    //     foreach ($value as $key => $product) {
    //         $productCount++;
           
    //     }
        
    //     echo '</div>
    //             <button class="see-more btn btn-primary btn-sm">See More</button>
    //             </div>
    //             </div>
    //         </div>
    //     </div>';
    // }
    
?>   



<script>

document.querySelectorAll('.see-more').forEach(function(button) {
    button.addEventListener('click', function() {
        var hiddenItems = this.previousElementSibling.querySelectorAll('.hidden');
        for (var i = 0; i < 4 && i < hiddenItems.length; i++) {
            hiddenItems[i].classList.remove('hidden');
        }
        if (hiddenItems.length <= 4) {
            this.style.display = 'none';
        }
    });
});



</script>



<script>
    function applyFilter(categoryId) {
        var productItems = document.querySelectorAll('.product-item');

        productItems.forEach(function(item) {
            if (categoryId === 'all' || item.getAttribute('data-category') === categoryId) {
                item.style.display = 'block';
            } else {
                item.style.display = 'none';
            }
        });
    }
</script>



<?php
// <div class="row gx-4 gx-lg-3 row-cols-2 row-cols-md-4 justify-content-center">
// <div class="col mb-5">
//     <div class="card h-100">
//         <!-- Product image-->
//         <img class="card-img-top" src="https://dummyimage.com/450x300/dee2e6/6c757d.jpg" alt="..." />
//         <!-- Product details-->
//         <div class="card-body p-4">
//             <div class="text-center">
//                 <!-- Product name-->
//                 <h5 class="fw-bolder">Fancy Product</h5>
//                 <!-- Product price-->
//                 $40.00 - $80.00
//             </div>
//         </div>
//         <!-- Product actions-->
//         <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
//             <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#">View options</a></div>
//         </div>
//     </div>
// </div>
// </div>




//     <div class="col mb-5">
//     <div class="card h-100">
//         <!-- Sale badge-->
//         <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem">Sale</div>
//         <!-- Product image-->
//         <img class="card-img-top" src="https://dummyimage.com/450x300/dee2e6/6c757d.jpg" alt="..." />
//         <!-- Product details-->
//         <div class="card-body p-4">
//             <div class="text-center">
//                 <!-- Product name-->
//                 <h5 class="fw-bolder">Special Item</h5>
//                 <!-- Product reviews-->
//                 <div class="d-flex justify-content-center small text-warning mb-2">
//                     <div class="bi-star-fill"></div>
//                     <div class="bi-star-fill"></div>
//                     <div class="bi-star-fill"></div>
//                     <div class="bi-star-fill"></div>
//                     <div class="bi-star-fill"></div>
//                 </div>
//                 <!-- Product price-->
//                 <span class="text-muted text-decoration-line-through">$20.00</span>
//                 $18.00
//             </div>
//         </div>
//         <!-- Product actions-->
//         <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
//             <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#">Add to cart</a></div>
//         </div>
//     </div>
// </div>
// <div class="col mb-5">
//     <div class="card h-100">
//         <!-- Sale badge-->
//         <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem">Sale</div>
//         <!-- Product image-->
//         <img class="card-img-top" src="https://dummyimage.com/450x300/dee2e6/6c757d.jpg" alt="..." />
//         <!-- Product details-->
//         <div class="card-body p-4">
//             <div class="text-center">
//                 <!-- Product name-->
//                 <h5 class="fw-bolder">Sale Item</h5>
//                 <!-- Product price-->
//                 <span class="text-muted text-decoration-line-through">$50.00</span>
//                 $25.00
//             </div>
//         </div>
//         <!-- Product actions-->
//         <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
//             <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#">Add to cart</a></div>
//         </div>
//     </div>
// </div>
// <div class="col mb-5">
//     <div class="card h-100">
//         <!-- Product image-->
//         <img class="card-img-top" src="https://dummyimage.com/450x300/dee2e6/6c757d.jpg" alt="..." />
//         <!-- Product details-->
//         <div class="card-body p-4">
//             <div class="text-center">
//                 <!-- Product name-->
//                 <h5 class="fw-bolder">Popular Item</h5>
//                 <!-- Product reviews-->
//                 <div class="d-flex justify-content-center small text-warning mb-2">
//                     <div class="bi-star-fill"></div>
//                     <div class="bi-star-fill"></div>
//                     <div class="bi-star-fill"></div>
//                     <div class="bi-star-fill"></div>
//                     <div class="bi-star-fill"></div>
//                 </div>
//                 <!-- Product price-->
//                 $40.00
//             </div>
//         </div>
//         <!-- Product actions-->
//         <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
//             <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#">Add to cart</a></div>
//         </div>
//     </div>
// </div>
// <div class="col mb-5">
//     <div class="card h-100">
//         <!-- Sale badge-->
//         <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem">Sale</div>
//         <!-- Product image-->
//         <img class="card-img-top" src="https://dummyimage.com/450x300/dee2e6/6c757d.jpg" alt="..." />
//         <!-- Product details-->
//         <div class="card-body p-4">
//             <div class="text-center">
//                 <!-- Product name-->
//                 <h5 class="fw-bolder">Sale Item</h5>
//                 <!-- Product price-->
//                 <span class="text-muted text-decoration-line-through">$50.00</span>
//                 $25.00
//             </div>
//         </div>
//         <!-- Product actions-->
//         <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
//             <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#">Add to cart</a></div>
//         </div>
//     </div>
// </div>
// <div class="col mb-5">
//     <div class="card h-100">
//         <!-- Product image-->
//         <img class="card-img-top" src="https://dummyimage.com/450x300/dee2e6/6c757d.jpg" alt="..." />
//         <!-- Product details-->
//         <div class="card-body p-4">
//             <div class="text-center">
//                 <!-- Product name-->
//                 <h5 class="fw-bolder">Fancy Product</h5>
//                 <!-- Product price-->
//                 $120.00 - $280.00
//             </div>
//         </div>
//         <!-- Product actions-->
//         <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
//             <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#">View options</a></div>
//         </div>
//     </div>
// </div>
// <div class="col mb-5">
//     <div class="card h-100">
//         <!-- Sale badge-->
//         <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem">Sale</div>
//         <!-- Product image-->
//         <img class="card-img-top" src="https://dummyimage.com/450x300/dee2e6/6c757d.jpg" alt="..." />
//         <!-- Product details-->
//         <div class="card-body p-4">
//             <div class="text-center">
//                 <!-- Product name-->
//                 <h5 class="fw-bolder">Special Item</h5>
//                 <!-- Product reviews-->
//                 <div class="d-flex justify-content-center small text-warning mb-2">
//                     <div class="bi-star-fill"></div>
//                     <div class="bi-star-fill"></div>
//                     <div class="bi-star-fill"></div>
//                     <div class="bi-star-fill"></div>
//                     <div class="bi-star-fill"></div>
//                 </div>
//                 <!-- Product price-->
//                 <span class="text-muted text-decoration-line-through">$20.00</span>
//                 $18.00
//             </div>
//         </div>
//         <!-- Product actions-->
//         <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
//             <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#">Add to cart</a></div>
//         </div>
//     </div>
// </div>
// <div class="col mb-5">
//     <div class="card h-100">
//         <!-- Product image-->
//         <img class="card-img-top" src="https://dummyimage.com/450x300/dee2e6/6c757d.jpg" alt="..." />
//         <!-- Product details-->
//         <div class="card-body p-4">
//             <div class="text-center">
//                 <!-- Product name-->
//                 <h5 class="fw-bolder">Popular Item</h5>
//                 <!-- Product reviews-->
//                 <div class="d-flex justify-content-center small text-warning mb-2">
//                     <div class="bi-star-fill"></div>
//                     <div class="bi-star-fill"></div>
//                     <div class="bi-star-fill"></div>
//                     <div class="bi-star-fill"></div>
//                     <div class="bi-star-fill"></div>
//                 </div>
//                 <!-- Product price-->
//                 $40.00
//             </div>
//         </div>
//         <!-- Product actions-->
//         <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
//             <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#">Add to cart</a></div>
//         </div>
//     </div>
// </div>
// <div class="accordion" id="accordionExample">
//     <div class="accordion-item">
//         <h2 class="accordion-header">
//         <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
//             Accordion Item #1
//         </button>
//         </h2>
//         <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
//         <div class="accordion-body">
//             <strong>This is the first item's accordion body.</strong> It is shown by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
//         </div>
//         </div>
//     </div>
//     <div class="accordion-item">
//         <h2 class="accordion-header">
//         <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
//             Accordion Item #2
//         </button>
//         </h2>
//         <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
//         <div class="accordion-body">
//             <strong>This is the second item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
//         </div>
//         </div>
//     </div>
//     <div class="accordion-item">
//         <h2 class="accordion-header">
//         <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
//             Accordion Item #3
//         </button>
//         </h2>
//         <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
//         <div class="accordion-body">
//             <strong>This is the third item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
//         </div>
//         </div>
//     </div>
// </div>

?>