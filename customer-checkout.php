<?php
    require_once  './vendor/autoload.php';
    spl_autoload_register(function ($class) {
        include './models/' . $class . '.php';
    });
    
    
    date_default_timezone_set("Asia/Manila");
    
function diplayDataTest($array){
    echo "<pre>";
    echo print_r($array);
    echo "</pre>";
}

// diplayDataTest($_POST);


    if( isset( $_POST['checkoutOrders'] ) ){
        $checkoutOrders = $_POST['checkoutOrders'];
        $clientId = $_POST['client_id'];
        $subTotal = $_POST['subtotal'];
        $checkoutOrders = $_POST['checkoutOrders'];

        // foreach ($checkoutOrders as $key => $checkoutOrder) {
     
        //     diplayDataTest( $checkoutOrder['id'] );
        //     diplayDataTest( $checkoutOrder['product_id'] );
        //     diplayDataTest( $checkoutOrder['cart_id'] );
        //     diplayDataTest( $checkoutOrder['quantity'] );
        //     diplayDataTest( $checkoutOrder['price'] );
        //     diplayDataTest( $checkoutOrder['subtotal'] );
        // }

        $order = new Order;
        $param = [
            'customer_id'   => $clientId,
            'created_at'    => new \DateTime,
            'updated_at'    => new \DateTime,
        ];

        $result = $order->save($param);

        if( $result ){
            $last_id = $order->getLastInsertedId();
            
            foreach ($checkoutOrders as $key => $checkoutOrder) {

                $id =  $checkoutOrder['id'];
                $product_id =  $checkoutOrder['product_id'];
                $color_id =  $checkoutOrder['color_id'];
                $quantity =  $checkoutOrder['quantity'];
                $price =  $checkoutOrder['price'];
                $subtotal =  $checkoutOrder['subtotal'];
                $cart_id = $checkoutOrder['cart_id'];

                $product_color = new ProductColor;
                $existing_color = $product_color->findProductColor($color_id);

                if( $existing_color->stock_qty < $quantity ){
                    $param = [
                        'deleted_at' => new \DateTime,
                    ];
                    $result = $order->update($param, $last_id);
                    echo json_encode([    
                            "status" => 500,
                            "message" => "Stock Quantity is lower than checkout quantity, try again later!"
                        ]);

                    exit();
                }else{
                    $new_stock_qty = $existing_color->stock_qty - $quantity;
                    $param = [
                        'stock_qty' => $new_stock_qty,
                        'updated_at' => new \DateTime,
                    ];
                    $result = $product_color->update($param, $color_id);
                }

                $order_detail = new OrderDetail;
                $param = [
                    'order_id' => $last_id,
                    'product_id' => $product_id,
                    'color_id' => $color_id,
                    'cart_id' => $cart_id,
                    'qty' => $quantity,
                    'created_at' => new \DateTime,
                    'updated_at' => new \DateTime,
                ];
                
                $result = $order_detail->save($param);

                if(!$result){
                    echo json_encode( 
                        [    "status" => 500,
                            "message" => "Saving Order Details Failed!"]
                        );
                    exit();
                }

                $cart = new Cart;
                $param = [
                    'status' => 1,
                    'quantity' => $quantity,
                    'total_price' => $price * $quantity,
                    'updated_at' => new \DateTime,
                ];
                
                $result = $cart->update($param, $id);

                if(!$result){
                    echo json_encode( 
                        [    "status" => 500,
                            "message" => "Saving Order Details Failed!"]
                        );
                    exit();
                }

            }

            echo json_encode( 
                [    "status" => 200,
                    "message" => "Done!"]
                );
            exit();
                 


        }else{
            echo json_encode( 
                [    "status" => 500,
                    "message" => "Saving Orders Failed!"]
                );
            exit();
        }



    }
    

?>