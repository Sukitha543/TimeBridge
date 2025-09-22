<?php
require_once ("../models/dbh_config.php");
class Product extends Dbh {

    private $brand;
    private $model;
    private $productCode;
    private $type;
    private $diameter;
    private $material;
    private $strap;
    private $resistence;
    private $calibre;
    private $price;
    private $quantity;
    private $image;

     public function __construct($brand, $model, $productCode, $type, $diameter, $material,$strap,$resistance,$calibre,$price,$quantity,$image)
    {
        $this->brand = $brand;
        $this->model = $model;
        $this->productCode = $productCode;
        $this->type = $type;
        $this->diameter = $diameter;
        $this->material = $material;
        $this->strap = $strap;
        $this->resistence = $resistance;
        $this->calibre = $calibre;
        $this->price = $price;
        $this->quantity = $quantity;
        $this->image = $image;
    }

    public function add (){
           try {
            $pdo = $this->connect();

            // Check unique product code
            $stmt = $pdo->prepare("SELECT * FROM products WHERE productCode = ?");
            $stmt->execute([$this->productCode]);
            if ($stmt->rowCount() > 0) {
                $_SESSION['error'] = "Product code already exists!";
                return false;
            }

            // Insert into DB
            $stmt = $pdo->prepare("INSERT INTO products 
                (brand, model, productCode, type, diameter, material, strap, water_resistence, calibre, price, quantity, image) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
            $stmt->execute([
                $this->brand,
                $this->model,
                $this->productCode,
                $this->type,
                $this->diameter,
                $this->material,
                $this->strap,
                $this->resistence,
                $this->calibre,
                $this->price,
                $this->quantity,
                $this->image
            ]);

            $_SESSION['success'] = "Product added successfully!";
            return true;

        } catch (PDOException $e) {
            $_SESSION['error'] = "Database error: " . $e->getMessage();
            return false;
        }
           
   
}


    public function update() {
        try {
            $pdo = $this->connect();

            $stmt = $pdo->prepare("UPDATE products SET brand=?, model=?, type=?, diameter=?, material=?, strap=?, water_resistence=?, calibre=?, price=?, quantity=?, image=? WHERE productCode=?");
            $stmt->execute([
                $this->brand, 
                $this->model, 
                $this->type,
                $this->diameter,
                $this->material, 
                $this->strap, 
                $this->resistence, 
                $this->calibre,
                $this->price, 
                $this->quantity, 
                $this->image, 
                $this->productCode
            ]);

            $_SESSION['success'] = "Product updated successfully!";
            return true;

        } catch(PDOException $e) {
            $_SESSION['error'] = "Database error: ".$e->getMessage();
            return false;
        }
    }

    public function delete(){
         try {
            $pdo = $this->connect();

            $stmt = $pdo->prepare("DELETE FROM products WHERE productCode=?");
            $stmt->execute([$this->productCode]);

            if ($stmt->rowCount() == 0) {
                $_SESSION['error'] = "Product not found!";
                return false;
            }
            else{
                 $_SESSION['success'] = "Product deleted successfully!";
                 return true;
            }


        } catch(PDOException $e) {
            $_SESSION['error'] = "Database error: ".$e->getMessage();
            return false;
        }
    }


     public function findByCode($productCode) {                                                           
            try {
            $pdo = $this->connect();

            $stmt = $pdo->prepare("SELECT * FROM products WHERE productCode = ?");
            $stmt->execute([$productCode]);
            $product = $stmt->fetch(PDO::FETCH_ASSOC);
            return $product; // associative array of product details

        } catch (PDOException $e) {
            $_SESSION['error'] = "Database error: " . $e->getMessage();
            return false;
        }
    }
    
    public function getAllProducts() {
    try {
        $pdo = $this->connect();
        $stmt = $pdo->query("SELECT * FROM products");
        $products = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $products ?: [];
    } catch (PDOException $e) {
        $_SESSION['error'] = "Database error: " . $e->getMessage();
        return [];
    } 
}

    public function getProductCount() {
        try {
            $stmt = $this->connect()->prepare("SELECT COUNT(*) as total FROM products");
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result['total'] ?? 0;
        } catch (PDOException $e) {
            error_log("Error counting products: " . $e->getMessage());
            return 0; // fallback
        }

}

    public function reduceQuantity($productCode, $amount = 1) {
        $sql = "UPDATE products SET quantity = quantity - ? WHERE productCode = ? AND quantity > 0";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$amount, $productCode]);
    }

    public function isInStock($productCode) {
        $sql = "SELECT quantity FROM products WHERE productCode = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$productCode]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row && $row['quantity'] > 0;
    }

} 