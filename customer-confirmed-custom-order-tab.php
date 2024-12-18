<?php


function getBadgeClass($status) {
    switch ($status) {
        case 'Checked out':
        case 'Confirmed':
            return 'text-bg-primary';
        case 'Processing':
            return 'text-bg-info';
        case 'Shipped':
            return 'text-bg-warning';
        case 'Delivered':
            return 'text-bg-success';
        case 'Cancelled':
        case 'Canceled':
            return 'text-bg-danger';
        default:
            return 'text-bg-secondary'; // default class for any unexpected status
    }
}


    // Function to process data into desired structure
    function process_data($dimensions) {
        $result = [];
        foreach ($dimensions as $row) {
            $customized_by = $row['customized_by'];
            $size = $row['size'];
            $dimension = $row['dimension'];
            $price = $row['price'];

            if (!isset($result[$customized_by])) {
                $result[$customized_by] = [];
            }
            if (!isset($result[$customized_by][$size])) {
                $result[$customized_by][$size] = [];
            }

            $result[$customized_by][$size][$dimension] = $price;
        }
        return $result;
    }

    // Function to calculate the total price
    function calculate_added_price($data, $processedData) {
        $total_added_price = 0;

        // Check if customized_by (e.g., embroidered) exists in processed data
        if (isset($processedData[$data->customize_by])) {
            // Get the size ordered (e.g., xs)
            foreach ($data->sizes_ordered as $size => $qty) {
                // Check if size and dimension (e.g., avatar_sizing or text_sizing) exist
                $dimension = $data->avatar_sizing ?: $data->text_sizing;
                if (isset($processedData[$data->customize_by][$size][$dimension])) {
                    // Calculate the total added price based on quantity
                    $price = $processedData[$data->customize_by][$size][$dimension];
                    $total_added_price += $price * $qty;
                }
            }
        }

        return $total_added_price;
    }

    $dimensions_ = new CustomizedProductDimensions;
    $dimensions = $dimensions_->all();
    // displayDataTest($dimensions);

// displayDataTest($confirmedCustomizeItems);
?>
<div class="row container"  >
    
    <?php   ?>
    <div class="card-text" style="height: 78vh ; overflow-y:auto !important; overflow:auto;">
        <?php foreach ($confirmedCustomizeItems as $key => $item) { 
            $json_data = json_decode($item['json_data']);
            // displayDataTest($item);
            $OrigPrice              =   0;
            $LogoPrize              =   0;
            $TextPrice              =   0;
            $OtherPersonalized      =   0;
            $ShippingFee            =  $item['shipping_fee'];
            $TotalPrice             =  $item['total_price'];
            // displayDataTest($item);

                if( isset($json_data->avatar_sizing) && !empty($json_data->avatar_sizing) ){
                     foreach($json_data->sizes_ordered as $size => $quantity): 
                        foreach ($dimensions as $key => $value) : 
                            if( $value['shirt_option_type'] == "Logo" 
                                && $value['dimension'] == $json_data->avatar_sizing
                                && $value['size'] == $size
                                && $value['customized_by'] == $json_data->customize_by
                                ){

                                    $LogoPrize = $value['price'];

                                    $OrigPrice = $item['total_price'] - $item['shipping_fee'];
                                    $OrigPrice = $OrigPrice - $value['price'];


                                    // displayDataTest([ '$OrigPrice', $OrigPrice ]);
                                    // displayDataTest([ '$LogoPrize', $LogoPrize ]);
                                    // displayDataTest([ '$ShippingFee', $ShippingFee ]);
                                    // displayDataTest([ '$TotalPrice', $TotalPrice ]);

                                }

                        endforeach; 
                    endforeach; 

                }

                if( isset($json_data->text_sizing) && !empty($json_data->text_sizing) ){
                    foreach($json_data->sizes_ordered as $size => $quantity): 
                        foreach ($dimensions as $key => $value) : 
                            if( $value['shirt_option_type'] == "Text" 
                                && $value['dimension'] == $json_data->avatar_sizing
                                && $value['size'] == $size
                                && $value['customized_by'] == $json_data->customize_by
                                ){

                                    $LogoPrize = $value['price'];

                                    $OrigPrice = $item['total_price'] - $item['shipping_fee'];
                                    $OrigPrice = $OrigPrice - $value['price'];


                                    // displayDataTest([ '$OrigPrice', $OrigPrice ]);
                                    // displayDataTest([ '$TextPrice', $TextPrice ]);
                                    // displayDataTest([ '$ShippingFee', $ShippingFee ]);
                                    // displayDataTest([ '$TotalPrice', $TotalPrice ]);
                                    // displayDataTest([ '$TotalPrice', $TotalPrice ]);

                                }

                        endforeach; 
                    endforeach; 

                }

                if( isset($json_data->checkPersonalizedItemsTotal) && !empty($json_data->checkPersonalizedItemsTotal) ){

                        $OtherPersonalized = $json_data->checkPersonalizedItemsTotal;
                        // displayDataTest([ '$OtherPersonalized', $OtherPersonalized ]);


                 }

                //breakdown the price.

        ?>
                <div class="card mb-3">
                    <div class=" container card-text row">
                      
                        <div class="my-2 col-md-3">
                            <div class="card border-dark mt-3" style="">
                                <div class="card-header">FRONT</div>
                                <div class="card-body text-dark">
                                    <?php $img_link = getCustomOrderImageLink($json_data->front_canvas_image);  ?>
                                    <img src="<?= $img_link?>" class=" card-img-top" alt="front_canvas_image">
                                </div>
                            </div>
                        </div>
                        <div class="my-2 col-md-3">
                            <div class="card border-dark mt-3" style="">
                                <div class="card-header">BACK</div>
                                <div class="card-body text-dark">
                                    <?php $img_link = getCustomOrderImageLink($json_data->back_canvas_image);  ?>
                                    <img src="<?= $img_link?>" class=" card-img-top" alt="back_canvas_image">
                                </div>
                            </div>
                        </div>
                        <div class="my-2 col-md-6">
                            <div class="card border-dark mt-3" style="">
                                <div class="card-header">Custom Order #: <?=$item['id'] ?></div>
                                <div class="card-body text-dark">
                                    <div class="card-text h6">Status:
                                        <span class="badge <?= getBadgeClass($item['status']) ?>">
                                            <?= $item['status']?>
                                        </span>
                                    </div>
                                    <div class="card-text h6">Confirmation:
                                        <?php
                                            if( $item['customer_confirmation'] == 'accept' ){
                                                echo '<span class="badge text-bg-success" >
                                                        Accepted
                                                    </span>';
                                                
                                            }else if( $item['customer_confirmation'] == 'decline' ){
                                                echo '<span class="badge text-bg-danger" >
                                                    Declined
                                                </span>';
                                            }else {
                                                echo "";
                                            }
                                        ?>
                                    </div>
                                    <hr>
                                    <p class="card-text h6">Customization Method: <span class="h6"><?= $json_data->customize_by ?></span></p>
                                    <div class="card-text h6">Original Fee: <span class="h6">₱<?=$OrigPrice ?></span></div>
                                    <div class="card-text h6">Logo Fee: <span class="h6">₱<?=$LogoPrize ?></span></div>
                                    <div class="card-text h6">Text Fee: <span class="h6">₱<?=$TextPrice ?></span></div>
                                    <div class="card-text h6">Other Personlized Fee: <span class="h6">₱<?=$OtherPersonalized ?></span></div>
                                    <div class="card-text h6">Shipping Fee: <span class="h6">₱<?=$ShippingFee ?></span></div>
                                    <hr>
                                    <p class="card-text h6">Size: </p>
                                            <?php foreach($json_data->sizes_ordered as $size => $quantity): ?>
                                                <?php $sizeList = [
                                                    "xs" => "EXTRA SMALL",
                                                    "s" => "SMALL",
                                                    "m" => "MEDIUM",
                                                    "l" => "LARGE",
                                                    "xl" => "EXTRA LARGE",
                                                    "xxl" => "2 EXTRA LARGE",
                                                ] ?>
                                                <div class="mx-4 card-text">
                                                   <span> <?= $sizeList[$size] ?></span> : <span class=""><?= $quantity ?></span>
                                                </div>
                                            <?php endforeach; ?>


                                    <hr>
                                    <div class="card-text h6 "> <strong>Total: <span class="h6"> <strong>₱<?=$item['total_price'] ?></strong></span></strong></div>

                                    <p class="card-text"><small class="text-muted">Date Created: <?= $item['created_at'] ?></small></p>
                                    <style>
                                        .form-container {
                                            display: flex;
                                            gap: 10px; /* Adjust spacing between forms */
                                        }
                                    </style>
                                    <hr>
                                    <div class="container">
                                        <div class="form-container">
                                            <?php
                                            if( empty($item['customer_confirmation']) && $item['status'] == 'Confirmed' ){
                                                echo '<form action="customer-confirmation.php" method="POST">
                                                    <input type="hidden" name="custom-order-id" value="'.$item['id'].'">
                                                    <input type="hidden" name="confirmation" value="accept">
                                                    <button type="submit" class="btn btn-success">Accept</button>
                                                </form>
                                                <form action="customer-confirmation.php" method="POST">
                                                    <input type="hidden" name="custom-order-id" value="'.$item['id'].'">
                                                    <input type="hidden" name="confirmation" value="decline">
                                                    <button type="submit" class="btn btn-danger">Decline</button>
                                                </form>';
                                            }else if ( empty($item['customer_confirmation']) && empty($item['status']) ){
                                                echo '<span class="lead"> Waiting for admin response, thank you for understanding. </span>';
                                            }else if (  $item['customer_confirmation'] == 'accept' && !empty($item['status']) ){
                                                echo '<span class="lead"> Thank you for accepting the order invoice. We will update you about your order as soon as possible. </span>';
                                            }else if (  $item['customer_confirmation'] == 'decline' && !empty($item['status']) ){
                                                echo '<span class="lead"> We apologize if this order did not meet your expectations. We hope to serve you better soon. </span>';
                                            }
                                            
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

        <?php } ?>
    </div>
</div>