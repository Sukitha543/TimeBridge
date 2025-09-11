<?php

require_once "user.php";

class Admin extends User {

    private $email;

    public function __construct($username, $password, $email) {
        parent::__construct($username, $password, "admin");
        $this->email = $email;
    }

    public function register() {
        try {
            $pdo = $this->connect(); // create a PDO connection

            // Check if email already exists in Admin table
            $stmt = $pdo->prepare("SELECT * FROM Admin WHERE Email = ?");
            $stmt->execute([$this->email]);
            $adminRecord = $stmt->fetch(PDO::FETCH_ASSOC);

            if(!$adminRecord){
                $_SESSION['error'] = "Email is not registered as admin!";
                return false;
            }

            if($adminRecord['userid'] !== null){
                $_SESSION['error'] = "This admin email is already linked to a user account!";
                return false;
            }

            // Check if username exists in Users
            $stmt = $pdo->prepare("SELECT * FROM Users WHERE username = ?");
            $stmt->execute([$this->username]);
            if($stmt->rowCount() > 0){
                $_SESSION['error'] = "Username already taken!";
                return false;
            }

            // Hash password and insert user
            $hashedPwd = password_hash($this->password, PASSWORD_DEFAULT);
            $stmt = $pdo->prepare("INSERT INTO Users (username, password, role) VALUES (?, ?, ?)");
            $stmt->execute([$this->username, $hashedPwd, $this->role]);
            $userid = $pdo->lastInsertId();

            // Update Admin table to link new user
            $stmt = $pdo->prepare("UPDATE Admin SET userid = ? WHERE Email = ?");
            $stmt->execute([$userid, $this->email]);

            $_SESSION['success'] = "Admin registered successfully!";
            return true;

        } catch(PDOException $e) {
            $_SESSION['error'] = "Database error: " . $e->getMessage();
            return false;
        }
    }
}
