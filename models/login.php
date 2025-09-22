<?php
require_once "dbh_config.php";

class login extends Dbh{

    Public function authenticate($username,$password){
          try {
            $pdo = $this->connect();

            // Check if user exists
            $stmt = $pdo->prepare("SELECT * FROM Users WHERE username = ?");
            $stmt->execute([$username]);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if(!$user){
                $_SESSION['error'] = "Invalid username or password!";
                return false;
            }

            // Verify password
            if(!password_verify($password, $user['password'])){
                $_SESSION['error'] = "Invalid username or password!";
                return false;
            }

            // Start session for authenticated user
            $_SESSION['userid'] = $user['userid'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['role'] = $user['role'];
            $_SESSION['logged_in'] = true;

            return true;

        } catch(PDOException $e) {
            $_SESSION['error'] = "Database error: " . $e->getMessage();
            return false;
        }
    }
}
