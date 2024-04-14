<?php 
    include_once("./includes/header.php");
    
    $checkedOutItems = $cartItem->getCustomerCartCheckedoutItems( $client_id );
    $checkedOutItemsCount = 0;

    foreach ($checkedOutItems as $key => $value) {
        $checkedOutItemsCount += (int) $value['quantity']; 

    }

    $processingItems = $cartItem->getCustomerCartProcessingItems( $client_id );
    $processingItemsCount = 0;

    foreach ($processingItems as $key => $value) {
        $processingItemsCount += (int) $value['quantity']; 

    }

    $shippedItems = $cartItem->getCustomerCartShippedItems( $client_id );
    $shippedItemsCount = 0;

    foreach ($shippedItems as $key => $value) {
        $shippedItemsCount += (int) $value['quantity']; 

    }

    $receivedItems = $cartItem->getCustomerCartReceivedItems( $client_id );
    $receivedItemsCount = 0;

    foreach ($receivedItems as $key => $value) {
        $receivedItemsCount += (int) $value['quantity']; 

    }

    $cancelledItems = $cartItem->getCustomerCartCancelledItems( $client_id );
    $cancelledItemsCount = 0;

    foreach ($cancelledItems as $key => $value) {
        $cancelledItemsCount += (int) $value['quantity']; 

    }
?>
<style>
   .tab-pane {
    display: none; /* hides the content by default */
}

.tab-pane.active {
    display: block; /* shows the content when the tab is active */
}
</style>

<div class="container mt-2" >
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active me-2 btn btn-outline-dark" id="cart-tab" data-bs-toggle="tab" data-bs-target="#cart-tab-pane" type="button" role="tab" aria-controls="cart-tab-pane" aria-selected="true">
                Cart
            </button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link me-2 btn btn-outline-dark" id="checked-tab" data-bs-toggle="tab" data-bs-target="#checked-tab-pane" type="button" role="tab" aria-controls="checked-tab-pane" aria-selected="false">
                Checked Out
                <span class="badge bg-dark text-white ms-1 rounded-pill">
                    <?php if(isset($checkedOutItemsCount)) {
                        echo  $checkedOutItemsCount ;
                        }else{
                        echo "0";
                        }
                        
                    ?>
                </span>
            </button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link me-2 btn btn-outline-dark" id="processing-tab" data-bs-toggle="tab" data-bs-target="#processing-tab-pane" type="button" role="tab" aria-controls="processing-tab-pane" aria-selected="false">
                Processing
                <span class="badge bg-dark text-white ms-1 rounded-pill">
                    <?php if(isset($processingItemsCount)) {
                        echo  $processingItemsCount ;
                        }else{
                        echo "0";
                        }
                        
                    ?>
                </span>
            </button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link me-2 btn btn-outline-dark" id="shipped-tab" data-bs-toggle="tab" data-bs-target="#shipped-tab-pane" type="button" role="tab" aria-controls="shipped-tab-pane" aria-selected="false">
                Shipped
                <span class="badge bg-dark text-white ms-1 rounded-pill">
                    <?php if(isset($shippedItemsCount)) {
                        echo  $shippedItemsCount ;
                        }else{
                        echo "0";
                        }
                        
                    ?>
                </span>
            </button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link me-2 btn btn-outline-dark" id="received-tab" data-bs-toggle="tab" data-bs-target="#received-tab-pane" type="button" role="tab" aria-controls="received-tab-pane" aria-selected="false" >
                Received
                <span class="badge bg-dark text-white ms-1 rounded-pill">
                    <?php if(isset($receivedItemsCount)) {
                        echo  $receivedItemsCount ;
                        }else{
                        echo "0";
                        }
                        
                    ?>
                </span>
            </button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link me-2 btn btn-outline-dark" id="cancelled-tab" data-bs-toggle="tab" data-bs-target="#cancelled-tab-pane" type="button" role="tab" aria-controls="cancelled-tab-pane" aria-selected="false" >
                Cancelled
                <span class="badge bg-dark text-white ms-1 rounded-pill">
                    <?php if(isset($cancelledItemsCount)) {
                        echo  $cancelledItemsCount ;
                        }else{
                        echo "0";
                        }
                    ?>
                </span>
            </button>
        </li>
    </ul>
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="cart-tab-pane" role="tabpanel" aria-labelledby="cart-tab" tabindex="0">
            <?php include_once("customer-cart-cart-tab.php") ?>
        </div>
        <div class="tab-pane fade" id="checked-tab-pane" role="tabpanel" aria-labelledby="checked-tab" tabindex="0">
            <?php include_once("customer-cart-checked-out-tab.php") ?>
        </div>
        <div class="tab-pane fade show " id="processing-tab-pane" role="tabpanel" aria-labelledby="processing-tab" tabindex="0">
            <?php include_once("customer-cart-processing-tab.php") ?>
        </div>
        <div class="tab-pane fade show " id="shipped-tab-pane" role="tabpanel" aria-labelledby="shipped-tab" tabindex="0">
            <?php include_once("customer-cart-shipped-tab.php") ?>
        </div>
        <div class="tab-pane fade" id="received-tab-pane" role="tabpanel" aria-labelledby="received-tab" tabindex="0">
            <?php include_once("customer-cart-received-tab.php") ?>
        </div>
        <div class="tab-pane fade" id="cancelled-tab-pane" role="tabpanel" aria-labelledby="cancelled-tab" tabindex="0">
            <?php include_once("customer-cart-cancelled-tab.php") ?>
        </div>

    </div>
</div>

<?php include_once("./includes/scripts.php"); ?>
<?php include_once("./includes/footer.php"); ?>


    <script>
    $(document).ready(function() {
        $('#customerCartTable').DataTable();
    });

    </script>
