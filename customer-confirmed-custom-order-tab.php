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
// displayDataTest($confirmedCustomizeItems);
?>
<div class="row container"  >
    
    <?php   ?>
    <div class="card-text" style="height: 78vh ; overflow-y:auto !important; overflow:auto;">
        <?php foreach ($confirmedCustomizeItems as $key => $item) { 
            $json_data = json_decode($item['json_data']);
            // displayDataTest($item);
            // displayDataTest($json_data);
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
                                    <div class="card-text h6">Total Price: <span class="h6">₱<?=$item['total_price'] ?></span></div>
                                    <p class="card-text h6">Customization Method: <span class="h6"><?= $json_data->customize_by ?></span></p>
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