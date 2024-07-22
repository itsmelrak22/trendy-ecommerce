<?php

Class Order extends Model {

    protected $table = 'orders';

    public static function getOrderAndOrderDetails($id = null){


        $instance = new self;

        if(!$id){
            $orders = $instance->setQuery("
                SELECT O.*, C.username, C.email, C.first_name, C.last_name, C.phone_no, C.province, C.city_municipality, C.barangay, C.complete_address
                FROM `orders` as O
                LEFT JOIN `customers` as C
                ON C.id = O.customer_id
                WHERE O.deleted_at IS NULL
            ")->getAll();

                    
            foreach ($orders as $key => &$value) { // Note the & before $value
                $order_id =  $value['id'];
                $value['order_details'] = $instance->setQuery("
                        SELECT 
                        OD.*, 
                        PC.name as color_name, 
                        PC.code as color_code, 
                        PC.image, 
                        P.name as product_name,
                        C.status,
                        C.total_price,
                        C.size
                    FROM `order_details` as OD
                    LEFT JOIN `product_colors` as PC
                    ON PC.id = OD.color_id
                    LEFT JOIN `products` as P
                    ON P.id = PC.product_id
                    LEFT JOIN `carts` as C
                    ON C.id = OD.cart_id
                    WHERE order_id =$order_id
                ")->getAll();
            }
        }else{
            $orders = $instance->setQuery("
                SELECT O.*, C.username, C.email,  C.email, C.first_name, C.last_name, C.phone_no, C.province, C.city_municipality, C.barangay, C.complete_address
                FROM `orders` as O
                LEFT JOIN `customers` as C
                ON C.id = O.customer_id
                WHERE O.deleted_at IS NULL
                AND O.id = $id
            ")->getFirst();

            $orders->order_details = $instance->setQuery("
                    SELECT 
                        OD.*, 
                        PC.name as color_name, 
                        PC.code as color_code, 
                        PC.image, 
                        P.name as product_name,
                        C.status,
                        C.total_price,    
                        C.size

                    FROM `order_details` as OD
                    LEFT JOIN `product_colors` as PC
                    ON PC.id = OD.color_id
                    LEFT JOIN `products` as P
                    ON P.id = PC.product_id
                    LEFT JOIN `carts` as C
                    ON C.id = OD.cart_id
                    WHERE order_id =$orders->id
                ")->getAll();

        }
        
        return $orders ;
    }

}
