<?php

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

    public function display (){}
    public function update() {}
    public function delete(){}

}   