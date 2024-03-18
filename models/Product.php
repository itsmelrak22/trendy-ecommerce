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

    public static function getProducts(){
        $instance = new self;
        $categories = $instance->setQuery("
            SELECT P.*, C.id as category_id, C.name AS category_name 
            FROM products AS P
            LEFT JOIN categories AS C ON P.category_id = C.id
            ORDER BY P.created_at DESC
        ")->getAll();
    
        return $categories;
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