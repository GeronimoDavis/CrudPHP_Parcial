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
            // Hasheamos la contraseña antes de guardarla
            $hashedPassword = password_hash($this->password, PASSWORD_DEFAULT);

            $stmt->bindParam(":username", $this->username);
            $stmt->bindParam(":password", $hashedPassword);
            $stmt->execute();

            return true;

        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function login(){
        try{
            $query = "SELECT * FROM users WHERE username = :username";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(":username", $this->username);
            $stmt->execute(); 
            $userRow = $stmt->fetch(PDO::FETCH_OBJ);

            if(userRow){
                if (password_verify($this->password, $userRow->password)) {
                    return $userRow; // Login exitoso, devolvemos los datos
                }
            }

            return $user;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    //hacer un metodo para poder verificar que el usuario es unico
}


?>