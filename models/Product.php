<?php

Class Product extends Model {

    protected $table = 'products';


    public static function getProductsWithColors(){
        $intance = new self;
        $products = $intance->setQuery("SELECT  A.*
                                FROM products AS A 
                                WHERE A.status = 'product' ")->getAll();


        foreach ($products as $key => $product) {
            $product_id = $product['product_id'];
            $colors = $intance->setQuery("SELECT * FROM `product_colors` WHERE `product_id` = $product_id")->getAll();
            $products[$key]["colors"] = $colors;
        }

        return $products;
    }


    public static function getRankedProducts(){
        $instance = new self;

        $data = $instance->setQuery("
            WITH RankedProducts AS (
                SELECT 
                    P.*,
                    C.id AS categories_id,
                    C.name AS category_name,
                    PC.stock_qty,
                    PC.name AS color_name,
                    PC.image,
                    PC.id AS color_id,
                    ROW_NUMBER() OVER (PARTITION BY C.id ORDER BY P.name) AS rn
                FROM products AS P
                LEFT JOIN categories AS C 
                    ON P.category_id = C.id
                LEFT JOIN product_colors AS PC 
                    ON P.id = PC.product_id
                WHERE P.deleted_at IS NULL
            )
            SELECT 
                RP.*
            FROM RankedProducts AS RP
            WHERE RP.rn = 1
            ORDER BY RP.category_name
        ")->getAll();

        return $data;
        
    }

    public static function getProducts($category_id = null){
        $qry = '';
        if($category_id){
            $qry = "SELECT 
                        P.*, 
                        C.name AS category_name,
                        PC.stock_qty,
                        PC.name as color_name,
                        PC.image,
                        PC.id as color_id
                    FROM products AS P
                    LEFT JOIN categories AS C 
                        ON P.category_id = C.id
                    LEFT JOIN product_colors AS PC 
                        ON P.id = PC.product_id
                    WHERE P.deleted_at IS NULL
                    AND C.id = $category_id
                    ORDER BY P.name;
                    ";
        }else{
            $qry = "SELECT 
                    P.*, 
                    C.name AS category_name
                FROM products AS P
                LEFT JOIN categories AS C 
                ON P.category_id = C.id
                WHERE P.deleted_at IS NULL
                ORDER BY P.name
            ";
        }

        $instance = new self;
        $products = $instance->setQuery( $qry )->getAll();

        foreach ($products as $key => $product) {
            $product_id = $product['id'];
            $colors = $instance->setQuery("SELECT * FROM `product_colors` WHERE `product_id` = $product_id")->getAll();
            $products[$key]["colors"] = $colors;
        }

    
        return $products;
    }

    public static function getProductWIthDistictColor(){
        $qry = " SELECT 
                P.*, 
                C.name AS category_name,
                PC.stock_qty,
                PC.name AS color_name,
                PC.image,
                PC.id AS color_id
            FROM products AS P
            LEFT JOIN categories AS C 
                ON P.category_id = C.id
            LEFT JOIN (
                SELECT 
                    PC1.product_id,
                    MAX(PC1.id) AS id
                FROM product_colors AS PC1
                WHERE PC1.deleted_at IS NULL
                GROUP BY PC1.product_id
            ) AS PCSub 
                ON P.id = PCSub.product_id
            LEFT JOIN product_colors AS PC 
                ON PC.id = PCSub.id
            WHERE P.deleted_at IS NULL
            ORDER BY P.name;
        ";

        $instance = new self;
        $categories = $instance->setQuery( $qry )->getAll();

    
        return $categories;
    }

    public static function getDisplayProducts($category_id = null){
        $qry = '';
        if($category_id){
            $qry = "SELECT 
                        P.*, 
                        C.name AS category_name,
                        PC.stock_qty,
                        PC.name as color_name,
                        PC.image,
                        PC.id as color_id
                    FROM products AS P
                    LEFT JOIN categories AS C 
                        ON P.category_id = C.id
                    LEFT JOIN product_colors AS PC 
                        ON P.id = PC.product_id
                    WHERE P.deleted_at IS NULL
                    AND PC.deleted_at IS NULL
                    AND C.id = $category_id
                    ORDER BY P.name;
                    ";
        }else{
            $qry = "SELECT 
            P.*, 
            C.name AS category_name,
            PC.stock_qty,
            PC.name as color_name,
            PC.image,
            PC.id as color_id
        FROM products AS P
        LEFT JOIN categories AS C 
            ON P.category_id = C.id
        LEFT JOIN product_colors AS PC 
            ON P.id = PC.product_id
        WHERE P.deleted_at IS NULL
        AND PC.deleted_at IS NULL
        ORDER BY P.name;
            ";
        }

        $instance = new self;
        $categories = $instance->setQuery( $qry )->getAll();

    
        return $categories;
    }

    public static function getRelatedProducts($currentProductName){
        $instance = new self;
        // $currentProductName = "SUBLIMATION MESH SHORT"; // This should be dynamically set based on the current product
        $words = explode(' ', $currentProductName);

            // Construct the WHERE clause dynamically
            $whereClause = "P.deleted_at IS NULL AND PC.deleted_at IS NULL AND P.name != '" . $currentProductName . "' AND (";
            foreach ($words as $index => $word) {
                if ($index > 0) {
                    $whereClause .= " OR ";
                }
                $whereClause .= "P.name LIKE '%" . $word . "%'";
            }
            $whereClause .= ")";

            // Run the query
            $relatedProduct = $instance->setQuery("
                SELECT 
                    P.*, 
                    C.id as category_id,
                    C.name AS category_name,
                    PC.stock_qty,
                    PC.name as color_name,
                    PC.image,
                    PC.id as color_id
                FROM products AS P
                LEFT JOIN categories AS C ON P.category_id = C.id
                JOIN product_colors AS PC ON P.id = PC.product_id
                WHERE $whereClause
                ORDER BY P.created_at DESC
                LIMIT 8
            ")->getAll();

        // $categories = $instance->setQuery("
        //     SELECT 
        //         P.*, 
        //         C.id as category_id,
        //         C.name AS category_name
        //     FROM products AS P
        //     LEFT JOIN categories AS C ON P.category_id = C.id
        //     WHERE P.deleted_at IS NULL
        //     ORDER BY P.created_at DESC
        // ")->getAll();
    
        return $relatedProduct;
    }

    public static function findProduct($id, $color_id = 0){
        $qry = "
            SELECT 
                P.*, 
                C.id as category_id,
                C.name AS category_name,
                PC.stock_qty,
                PC.name as color_name,
                PC.image,
                PC.id as color_id
            FROM products AS P
            LEFT JOIN categories AS C ON P.category_id = C.id
            LEFT JOIN product_colors AS PC ON P.id = PC.product_id
            WHERE P.id = $id
            AND P.deleted_at IS NULL
            AND PC.deleted_at IS NULL
            ORDER BY P.created_at DESC
        ";

        if($color_id){
            $qry = "
                SELECT 
                    P.*, 
                    C.id as category_id,
                    C.name AS category_name,
                    PC.stock_qty,
                    PC.name as color_name,
                    PC.image,
                    PC.id as color_id
                FROM products AS P
                LEFT JOIN categories AS C ON P.category_id = C.id
                LEFT JOIN product_colors AS PC ON P.id = PC.product_id
                WHERE P.id = $id
                AND PC.id = $color_id
                AND P.deleted_at IS NULL
                AND PC.deleted_at IS NULL
                ORDER BY P.created_at DESC
            ";
        }

        $instance = new self;
        $prodduct = $instance->setQuery($qry)->getFirst();
    
        return $prodduct;
    }
    public static function findProductByCategory($category_name, $color_id = 0){
        $qry = "
            SELECT 
                P.*, 
                C.id as category_id,
                C.name AS category_name,
                PC.stock_qty,
                PC.name as color_name,
                PC.image,
                PC.id as color_id,
                PC.code
            FROM products AS P
            LEFT JOIN categories AS C ON P.category_id = C.id
            JOIN product_colors AS PC ON P.id = PC.product_id
            WHERE C.name = '$category_name'
            AND P.deleted_at IS NULL
            AND PC.deleted_at IS NULL
            ORDER BY P.created_at DESC
        ";

        if($color_id){
            $qry = "
                SELECT 
                    P.*, 
                    C.id as category_id,
                    C.name AS category_name,
                    PC.stock_qty,
                    PC.name as color_name,
                    PC.image,
                    PC.id as color_id,
                    PC.code
                FROM products AS P
                LEFT JOIN categories AS C ON P.category_id = C.id
                JOIN product_colors AS PC ON P.id = PC.product_id
                WHERE C.name = '$category_name'
                AND PC.id = $color_id
                AND P.deleted_at IS NULL
                AND PC.deleted_at IS NULL
                ORDER BY P.created_at DESC
            ";
        }

        $instance = new self;
        $product = $instance->setQuery($qry)->getAll();
    
        return $product;
    }
    

}