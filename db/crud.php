<?php
class crud
{
    // private database object\
    private $db;

    //constructor to initialize private variable to the database connection
    function __construct($conn)
    {
        $this->db = $conn;
    }

    // function to insert a new record into the attendee database
    public function insertProducts($sku, $name, $price, $product_type, $size, $weight, $dimensions)
    {
        try {
            // define sql statement to be executed
            $sql = "INSERT INTO product (sku,name,price,product_type,size,weight,dimensions) VALUES (:sku,:name,:price,:product_type,:size,:weight,:dimensions)";
            //prepare the sql statement for execution


            $stmt = $this->db->prepare($sql);
            // bind all placeholders to the actual values
            $stmt->bindparam(':sku', $sku);
            $stmt->bindparam(':name', $name);
            $stmt->bindparam(':price', $price);
            $stmt->bindparam(':product_type', $product_type);
            $stmt->bindparam(':size', $size);
            $stmt->bindparam(':weight', $weight);
            $stmt->bindparam(':dimensions', $dimensions);

            // execute statement
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

        // check if sku already exist in database
        public function getProductBySku($sku)
        {
            try {
                $sql = "SELECT * FROM product WHERE sku = :sku";
                $stmt = $this->db->prepare($sql);
                $stmt->bindparam(':sku', $sku);
                $stmt->execute();
                $result = $stmt->fetch();
                return $result;
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }


    public function getProducts()
    {
        try {
            $sql = "SELECT * FROM `product`";
            $result = $this->db->query($sql);
            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    // deleting multiple products from index page using a checkbox
    public function deleteProduct($id)
    {
        try {
            $sql = "DELETE FROM product WHERE product_id = :id";
            $stmt = $this->db->prepare($sql);
            $stmt->bindparam(':id', $id);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
}
