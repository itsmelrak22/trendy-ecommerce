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
            $whereClause = "P.deleted_at IS NULL AND P.name != '" . $currentProductName . "' AND (";
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
                LEFT JOIN product_colors AS PC ON P.id = PC.product_id
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
                ORDER BY P.created_at DESC
            ";
        }

        $instance = new self;
        $prodduct = $instance->setQuery($qry)->getFirst();
    
        return $prodduct;
    }
    

    // public function save($param){
    //     try {
    //         // $param = [
    //         //     "name" => "Male",
    //         //     "created_at" => new \DateTime,
    //         //     "updated_at" => new \DateTime,
    //         //     "created_by" => 1,
    //         // ];
    
    //         // Get the keys from the $param array
    //         $keys = array_keys($param);
    
    //         // Create a string of the keys for the SQL query
    //         $columns = implode(', ', $keys);
    
    //         // Create a string of placeholder names for the SQL query
    //         $placeholders = ':' . implode(', :', $keys);
    
    //         // SQL query
    //         $sql = "INSERT INTO $this->table ($columns) VALUES ($placeholders)";
    
    //         // Prepare statement
    //         $this->stmt = $this->pdo->prepare($sql);
    
    //         // Loop through each item in the $param array
    //         foreach ($param as $key => $value) {
    //             // If the value is a DateTime object, format it to a string
    //             if ($value instanceof \DateTime) {
    //                 $value = $value->format('Y-m-d H:i:s');
    //             }
    
    //             // Bind the value to the placeholder in the SQL query
    //             $this->stmt->bindValue(':'.$key, $value);
    //         }
    
    //         // Execute statement
    //         $this->stmt->execute();
    //         // header("Location: ../admin/gender-age-category-list.php");
    //     } catch (\Exception $e) {
    //         // Handle exception
    //         echo "Error: " . $e->getMessage();
    //     }
    // }
    

    // public function update($param, $id){
    //     try {
    //         // $param = [
    //         //     "name" => "Male",
    //         //     "updated_at" => new \DateTime,
    //         //     "updated_by" => 1,
    //         // ];
    
    //         // Get the keys from the $param array
    //         $keys = array_keys($param);
    
    //         // Create a string of the keys for the SQL query
    //         $set = '';
    //         foreach ($keys as $key) {
    //             $set .= "$key = :$key, ";
    //         }
    //         $set = rtrim($set, ', ');
    
    //         // SQL query
    //         $sql = "UPDATE $this->table SET $set WHERE id = :id";
    
    //         // Prepare statement
    //         $this->stmt = $this->pdo->prepare($sql);
    
    //         // Bind the ID to the placeholder in the SQL query
    //         $this->stmt->bindValue(':id', $id);
    
    //         // Loop through each item in the $param array
    //         foreach ($param as $key => $value) {
    //             // If the value is a DateTime object, format it to a string
    //             if ($value instanceof \DateTime) {
    //                 $value = $value->format('Y-m-d H:i:s');
    //             }
    
    //             // Bind the value to the placeholder in the SQL query
    //             $this->stmt->bindValue(':'.$key, $value);
    //         }
    
    //         // Execute statement
    //         $this->stmt->execute();
    //     } catch (\Exception $e) {
    //         // Handle exception
    //         echo "Error: " . $e->getMessage();
    //     }
    // }
    

}