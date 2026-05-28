<?php
namespace Entities;

require_once "../config/DB.php";
use Config\DB;

use PDO;
use PDOException;

class User{
    private $conn;

    public $userId;
    public $username;
    public $password;

    public function __construct(PDO $db)
    {
        $this->conn = $db;
    }

    public function register(){
        try{
            $query = "INSERT INTO users (username, password) VALUES (:username, :password)";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(":username", $this->username);
            $stmt->bindParam(":password", $this->password);
            $stmt->execute();

        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}


?>