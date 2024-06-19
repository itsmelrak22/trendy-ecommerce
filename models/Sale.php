<?php

Class Sale extends Model {

    protected $table = 'sales';
    public static function findOrder($order_id){
        $qry = " SELECT * FROM `sales` WHERE `order_id` = $order_id LIMIT 1";

        $instance = new self;
        $salesOrder = $instance->setQuery($qry)->getAll();
        if(count($salesOrder) ==0){
            return null;
        }else{
            $salesOrder = $instance->setQuery($qry)->getFirst();
        }
        return $salesOrder;
    }

    public static function getAllSales(){
        $instance = new self;

             $sales = $instance->setQuery("
                SELECT A.*, C.username, C.email, B.mop, B.total, B.status, B.payment_id, B.paid
                FROM `sales` as A
                LEFT JOIN `orders` as B
                ON A.order_id = B.id
                LEFT JOIN `customers` as C
                ON C.id = B.customer_id
                WHERE A.deleted_at IS NULL
            ")->getAll();

            foreach ($sales as $key => &$value) { // Note the & before $value
                $order_id =  $value['order_id'];
                $value['order_details'] = $instance->setQuery("
                    SELECT OD.*, PC.name as color_name, P.name as product_name
                    FROM `order_details` as OD
                    LEFT JOIN `product_colors` as PC
                    ON PC.id = OD.color_id
                    LEFT JOIN `products` as P
                    ON P.id = PC.product_id
                    WHERE order_id =$order_id
                ")->getAll();
            }

            return $sales;

    }

    public static function getSalesByDate($reportDate){
        $instance = new self;
    
    
        $sales = $instance->setQuery("
            SELECT A.*, C.username, C.email, B.mop, B.total, B.status, B.payment_id, B.paid
            FROM `sales` as A
            LEFT JOIN `orders` as B
            ON A.order_id = B.id
            LEFT JOIN `customers` as C
            ON C.id = B.customer_id
            WHERE A.deleted_at IS NULL AND A.created_at LIKE '%$reportDate%'
        ")->getAll();
    
        foreach ($sales as $key => &$value) { // Note the & before $value
            $order_id =  $value['order_id'];
            $value['order_details'] = $instance->setQuery("
                SELECT OD.*, PC.name as color_name, P.name as product_name
                FROM `order_details` as OD
                LEFT JOIN `product_colors` as PC
                ON PC.id = OD.color_id
                LEFT JOIN `products` as P
                ON P.id = PC.product_id
                WHERE order_id = $order_id
            ")->getAll();
        }
    
        return $sales;
    }

    public static function getSalesByMonth($reportMonth){
        $instance = new self;
    
        $sales = $instance->setQuery("
            SELECT A.*, C.username, C.email, B.mop, B.total, B.status, B.payment_id, B.paid
            FROM `sales` as A
            LEFT JOIN `orders` as B
            ON A.order_id = B.id
            LEFT JOIN `customers` as C
            ON C.id = B.customer_id
            WHERE A.deleted_at IS NULL AND DATE_FORMAT(A.created_at, '%Y-%m') = '$reportMonth'
        ")->getAll();
    
        foreach ($sales as $key => &$value) {
            $order_id = $value['order_id'];
            $value['order_details'] = $instance->setQuery("
                SELECT OD.*, PC.name as color_name, P.name as product_name
                FROM `order_details` as OD
                LEFT JOIN `product_colors` as PC
                ON PC.id = OD.color_id
                LEFT JOIN `products` as P
                ON P.id = PC.product_id
                WHERE order_id = $order_id
            ")->getAll();
        }
    
        return $sales;
    }
    
    public static function getSalesByYear($reportYear){
        $instance = new self;
    
        $sales = $instance->setQuery("
            SELECT A.*, C.username, C.email, B.mop, B.total, B.status, B.payment_id, B.paid
            FROM `sales` as A
            LEFT JOIN `orders` as B
            ON A.order_id = B.id
            LEFT JOIN `customers` as C
            ON C.id = B.customer_id
            WHERE A.deleted_at IS NULL AND DATE_FORMAT(A.created_at, '%Y') = '$reportYear'
        ")->getAll();
    
        foreach ($sales as $key => &$value) {
            $order_id = $value['order_id'];
            $value['order_details'] = $instance->setQuery("
                SELECT OD.*, PC.name as color_name, P.name as product_name
                FROM `order_details` as OD
                LEFT JOIN `product_colors` as PC
                ON PC.id = OD.color_id
                LEFT JOIN `products` as P
                ON P.id = PC.product_id
                WHERE order_id = $order_id
            ")->getAll();
        }
    
        return $sales;
    }
    
    public static function getSalesByCustomDate($startDate, $endDate){
        $instance = new self;
    
        $sales = $instance->setQuery("
            SELECT A.*, C.username, C.email, B.mop, B.total, B.status, B.payment_id, B.paid
            FROM `sales` as A
            LEFT JOIN `orders` as B
            ON A.order_id = B.id
            LEFT JOIN `customers` as C
            ON C.id = B.customer_id
            WHERE A.deleted_at IS NULL AND A.created_at BETWEEN '$startDate' AND '$endDate'
        ")->getAll();
    
        foreach ($sales as $key => &$value) {
            $order_id = $value['order_id'];
            $value['order_details'] = $instance->setQuery("
                SELECT OD.*, PC.name as color_name, P.name as product_name
                FROM `order_details` as OD
                LEFT JOIN `product_colors` as PC
                ON PC.id = OD.color_id
                LEFT JOIN `products` as P
                ON P.id = PC.product_id
                WHERE order_id = $order_id
            ")->getAll();
        }
    
        return $sales;
    }
    
    
    

}