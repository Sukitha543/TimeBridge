<?php
require_once "user.php";

class Customer extends User
{
    private $firstName;
    private $lastName;
    private $email;
    private $shippingAddress;
    private $contactNumber;

    public function __construct($firstName, $lastName, $email, $shippingAddress, $contactNumber, $username, $password)
    {
        parent::__construct($username, $password, "customer");

        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->email = $email;
        $this->shippingAddress = $shippingAddress;
        $this->contactNumber = $contactNumber;
    }

    public function register() {
        try {
            $pdo = $this->connect(); // get PDO connection

            // 1. Check if email already exists in Customer table
            $stmt = $pdo->prepare("SELECT * FROM Customer WHERE Email = ?");
            $stmt->execute([$this->email]);
            if($stmt->rowCount() > 0){
                $_SESSION['error'] = "Email already used!";
                return false;
            }

            // 2. Check if username already exists in Users table
            $stmt = $pdo->prepare("SELECT * FROM Users WHERE username = ?");
            $stmt->execute([$this->username]);
            if($stmt->rowCount() > 0){
                $_SESSION['error'] = "Username already taken!";
                return false;
            }

            // 3. Insert into Users table
            $hashedPwd = password_hash($this->password, PASSWORD_DEFAULT);
            $stmt = $pdo->prepare("INSERT INTO Users (username, password, role) VALUES (?, ?, ?)");
            $stmt->execute([$this->username, $hashedPwd, $this->role]);
            $userid = $pdo->lastInsertId();

            if(!$userid){
                $_SESSION['error'] = "Failed to create user account.";
                return false;
            }

            // 4. Insert into Customer table
            $stmt = $pdo->prepare("INSERT INTO Customer (userid, firstname, lastname, Email, shippingaddress, contactnumber) VALUES (?, ?, ?, ?, ?, ?)");
            $stmt->execute([$userid, $this->firstName, $this->lastName, $this->email, $this->shippingAddress, $this->contactNumber]);

            $_SESSION['success'] = "Customer registered successfully!";
            return true;

        } catch(PDOException $e) {
            $_SESSION['error'] = "Database error: " . $e->getMessage();
            return false;
        }
    }
}
