<?php
    $product = new Product;
    $products = $product->getProducts();

    // displayDataTest($products);
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
    // displayDataTest($products);


    function addItemInProductList($name, $price, $id, $color_name, $image, $color_id, $category_id ){
        $img_link = getImageLink($image);
        echo '

            <div class="col mb-5 product-item" data-category="' . $category_id . '">
                <div class="card h-100">

                    <!-- Product image-->
                    <img class="card-img-top" src="'. $img_link .'" alt="..." />

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
            </div>
        
        ';

    }

?>


<script>
// JavaScript
let products = <?php echo json_encode($products); ?>; // Assuming $products is your array of products
let currentProductIndex = 0;
const productsPerPage = 8;


function addItemInProductList(product) {
    let productHTML = `
        <div class="col mb-5 product-item" data-category="${product.category_id}">
            <div class="card h-100">
                <img class="card-img-top" src="${product.image_link}" alt="..." />
                <div class="card-body p-3">
                    <div class="text-center">
                        <h4 class="fw-bolder">${product.name}</h4>
                        <p class=""> ( ${product.color_name} ) </p>
                        ₱${product.price}.00
                    </div>
                </div>
                <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                    <div class="text-center">
                        <a class="btn btn-outline-dark mt-auto" href="./view-products.php?id=${product.id}&color_id=${product.color_id}">View</a>
                    </div>
                </div>
            </div>
        </div>
    `;

    let productContainer = document.getElementById('productContainer').innerHTML += productHTML;
}

function loadMoreProducts() {
    for (let i = 0; i < productsPerPage; i++) {
        if (currentProductIndex >= products.length) {
            // If all products have been displayed, hide the "See More" button
            document.getElementById('loadMore').style.display = 'none';
            break;
        }

        addItemInProductList(products[currentProductIndex]);
        currentProductIndex++;
    }
}

// Load the first set of products when the page loads
loadMoreProducts();

// Load more products when the "See More" button is clicked
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

?>