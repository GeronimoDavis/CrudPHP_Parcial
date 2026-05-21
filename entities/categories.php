<?php
namespace Entities;

require_once "../config/DB.php";

use Config\DB;
use PDO;
use PDOException;
 
class Categories{

private $conn;
public $category_id;
public $category_name;


public function __construct(PDO $db){
    $this->conn = $db;
}

public function getAll(){
    try{
        $query = "SELECT * FROM categories";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $categories = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $categories; 
    }catch(PDOExeption $e){
        echo "Error al cargar las categories: " . $e->getMesagge();
    }
}

}
?>