<?php

Class ProductColor extends Model {

    protected $table = 'product_colors';



    public static function getProductColors($product_id){
        $instance = new self;
        $categories = $instance->setQuery("
            SELECT *  FROM `product_colors` 
            WHERE `deleted_at` IS NULL      
            AND `product_id` = $product_id 
            ORDER BY `created_at` DESC;
        ")->getAll();
    
        return $categories;
    }

    public static function findProductColor($id){
        $instance = new self;
        $prodduct = $instance->setQuery("
           
            SELECT Color.*, Product.name as product_name
            FROM `product_colors` AS Color
            LEFT JOIN `products` AS Product
            ON Color.product_id = Product.id
            WHERE Color.id = $id
            AND Color.deleted_at IS NULL
            ORDER BY Color.created_at DESC
        ")->getFirst();
    
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