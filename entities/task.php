<?php
namespace Entities;

require_once "../config/DB.php";

use Config\DB;
use PDO;
use PDOException;

class Tasks{
    private $conn;
    
    public $taskId;
    public $categoryId;
    public $title;
    public $description;
    public $start;
    public $finish;
    public $priority;
    public $state;

    public function __construct(PDO $db){
        $this->conn = $db;
    }

    public function getAll(){
        try{
            $query = "SELECT * FROM tasks";
            $stmt = $this->conn->prepare($query);
            $stmt->execute();

            $tasks = $stmt->fetchAll(PDO::FETCH_OBJ);

            return tasks;
        }catch(PDOException $e){
            echo "Error get tasks: ". $e->getMessage();
        }
    }

    public function count($idCat){
        try{
            $query = "SELECT COUNT(*) FROM tasks WHERE categoryId = :cat";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(":cat", $idCat);
            $stmt->execute();
            
            $cant = $stmt->fetchColumn();
            return $cant;
            
        }catch(PDOException $e){
            echo "Error counting tasks: " . $e->getMessage();
            return 0;
        }
    }



}

?>