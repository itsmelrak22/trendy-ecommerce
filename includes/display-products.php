<?php
    $product = new Product;
    $products = $product->getProducts();

    // diplayDataTest($products);

    foreach ($products as $key => $value) {

        addItemInProductList(
            $value['name'],
            $value['price'],
            $value['id'],
            $value['color_name'],
            $value['image'],
        );
    }


    function addItemInProductList($name, $price, $id, $color_name, $image ){
        $img_link = getImageLink($image);
        echo '

            <div class="col mb-5">
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
                            <a class="btn btn-outline-dark mt-auto" href="./view-products.php?id='. $id .'">View</a>
                        </div>
                    </div>

                </div>
            </div>
        
        ';

    }

?>





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