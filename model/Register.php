<?php
namespace model;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use core\Database;
use mysqli;
use PDO, PDOException;


class Register {
    private $conn;
    private $table_name = "user";
    public $id;
    public $username;
    public $password;
    public $ten;
    public $diachi;
    public $email;
    public $dienthoai;
    public $role;

    public $reset_token;
    public $reset_token_ex;
    public $confirmpassword;
    
    public function __construct($db) {
        $this->conn = $db;
    }
   

    public function registration() {
        $sql = "SELECT * FROM " . $this->table_name . " WHERE username = :username OR email = :email";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':username', $this -> username);
        $stmt->bindParam(':email', $this ->email);
        $stmt->execute();
    
        // Check if there are any rows returned
        if ($stmt->rowCount() > 0) {
            return 10; // Username or email already taken
        } else {
            if ($this ->password == $this -> confirmpassword) {
                $hashedPassword = password_hash($this ->password, PASSWORD_DEFAULT);
                $query = "INSERT INTO " . $this->table_name . " (username, email, password) VALUES (:username, :email, :password)";
                $stmt = $this->conn->prepare($query);
                $stmt->bindParam(':username', $this ->username);
                $stmt->bindParam(':email', $this ->email);
                $stmt->bindParam(':password', $hashedPassword);
                $stmt->execute();
                return 1; // Registration success
            } else {
                return 100; // Passwords do not match
            }
        }
    }
    public function login() {
        $sql = "SELECT * FROM " . $this->table_name . "  WHERE username = :email OR email = :email";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':email',  $this ->email);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($stmt->rowCount() > 0) {   
            $hashedPassword = password_hash( $this ->password, PASSWORD_DEFAULT);
            if (password_verify( $this ->password, $hashedPassword)) 
            {
                
                $this->id = $user["id"];
                return 1;
            } else {
                return 10; // Incorrect password
            }
        } else {
            return 100; // User not found
        }
    }
    public function resetpass(){
        $sql="UPDATE " . $this->table_name . " SET reset_token = :reset_token, reset_token_ex = :reset_token_ex WHERE email = :email";
        $stmt = $this->conn->prepare($sql);
        $token = bin2hex(random_bytes(16));
        $token_hash = hash("sha256", $token);
        $expiry = date("Y-m-d H:i:s", time() + 60 * 30); 
        $stmt->bindParam(':reset_token', $token_hash);
        $stmt->bindParam(':reset_token_ex', $expiry);
        $stmt->bindParam(':email', $this->email);
        try {
            $stmt->execute();
            return $token; // Return the token for later use
        } catch (PDOException $e) {
            return false; // Return false if there's an error
        }
    }
    public function resetPassword(){
       $sql="SELECT * FROM ".$this->table_name." WHERE reset_token = :reset_token";
       $stmt = $this->conn->prepare($sql);
       $stmt->bindParam(':reset_token', $this-> reset_token);
       $stmt->execute();
       return $stmt->fetch(PDO::FETCH_ASSOC); 
    }
    public function updatePassword() {
        $hashedPassword = password_hash($this->password, PASSWORD_DEFAULT);
        $sql = "UPDATE ".$this->table_name." SET password = :password , reset_token = NULL , reset_token_ex = NULL WHERE id = :id AND reset_token = :reset_token AND reset_token_ex=:reset_token_ex";
    
        try {
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':password', $hashedPassword);
            $stmt->bindParam(':id', $this->id);
            $stmt->bindParam(':reset_token', $this->reset_token);
            $stmt->bindParam(':reset_token_ex', $this->reset_token_ex);
    
            // Execute the query
            $result = $stmt->execute();
    
            // Check for errors
            if ($result === false) {
                $errorInfo = $stmt->errorInfo();
                // Log or display the error information
                echo "Error: " . $errorInfo[2];
                return false; // Return false to indicate an error
            }
    
            // Return the result (you may need to modify this based on your needs)
            return $result;
        } catch (PDOException $e) {
            // Handle any PDO exceptions
            echo "PDO Exception: " . $e->getMessage();
            return false; // Return false to indicate an error
        }
    }
    public function idUser(){
        return $this->id;
    }

    public function selectUser(){
        $sql = "SELECT * FROM " . $this->table_name . " WHERE id = :id"; 
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $this->id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}