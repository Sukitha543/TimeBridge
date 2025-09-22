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

    public function getCustomerCount() {
        try {
            $stmt = $this->connect()->prepare("SELECT COUNT(*) as total FROM customer");
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result['total'] ?? 0;
        } catch (PDOException $e) {
            error_log("Error counting products: " . $e->getMessage());
            return 0; // fallback
        }
    }

      // Fetch customer details by user ID
    public function getCustomerById($userId) {
        $pdo = $this->connect();
        $stmt = $pdo->prepare("SELECT * FROM Customer WHERE userid = ?");
        $stmt->execute([$userId]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Update customer details
    public function updateCustomer($userId, $firstName, $lastName, $email, $shippingAddress, $contactNumber) {
        try {
            $pdo = $this->connect();

            // Optional: check if email is used by another customer
            $stmt = $pdo->prepare("SELECT * FROM Customer WHERE email = ? AND userid != ?");
            $stmt->execute([$email, $userId]);
            if ($stmt->rowCount() > 0) {
                $_SESSION['error'] = "Email is already used by another account!";
                return false;
            }

            $stmt = $pdo->prepare("
                UPDATE Customer 
                SET firstname = ?, lastname = ?, email = ?, shippingaddress = ?, contactnumber = ? 
                WHERE userid = ?
            ");
            $stmt->execute([$firstName, $lastName, $email, $shippingAddress, $contactNumber, $userId]);
            $_SESSION['success'] = "✅ Profile updated successfully!";
            return true;
        } catch(PDOException $e) {
            $_SESSION['error'] = "Database error: " . $e->getMessage();
            return false;
        }
    }

    // Delete customer account
    public function deleteCustomer($userId) {
       $pdo = $this->connect();
        try {
            $pdo->beginTransaction();

            // Delete from Customer
            $stmt1 = $pdo->prepare("DELETE FROM Customer WHERE userid = ?");
            $stmt1->execute([$userId]);

            // Delete from Users
            $stmt2 = $pdo->prepare("DELETE FROM Users WHERE userid = ?");
            $stmt2->execute([$userId]);

            $pdo->commit();
            $_SESSION['success'] = "✅ Your profile has been deleted successfully.";
            session_destroy();
        } catch(PDOException $e) {
            $pdo->rollBack();
            $_SESSION['error'] = "Database error: " . $e->getMessage();
        }
            }


}
